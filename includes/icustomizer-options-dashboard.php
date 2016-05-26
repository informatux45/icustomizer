<?php
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Blocking direct access to plugin      -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
defined('ABSPATH') or die('Are you crazy!');


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Create tab's options                  -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// ----------------------------------------
// --- Dashboard Options ------------------
// ----------------------------------------
$dashboardTab->createOption( array(
	'name' => __( 'Create a non Admin Widget', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$dashboardTab->createOption( array(
	'name' => __( 'Enable Widget', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_widget_non_admin_enable',
	'type' => 'checkbox',
	'desc' => __( 'Yes - Default: Unchecked', ICUSTOMIZER_ID_LANGUAGES ),
	'default' => false,
) );
$dashboardTab->createOption( array(
	'name' => __( 'Widget Title', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_widget_non_admin_title',
	'type' => 'text',
) );
$dashboardTab->createOption( array(
    'name' => 'Widget Text',
    'id' => 'icustomizer_widget_non_admin',
    'type' => 'editor',
    'desc' => 'Put your footer content here'
) );
$dashboardTab->createOption( array(
	'name' => __( 'Create a Admin Widget Only', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$dashboardTab->createOption( array(
	'name' => __( 'Enable Widget', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_widget_admin_enable',
	'type' => 'checkbox',
	'desc' => __( 'Yes - Default: Unchecked', ICUSTOMIZER_ID_LANGUAGES ),
	'default' => false,
) );
$dashboardTab->createOption( array(
	'name' => __( 'Widget Title', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_widget_admin_title',
	'type' => 'text',
) );
$dashboardTab->createOption( array(
    'name' => 'Widget Text',
    'id' => 'icustomizer_widget_admin',
    'type' => 'editor',
    'desc' => 'Put your footer content here'
) );
$dashboardTab->createOption( array(
	'name' => __( 'Enable / Disable Widgets Dashboard', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$dashboardTab->createOption( array(
    'name' => __( 'Remove Widget Welcome WP', ICUSTOMIZER_ID_LANGUAGES ),
    'id' => 'icustomizer_remove_widget_welcome_wp',
    'type' => 'enable',
    'default' => false,
    'desc' => 'Enable or disable Widget Welcome WP - Default: Disabled',
) );
$dashboardTab->createOption( array(
    'name' => __( 'Remove Widget News WP', ICUSTOMIZER_ID_LANGUAGES ),
    'id' => 'icustomizer_remove_widget_news_wp',
    'type' => 'enable',
    'default' => false,
    'desc' => 'Enable or disable Widget News WP - Default: Disabled',
) );
$dashboardTab->createOption( array(
    'name' => __( 'Remove Widget Resume WP', ICUSTOMIZER_ID_LANGUAGES ),
    'id' => 'icustomizer_remove_widget_resume_wp',
    'type' => 'enable',
    'default' => false,
    'desc' => 'Enable or disable Widget Resume WP - Default: Disabled',
) );
$dashboardTab->createOption( array(
    'name' => __( 'Remove Widget Activity WP', ICUSTOMIZER_ID_LANGUAGES ),
    'id' => 'icustomizer_remove_widget_activity_wp',
    'type' => 'enable',
    'default' => false,
    'desc' => 'Enable or disable Widget Activity WP - Default: Disabled',
) );
$dashboardTab->createOption( array(
    'name' => __( 'Remove Widget Quick Press WP', ICUSTOMIZER_ID_LANGUAGES ),
    'id' => 'icustomizer_remove_widget_quick_wp',
    'type' => 'enable',
    'default' => false,
    'desc' => 'Enable or disable Widget Quick Press WP - Default: Disabled',
) );



// -----------------------------------------
// -----------------------------------------
// -----------------------------------------
// -----------------------------------------
// -----------------------------------------

// -----------------------------------------
// --- Add Widgets Dashboard (non Admin / Admin only)
// -----------------------------------------
if ( $icustomizer_option->getOption( 'icustomizer_widget_admin_enable' ) || $icustomizer_option->getOption( 'icustomizer_widget_non_admin_enable' ) ) {
	// --- Widget non Admin
	function icustomizer_widget_non_admin_function( $post, $callback_args ) {
		$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
		echo $icustomizer_option->getOption( 'icustomizer_widget_non_admin' );
	}
	// Widget Admin
	function icustomizer_widget_admin_function( $post, $callback_args ) {
		$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
		echo $icustomizer_option->getOption( 'icustomizer_widget_admin' );
	}
	// Add Widgets in Dashboard
	function add_icustomizer_widgets() {
		$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
		if ( $icustomizer_option->getOption( 'icustomizer_widget_admin_enable' ) ) {
			if ( current_user_can('update_core') )
				wp_add_dashboard_widget('icustomizer_widget_admin', $icustomizer_option->getOption( 'icustomizer_widget_admin_title' ), 'icustomizer_widget_admin_function');			
		}
		if ( $icustomizer_option->getOption( 'icustomizer_widget_non_admin_enable' ) )
			wp_add_dashboard_widget('icustomizer_widget_non_admin', $icustomizer_option->getOption( 'icustomizer_widget_non_admin_title' ), 'icustomizer_widget_non_admin_function');
	}
	add_action('wp_dashboard_setup', 'add_icustomizer_widgets');
}


// -----------------------------------------
// --- Remove Widgets Dashboard
// -----------------------------------------
function icustomizer_remove_widgets_dashboard() {
	$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
	if ( $icustomizer_option->getOption( 'icustomizer_remove_widget_welcome_wp' ) ) remove_action( 'welcome_panel', 'wp_welcome_panel' );
	if ( $icustomizer_option->getOption( 'icustomizer_remove_widget_news_wp' ) ) remove_meta_box('dashboard_primary', 'dashboard', 'core');
	if ( $icustomizer_option->getOption( 'icustomizer_remove_widget_resume_wp' ) ) remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	if ( $icustomizer_option->getOption( 'icustomizer_remove_widget_activity_wp' ) ) remove_meta_box('dashboard_activity', 'dashboard', 'core');
	if ( $icustomizer_option->getOption( 'icustomizer_remove_widget_quick_wp' ) ) remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
}
add_action('admin_menu', 'icustomizer_remove_widgets_dashboard');
