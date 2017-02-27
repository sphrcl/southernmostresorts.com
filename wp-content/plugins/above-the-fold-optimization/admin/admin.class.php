<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @since      2.0
 * @package    abovethefold
 * @subpackage abovethefold/admin
 * @author     PageSpeed.pro <info@pagespeed.pro>
 */


class Abovethefold_Admin {

	/**
	 * Above the fold controller
	 */
	public $CTRL;

	/**
	 * Options
	 */
	public $options;

	/**
	 * Controllers
	 */
	public $criticalcss;
	public $css;
	public $javascript;
	public $proxy;
	public $settings; 

	/**
	 * Google language code
	 */
	public $google_lgcode;

	/**
	 * Tabs
	 */
	public $tabs = array(
    	'intro' => 'Intro',
    	'criticalcss' => 'Critical CSS',
    	'css' => 'CSS',
    	'javascript' => 'Javascript',
    	'proxy' => 'Proxy',
    	'settings' => 'Settings',
    	'build-tool' => 'Critical CSS Creator',
		'compare' => 'Quality Test',
		'monitor' => 'Monitor',
		'offer' => 'New Plugin'
    );

	/**
	 * Google Analytics UTM string for external links
	 */
	public $utm_string = 'utm_source=wordpress&amp;utm_medium=plugin&amp;utm_term=optimization&amp;utm_campaign=Above%20The%20Fold%20Optimization';

	/**
	 * Initialize the class and set its properties
	 */
	public function __construct( &$CTRL ) {

		$this->CTRL =& $CTRL;
		$this->options =& $CTRL->options;

		// Upgrade plugin
		$this->CTRL->loader->add_action('plugins_loaded', $this, 'upgrade',10);

		// Configure admin bar menu
		if (!isset($this->CTRL->options['adminbar']) || intval($this->CTRL->options['adminbar']) === 1) {
     	   $this->CTRL->loader->add_action( 'admin_bar_menu', $this, 'admin_bar', 100 );
    	}

		/**
		 * Admin panel specific
		 */
		if (is_admin()) {

			/**
			 * lgcode for Google Documentation links
			 */
			$lgcode = strtolower(get_locale());
			if (strpos($lgcode,'_') !== false) {
				$lgparts = explode('_',$lgcode);
				$lgcode = $lgparts[0];
			}
			if ($lgcode === 'en') {
				$lgcode = '';
			}

			$this->google_lgcode = $lgcode;

			// Hook in the admin options page
			$this->CTRL->loader->add_action('admin_menu', $this, 'admin_menu',30);

			// Hook in the admin styles and scripts
			$this->CTRL->loader->add_action('admin_enqueue_scripts', $this, 'enqueue_scripts',30);


			// add settings link to plugin overview
			$this->CTRL->loader->add_filter('plugin_action_links_above-the-fold-optimization/abovethefold.php', $this, 'settings_link' );

			// Handle admin notices
			$this->CTRL->loader->add_action( 'admin_notices', $this, 'show_notices' );

	        // Update body class
			$this->CTRL->loader->add_filter( 'admin_body_class', $this, 'admin_body_class' );

			// AJAX page search
			$this->CTRL->loader->add_action( 'wp_ajax_abtf_page_search', $this, 'ajax_page_search' );

			/**
			 * Delete page options cache on update
			 */
			$this->CTRL->loader->add_action( 'save_post', $this, 'delete_pageoptions_cache' );
			$this->CTRL->loader->add_action( 'edited_terms', $this, 'delete_pageoptions_cache' );
			// WooCommerce
			$this->CTRL->loader->add_action( 'create_product_cat', $this, 'delete_pageoptions_cache' );

			/**
			 * Load dependencies
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin.criticalcss.class.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin.css.class.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin.javascript.class.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin.proxy.class.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin.settings.class.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin.build-tool.class.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin.monitor.class.php';

			/**
			 * Load critical CSS management
			 */
			$this->criticalcss = new Abovethefold_Admin_CriticalCSS( $CTRL );

			/**
			 * Load CSS management
			 */
			$this->css = new Abovethefold_Admin_CSS( $CTRL );

			/**
			 * Load Javascript management
			 */
			$this->javascript = new Abovethefold_Admin_Javascript( $CTRL );

			/**
			 * Load proxy management
			 */
			$this->proxy = new Abovethefold_Admin_Proxy( $CTRL );

			/**
			 * Load settings management
			 */
			$this->settings = new Abovethefold_Admin_Settings( $CTRL );

			/**
			 * Load settings management
			 */
			$this->buildtool = new Abovethefold_Admin_BuildTool( $CTRL );

			/**
			 * Load monitor management
			 */
			$this->monitor = new Abovethefold_Admin_Monitor( $CTRL );

		}

	}

