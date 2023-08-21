<?php
/** Blocking direct access to plugin
============================================= */
defined('ABSPATH') or die('Are you crazy!');

/** Plugin DB Version / Table name
============================================= */
global $icustomizer_version;
$icustomizer_version = icustomizer_get_version(); // Change version of the plugin to update DB

/**
* Install the plugin DB
* @return DB Insert/Upgrade
*/
register_activation_hook( __FILE__, 'icustomizer_install' );
if ( !function_exists('icustomizer_install') ) {
	function icustomizer_install() {
		global $icustomizer_version;
		
		add_option( 'icustomizer_version', $icustomizer_version );
		
		/**
		 * [OPTIONAL] Example of updating to x.x.x version
		 *
		 * If you develop new version of plugin
		 * just increment $icustomizer_version variable
		 * and add following block of code
		 */
		$installed_ver = get_option('icustomizer_version');
		if ($installed_ver != $icustomizer_version) {
			// notice that we are updating option, rather than adding it
			update_option('icustomizer_version', $icustomizer_version);
		}
		
		/**
		 * [OPTIONAL] Check if options exist
		 *
		 * If the plugin options are not created
		 * install/update process create all options
		 */
		$icustomizer_options = [
		    // General
             'icustomizer_wlwmanifest_link'                => '0'
            ,'icustomizer_wp_generator'                    => '0'
            ,'icustomizer_wpml_generator'                  => '0'
            ,'icustomizer_enable_all_settings'             => '0'
            ,'icustomizer_hide_connection_errors'          => '0'
            ,'icustomizer_remove_wp_adminbar'              => '0'
            ,'icustomizer_remove_logo_wp_adminbar'         => '0'
            ,'icustomizer_remove_comment_wp_adminbar'      => '0'
            ,'icustomizer_remove_new_content_wp_adminbar'  => '0'
            ,'icustomizer_remove_footer_admin'             => '0'
            ,'icustomizer_remove_footer_admin_txt'         => ''
            ,'icustomizer_remove_footer_version_admin'     => '0'
            ,'icustomizer_remove_footer_version_admin_txt' => ''
            // Dashboard
            ,'icustomizer_widget_non_admin_enable'   => '0'
            ,'icustomizer_widget_non_admin_title'    => ''
            ,'icustomizer_widget_non_admin'          => ''
            ,'icustomizer_widget_admin_enable'       => '0'
            ,'icustomizer_widget_admin_title'        => ''
            ,'icustomizer_widget_admin'              => ''
            ,'icustomizer_remove_widget_welcome_wp'  => '0'
            ,'icustomizer_remove_widget_news_wp'     => '0'
            ,'icustomizer_remove_widget_resume_wp'   => '0'
            ,'icustomizer_remove_widget_activity_wp' => '0'
            ,'icustomizer_remove_widget_quick_wp'    => '0'
            // Custom CSS
            ,'icustomizer_custom_css_admin' => ''
            ,'icustomizer_custom_css_front' => ''
            // Custom JS
            ,'icustomizer_custom_js_front' => ''
            // Editor
            ,'icustomizer_text_visual_default'   => '1'
            ,'icustomizer_remove_visual_editor'  => '0'
            ,'icustomizer_behavior_tag_p_editor' => '0'
            ,'icustomizer_shortcode_in_excerpt'  => '0'
            // Login
            ,'icustomizer_login_background'    => ''
            ,'icustomizer_login_logo'          => ''
            ,'icustomizer_login_logo_height'   => '80'
            ,'icustomizer_login_form_radius'   => '0'
            ,'icustomizer_login_form_bg_color' => '#ffffff'
			,'icustomizer_login_form_color'    => '#000000'
            ,'icustomizer_login_title_link'    => get_bloginfo( 'name' )
            ,'icustomizer_login_href_link'     => site_url()
		];
		// Add options if not exist
		$deprecated = null;
		$autoload   = 'no';
		foreach($icustomizer_options as $option => $value) {
			if ( !get_option( $option ) ) {
				add_option( $option, $value, $deprecated, $autoload );
			}
		}
		
	}
}	

