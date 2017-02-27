<?php
/**
 * The plugin upgrade controller.
 *
 * @since      2.7.0
 * @package    abovethefold
 * @subpackage abovethefold/admin
 * @author     PageSpeed.pro <info@pagespeed.pro>
 */

class Abovethefold_Upgrade {

	/**
	 * Advanced optimization controller
	 */
	public $CTRL;

	/**
	 * Initialize the class and set its properties
	 */
	public function __construct( &$CTRL ) {
		$this->CTRL =& $CTRL;
	}

    /**
	 * Upgrade plugin
	 */
	public function upgrade() {

		$current_version = get_option( 'wpabtf_version' );
		$update_options = false;

		if (!defined('WPABTF_VERSION') || WPABTF_VERSION !== $current_version) {

			$options = get_option( 'abovethefold' );

			update_option( 'wpabtf_version', WPABTF_VERSION, false );

			/**
			 * Pre 2.5.0 update
			 */
			if (version_compare($current_version, '2.5.0', '<')) {

				/**
				 * Disable Google Web Font Optimizer plugin if ABTF Webfont Optimization is enabled
				 */
				if ($options['gwfo']) {
					@deactivate_plugins( 'google-webfont-optimizer/google-webfont-optimizer.php' );

					$options['gwfo_loadmethod'] = 'inline';
					$options['gwfo_loadposition'] = 'header';
					$update_options = true;
				}

				/**
				 * Enable external resource proxy if Localize Javascript is enabled
				 */
				if ($options['localizejs_enabled']) {

					$options['js_proxy'] = true;
					$options['css_proxy'] = true;
					$update_options = true;
				}
			}

			/**
			 * Pre 2.5.11 update
			 */
			if (version_compare($current_version, '2.5.10', '<=')) {

				// convert url list to array
				$newline_conversion = array(
					'gwfo_googlefonts',
					'cssdelivery_ignore',
					'cssdelivery_remove',
					'css_proxy_preload',
					'js_proxy_preload',
					'css_proxy_include',
					'js_proxy_include',
					'css_proxy_exclude',
					'js_proxy_exclude'

				);
				foreach ($newline_conversion as $field) {
					if (isset($options[$field]) && is_string($options[$field])) {
						$options[$field] = $this->newline_array($options[$field]);
						$update_options = true;
					}
				}

				/**
				 * Verify Google WebFontConfig variable
				 */
				if (isset($options['gwfo_config']) && $options['gwfo_config'] !== '') {

					if ($this->CTRL->gwfo->verify_webfontconfig($options['gwfo_config'])) {
						$options['gwfo_config_valid'] = true;
					} else {
						$options['gwfo_config_valid'] = false;
					}

					$update_options = true;
					
					// Extract Google Fonts
					$this->CTRL->gwfo->fonts_from_webfontconfig($options['gwfo_config'],$options['gwfo_googlefonts']);

					// modify Google font config in WebFontConfig
					$googlefonts_regex = '|google\s*:\s*(\{[^\}]+\})|is';
					if (preg_match($googlefonts_regex,$options['gwfo_config'],$out)) {

						$config = @json_decode($this->CTRL->gwfo->fixJSON($out[1]),true);
						if (is_array($config) && isset($config['families'])) {
							$config['families'] = 'GOOGLE-FONTS-FROM-INCLUDE-LIST';
							$options['gwfo_config'] = preg_replace($googlefonts_regex,'google:' . json_encode($config),$options['gwfo_config']);
						}
					}
				} else {
					$options['gwfo_config_valid'] = true;

					$update_options = true;
				}
			}

			/**
			 * Pre 2.6.1 update
			 */
			if (version_compare($current_version, '2.6.4', '<=')) {

				if (!isset($options['jsdelivery'])) {
					$options['jsdelivery'] = false;
				}
				if (!isset($options['jsdelivery_position'])) {
					$options['jsdelivery_position'] = 'header';
				}
				if (!isset($options['jsdelivery_jquery'])) {
					$options['jsdelivery_jquery'] = true;
				}
				if (!isset($options['jsdelivery_deps'])) {
					$options['jsdelivery_deps'] = true;
				}
				if (!isset($options['jsdelivery_scriptloader'])) {
					$options['jsdelivery_scriptloader'] = 'little-loader';
				}
				
				$update_options = true;
			}

			/**
			 * Pre 2.7 update
			 */
			if (version_compare($current_version, '2.7', '<=')) {

				$dir = wp_upload_dir();
				$old_cachepath = trailingslashit($dir['basedir']) . 'abovethefold/';
				if (!is_dir($old_cachepath)) {
					$old_cachepath = false;
				}

				/**
				 * Move critical CSS to new location (theme directory)
				 */
				
				// global css
				$inlinecss = '';

				if ($old_cachepath) {
					$old_cssfile = $old_cachepath . 'criticalcss_global.css';
					if (file_exists($old_cssfile)) {
						$inlinecss = file_get_contents($old_cssfile);
					} else {
						$old_cssfile = $old_cachepath . 'inline.min.css';
						if (file_exists($old_cssfile)) {
							$inlinecss = file_get_contents($old_cssfile);
						}
					}
				}

				// save new critical css file
				$config = array(
					'name' => 'Global Critical CSS'
				);
				$errors = $this->CTRL->criticalcss->save_file_contents('global.css', $config, $inlinecss);

				// remove old critical css file
			 	if (!$errors || empty($errors)) {
	 				@unlink($old_cssfile);
	 			}
				
				// conditional CSS
				if ($old_cachepath && isset($options['conditional_css']) && !empty($options['conditional_css'])) {

					foreach ($options['conditional_css'] as $conditionhash => $conditional) {
						if (empty($conditional['conditions']) || !is_array($conditional['conditions'])) { continue 1; }

						$inlinecss = '';
						$old_cssfile = $old_cachepath . 'criticalcss_'.$conditionhash.'.css';
						if (file_exists($old_cssfile)) {
							$inlinecss = file_get_contents($old_cssfile);
						}
						if (trim($inlinecss) === '') {
							continue 1;
						}

						$config = array(
							'name' => $conditional['name'],
							'weight' => ((is_numeric($conditional['weight'])) ? $conditional['weight'] : 1),
							'conditions' => array()
						);
				
						$conditions = array();

						foreach ($conditional['conditions'] as $condition) {

							if ($condition === 'categories') {
								$config['conditions'][] = 'is_category()';
							} else if ($condition === 'frontpage') {
								$config['conditions'][] = 'is_front_page()';
							} else if (substr($condition,0,3) === 'pt_') {

								/**
								 * Page Template Condition
								 */
								if (substr($condition,0,7) === 'pt_tpl_') {
									$config['conditions'][] = 'is_page_template():' . substr($condition,7);
								} else {

									/**
									 * Post Type Condition
									 */
									$pt = substr($condition,3);
									switch($pt) {
										case "page":
										case "attachment":
											$config['conditions'][] = 'is_'.$pt.'()';
										break;
										case "post":
											$config['conditions'][] = 'is_single()';
											$config['conditions'][] = 'is_singular():' . $pt;
										break;
										default:
											$config['conditions'][] = 'is_singular():' . $pt;
										break;
									}
								}
							} else if (class_exists( 'WooCommerce' ) && substr($condition,0,3) === 'wc_') {

								/**
								 * WooCommerce page type
								 */
								$wcpage = substr($condition,3);
								$match = false;
								switch($wcpage) {
									case "shop":
									case "product_category":
									case "product_tag":
									case "product":
									case "cart":
									case "checkout":
									case "account_page":
										$config['conditions'][] = 'is_'.$wcpage.'()';
									break;
								}
							} else if (substr($condition,0,3) === 'tax') {

								/**
								 * Taxonomy page
								 */
								$tax = substr($condition,3);
								$config['conditions'][] = 'is_tax():' . $tax;

							} else if (substr($condition,0,3) === 'cat') {

								/**
								 * Categories
								 */
								$cat = substr($condition,3);
								$config['conditions'][] = 'is_category():' . $cat;

							} else if (substr($condition,0,3) === 'catpost') {

								/**
								 * Posts with categories
								 */
								$cat = substr($condition,3);
								$config['conditions'][] = 'has_category():' . $cat;

							} else if (substr($condition,0,4) === 'page') {

								/**
								 * Individual pages
								 */
								$pageid = intval(substr($condition,4));
								$config['conditions'][] = 'is_page():' . $pageid;

							} else if (substr($condition,0,4) === 'post') {

								/**
								 * Individual posts
								 */
								$postid = intval(substr($condition,4));
								$config['conditions'][] = 'is_single():' . $pageid;
							}
						}

						$config['matchType'] = 'any';

						$newfile_name = trim(preg_replace(array('|\s+|is','|[^a-z0-9\-]+|is'),array('-',''),strtolower($conditional['name']))) . '.css';

						$errors = $this->CTRL->criticalcss->save_file_contents($newfile_name, $config, $inlinecss);

						// remove old critical css file
					 	if (!$errors || empty($errors)) {
			 				@unlink($old_cssfile);
			 			}

					}
				}
				
				$update_options = true;
			}


			/**
			 * Pre 2.7.6 update
			 */
			if (version_compare($current_version, '2.7.6', '<=')) {

				/**
				 * Remove plugin directory from /uploads/
				 */
				$dir = wp_upload_dir();
				$old_cachepath = trailingslashit($dir['basedir']) . 'abovethefold/';
				if (is_dir($old_cachepath)) {
					$this->CTRL->rmdir($old_cachepath);
				}
			}

			// remove old options
			$old_options = array(
				'dimensions',
				'phantomjs_path',
				'cleancss_path',
				'remove_datauri',
				'urls',
				'genurls',
				'localizejs_enabled',
				'conditionalcss_enabled',
				'conditional_css' 
			);
			foreach ($old_options as $opt) {
				if (isset($options[$opt])) {
					unset($options[$opt]);
					$update_options = true;
				}
			}

			if ($update_options) {
				update_option('abovethefold', $options, true);
			}

			// restore limited offer
			update_user_meta( get_current_user_id(), 'abtf_show_offer', 0 );

			/**
			 * Clear full page cache
			 */
			$this->CTRL->plugins->clear_pagecache();

		}
    }

}