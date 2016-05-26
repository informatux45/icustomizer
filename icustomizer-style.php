<?php
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Blocking direct access to plugin      -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
defined('ABSPATH') or die('Are you crazy!');


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Add CSS stylesheet to admin           -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
function icustomizer_admin_styles() {
  wp_register_style( 'icustomizer_admin_css', ICUSTOMIZER_URL . 'css/style.css', false, '1.0.0' );
  wp_enqueue_style( 'icustomizer_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'icustomizer_admin_styles' );

?>