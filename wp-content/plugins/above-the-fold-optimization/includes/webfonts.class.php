<?php

/**
 * Abovethefold Web Font optimization functions and hooks.
 *
 * This class provides the functionality for Web Font optimization functions and hooks.
 *
 * @since      2.5.0
 * @package    abovethefold
 * @subpackage abovethefold/includes
 * @author     PageSpeed.pro <info@pagespeed.pro>
 */


class Abovethefold_WebFonts {

	/**
	 * Above the fold controller
	 */
	public $CTRL;

	/**
	 * webfont.js CDN url
	 */
	public $cdn_url = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';

	/**
	 * webfont.js CDN version
	 */
	public $cdn_version = '1.6.26';

	/**
	 * Google fonts
	 */
	public $googlefonts = array();

	/**
	 * Web Font replacement string
	 */
	public $webfont_replacement_string = 'var ABTF_WEBFONT_CONFIG;';

	/**
	 * Initialize the class and set its properties
	 */
	public function __construct( &$CTRL ) {

		$this->CTRL =& $CTRL;

		if ($this->CTRL->disabled) {
			return; // above the fold optimization disabled for area / page
		}

		// set default state
		if (!isset($this->CTRL->options['gwfo'])) {
			$this->CTRL->options['gwfo'] = false;
		}

		// load google fonts from settings
		if (isset($this->CTRL->options['gwfo_googlefonts']) && is_array($this->CTRL->options['gwfo_googlefonts'])) {
			$this->googlefonts = $this->CTRL->options['gwfo_googlefonts'];
		}

		// define default settings
		if (!isset($this->CTRL->options['gwfo_loadmethod'])) {
			$this->CTRL->options['gwfo_loadmethod'] = 'inline';
		}
		if (!isset($this->CTRL->options['gwfo_loadposition'])) {
			$this->CTRL->options['gwfo_loadposition'] = 'header';
		}

		/**
		 * Google Web Font Optimizer enabled
		 */
		if ($this->CTRL->options['gwfo']) {

			// add filter for CSS minificaiton output
			$this->CTRL->loader->add_filter( 'abtf_css', $this, 'process_css' );

			// add filter for CSS file processing
			$this->CTRL->loader->add_filter( 'abtf_cssfile_pre', $this, 'process_cssfile' );

			// add filter for HTML output
			$this->CTRL->loader->add_filter( 'abtf_html_pre', $this, 'process_html_pre' );

			// add filter for HTML output
			$this->CTRL->loader->add_filter( 'abtf_html_replace', $this, 'replace_html' );

			if (isset($this->CTRL->options['gwfo_loadmethod']) && $this->CTRL->options['gwfo_loadmethod'] === 'wordpress') {

				/**
				 * load webfont.js via WordPress include
				 */
				$this->CTRL->loader->add_action('wp_enqueue_scripts', $this, 'enqueue_webfontjs', 10);
			}

		}

	}

	/**
	 * Extract fonts from CSS
	 */
	public function process_css($CSS) {

		/**
		 * Regex search replace on CSS
		 */
		$search = array();
		$replace = array();

		/**
		 * Parse Google Fonts
		 */
		$googlefonts = array();

		// find @import with Google Font CSS
		if (preg_match_all('#(?:@import)(?:\\s)(?:url)?(?:(?:(?:\\()(["\'])?(?:[^"\')]+)\\1(?:\\))|(["\'])(?:.+)\\2)(?:[A-Z\\s])*)+(?:;)#Ui',$CSS,$out) && !empty($out[0])) {

			foreach ($out[0] as $n => $fontLink) {
				if (substr_count($fontLink, "fonts.googleapis.com/css") > 0) {
					$fontLink = preg_replace('|^.*(//fonts\.[^\s\'\"\)]+)[\s\|\'\|\"\|\)].*|is','$1',$fontLink);

					// parse fonts
					$fonts = $this->fonts_from_url($fontLink);

					// font contains Google Fonts
					if ($fonts && !empty($fonts['google'])) {
						foreach ($fonts['google'] as $googlefont) {
							if (!in_array(trim($googlefont),$this->googlefonts)) {
								$googlefonts[] = trim($googlefont);
							}
						}

						/**
						 * Remove @import from CSS
						 */
						$search[] = '|'.preg_quote($out[0][$n]).'|Ui';
						$replace[] = ' ';
					}
				}
			}

			if (!empty($googlefonts)) {
				$this->update_google_fonts($googlefonts);
			}
		}

		// perform search/replace
		if (!empty($search)) {
			$CSS = preg_replace($search,$replace,$CSS);
		}

		return trim($CSS);
	}

