<?php
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Blocking direct access to plugin      -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
defined('ABSPATH') or die('Are you crazy!');


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Create tab's options                  -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// ----------------------------------------
// --- Login Options ----------------------
// ----------------------------------------
$loginTab->createOption( array(
	'name' => __( 'Background Image', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$loginTab->createOption( array(
	'name' => __( 'Background', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_login_background',
	'type' => 'upload',
	'desc' => __( 'Upload your Login background image', ICUSTOMIZER_ID_LANGUAGES ),
) );
$loginTab->createOption( array(
	'name' => __( 'Logo Image', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$loginTab->createOption( array(
	'name' => __( 'Logo', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_login_logo',
	'type' => 'upload',
	'desc' => __( 'Upload your Login Logo image', ICUSTOMIZER_ID_LANGUAGES ),
) );
$loginTab->createOption( array(
	'name' => __( 'Logo height', ICUSTOMIZER_ID_LANGUAGES ) . ' <i>( ' . __( 'Pixels', ICUSTOMIZER_ID_LANGUAGES ) . ' )</i>',
	'id' => 'icustomizer_login_logo_height',
	'type' => 'number',
	'desc' => '<i>' . __( 'Setting of the height logo. Will not be applied if logo image is set to None - Default: 80px', ICUSTOMIZER_ID_LANGUAGES ) . '</i>',
	'default' => '80',
	'min' => '80',
	'max' => '200',
	'step' => '1',
) );
$loginTab->createOption( array(
	'name' => __( 'Title link / Text Logo <code>&lt;a href="http:&#47;&#47;wordpress.org&#47;" title="Propulsé par WordPress"&gt;Mon Site&lt;&#47;a&gt;</code>', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$loginTab->createOption( array(
	'name' => __( 'Title link logo (TITLE TAG)', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_login_title_link',
	'type' => 'text',
	'placeholder' => get_bloginfo( 'name' ),
	'desc' => __( 'Change text Title link', ICUSTOMIZER_ID_LANGUAGES ),
	'default' => '',
) );
$loginTab->createOption( array(
	'name' => __( 'Link logo (HREF TAG)', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_login_href_link',
	'type' => 'text',
	'placeholder' => site_url(),
	'desc' => __( 'Change link Href', ICUSTOMIZER_ID_LANGUAGES ),
	'default' => '',
) );



// -----------------------------------------
// -----------------------------------------
// -----------------------------------------
// -----------------------------------------
// -----------------------------------------

// -----------------------------------------
// --- Change HREF link logo
// -----------------------------------------
if (trim($icustomizer_option->getOption( 'icustomizer_login_href_link' )) != '') {
	function icustomizer_login_logo_url() {
		$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
		return esc_url($icustomizer_option->getOption( 'icustomizer_login_href_link' ));
	}
	add_filter( 'login_headerurl', 'icustomizer_login_logo_url' );	
}


// -----------------------------------------
// --- Change Title link logo
// -----------------------------------------
if (trim($icustomizer_option->getOption( 'icustomizer_login_title_link' )) != '') {
	function icustomizer_login_logo_url_title() {
		$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
		return $icustomizer_option->getOption( 'icustomizer_login_title_link' );
	}
	add_filter( 'login_headertitle', 'icustomizer_login_logo_url_title' );
}


// -----------------------------------------
// --- load css into the login page
// --- Change Background image
// -----------------------------------------
if (!function_exists('icustomizer_custom_login_styles')) {
	function icustomizer_custom_login_styles() {
		$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
		wp_enqueue_style( 'icustomizer-login-style', ICUSTOMIZER_URL . 'css/icustomizer-login-style.css' );
		$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
		// --- Retrieve option BG
		$backgroundID = $icustomizer_option->getOption( 'icustomizer_login_background' );
		if (is_numeric($backgroundID)) {
			$backgroundSrc = wp_get_attachment_url( $backgroundID );
			wp_add_inline_style( 'icustomizer-login-style', 'body {background:url("' . esc_url( $backgroundSrc ) . '") no-repeat center center fixed;
															 background-size: cover;}' );
		}
		// --- Retrieve option Logo
		$logoID = $icustomizer_option->getOption( 'icustomizer_login_logo' );
		if (is_numeric($logoID)) {
			$logoSrc = wp_get_attachment_url( $logoID );
			wp_add_inline_style( 'icustomizer-login-style', 'body.login div#login h1 a {background-image: url("' . esc_url( $logoSrc ) .  '") !important;
															 background-size: ' . $icustomizer_option->getOption( 'icustomizer_login_logo_height' ) .  'px ' . $icustomizer_option->getOption( 'icustomizer_login_logo_height' ) .  'px !important;
															 width: ' . $icustomizer_option->getOption( 'icustomizer_login_logo_height' ) .  'px !important;}
															 body.login h1 a {height: ' . $icustomizer_option->getOption( 'icustomizer_login_logo_height' ) .  'px !important;}' );
		}
	}
}
add_action( 'login_enqueue_scripts', 'icustomizer_custom_login_styles' );
