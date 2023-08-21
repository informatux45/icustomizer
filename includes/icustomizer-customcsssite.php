<?php
/** Blocking direct access to plugin
=================================================== */
defined('ABSPATH') or die('Are you crazy!');

/** Create tab's CUSTOM CSS
=============================================== */
if (!function_exists("icustomizer_customcsssite")) {
	function icustomizer_customcsssite() {
		/** INFORMATUX Framework
		=================================================== */
		global $icustomizer_framework;
		
		/** Intialisation
		=============================================== */
		$page = "customcsssite";
		
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
		echo $icustomizer_framework->addBreak( __( 'Custom CSS Frontend', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		echo $icustomizer_framework->addCode(
			 __( 'Custom CSS', ICUSTOMIZER_ID_LANGUAGES ) . ' <br /><i>( ' . __( 'Advanced users', ICUSTOMIZER_ID_LANGUAGES ) . ' )<i>'
			,get_option('icustomizer_custom_css_front', '') // Default: void
			,[
				 'id'     => 'icustomizer_custom_css_front'
				,'height' => '400'
				,'fsize'  => 16 // Font-size in pixels
				,'lang'   => 'css' // css, html, javascript, json, less, lua, markdown, mysql, php, plain_text, python, ruby, sass, scss, sh, text, xml
				,'theme'  => 'dawn' // ambiance, chaos, chrome, clouds, clouds_midnight, cobalt, crimson_editor, dawn, dreamweaver, eclipse, github, idle_fingers, iplastic, katzenmilch, kr_theme, kuroir, merbivore, merbivore_soft, mono_industrial, monokai, pastel_on_dark, solarized_dark, solarized_light, sqlserver, terminal, textmate, tomorrow, tomorrow_night, tomorrow_night_blue, tomorrow_night_bright, tomorrow_night_eighties, twilight, vibrant_ink, xcode
			]
			,false // true, false (required)
			,__( 'Put your custom CSS rules here.', ICUSTOMIZER_ID_LANGUAGES ) . '<br><strong class="icustomizer-red">' . __( 'Without the tag &lt;style&gt; and &lt;/style&gt;', ICUSTOMIZER_ID_LANGUAGES ) . '</strong>' // Description
		);
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
// -----------------------------------------
// -----------------------------------------
// -----------------------------------------

/** load css into the website's front-end
=================================================== */
add_action('wp_head', 'icustomizer_custom_front_styles', 100);
if (!function_exists("icustomizer_custom_front_styles")) {
	function icustomizer_custom_front_styles() {
		// --- Retrieve options
		echo "<style>" . get_option( 'icustomizer_custom_css_front' ) . "</style>";
	}
}

?>