	/**
	 * Set body class
	 */
	public function admin_body_class( $classes ) {
	    return "$classes abtf-criticalcss";
	}

	/**
	 * Settings link on plugin overview
	 */
	public function settings_link( $links ) {
		$settings_link = '<a href="' . add_query_arg( array( 'page' => 'abovethefold' ), admin_url( 'admin.php' ) ) . '">'.__('Settings').'</a>';
		array_unshift($links, $settings_link);
		return $links;
	}

	/**
	 * Get active tab
	 */
	public function active_tab( $default = 'criticalcss' ) {

		// get tab from query string
		$tab = (isset($_REQUEST['tab'])) ? trim(strtolower($_REQUEST['tab'])) : $default;

		// invalid tab
		if (!isset($this->tabs[$tab])) {
			$tab = $default;
		}

		return $tab;
	}

	/**
	 * Enqueue scripts and styles
	 */
	public function enqueue_scripts($hook) {

		if (!isset($_REQUEST['page']) || $_REQUEST['page'] !== 'abovethefold') {
			return;
		}

		/**
		 * Clear page cache
		 */
		if ((isset($_REQUEST['clear']) && $_REQUEST['clear'] === 'pagecache') || isset($_POST['clear_pagecache'])) {

			check_admin_referer('abovethefold');

			$this->clear_pagecache();

			wp_redirect( add_query_arg( array( 'page' => 'abovethefold', 'tab' => 'settings' ), admin_url( 'admin.php' ) ) );
			exit;
		}

		// add general admin javascript
		wp_enqueue_script( 'abtf_admincp', plugin_dir_url( __FILE__ ) . 'js/admincp.min.js', array( 'jquery' ), WPABTF_VERSION );

		// add general admin CSS
		wp_enqueue_style( 'abtf_admincp', plugin_dir_url( __FILE__ ) . 'css/admincp.min.css', false, WPABTF_VERSION );

	}

