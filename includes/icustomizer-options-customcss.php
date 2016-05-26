<?php
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Blocking direct access to plugin      -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
defined('ABSPATH') or die('Are you crazy!');


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Create tab's options                  -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// ----------------------------------------
// --- Custom CSS Options -----------------
// ----------------------------------------
$customcssTab->createOption( array(
	'name' => __( 'Custom CSS Backend', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$customcssTab->createOption( array(
	'name' => __( 'Custom CSS', ICUSTOMIZER_ID_LANGUAGES ) . ' <br /><i>( ' . __( 'Advanced users', ICUSTOMIZER_ID_LANGUAGES ) . ' )<i>',
	'id' => 'icustomizer_custom_css_admin',
	'type' => 'code',
	'theme' => 'twilight',
	'height' => '400',
	'desc' => __(
			'Put your custom CSS rules here.', ICUSTOMIZER_ID_LANGUAGES ) . '
			<br /><strong class="icustomizer-red">' . __( 'Without the tag &lt;style&gt; and &lt;/style&gt;', ICUSTOMIZER_ID_LANGUAGES ) . '</strong>',
	'lang' => 'css',
) );

$customcssTab->createOption( array(
	'name' => __( 'Custom CSS Frontend', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$customcssTab->createOption( array(
	'name' => __( 'Custom CSS', ICUSTOMIZER_ID_LANGUAGES ) . ' <br /><i>( ' . __( 'Advanced users', ICUSTOMIZER_ID_LANGUAGES ) . ' )<i>',
	'id' => 'icustomizer_custom_css_front',
	'type' => 'code',
	'theme' => 'twilight',
	'height' => '400',
	'desc' => __(
			'Put your custom CSS rules here.', ICUSTOMIZER_ID_LANGUAGES ) . '
			<br /><strong class="icustomizer-red">' . __( 'Without the tag &lt;style&gt; and &lt;/style&gt;', ICUSTOMIZER_ID_LANGUAGES ) . '</strong>',
	'lang' => 'css',
) );


// -----------------------------------------
// -----------------------------------------
// -----------------------------------------
// -----------------------------------------
// -----------------------------------------

// -----------------------------------------
// --- load css into the website's front-end
// -----------------------------------------
function icustomizer_custom_front_styles() {
	$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
	// --- Retrieve options
	echo "<style>" . $icustomizer_option->getOption( 'icustomizer_custom_css_front' ) . "</style>";
	// --- Remove Style Titan Framework
	wp_dequeue_style('tf-compiled-options-icustomizer-css');
	wp_deregister_style('tf-compiled-options-icustomizer-css');
	// --- Remove file from Uploads
	$tf_compiled_options_icustomizer_css = ABSPATH . 'wp-content/uploads/titan-framework-' . ICUSTOMIZER_ID . '-css.css';
	if (file_exists($tf_compiled_options_icustomizer_css))
		unlink( $tf_compiled_options_icustomizer_css );
}
add_action('wp_head', 'icustomizer_custom_front_styles', 100);

 
// -----------------------------------------
// --- load css into the admin pages
// -----------------------------------------
function icustomizer_custom_admin_styles() {
	$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
	// --- Retrieve options
	echo "<style>" . $icustomizer_option->getOption( 'icustomizer_custom_css_admin' ) . "</style>";
}
add_action('admin_head', 'icustomizer_custom_admin_styles', 100);
