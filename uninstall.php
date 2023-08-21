<?php
/** if uninstall.php is not called by WordPress, die
============================================= */
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

/** Delete Options
============================================= */
$options = [
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
    // Custom CSS
	'icustomizer_custom_css_admin',
	'icustomizer_custom_css_front',
    // Custom JS
	'icustomizer_custom_js_front',
    // Editor
	'icustomizer_text_visual_default',
	'icustomizer_remove_visual_editor',
	'icustomizer_behavior_tag_p_editor',
	'icustomizer_shortcode_in_excerpt',
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
foreach ( $options as $option ) {
	if ( get_option( $option ) ) {
		delete_option( $option );
	}
}

?>