	/**
	 * Parse CSS file in CSS file loop
	 */
	public function process_cssfile($cssfile) {
		
		// ignore
		if (!$cssfile || in_array($cssfile,array('delete','ignore'))) {
			return $cssfile;
		}

		// Google font?
		if (strpos($cssfile,'fonts.googleapis.com/css') !== false) {

			$googlefonts = array();

			$fonts = $this->fonts_from_url($cssfile);
			if ($fonts && !empty($fonts['google'])) {
				foreach ($fonts['google'] as $googlefont) {
					if (!in_array(trim($googlefont),$this->googlefonts)) {
						$googlefonts[] = trim($googlefont);
					}
				}

				// google fonts
				if (!empty($googlefonts)) {
					$this->update_google_fonts($googlefonts);
				}

				// delete file from HTML
				return 'delete';
			}
		}

		return $cssfile;
	}

	/**
	 * Extract fonts from HTML pre optimization
	 */
	public function process_html_pre($HTML) {

		/**
		 * Parse Google Fonts in WebFontConfig
		 */
		if (strpos($HTML,'WebFontConfig') !== false) {

			$googlefonts = array();

			// Try to parse WebFontConfig variable
			if (preg_match_all('#WebFontConfig\s*=\s*\{[^;]+\};#s',$HTML,$out)) {

				foreach ($out[0] as $wfc) {
					$this->fonts_from_webfontconfig($wfc,$googlefonts);
				}
			}

			// google fonts
			if (!empty($googlefonts)) {
				$this->update_google_fonts($googlefonts);
			}
		}

		return $HTML;
	}

	/**
	 * Replace HTML
	 */
	public function replace_html($searchreplace) {

		list($search, $replace, $search_regex, $replace_regex) = $searchreplace;

		/**
		 * Inline Web Font Loading
		 */
		if (isset($this->CTRL->options['gwfo_loadmethod']) && !in_array($this->CTRL->options['gwfo_loadmethod'],array('inline','disabled'))) {

			/**
			 * Update Web Font configuration
			 */
			$webfontconfig = $this->webfontconfig();
			//$search_regex[] = '#' . preg_quote($this->webfont_replacement_string) . '#Ui';
			$search[] = $this->webfont_replacement_string;
			$replace[] = $webfontconfig;
		}

		return array($search, $replace, $search_regex, $replace_regex); 
	}

	/**
	 * Update Google fonts
	 */
	public function update_google_fonts($googlefonts) {

		/**
		 * Get current google font configuration
		 */
		$options = get_option( 'abovethefold' );
		$current_googlefonts = $this->googlefonts;

		$new = false; // new fonts?

		foreach ($googlefonts as $googlefont) {
			$googlefont = trim($googlefont);
			if (!in_array($googlefont,$current_googlefonts)) {
				$new = true;
				$current_googlefonts[] = $googlefont;
			}
		}

		/**
		 * Update Google Web Font Configuration
		 */
		if ($new) {
			$options['gwfo_googlefonts'] = array_unique($current_googlefonts);
			update_option('abovethefold',$options);

			$this->CTRL->options['gwfo_googlefonts'] = $options['gwfo_googlefonts'];
			$this->googlefonts = $options['gwfo_googlefonts'];
		}
	}

	/**
	 * Parse Webfont Fonts from link
	 */
	public function fonts_from_url($fontLink) {

		// fonts found in url
		$fonts = array();

		// parse querystring of url
		parse_str(parse_url($fontLink, PHP_URL_QUERY), $urlParameters);

		/**
		 * Custom font
		 */
        if (isset($urlParameters['text'])) {

        	/**
        	 * @todo custom fonts
        	 */

        } else {

        	/**
        	 * Google Font Family config
        	 */
            foreach (explode('|', $urlParameters['family']) as $fontFamilies) {
                $fontFamily = explode(':', $fontFamilies);

                if (isset($urlParameters['subset'])) {
                    # Use the subset parameter for a subset
                    $subset = $urlParameters['subset'];
                } else {
                    if (isset($fontFamily[2])) {
                        # Use the subset in the family string
                        $subset = $fontFamily[2];
                    } else {
                        # Use a default subset
                        $subset = "latin";
                    }
                }

                
                if (strlen($fontFamily[0]) > 0) {

					// initiate google fonts array
					if (!isset($fonts['google'])) {
						$fonts['google'] = array();
					}
					$fonts['google'][] = $fontFamily[0] . ":" . $fontFamily[1] . ":" . $subset;
                }
            }
        }

        return (!empty($fonts)) ? $fonts : false;
	}

