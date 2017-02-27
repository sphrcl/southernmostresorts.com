<?php

/**
 * Compare critical CSS template
 *
 * @since      2.5.0
 * @package    abovethefold
 * @subpackage abovethefold/admin
 * @author     PageSpeed.pro <info@pagespeed.pro>
 */

$qs_start = (strpos($url,'?') !== false) ? '&' : '?';

$critical_url = $url . $qs_start . 'abtft=' . time() . '&abtf-critical-only='.md5(SECURE_AUTH_KEY . AUTH_KEY);
$full_url = $url . $qs_start . 'abtft=' . time() . '&abtf-critical-verify='.md5(SECURE_AUTH_KEY . AUTH_KEY);

$output = '<!DOCTYPE html>
<html>
<head>
<title>Critical CSS Above The Fold Comparison</title>
<meta name="robots" content="noindex, nofollow" />
<link rel="stylesheet" href="'.WPABTF_URI.'public/css/compare.min.css" />
</head>
<body scroll="no" cellspacing="1" cellpadding="1">
<table><thead><tr><td>Critical CSS [ <a href="' . $critical_url . '" id="reloadcritical" target="criticalcss">reload</a> | <a href="' . $critical_url . '" target="_top">full view</a> ]</td><td>Full CSS</td></tr></thead><tbody>	<tr><td><iframe src="' . $critical_url . '" name="criticalcss" frameborder="0" width="100%" height="100%" scrolling="no"></iframe></td><td><iframe src="' . $full_url . '" frameborder="0" width="100%" height="100%" scrolling="no"></iframe></td></tr></tbody></table>
<script src="'.WPABTF_URI.'public/js/compare.min.js"></script>
</body>
</html>';