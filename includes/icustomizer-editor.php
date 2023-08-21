<?php
/** Blocking direct access to plugin
=================================================== */
defined('ABSPATH') or die('Are you crazy!');

/** Create tab's EDITOR
=============================================== */
if (!function_exists("icustomizer_editor")) {
	function icustomizer_editor() {
		/** INFORMATUX Framework
		=================================================== */
		global $icustomizer_framework;
		
		/** Intialisation
		=============================================== */
		$page = "editor";
		
		/** Title
        =================================================== */
		echo $icustomizer_framework->general_infos(
			 'start'
			,[
				 'PLUGIN_ID'      => ICUSTOMIZER_ID
				,'PLUGIN_NAME'    => ICUSTOMIZER_NAME
				,'PLUGIN_VERSION' => icustomizer_get_version()
			  ]);
		
		/** Tabs
        =================================================== */
		echo $icustomizer_framework->nav_tabs(icustomizer_nav_tabs(), "icustomizer-$page", ICUSTOMIZER_ID_LANGUAGES);

		/** Form construct
		=================================================== */
		echo $icustomizer_framework->openForm(
			[
				 'action'  => admin_url("admin.php?page=icustomizer-$page")
				,'name'    => "$page"
				,'id'      => "$page"
				,'method'  => "post"
				,'enctype' => "multipart/form-data"
			]
		);
		
		/** Content
        =================================================== */		
		echo $icustomizer_framework->openTable();
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->addBreak( __( 'Editor Behavior', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		// --- Add warning if WORDPRESS Version 5+
		// ----------------------------------------
		if (icustomizer_wp_current_version() >= 5) {
			echo $icustomizer_framework->addNote(
				'<div style="witdh: 100%; text-align: center;"><img style="height: 100%; max-height: 30px;" src="' . ICUSTOMIZER_URL . 'images/icon-warning.png" /></div>',
				sprintf( __( 'You are using WORDPRESS Version %s<br>If you wish to continue using the following settings, you will need to install the TinyMCE plugin.', ICUSTOMIZER_ID_LANGUAGES ), icustomizer_wp_current_version(true) )
			);
		}
		// ----------------------------------------
		$tab_text_visual  = [];
		$tab_text_visuals = [
			 ['id' => '1', 'title' => 'Visual']
			,['id' => '2',  'title' => 'Text']
		];
		$text_visual_method_checked = "";
		foreach($tab_text_visuals as $key => $val) {
			if (get_option('icustomizer_text_visual_default') == $val['id']) $text_visual_method_checked = $val['id'];
			$tab_text_visual[$key]['text']  = $val['title'];
			$tab_text_visual[$key]['value'] = $val['id'];
		}
		echo $icustomizer_framework->addRadio(
			 __( 'Product add method in product detail page', ICUSTOMIZER_ID_LANGUAGES )
			,$tab_text_visual
			,[
				 'id'      => 'icustomizer_text_visual_default'
				,'name'    => 'icustomizer_text_visual_default'
				,'checked' => "$text_visual_method_checked"
				,'default' => 1
			]
			,true
			,'<br>'
			,__( 'Default: Visual', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Remove <i class="icustomizer-red">Visual</i> from Editor', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,array(
				 'id'      => 'icustomizer_remove_visual_editor'
				,'name'    => 'icustomizer_remove_visual_editor'
				,'checked' => get_option('icustomizer_remove_visual_editor', '0') // Default: 0
			)
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Remove "p" Tag from Editor', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,array(
				 'id'      => 'icustomizer_behavior_tag_p_editor'
				,'name'    => 'icustomizer_behavior_tag_p_editor'
				,'checked' => get_option('icustomizer_behavior_tag_p_editor', '0') // Default: 0
			)
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: Disabled<br><br><em><i class="icustomizer-red">Not compatible with Tiny Advanced Plugin</i><br>Change "p" Tag to "br" Tag into editor when the ENTER key is pressed</em>', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->addBreak( __( 'Excerpt Execution', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Allow Shortcodes execution in Excerpt', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,array(
				 'id'      => 'icustomizer_shortcode_in_excerpt'
				,'name'    => 'icustomizer_shortcode_in_excerpt'
				,'checked' => get_option('icustomizer_shortcode_in_excerpt', '0') // Default: 0
			)
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		
		// ----------------------------------------
		// ----------------------------------------
		// --- Hiddens / Buttons
		// ----------------------------------------
		echo $icustomizer_framework->addInput('submit', '', [ 'value' => __( "Save changes", ICUSTOMIZER_ID_LANGUAGES) ] );
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->closeTable();
		echo $icustomizer_framework->closeForm();
		// ----------------------------------------
		
		/** End
        =================================================== */
		echo $icustomizer_framework->general_infos('end');
    }
}
// ----------------------------------------
// ----------------------------------------
// ----------------------------------------

/** Editor Behavior Visual / Text 
=================================================== */
add_filter( 'wp_default_editor', 'icustomizer_text_visual_default_function' );
if (!function_exists("icustomizer_text_visual_default_function")) {
	function icustomizer_text_visual_default_function() {
		switch( get_option( 'icustomizer_text_visual_default' ) ) {
			default: case "1": return "tinymce"; break;
			case "2": return "html"; break;
		}
	}
}

/** Remove Visual from Editor 
=================================================== */
if ( get_option( 'icustomizer_remove_visual_editor' ) )
	add_filter ( 'user_can_richedit' , create_function ( '$a' , 'return false;' ) , 50 );

/** Change "p" tag to "br" tag into Editor 
=================================================== */
if ( get_option( 'icustomizer_behavior_tag_p_editor' ) ) {
	function icustomizer_p_tag_editor( $tinymce_init_settings ) {
		$tinymce_init_settings['forced_root_block'] = false;
		return $tinymce_init_settings;
	}
	add_filter( 'tiny_mce_before_init', 'icustomizer_p_tag_editor' );
}

/** Allow shortcode execution in Excerpt 
=================================================== */
if ( get_option( 'icustomizer_shortcode_in_excerpt' ) )
	add_filter( 'the_excerpt', 'do_shortcode', 11 );
	
?>