	/**
	 * Parse Webfont Fonts from link
	 */
	public function fonts_from_webfontconfig($WebFontConfig,&$googlefonts) {

		// Extract Google fonts
		if (strpos($WebFontConfig,'google') !== false) {
			if (preg_match('#google[\'|"]?\s*:\s*\{[^\}]+families\s*:\s*(\[[^\]]+\])#is',$WebFontConfig,$gout)) {
				$gfonts = @json_decode($this->fixJSON($gout[1]),true);
				if (is_array($gfonts) && !empty($gfonts)) {
					$googlefonts = array_unique(array_merge($googlefonts,$gfonts));
				}
			}
		}
	}

	/**
	 * Return WebFontConfig variable
	 */
	public function webfontconfig($json = false) {

		$WebFontConfig = '';

		if (isset($this->CTRL->options['gwfo_config']) && $this->CTRL->options['gwfo_config'] !== '' && isset($this->CTRL->options['gwfo_config_valid']) && $this->CTRL->options['gwfo_config_valid']) {
			
			$WebFontConfig = trim($this->CTRL->options['gwfo_config']);
		}

		/**
		 * Apply Google Font Remove List
		 */
		if (!empty($this->googlefonts) && isset($this->CTRL->options['gwfo_googlefonts_remove']) && !empty($this->CTRL->options['gwfo_googlefonts_remove'])) {

			$removeList = $this->CTRL->options['gwfo_googlefonts_remove'];
			$this->googlefonts =  array_filter($this->googlefonts, function($font) use ($removeList) {
				foreach ($removeList as $removeFont) {
					if (strpos($font,$removeFont) !== false) {
						// remove font
						return false;
					}
				}
				return true;
			});
		}

		/**
		 * Add Google Fonts to config
		 */
		if (!empty($this->googlefonts)) {

			if ($WebFontConfig !== '') {

				// WebFontConfig has Google fonts, merge
				if (strpos($WebFontConfig,'GOOGLE-FONTS-FROM-INCLUDE-LIST') !== false) {
					$quote = (strpos($WebFontConfig,'\'GOOGLE-FONTS-FROM-INCLUDE-LIST') !== false) ? '\'' : '"';
					$WebFontConfig = str_replace($quote . 'GOOGLE-FONTS-FROM-INCLUDE-LIST' . $quote, json_encode($this->googlefonts), $WebFontConfig);
				}
			} else {

				/**
				 * Return JSON
				 */
				if ($json) {
					$googlefontconfig = array(
						'google' => array(
							'families' => $this->googlefonts
						)
					);
					return $googlefontconfig;
				}

				$googlefontconfig = array(
					'families' => $this->googlefonts
				);
				$WebFontConfig = 'WebFontConfig={google:' . json_encode($googlefontconfig) . '};';
			}
		}

		// no webfont config
		if (empty($WebFontConfig)) {
			return null;
		}

		/**
		 * Return JSON
		 */
		if ($json) {

			// return original WebFontConfig object string to be converted by the client
			return rtrim(ltrim(str_replace('WebFontConfig','',$WebFontConfig),'= '),'; ');
		}

		if (substr($WebFontConfig, 0, -1) !== '/') {
			$WebFontConfig .= ';';
		}

		return $WebFontConfig;

	}

