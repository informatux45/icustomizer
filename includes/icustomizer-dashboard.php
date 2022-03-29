<?php
/** Blocking direct access to plugin
=================================================== */
defined('ABSPATH') or die('Are you crazy!');

/** Create tab's DASHBOARD
=============================================== */
if (!function_exists("icustomizer_dashboard")) {
	function icustomizer_dashboard() {
		/** INFORMATUX Framework
		=================================================== */
		global $icustomizer_framework;
		
		/** Intialisation
		=============================================== */
		$page = "dashboard";
		
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
		echo $icustomizer_framework->addBreak( __( 'Create a non Admin Widget', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Enable Widget', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_widget_non_admin_enable'
				,'name'    => 'icustomizer_widget_non_admin_enable'
				,'checked' => get_option('icustomizer_widget_non_admin_enable', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addInput(
			 'text'
			,__( "Widget Title", ICUSTOMIZER_ID_LANGUAGES )
			,[
				 'name'        => 'icustomizer_widget_non_admin_title'
				,'id'          => 'icustomizer_widget_non_admin_title'
				,'value'       => get_option('icustomizer_widget_non_admin_title', '') // Default: void
				,'placeholder' => ""
				,'style'       => 'width: 100%; max-width: 400px;'
			]
			,false
			,'' // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addEditor(
			 __( "Widget Text", ICUSTOMIZER_ID_LANGUAGES )
			,[
				 'id'    => 'icustomizer_widget_non_admin'
				,'name'  => 'icustomizer_widget_non_admin'
				,'value' => get_option('icustomizer_widget_non_admin', '') // Default: void
				,'media_buttons' => true   // Whether to show the Add Media/other media buttons
				,'wpautop'       => true   // Whether to use wpautop()
				,'textarea_rows' => 10     // Number rows in the editor textarea
				,'teeny'         => false  // Whether to output the minimal editor config
			]
			,false // Required: true OR false
			,__( 'Put your footer content here', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->addBreak( __( 'Create a Admin Widget Only', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Enable Widget', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_widget_admin_enable'
				,'name'    => 'icustomizer_widget_admin_enable'
				,'checked' => get_option('icustomizer_widget_admin_enable', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addInput(
			 'text'
			,__( "Widget Title", ICUSTOMIZER_ID_LANGUAGES )
			,[
				 'name'        => 'icustomizer_widget_admin_title'
				,'id'          => 'icustomizer_widget_admin_title'
				,'value'       => get_option('icustomizer_widget_admin_title', '') // Default: void
				,'placeholder' => ""
				,'style'       => 'width: 100%; max-width: 400px;'
			]
			,false
			,'' // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addEditor(
			 __( "Widget Text", ICUSTOMIZER_ID_LANGUAGES )
			,[
				 'id'    => 'icustomizer_widget_admin'
				,'name'  => 'icustomizer_widget_admin'
				,'value' => get_option('icustomizer_widget_admin', '') // Default: void
				,'media_buttons' => true   // Whether to show the Add Media/other media buttons
				,'wpautop'       => true   // Whether to use wpautop()
				,'textarea_rows' => 10     // Number rows in the editor textarea
				,'teeny'         => false  // Whether to output the minimal editor config
			]
			,false // Required: true OR false
			,__( 'Put your footer content here', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->addBreak( __( 'Enable / Disable Widgets Dashboard', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Remove Widget Welcome WP', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_remove_widget_welcome_wp'
				,'name'    => 'icustomizer_remove_widget_welcome_wp'
				,'checked' => get_option('icustomizer_remove_widget_welcome_wp', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Remove Widget News WP', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_remove_widget_news_wp'
				,'name'    => 'icustomizer_remove_widget_news_wp'
				,'checked' => get_option('icustomizer_remove_widget_news_wp', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Remove Widget Resume WP', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_remove_widget_resume_wp'
				,'name'    => 'icustomizer_remove_widget_resume_wp'
				,'checked' => get_option('icustomizer_remove_widget_resume_wp', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Remove Widget Activity WP', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_remove_widget_activity_wp'
				,'name'    => 'icustomizer_remove_widget_activity_wp'
				,'checked' => get_option('icustomizer_remove_widget_activity_wp', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Remove Widget Quick Press WP', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_remove_widget_quick_wp'
				,'name'    => 'icustomizer_remove_widget_quick_wp'
				,'checked' => get_option('icustomizer_remove_widget_quick_wp', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
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
// ----------------------------------------
// ----------------------------------------
// ----------------------------------------

/** Add Widgets Dashboard (non Admin / Admin only)
=================================================== */
if ( get_option( 'icustomizer_widget_admin_enable' ) || get_option( 'icustomizer_widget_non_admin_enable' ) ) {
	// ----------------------------------------
	// --- Widget non Admin
	// ----------------------------------------
	if (!function_exists("icustomizer_widget_non_admin_function")) {
		function icustomizer_widget_non_admin_function( $post, $callback_args ) {
			echo get_option( 'icustomizer_widget_non_admin' );
		}
	}
	// ----------------------------------------
	// Widget Admin
	// ----------------------------------------
	if (!function_exists("icustomizer_widget_admin_function")) {
		function icustomizer_widget_admin_function( $post, $callback_args ) {
			echo get_option( 'icustomizer_widget_admin' );
		}
	}
	// ----------------------------------------
	// Add Widgets in Dashboard
	// ----------------------------------------
	add_action('wp_dashboard_setup', 'add_icustomizer_widgets');
	if (!function_exists("add_icustomizer_widgets")) {
		function add_icustomizer_widgets() {
			if ( get_option( 'icustomizer_widget_admin_enable' ) ) {
				if ( current_user_can('update_core') )
					wp_add_dashboard_widget('icustomizer_widget_admin', get_option( 'icustomizer_widget_admin_title' ), 'icustomizer_widget_admin_function');			
			}
			if ( get_option( 'icustomizer_widget_non_admin_enable' ) )
				wp_add_dashboard_widget('icustomizer_widget_non_admin', get_option( 'icustomizer_widget_non_admin_title' ), 'icustomizer_widget_non_admin_function');
		}
	}
}

/** Remove Widgets Dashboard
=================================================== */
add_action('admin_menu', 'icustomizer_remove_widgets_dashboard');
if (!function_exists("icustomizer_remove_widgets_dashboard")) {
	function icustomizer_remove_widgets_dashboard() {
		if ( get_option( 'icustomizer_remove_widget_welcome_wp' ) ) remove_action( 'welcome_panel', 'wp_welcome_panel' );
		if ( get_option( 'icustomizer_remove_widget_news_wp' ) ) remove_meta_box('dashboard_primary', 'dashboard', 'core');
		if ( get_option( 'icustomizer_remove_widget_resume_wp' ) ) remove_meta_box('dashboard_right_now', 'dashboard', 'core');
		if ( get_option( 'icustomizer_remove_widget_activity_wp' ) ) remove_meta_box('dashboard_activity', 'dashboard', 'core');
		if ( get_option( 'icustomizer_remove_widget_quick_wp' ) ) remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	}
}

?>