	/**
	 * Admin menu option
	 */
	public function admin_menu() {
		global $submenu;

		if( is_plugin_active( 'w3-total-cache/w3-total-cache.php' ) ) {

			/**
			 * Add settings link to Performance tab of W3 Total Cache
			 */
			if (is_array($submenu['w3tc_dashboard']) && !empty($submenu['w3tc_dashboard'])) {
				array_splice( $submenu['w3tc_dashboard'], 2, 0, array(
					array(__('Above The Fold', 'abovethefold'), 'manage_options',  add_query_arg( array( 'page' => 'abovethefold' ), admin_url( 'admin.php' ) ), __('Above The Fold Optimization', 'abovethefold'))
				) );
			}

			add_submenu_page(null, __('Above The Fold', 'abovethefold'), __('Above The Fold Optimization', 'abovethefold'), 'manage_options', 'abovethefold', array(
				&$this,
				'settings_page'
			));

		}

		/**
		 * Add settings link to Settings tab
		 */
		add_submenu_page( 'themes.php',  __('Above The Fold Optimization', 'abovethefold'), __('Above The Fold', 'abovethefold'), 'manage_options', 'abovethefold', array(
			&$this,
			'settings_page'
		));
	}
	
	
	/**
	 * Admin bar option
	 */
	public function admin_bar($admin_bar) {

		$options = get_option('abovethefold');
		if (!empty($options['adminbar']) && intval($options['adminbar']) !== 1) {
			return;
		}

		$settings_url = add_query_arg( array( 'page' => 'abovethefold' ), admin_url( 'admin.php' ) );
		$nonced_url = wp_nonce_url( $settings_url, 'abovethefold' );
		$admin_bar->add_menu( array(
			'id' => 'abovethefold',
			'title' => __( 'PageSpeed', 'abovethefold' ),
			'href' => $nonced_url,
			'meta' => array( 'title' => __( 'PageSpeed', 'abovethefold' ), 'class' => 'ab-sub-secondary' )

		) );

		$admin_bar->add_group( array(
			'parent' => 'abovethefold',
	        'id'     => 'abovethefold-top',
	        'meta'   => array(
	            'class' => 'ab-sub-secondary', // 
	        )
	    ) );

		/**
		 * Compare Critical CSS vs Full CSS
		 */
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-top',
			'id' => 'abovethefold-tools-compare',
			'title' => __( 'Critical CSS Quality Test', 'abovethefold' ),
			'href' => $this->CTRL->view_url('compare-abtf'),
			'meta' => array( 'title' => __( 'Critical CSS Quality Test', 'abovethefold' ), 'target' => '_blank' )
		) );

		$admin_bar->add_node( array(
			'parent' => 'abovethefold-top',
			'id' => 'abovethefold-tools',
			'title' => __( 'Other Tools', 'abovethefold' )
		) );

		if (is_admin()
			|| ( defined( 'DOING_AJAX' ) && DOING_AJAX )
			|| in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'))
		) {
			$currenturl = home_url();
		} else {
			$currenturl = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		}

		/**
		 * Extract Full CSS
		 */
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-tools',
			'id' => 'abovethefold-tools-extract',
			'title' => __( 'Extract Full CSS', 'abovethefold' ),
			'href' => $this->CTRL->view_url('extract-css',array('output' => 'print')),
			'meta' => array( 'title' => __( 'Extract Full CSS', 'abovethefold' ), 'target' => '_blank' )
		) );
		/**
		 * Page cache clear 
		 */
		$clear_url = add_query_arg( array( 'page' => 'abovethefold', 'clear' => 'pagecache' ), admin_url( 'admin.php' ) );
		$nonced_url = wp_nonce_url( $clear_url, 'abovethefold' );
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-tools',
			'id' => 'abovethefold-tools-clear-pagecache',
			'title' => __( 'Clear Page Caches', 'abovethefold' ),
			'href' => $nonced_url,
			'meta' => array( 'title' => __( 'Clear Page Caches', 'abovethefold' ) )
		) );

		/**
		 * Google PageSpeed Score Test
		 */
		$admin_bar->add_node( array(
			'parent' => 'abovethefold',
			'id' => 'abovethefold-check-pagespeed-scores',
			'title' => __( 'Google PageSpeed Scores', 'abovethefold' ),
			'href' => 'https://testmysite.thinkwithgoogle.com/?url='.urlencode($currenturl) . '&hl=' . $this->google_lgcode,
			'meta' => array( 'title' => __( 'Google PageSpeed Scores', 'abovethefold' ), 'target' => '_blank' )
		) );

		/**
		 * Test Groups
		 */
		$admin_bar->add_node( array(
			'parent' => 'abovethefold',
			'id' => 'abovethefold-check-google',
			'title' => __( 'Google tests', 'abovethefold' )
		) );
		$admin_bar->add_node( array(
			'parent' => 'abovethefold',
			'id' => 'abovethefold-check-speed',
			'title' => __( 'Speed tests', 'abovethefold' )
		) );
		$admin_bar->add_node( array(
			'parent' => 'abovethefold',
			'id' => 'abovethefold-check-technical',
			'title' => __( 'Technical & security tests', 'abovethefold' )
		) );


		/**
		 * Google Tests
		 */
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-check-google',
			'id' => 'abovethefold-check-pagespeed',
			'title' => __( 'Google PageSpeed Insights', 'abovethefold' ),
			'href' => 'https://developers.google.com/speed/pagespeed/insights/?url='.urlencode($currenturl) . '&hl=' . $this->google_lgcode,
			'meta' => array( 'title' => __( 'Google PageSpeed Insights', 'abovethefold' ), 'target' => '_blank' )
		) );
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-check-google',
			'id' => 'abovethefold-check-google-mobile',
			'title' => __( 'Google Mobile Test', 'abovethefold' ),
			'href' => 'https://search.google.com/search-console/mobile-friendly?url='.urlencode($currenturl) . '&hl=' . $this->google_lgcode,
			'meta' => array( 'title' => __( 'Google Mobile Test', 'abovethefold' ), 'target' => '_blank' )
		) );
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-check-google',
			'id' => 'abovethefold-check-google-malware',
			'title' => __( 'Google Malware & Security', 'abovethefold' ),
			'href' => 'https://www.google.com/transparencyreport/safebrowsing/diagnostic/index.html?hl=' . $this->google_lgcode . '#url='.urlencode(str_replace('www.','',parse_url($currenturl, PHP_URL_HOST))),
			'meta' => array( 'title' => __( 'Google Malware & Security', 'abovethefold' ), 'target' => '_blank' )
		) );
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-check-google',
			'id' => 'abovethefold-check-google-more',
			'title' => __( 'More tests', 'abovethefold' ),
			'href' => 'https://pagespeed.pro/tests#url='.urlencode($currenturl),
			'meta' => array( 'title' => __( 'More tests', 'abovethefold' ), 'target' => '_blank' )
		) );

		/**
		 * Speed Tests
		 */
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-check-speed',
			'id' => 'abovethefold-check-webpagetest',
			'title' => __( 'WebPageTest.org', 'abovethefold' ),
			'href' => 'http://www.webpagetest.org/?url='.urlencode($currenturl).'',
			'meta' => array( 'title' => __( 'WebPageTest.org', 'abovethefold' ), 'target' => '_blank' )
		) );
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-check-speed',
			'id' => 'abovethefold-check-pingdom',
			'title' => __( 'Pingdom Tools', 'abovethefold' ),
			'href' => 'http://tools.pingdom.com/fpt/?url='.urlencode($currenturl).'',
			'meta' => array( 'title' => __( 'Pingdom Tools', 'abovethefold' ), 'target' => '_blank' )
		) );
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-check-speed',
			'id' => 'abovethefold-check-gtmetrix',
			'title' => __( 'GTmetrix', 'abovethefold' ),
			'href' => 'http://gtmetrix.com/?url='.urlencode($currenturl).'',
			'meta' => array( 'title' => __( 'GTmetrix', 'abovethefold' ), 'target' => '_blank' )
		) );
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-check-speed',
			'id' => 'abovethefold-check-speed-more',
			'title' => __( 'More tests', 'abovethefold' ),
			'href' => 'https://pagespeed.pro/tests#url='.urlencode($currenturl),
			'meta' => array( 'title' => __( 'More tests', 'abovethefold' ), 'target' => '_blank' )
		) );

		/**
		 * Technical & Security Tests
		 */
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-check-technical',
			'id' => 'abovethefold-check-securityheaders',
			'title' => __( 'SecurityHeaders.io', 'abovethefold' ),
			'href' => 'https://securityheaders.io/?q='.urlencode($currenturl).'&hide=on&followRedirects=on',
			'meta' => array( 'title' => __( 'SecurityHeaders.io', 'abovethefold' ), 'target' => '_blank' )
		) );
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-check-technical',
			'id' => 'abovethefold-check-w3c',
			'title' => __( 'W3C HTML Validator', 'abovethefold' ),
			'href' => 'https://validator.w3.org/nu/?doc='.urlencode($currenturl).'',
			'meta' => array( 'title' => __( 'W3C HTML Validator', 'abovethefold' ), 'target' => '_blank' )
		) );
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-check-technical',
			'id' => 'abovethefold-check-ssllabs',
			'title' => __( 'SSL Labs', 'abovethefold' ),
			'href' => 'https://www.ssllabs.com/ssltest/analyze.html?d='.urlencode($currenturl).'',
			'meta' => array( 'title' => __( 'SSL Labs', 'abovethefold' ), 'target' => '_blank' )
		) );
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-check-technical',
			'id' => 'abovethefold-check-intodns',
			'title' => __( 'Into DNS', 'abovethefold' ),
			'href' => 'http://www.intodns.com/'.urlencode(str_replace('www.','',parse_url($currenturl, PHP_URL_HOST))).'',
			'meta' => array( 'title' => __( 'Into DNS', 'abovethefold' ), 'target' => '_blank' )
		) );
		$admin_bar->add_node( array(
			'parent' => 'abovethefold-check-technical',
			'id' => 'abovethefold-check-technical-more',
			'title' => __( 'More tests', 'abovethefold' ),
			'href' => 'https://pagespeed.pro/tests#url='.urlencode($currenturl),
			'meta' => array( 'title' => __( 'More tests', 'abovethefold' ), 'target' => '_blank' )
		) );
	}

	/**
	 * Return optgroup json for page search
	 */
	public function page_search_optgroups() {

		$optgroups = array();

		$optgroups[] = array(
			'value' => 'posts',
			'label' => __('Posts')
		);
		$optgroups[] = array(
			'value' => 'pages',
			'label' => __('Pages')
		);
		$optgroups[] = array(
			'value' => 'categories',
			'label' => __('Categories')
		);
		if ( class_exists( 'WooCommerce' ) ) {
			$optgroups[] = array(
				'value' => 'woocommerce',
				'label' => __('WooCommerce')
			);
		}

		return $optgroups;
	}

	/**
	 * Delete page options cache
	 */
	public function delete_pageoptions_cache() {
		update_option('abtf-pageoptions',array( 't' => 0, 'options' => array() ),false);
		delete_option('abtf-pageoptions');
	}

	/**
	 * Return all page options
	 */
	public function page_search_options() {

		/**
		 * Try cache
		 *
		 * Options are cleared on page / post / category update
		 */
		$refresh_interval = 3600;
		$pageoptions = get_option('abtf-pageoptions');
		if ($pageoptions && is_array($pageoptions) && isset($pageoptions['t'])) {
			if ($pageoptions['t'] > (time() - $refresh_interval)) {
				return $pageoptions['options'];
			}
		}

		/**
		 * Query database
		 */
		/**
		 * Paths
		 */
		$pageoptions = array();

		// root
		$pageoptions[] = array(
			'value' => home_url(),
			'name' => 'Home Page (index)'
		);

		$post_types = get_post_types();
		foreach ($post_types as $pt) {
			if (in_array($pt,array('revision','nav_menu_item'))) {
				continue 1;
			}

			// Get random post
			$args = array( 'post_type' => $pt, 'posts_per_page' => -1 );
			query_posts($args);
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					switch($pt) {
						case "post":
							$pageoptions[] = array(
								'class' => 'posts',
								'value' => get_permalink($wp_query->post->ID),
								'name' => get_the_ID() . '. ' . str_replace(home_url(),'',get_permalink(get_the_ID())) . ' - ' . get_the_title()
							);
						break;
						case "product":
							$pageoptions[] = array(
								'class' => 'woocommerce',
								'value' => get_permalink(get_the_ID()),
								'name' => get_the_ID() . '. ' . str_replace(home_url(),'',get_permalink(get_the_ID())) . ' - ' . get_the_title()
							);
						break;
						default:
							$pageoptions[] = array(
								'class' => 'pages',
								'value' => get_permalink(get_the_ID()),
								'name' => get_the_ID() . '. ' . str_replace(home_url(),'',get_permalink(get_the_ID())) . ' - ' . get_the_title()
							);
						break;
					}
				}
			}
		}

		$taxonomies = get_taxonomies();
		if (!empty($taxonomies)) {
			foreach($taxonomies as $taxonomy) {
				switch($taxonomy) {
					case "category":
					case "post_tag":
					case "product_cat":
					case "product_brand":
						$terms = get_terms($taxonomy, array(
						    'orderby'    => 'title',
						    'order'      => 'ASC',
							'hide_empty' => false
						));
						if ($terms) {
							foreach($terms as $term) {
								switch($taxonomy) {
									case "product_cat":
									case "product_brand":
										$pageoptions[] = array(
											'class' => 'woocommerce',
											'value' => get_term_link( $term->slug, $taxonomy ),
											'name' => $term->term_id.'. ' . str_replace(home_url(),'',get_category_link( $term->term_id )) . ' - ' . $term->name
										);
									break;
									default:
										$pageoptions[] = array(
											'class' => 'categories',
											'value' => get_category_link( $term->term_id ),
											'name' => $term->term_id.'. ' . str_replace(home_url(),'',get_category_link( $term->term_id )) . ' - ' . $term->name
										);
									break;
								}
							}
						}
					break;
					default:
						
					break;
				}
			}
		}

		update_option('abtf-pageoptions',array( 't' => time(), 'options' => $pageoptions ),false);

		return $pageoptions;
	}

	/**
	 * Return options for page selection menu
	 */
	public function ajax_page_search() {
		global $wpdb; // this is how you get access to the database

		$query = (isset($_POST['query'])) ? trim($_POST['query']) : '';
		$limit = (isset($_POST['maxresults']) && intval($_POST['maxresults']) > 10 && intval($_POST['maxresults']) < 30) ? intval($_POST['maxresults']) : 10;

		// get page options
		$options = $this->page_search_options();

		$result = array();

		$count = 0;
		foreach ($options as $option) {
			if (stripos($option['name'],$query) !== false) {
				$result[] = $option;
				$count++;
				if ($count === $limit) {
					break;
				}
			}
		}

		$json = json_encode($result);

		header('Content-Type: application/json');
		header('Content-Length: ' . strlen($json));
		print $json;

		wp_die(); // this is required to terminate immediately and return a proper response
	}

	/**
	 * Clear page cache with notice
	 */
	public function clear_pagecache( $notice = true ) {

		$this->CTRL->plugins->clear_pagecache();

		if ($notice) {
			$this->set_notice('Page related caches from <a href="https://github.com/optimalisatie/above-the-fold-optimization/tree/master/trunk/modules/plugins/" target="_blank">supported plugins</a> cleared.<p><strong>Note:</strong> This plugin does not contain a page cache. The page cache clear function for multiple other plugins is a tool.', 'NOTICE');
		}
	}

	/**
	 * Save settings
	 */
	public function save_settings( $options, $notice ) {

		if (!is_array($options) || empty($options)) {
			wp_die('No settings to save');
		}

		// store update count
		if (!isset($options['update_count'])) {
			$options['update_count'] = 0;
		}
		$options['update_count']++;

		// update settings
		update_option('abovethefold', $options, true);

		// add notice
		$saved_notice = '<div style="font-size:18px;line-height:20px;margin:0px;">'.$notice.'</div>';

		/**
		 * Clear full page cache
		 */
		if ($options['clear_pagecache']) {
			$this->CTRL->admin->clear_pagecache(false);

			$saved_notice .= '<p style="font-style:italic;font-size:14px;line-height:16px;">Page related caches from <a href="https://github.com/optimalisatie/above-the-fold-optimization/tree/master/trunk/modules/plugins/" target="_blank">supported plugins</a> cleared.</p>';
		}

		$this->set_notice($saved_notice, 'NOTICE');
	}

    /**
     * Display settings page
     */
	public function settings_page() {
		global $pagenow, $wp_query;

		// offer
		require_once('admin.offer.inc.php');

		// load options
		$options = get_option('abovethefold');
		if (!is_array($options)) { $options = array(); }

?>
<script>
// pagesearch optgroups
window.abtf_pagesearch_optgroups = <?php print json_encode($this->page_search_optgroups()); ?>;
</script>
<div class="wrap">
<h1><?php _e('Above The Fold Optimization', 'abovethefold') ?></h1>
</div>
<?php

		// active tab
		$tab = (isset($_REQUEST['tab'])) ? trim($_REQUEST['tab']) : 'intro';

		// invalid tab
		if (!isset($this->tabs[$tab])) {
			$tab = 'intro';
		}

		$lgcode = $this->google_lgcode;

		// Google Analytics tracking code
		$utmstring = $this->utm_string;

		// print tabs
        echo '<div id="icon-themes" class="icon32"><br></div>';
        echo '<h1 class="nav-tab-wrapper">';
        foreach( $this->tabs as $tabkey => $name ){
            $class = ( $tabkey == $tab ) ? ' nav-tab-active' : '';
            if ($tabkey === 'offer') {
            	$class .= ( $tabkey == 'offer' ) ? ' nav-tab-offer' : '';
            	echo "<a class='nav-tab$class' href='https://pagespeed.pro/innovation/advanced-wordpress-optimization/' target='_blank'>$name</a>";
            } else {
            	echo "<a class='nav-tab$class' href='?page=abovethefold&amp;tab=$tabkey'>$name</a>";
            }

        }
        echo '</h1>';

		// author info
		require_once('admin.author.inc.php');
		 
        // print tab content
		switch($tab) {
			case "criticalcss":
			case "css":
			case "javascript":
			case "proxy":
			case "settings":
			case "extract":
			case "compare":
			case "build-tool":
			case "monitor":
			case "intro":
				require_once('admin.'.$tab.'.inc.php');
			break;
		}

	}

	/**
	 * Show admin notices
	 */
	public function show_notices() {

		settings_errors( 'abovethefold' );

		$notices = get_option( 'abovethefold_notices', '' );
		$persisted_notices = array();
		if ( ! empty( $notices ) ) {

			$noticerows = array();
			foreach ($notices as $notice) {
				switch(strtoupper($notice['type'])) {
					case "ERROR":
						$noticerows[] = '<div class="error">
							<p>
								'.__($notice['text'], 'abovethefold').'
							</p>
						</div>';

						/**
						 * Error notices remain visible for 1 minute
						 */
						$expire = (isset($notice['expire']) && is_numeric($notice['expire'])) ? $notice['expire'] : 60;
						if (isset($notice['date']) && $notice['date'] > (time() - $expire)) {
							$persisted_notices[] = $notice;
						}

					break;
					default:
						$noticerows[] = '<div class="updated"><p>
							'.__($notice['text'], 'abovethefold').'
						</p></div>';
					break;
				}
			}
			?>
			<div>
				<?php print implode('',$noticerows); ?>
			</div>
			<?php

			update_option( 'abovethefold_notices', $persisted_notices, false );
		}

	}

	/**
	 * Set admin notice
	 */
	public function set_notice($notice,$type = 'NOTICE',$notice_config = array()) {

		$type = strtoupper($type);

		$notices = get_option( 'abovethefold_notices', '' );
		if (!is_array($notices)) {
			$notices = array();
		}
		if ( empty( $notice ) ) {
			delete_option( 'abovethefold_notices' );
		} else {

			$notice_config = (is_array($notice_config)) ? $notice_config : array();
			$notice_config['text'] = $notice;
			$notice_config['type'] = $type;

			array_unshift($notices,$notice_config);
			update_option( 'abovethefold_notices', $notices, false );
		}

	}

    /**
     * Return newline array from string
     */
    public function newline_array($string,$data=array()) {

    	if (!is_array($data)) {
    		$data = array();
    	}

    	$lines = array_filter(array_map('trim',explode("\n",trim($string))));
		if (!empty($lines)) {
			foreach ($lines as $line) {
				if ($line === '') { continue; }
				$data[] = $line;
			}
			$data = array_unique($data);
		}

		return $data;
    }

    /**
     * Return string from newline array
     */
    public function newline_array_string($array) {
    	if (!is_array($array) || empty($array)) { return ''; }
    	return htmlentities(implode("\n",$array),ENT_COMPAT,'utf-8');
    }

    /**
	 * Upgrade plugin
	 */
	public function upgrade() {
		require_once WPABTF_PATH . 'admin/upgrade.class.php';
		$upgrade = new Abovethefold_Upgrade($this->CTRL);
		$upgrade->upgrade();
    }

    /**
     * File size
     */
    public function human_filesize($bytes, $decimals = 2) {
	    $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
	    $factor = floor((strlen($bytes) - 1) / 3);
	    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
	}

}