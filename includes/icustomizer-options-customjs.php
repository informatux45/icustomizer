<?php
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Blocking direct access to plugin      -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
defined('ABSPATH') or die('Are you crazy!');


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Create tab's options                  -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// ----------------------------------------
// --- Custom JS Options ------------------
// ----------------------------------------
$customjsTab->createOption( array(
	'name' => __( 'Custom JS Frontend', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$customjsTab->createOption( array(
	'name' => __( 'Custom JS', ICUSTOMIZER_ID_LANGUAGES ) . ' <br /><i>( ' . __( 'Advanced users', ICUSTOMIZER_ID_LANGUAGES ) . ' )<i>',
	'id' => 'icustomizer_custom_js_front',
	'type' => 'code',
	'theme' => 'idle_fingers',
	'height' => '450',
	'desc' => __(
			'Put your custom JS rules here ', ICUSTOMIZER_ID_LANGUAGES )
			. __( '<strong class="icustomizer-red">without the tag &lt;script&gt; and &lt;/script&gt;.</strong><br><br>Your code will be framed between this code:<br>jQuery(document).ready(function() { <span style="color: grey;"><strong class="icustomizer-green">YOUR CODE</strong></span> });<br><br>', ICUSTOMIZER_ID_LANGUAGES ) . __( 'Sample to use JQUERY:', ICUSTOMIZER_ID_LANGUAGES ) . '<br>jQuery(".yourclass").css({"color":"red"})',
	'lang' => 'javascript',
) );


// -----------------------------------------
// -----------------------------------------
// -----------------------------------------
// -----------------------------------------
// -----------------------------------------

// -----------------------------------------
// --- load css into the website's front-end
// -----------------------------------------
function icustomizer_custom_front_js() {
	wp_enqueue_script( 'icustomizer-front-js', ICUSTOMIZER_URL . 'js/icustomizer-front.js', array ( 'jquery' ));
	$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
	// --- Retrieve options
	echo "<script>jQuery(document).ready(function() {" . $icustomizer_option->getOption( 'icustomizer_custom_js_front' ) . "});</script>";	
}
add_action('wp_footer', 'icustomizer_custom_front_js', 100);