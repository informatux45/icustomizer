<?php
/** Blocking direct access to plugin
=================================================== */
defined('ABSPATH') or die('Are you crazy!');

/** display current WP version number
=================================================== */
if (!function_exists("icustomizer_wp_current_version")) {
	function icustomizer_wp_current_version($complete = false) {
		global $wp_version;
		$version = substr($wp_version, 0, 3);
		return ($complete == true) ? $wp_version : $version;
	}
}

?>