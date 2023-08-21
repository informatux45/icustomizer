<?php
/** Blocking direct access to plugin
=================================================== */
defined('ABSPATH') or die('Are you crazy!');

/** Create tab's GENERAL
=============================================== */
if (!function_exists("icustomizer_general")) {
	function icustomizer_general() {
		/** INFORMATUX Framework
		=================================================== */
		global $icustomizer_framework;
		
		/** Intialisation
		=============================================== */
		$page = "general";
		$icustomizer_link_reviews = "https://wordpress.org/support/plugin/icustomizer/reviews/";
		
		/** Migration
		=================================================== */
		if (isset($_GET['m']) && $_GET['m'] == 'titan') {
			// Do migration
			$do_migration = icustomizer_do_migration();
			if ($do_migration) {
				// Migration successful
				?>
				<div class="notice notice-success">
					<p><?php _e( "Your data migration was successful!", ICUSTOMIZER_ID_LANGUAGES ); ?></p>
				</div>
				<?php
			} else {
				// Migration error
				?>
				<div class="notice notice-error">
					<p><?php _e( "An error was encountered while migrating your data!", ICUSTOMIZER_ID_LANGUAGES ); ?></p>
				</div>
				<?php
			}
			?>
			<style>
				#icustomizer-migration { display: none !important; }
			</style>
			<?php
		}
		
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
		echo $icustomizer_framework->addAnything(
				'<div style="line-height: 1.8em;">' .
					'<span class="icustomizer-bold">' . __( 'Manage, customize your website and your Wordpress Administration', ICUSTOMIZER_ID_LANGUAGES ). '</span>' .
					'<br>' .
					'&nbsp;<a target="_blank" class="start-link" style="text-decoration: none;" href="' . $icustomizer_link_reviews . '">' . __( 'You <span class="dashicons dashicons-heart icustomizer-red"></span> our module, so rate it, leave us a comment', ICUSTOMIZER_ID_LANGUAGES ) . '</a>' .
					'&nbsp;&nbsp;' .
					'<span class="dashicons dashicons-star-filled icustomizer-yellow"></span><span class="dashicons dashicons-star-filled icustomizer-yellow"></span><span class="dashicons dashicons-star-filled icustomizer-yellow"></span><span class="dashicons dashicons-star-filled icustomizer-yellow"></span><span class="dashicons dashicons-star-filled icustomizer-yellow"></span>' .
				'</div>'
		);
		// ----------------------------------------
		echo $icustomizer_framework->addBreak( __( 'META Tags', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Disabled WLW Manifest link', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_wlwmanifest_link'
				,'name'    => 'icustomizer_wlwmanifest_link'
				,'checked' => get_option('icustomizer_wlwmanifest_link', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Disabled WP Generator', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_wp_generator'
				,'name'    => 'icustomizer_wp_generator'
				,'checked' => get_option('icustomizer_wp_generator', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Disabled WPML Generator', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_wpml_generator'
				,'name'    => 'icustomizer_wpml_generator'
				,'checked' => get_option('icustomizer_wpml_generator', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->addBreak( __( 'Settings', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Enable All settings in Settings Menu', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_enable_all_settings'
				,'name'    => 'icustomizer_enable_all_settings'
				,'checked' => get_option('icustomizer_enable_all_settings', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Enable or disable All settings visibility for Admin Only - Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Hide connection errors', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_hide_connection_errors'
				,'name'    => 'icustomizer_hide_connection_errors'
				,'checked' => get_option('icustomizer_hide_connection_errors', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Hide Login Connection Errors - Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->addBreak( __( 'Admin BAR', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Remove The WP Admin Bar', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_remove_wp_adminbar'
				,'name'    => 'icustomizer_remove_wp_adminbar'
				,'checked' => get_option('icustomizer_remove_wp_adminbar', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Remove Logo WP in Admin Bar', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_remove_logo_wp_adminbar'
				,'name'    => 'icustomizer_remove_logo_wp_adminbar'
				,'checked' => get_option('icustomizer_remove_logo_wp_adminbar', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Remove Logo COMMENT in Admin Bar', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_remove_comment_wp_adminbar'
				,'name'    => 'icustomizer_remove_comment_wp_adminbar'
				,'checked' => get_option('icustomizer_remove_comment_wp_adminbar', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Remove WP New Content in Admin Bar', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_remove_new_content_wp_adminbar'
				,'name'    => 'icustomizer_remove_new_content_wp_adminbar'
				,'checked' => get_option('icustomizer_remove_new_content_wp_adminbar', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->addBreak( __( 'Admin FOOTER', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Remove Admin Footer Text (Left)', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_remove_footer_admin'
				,'name'    => 'icustomizer_remove_footer_admin'
				,'checked' => get_option('icustomizer_remove_footer_admin', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addTextarea(
			 __( 'New text', ICUSTOMIZER_ID_LANGUAGES ) . ' <br><i>( ' . __( 'Authorized HTML', ICUSTOMIZER_ID_LANGUAGES ) . ' )</i>'
			,get_option('icustomizer_remove_footer_admin_txt', '') // Default: void
			,[
				 'name'        => 'icustomizer_remove_footer_admin_txt'
				,'id'          => 'icustomizer_remove_footer_admin_txt'
				,'value'       => get_option('icustomizer_remove_footer_admin_txt', '') // Default: void
				,'placeholder' => ""
				,'style'       => 'width: 100%; height: 200px; max-height: 100%;'
			]
			,false // true, false (required)
			,'' // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addRadioYN(
			 __( 'Remove Admin Footer WP Version (Right)', ICUSTOMIZER_ID_LANGUAGES )
			,true
			,[
				 'id'      => 'icustomizer_remove_footer_version_admin'
				,'name'    => 'icustomizer_remove_footer_version_admin'
				,'checked' => get_option('icustomizer_remove_footer_version_admin', '0') // Default: 0
			]
			,__( 'Enabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Disabled', ICUSTOMIZER_ID_LANGUAGES )
			,__( 'Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ) // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addTextarea(
			 __( 'New text', ICUSTOMIZER_ID_LANGUAGES ) . ' <br><i>( ' . __( 'Authorized HTML', ICUSTOMIZER_ID_LANGUAGES ) . ' )</i>'
			,get_option('icustomizer_remove_footer_version_admin_txt', '') // Default: void
			,[
				 'name'        => 'icustomizer_remove_footer_version_admin_txt'
				,'id'          => 'icustomizer_remove_footer_version_admin_txt'
				,'value'       => get_option('icustomizer_remove_footer_version_admin_txt', '') // Default: void
				,'placeholder' => ""
				,'style'       => 'width: 100%; height: 200px; max-height: 100%;'
			]
			,false // true, false (required)
			,'' // Description
		);
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

/** Remove Wlwmanifest link
=================================================== */
if ( get_option( 'icustomizer_wlwmanifest_link' )) remove_action('wp_head', 'wlwmanifest_link');

/** Remove Meta generator WP and Version number
=================================================== */
if ( get_option( 'icustomizer_wp_generator' )) remove_action('wp_head', 'wp_generator');

/** Remove Meta generator WPML
=================================================== */
if ( get_option( 'icustomizer_wpml_generator' )) {
	function icustomizer_meta_generator_wpml_tag() {
		return false;
	}
	if (!is_admin()) {
		global $sitepress;
		remove_action( 'wp_head', array($sitepress, 'meta_generator_tag') );
	}
	add_filter( 'meta_generator_tag', 'icustomizer_meta_generator_wpml_tag' );
}

/** Custom Admin footer (Left)
=================================================== */
if ( get_option( 'icustomizer_remove_footer_admin' )) {
	add_filter('admin_footer_text', 'icustomizer_remove_footer_admin_function');
	function icustomizer_remove_footer_admin_function() {
		echo ' ' . html_entity_decode(get_option( 'icustomizer_remove_footer_admin_txt' )) . ' ';
	}
}
if (PHP_VERSION_ID < 70200) {
	add_filter( 'admin_footer_text', create_function('', 'return;'), 999);
} else {
	add_filter( 'admin_footer_text', function() {return;}, 999);
}

/** Custom Admin WP Version footer (Right)
=================================================== */
if ( get_option( 'icustomizer_remove_footer_version_admin' )) {
	add_filter( 'update_footer', 'icustomizer_admin_version_footer_function', 11 );
	function icustomizer_admin_version_footer_function() {
		echo get_option( 'icustomizer_remove_footer_version_admin_txt' );
	}
}

/** Remove by css the WP adminbar
=================================================== */
if ( get_option( 'icustomizer_remove_wp_adminbar' )) {
	function icustomizer_remove_wp_adminbar() {
		wp_enqueue_style( 'icustomizer-admin-style', ICUSTOMIZER_URL . 'css/icustomizer-admin-style.css' );
		// --- Retrieve options
		wp_add_inline_style( 'icustomizer-admin-style', '#wpadminbar {display: none !important;}
														 #wpwrap {position: absolute; top: 0;}' );
	}
	add_action( 'admin_enqueue_scripts', 'icustomizer_remove_wp_adminbar' );
}

/** Remove by css the WP Logo into the adminbar
=================================================== */
if ( get_option( 'icustomizer_remove_logo_wp_adminbar' )) {
	function icustomizer_remove_logo_wp_adminbar() {
		wp_enqueue_style( 'icustomizer-admin-style', ICUSTOMIZER_URL . 'css/icustomizer-admin-style.css' );
		// --- Retrieve options
		wp_add_inline_style( 'icustomizer-admin-style', '#wp-admin-bar-wp-logo {display: none !important;}' );
	}
	add_action( 'admin_enqueue_scripts', 'icustomizer_remove_logo_wp_adminbar' );
}

/** Remove by css the WP COMMENTS into the adminbar
=================================================== */
if ( get_option( 'icustomizer_remove_comment_wp_adminbar' )) {
	function icustomizer_remove_comment_wp_adminbar() {
		wp_enqueue_style( 'icustomizer-admin-style', ICUSTOMIZER_URL . 'css/icustomizer-admin-style.css' );
		// --- Retrieve options
		wp_add_inline_style( 'icustomizer-admin-style', '#wp-admin-bar-comments {display: none !important;}' );
	}
	add_action( 'admin_enqueue_scripts', 'icustomizer_remove_comment_wp_adminbar' );
}

/** Remove by css the WP COMMENTS into the adminbar
=================================================== */
if ( get_option( 'icustomizer_remove_new_content_wp_adminbar' )) {
	function icustomizer_remove_new_centent_wp_adminbar() {
		wp_enqueue_style( 'icustomizer-admin-style', ICUSTOMIZER_URL . 'css/icustomizer-admin-style.css' );
		// --- Retrieve options
		wp_add_inline_style( 'icustomizer-admin-style', '#wp-admin-bar-new-content {display: none !important;}' );
	}
	add_action( 'admin_enqueue_scripts', 'icustomizer_remove_new_centent_wp_adminbar' );
}

/** Enable All settings into the settings menu
=================================================== */
if ( get_option( 'icustomizer_enable_all_settings' )) {
	function icustomizer_all_settings_menu() {
		add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
	}
	add_action('admin_menu', 'icustomizer_all_settings_menu');
}

/** Hide connection errors
=================================================== */
if (PHP_VERSION_ID < 70200) {
	if ( get_option( 'icustomizer_hide_connection_errors' )) add_filter('login_errors', create_function('$a', "return null;"));
} else {
	if ( get_option( 'icustomizer_hide_connection_errors' )) add_filter( 'login_errors', function() {return;});
}

?>