/**
* Trick to update plugin database
* @return DB Insert/Upgrade DB options
*/
add_action('plugins_loaded', 'icustomizer_update_check');
if ( ! function_exists("icustomizer_update_check") ) {
	function icustomizer_update_check(){
		global $icustomizer_version;
		$icustomizer_version = get_site_option('icustomizer_version');
		if ($icustomizer_version != $icustomizer_version) {
			icustomizer_install();
		}
	}
}

/**
 * Migration from Titan Framework
 * @Return the old value of variable
 */
if (!function_exists("icustomizer_old_value_from_titan")) {
	function icustomizer_old_value_from_titan($string_to_search) {
		$old_options = get_option('icustomizer_options');
		if (!$old_options || !$string_to_search) return;
		// Get result after string to search
		$after_string = strstr($old_options, '"'.$string_to_search.'"');
		// New string without ";
		$new_string = str_replace($string_to_search.'";', "", $after_string);
		// Explode in 3 values
		list($s, $lenght, $value) = explode(":", $new_string, 3);
		// Clean string
		$clean_string = (substr($value, 0, strpos($value, '";s:')) == '') ? substr($value, 0, strpos($value, '";}')) : substr($value, 0, strpos($value, '";s:'));
		// Return good value (old value from Titan Framework)
		return trim($clean_string, '"');
	}
}

/**
 * Admin notice - Migration from Titan Framework
 * @Return string
 */
add_action( 'admin_notices', 'icustomizer_do_migration_admin_notice' );
if (!function_exists("icustomizer_do_migration_admin_notice")) {
	function icustomizer_do_migration_admin_notice() {
		$get_icustomizer_options = get_option('icustomizer_options');
		if (isset($get_icustomizer_options) && $get_icustomizer_options != '') {
			?>
			<div id="icustomizer-migration" class="notice notice-info">
				<p><?php _e( "You have installed the new version of ICUSTOMIZER which no longer uses the TITAN Framework. To migrate your old data, simply click on the Migration button.", ICUSTOMIZER_ID_LANGUAGES ); ?></p>
				<p><a href="<?php echo admin_url('admin.php?page=icustomizer-general&m=titan'); ?>" class="button button-primary">Migration</a></p>
			</div>
			<?php
		}
	}
}

/**
 * Admin notice - Migration from Titan Framework
 * @Return string
 */
