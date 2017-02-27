<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * @link       https://pagespeed.pro/
 * @since      2.5.0
 *
 * @package    abovethefold
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/**
 * Remove settings
 */
delete_option( 'abovethefold' );
delete_option( 'abovethefold-proxy-stats' );
delete_option( 'abovethefold-criticalcss' );

// remove cron
wp_clear_scheduled_hook('wp_next_scheduled');

/**
 * Remove above the fold cache directory
 */
$path = trailingslashit(ABTF_CACHE_DIR);
if (is_dir($path)) {

	// Recursive delete
	function abtf_rmdir_recursive($dir) {
		$files = array_diff(scandir($dir), array('.','..')); 
		foreach ($files as $file) { 
			(is_dir("$dir/$file")) ? abtf_rmdir_recursive("$dir/$file") : @unlink("$dir/$file"); 
		} 
		return @rmdir($dir); 
	}
	abtf_rmdir_recursive($path);
}