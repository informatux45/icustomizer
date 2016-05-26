<?php
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Blocking direct access to plugin      -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
defined('ABSPATH') or die('Are you crazy!');


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Create tab's options                  -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// ----------------------------------------
// --- Editor Options ---------------------
// ----------------------------------------

// ----------------------------------------
// --- Editor Behaviors -------------------
$editorTab->createOption( array(
	'name' => __( 'Editor Behavior', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$editorTab->createOption( array(
    'name' => __( 'Editor Default Behavior', ICUSTOMIZER_ID_LANGUAGES ),
    'id' => 'icustomizer_text_visual_default',
    'options' => array(
        '1' => 'Visual',
        '2' => 'Text',
     ),
    'type' => 'radio',
	'desc' => __( 'First Editor Behavior - Default: Visual', ICUSTOMIZER_ID_LANGUAGES ),
    'default' => '1',
) );
$editorTab->createOption( array(
	'name' => __( 'Remove <i class="icustomizer-red">Visual</i> from Editor', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_remove_visual_editor',
	'type' => 'checkbox',
	'desc' => __( 'Yes - Default: Unchecked', ICUSTOMIZER_ID_LANGUAGES ),
	'default' => false,
) );
$editorTab->createOption( array(
	'name' => __( 'Remove "p" Tag from Editor', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_behavior_tag_p_editor',
	'type' => 'checkbox',
	'desc' => __( 'Yes - Default: Unchecked<br><br><em><i class="icustomizer-red">Not compatible with Tiny Advanced Plugin</i><br>Change "p" Tag to "br" Tag into editor when the ENTER key is pressed</em>', ICUSTOMIZER_ID_LANGUAGES ),
	'default' => false,
) );

// ----------------------------------------
// --- Excerpt Shortcodes -----------------
$editorTab->createOption( array(
	'name' => __( 'Excerpt Execution', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$editorTab->createOption( array(
	'name' => __( 'Allow Shortcodes execution in Excerpt', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_shortcode_in_excerpt',
	'type' => 'checkbox',
	'desc' => __( 'Yes - Default: Unchecked', ICUSTOMIZER_ID_LANGUAGES ),
	'default' => false,
) );





// -----------------------------------------
// -----------------------------------------
// -----------------------------------------
// -----------------------------------------
// -----------------------------------------

// -----------------------------------------
// --- Editor Behavior Visual / Text 
// -----------------------------------------
function icustomizer_text_visual_default_function() {
	$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
	switch( $icustomizer_option->getOption( 'icustomizer_text_visual_default' ) ) {
		default: case "1": return "tinymce"; break;
		case "2": return "html"; break;
	}
}
add_filter( 'wp_default_editor', 'icustomizer_text_visual_default_function' );

// -----------------------------------------
// --- Remove Visual from Editor 
// -----------------------------------------
if ( $icustomizer_option->getOption( 'icustomizer_remove_visual_editor' ) )
	add_filter ( 'user_can_richedit' , create_function ( '$a' , 'return false;' ) , 50 );
	
// -----------------------------------------
// --- Change "p" tag to "br" tag into Editor 
// -----------------------------------------	
if ( $icustomizer_option->getOption( 'icustomizer_behavior_tag_p_editor' ) ) {
	function icustomizer_p_tag_editor( $tinymce_init_settings ) {
		$tinymce_init_settings['forced_root_block'] = false;
		return $tinymce_init_settings;
	}
	add_filter( 'tiny_mce_before_init', 'icustomizer_p_tag_editor' );
}

// -----------------------------------------
// --- Allow shortcode execution in Excerpt 
// -----------------------------------------	
if ( $icustomizer_option->getOption( 'icustomizer_shortcode_in_excerpt' ) )
	add_filter( 'the_excerpt', 'do_shortcode', 11 );