if (!function_exists("icustomizer_do_migration")) {
	function icustomizer_do_migration() {
		$debug = false;
		$options_general = [
			// General
			'icustomizer_wlwmanifest_link',
			'icustomizer_wp_generator',
			'icustomizer_wpml_generator',
			'icustomizer_enable_all_settings',
			'icustomizer_hide_connection_errors',
			'icustomizer_remove_wp_adminbar',
			'icustomizer_remove_logo_wp_adminbar',
			'icustomizer_remove_comment_wp_adminbar',
			'icustomizer_remove_new_content_wp_adminbar',
			'icustomizer_remove_footer_admin',
			'icustomizer_remove_footer_admin_txt',
			'icustomizer_remove_footer_version_admin',
			'icustomizer_remove_footer_version_admin_txt',
		];
		$options_dashboard = [
			// Dashboard
			'icustomizer_widget_non_admin_enable',
			'icustomizer_widget_non_admin_title',
			'icustomizer_widget_non_admin',
			'icustomizer_widget_admin_enable',
			'icustomizer_widget_admin_title',
			'icustomizer_widget_admin',
			'icustomizer_remove_widget_welcome_wp',
			'icustomizer_remove_widget_news_wp',
			'icustomizer_remove_widget_resume_wp',
			'icustomizer_remove_widget_activity_wp',
			'icustomizer_remove_widget_quick_wp',
		];
		$options_customcss = [
			// Custom CSS
			'icustomizer_custom_css_admin',
			'icustomizer_custom_css_front',
		];
		$options_customjs = [
			// Custom JS
			'icustomizer_custom_js_front',
		];
		$options_editor = [
			// Editor
			'icustomizer_text_visual_default',
			'icustomizer_remove_visual_editor',
			'icustomizer_behavior_tag_p_editor',
			'icustomizer_shortcode_in_excerpt',
		];
		$options_login = [
			// Login
			'icustomizer_login_background',
			'icustomizer_login_logo',
			'icustomizer_login_logo_height',
			'icustomizer_login_form_radius',
			'icustomizer_login_form_bg_color',
			'icustomizer_login_form_color',
			'icustomizer_login_title_link',
			'icustomizer_login_href_link'
		];
		$error = false;
		// Migration General Options
		foreach ( $options_general as $option ) {
			// Get old value from option
			$old_var = icustomizer_old_value_from_titan( $option );
			// Insert old value in new option
			switch($option) {
				case 'icustomizer_wlwmanifest_link':
				case 'icustomizer_wp_generator':
				case 'icustomizer_wpml_generator':
				case 'icustomizer_enable_all_settings':
				case 'icustomizer_hide_connection_errors':
				case 'icustomizer_remove_wp_adminbar':
				case 'icustomizer_remove_logo_wp_adminbar':
				case 'icustomizer_remove_comment_wp_adminbar':
				case 'icustomizer_remove_new_content_wp_adminbar':
				case 'icustomizer_remove_footer_admin':
				case 'icustomizer_remove_footer_version_admin':
					if ($old_var == '') $old_var = '0';
				break;
			}
			if ($debug) echo $option . ': ' . $old_var . '<br>';
			if (isset($old_var)) update_option( $option, $old_var );
		}
		// Migration Dashboard Options
		foreach ( $options_dashboard as $option ) {
			// Get old value from option
			$old_var = icustomizer_old_value_from_titan( $option );
			// Insert old value in new option
			switch($option) {
				case 'icustomizer_widget_non_admin_enable':
				case 'icustomizer_widget_admin_enable':
				case 'icustomizer_remove_widget_welcome_wp':
				case 'icustomizer_remove_widget_news_wp':
				case 'icustomizer_remove_widget_resume_wp':
				case 'icustomizer_remove_widget_activity_wp':
				case 'icustomizer_remove_widget_quick_wp':
					if ($old_var == '') $old_var = '0';
				break;
			}
			if ($debug) echo $option . ': ' . $old_var . '<br>';
			if (isset($old_var)) update_option( $option, $old_var );
		}
		// Migration Custom CSS Options
		foreach ( $options_customcss as $option ) {
			// Get old value from option
			$old_var = icustomizer_old_value_from_titan( $option );
			// Insert old value in new option
			if ($debug) echo $option . ': ' .stripslashes($old_var) . '<br>';
			if (isset($old_var)) update_option( $option, stripslashes($old_var) );
		}
		// Migration Custom JS Options
		foreach ( $options_customjs as $option ) {
			// Get old value from option
			$old_var = icustomizer_old_value_from_titan( $option );
			// Insert old value in new option
			if ($debug) echo $option . ': ' . stripslashes($old_var) . '<br>';
			if (isset($old_var)) update_option( $option, stripslashes($old_var) );
		}
		// Migration Editor Options
		foreach ( $options_editor as $option ) {
			// Get old value from option
			$old_var = icustomizer_old_value_from_titan( $option );
			// Insert old value in new option
			switch($option) {
				case 'icustomizer_text_visual_default':
					if ($old_var == '') $old_var = '1';
				break;
				case 'icustomizer_remove_visual_editor':
				case 'icustomizer_behavior_tag_p_editor':
				case 'icustomizer_shortcode_in_excerpt':
					if ($old_var == '') $old_var = '0';
				break;
			}
			if ($debug) echo $option . ': ' . $old_var . '<br>';
			if (isset($old_var)) update_option( $option, $old_var );
		}
		// Migration Login Options
		foreach ( $options_login as $option ) {
			// Get old value from option
			$old_var = icustomizer_old_value_from_titan( $option );
			// Insert old value in new option
			switch($option) {
				case "icustomizer_login_background":
				case "icustomizer_login_logo":
					$old_var = wp_get_attachment_url( $old_var );
				break;
			}
			if ($debug) echo $option . ': ' . $old_var . '<br>';
			if (isset($old_var)) update_option( $option, $old_var );
		}
		if ($error) {
			// Don't remove options
			return false;
		} else {
			// Remove old option
			delete_option( 'icustomizer_options' );
			return true;
		}
		
	}
}
?>