	/**
	 * Fix invalid json (single quotes vs double quotes)
	 */
	public function fixJSON($json) {
		$json = preg_replace("/(?<!\"|'|\w)([a-zA-Z0-9_]+?)(?!\"|'|\w)\s?:/", "\"$1\":", $json);

		$regex = <<<'REGEX'
~
    "[^"\\]*(?:\\.|[^"\\]*)*"
    (*SKIP)(*F)
  | '([^'\\]*(?:\\.|[^'\\]*)*)'
~x
REGEX;

	    return preg_replace_callback($regex, function($matches) {
	        return '"' . preg_replace('~\\\\.(*SKIP)(*F)|"~', '\\"', $matches[1]) . '"';
	    }, $json);
	}

	/**
	 * Enqueue webfont.js
	 */
	public function enqueue_webfontjs() {

		/**
		 * Google Web Font Loader WordPress inlcude
		 */
		$in_footer = (isset($this->CTRL->options['gwfo_loadposition']) && $this->CTRL->options['gwfo_loadposition'] === 'footer') ? true : false;
		wp_enqueue_script( 'abtf_webfontjs', WPABTF_URI . 'public/js/webfont.js', array(), $this->package_version(), $in_footer );
	}

	/**
	 * Get package version
	 */
	public function package_version($reset = false) {

		if (!$reset) {
			$version = get_option('abtf_webfontjs_version');
			if ($version) {
				return $version;
			}
		}

		// check existence of package file
		$webfont_package = WPABTF_PATH . 'public/js/src/webfontjs_package.json';
		if (!file_exists($webfont_package)) {
			$this->CTRL->admin->set_notice('PLUGIN INSTALLATION NOT COMPLETE, MISSING public/js/src/webfontjs_package.json', 'ERROR');
			return false;
		} else {

			$package = @json_decode(file_get_contents($webfont_package),true);
			if (!is_array($package)) {
				$this->CTRL->admin->set_notice('failed to parse public/js/src/webfontjs_package.json', 'ERROR');
				return false;
			} else {

				$version = update_option('abtf_webfontjs_version', $package['version']);

				// return version
				return $package['version'];
			}
		}
	}


	/**
	 * Javascript client settings
	 */
	public function client_jssettings(&$jssettings,&$jsfiles,&$inlineJS,$jsdebug) {

		if (isset($this->CTRL->options['gwfo_loadmethod']) && $this->CTRL->options['gwfo_loadmethod'] === 'disabled') {

			// disabled, remove Web Font Loader
			//$this->CTRL->options['gwfo'] = false;

		} else {

			$webfontconfig = $this->webfontconfig(true);
			if (!$webfontconfig) {

				// empty, do not load webfont.js
				$this->CTRL->options['gwfo'] = false;

			} else {

				/**
				 * Load webfont.js inline
				 */
				if ($this->CTRL->options['gwfo_loadmethod'] === 'inline') {

					$jsfiles[] = WPABTF_PATH . 'public/js/webfont.js';
					$jssettings['gwf'] = array($this->webfontconfig(true));
					if ($this->CTRL->options['gwfo_loadposition'] === 'footer') {
						$jssettings['gwf'][] = true;
					}

				} else if ($this->CTRL->options['gwfo_loadmethod'] === 'async' || $this->CTRL->options['gwfo_loadmethod'] === 'async_cdn') {

					/**
					 * Load async
					 */
					$jssettings['gwf'] = array('a');

					$jssettings['gwf'][] = ($this->CTRL->options['gwfo_loadposition'] === 'footer') ? true : false;

					if ($this->CTRL->options['gwfo_loadmethod'] === 'async') {
						$jssettings['gwf'][] = WPABTF_URI . 'public/js/webfont.js';
					} else {

						// load from Google CDN
						$jssettings['gwf'][] = $this->cdn_url;
					}

					// WebFontConfig variable
					$inlineJS .= $this->webfont_replacement_string; //this->webfontconfig();

				} else if ($this->CTRL->options['gwfo_loadmethod'] === 'wordpress') {

					/**
					 * WordPress include, just add the WebFontConfig variable
					 */
					$inlineJS .= $this->webfont_replacement_string; //$this->webfontconfig();
				}
			}

		}
	}

	/**
	 * Verify WebFontConfig variable
	 */
	public function verify_webfontconfig($WebFontConfig) {

		$WebFontConfig = trim($WebFontConfig);
		if ($WebFontConfig === '') {
			return false;
		}

		// verify string
		if (preg_match('|^WebFontConfig\s*=\s*\{.*;$|s',$WebFontConfig)) {
			return true;
		}

		return false;
	}

}
