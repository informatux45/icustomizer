<?php
/** Blocking direct access to plugin
=================================================== */
defined('ABSPATH') or die('Are you crazy!');

/** Add CSS stylesheet to admin
=================================================== */
add_action( 'admin_enqueue_scripts', 'icustomizer_admin_styles' );
if (!function_exists("icustomizer_admin_styles")) {
  function icustomizer_admin_styles() {
    wp_register_style( 'icustomizer_admin_css', ICUSTOMIZER_URL . 'css/style.css', false, icustomizer_get_version( 'Version' ) );
    wp_enqueue_style( 'icustomizer_admin_css' );
  }
}

/** Add CSS stylesheet to admin (Framework)
=================================================== */
add_action( 'admin_enqueue_scripts', 'icustomizer_admin_framework_styles' );
function icustomizer_admin_framework_styles() {
  wp_register_style( 'icustomizer-framework-admin', FRAMEWORK_ICUSTOMIZER_URL . 'assets/css/framework.css', false, icustomizer_get_version( 'Version' ) );
  wp_enqueue_style( 'icustomizer-framework-admin' );
}

?>