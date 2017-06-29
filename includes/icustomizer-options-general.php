<?php
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Blocking direct access to plugin      -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
defined('ABSPATH') or die('Are you crazy!');


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Create tab's options                  -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// ----------------------------------------
// --- General Options --------------------
// ----------------------------------------
$generalTab->createOption( array(
	'name' => '<div class="icustomizer-icons icon-icustomizer icustomizer-icons-200"></div>',
	'desc' => '<h3 class="">' . __( 'Welcome to ICustomizer', ICUSTOMIZER_ID_LANGUAGES ) . ' v.' . icustomizer_get_version( 'Version' ) . ' ' . __( 'by', ICUSTOMIZER_ID_LANGUAGES ) .' <a href="' . icustomizer_get_version( 'AuthorURI' ) . '" target="_blank">' . icustomizer_get_version( 'Author' ) .  '</a></h3>
				<div style="color:black; font-style: normal;">
					<p>
						<ol>
							<li>' . __( 'Manage your meta, settings, admin bar and footer', ICUSTOMIZER_ID_LANGUAGES ) . '</li>
							<li>' . __( 'Customize your admin dashboard', ICUSTOMIZER_ID_LANGUAGES ) . '</li>
							<li>' . __( 'Inject CSS code in your admin / in your website', ICUSTOMIZER_ID_LANGUAGES ) . '</li>
							<li>' . __( 'Inject CSS Javascript / JQuery in your website', ICUSTOMIZER_ID_LANGUAGES ) . '</li>
							<li>' . __( 'Customize the behavior of your editors', ICUSTOMIZER_ID_LANGUAGES ) . '</li>
							<li>' . __( 'Customize your login page', ICUSTOMIZER_ID_LANGUAGES ) . '</li>
							<li>' . __( 'Check security options', ICUSTOMIZER_ID_LANGUAGES ) . '</li>
						</ol>
					</p>
					<p>
					</p>
				</div>
	',
	'type' => 'note'
) );

// ----------------------------------------
// --- META Tags --------------------------
$generalTab->createOption( array(
	'name' => __( 'META Tags', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$generalTab->createOption( array(
	'name' => __( 'Disabled WLW Manifest link', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_wlwmanifest_link',
	'type' => 'checkbox',
	'desc' => __( 'Yes - Default: Unchecked', ICUSTOMIZER_ID_LANGUAGES ),
	'default' => false,
) );
$generalTab->createOption( array(
	'name' => __( 'Disabled WP Generator', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_wp_generator',
	'type' => 'checkbox',
	'desc' => __( 'Yes - Default: Unchecked', ICUSTOMIZER_ID_LANGUAGES ),
	'default' => false,
) );
$generalTab->createOption( array(
	'name' => __( 'Disabled WPML Generator', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_wpml_generator',
	'type' => 'checkbox',
	'desc' => __( 'Yes - Default: Unchecked', ICUSTOMIZER_ID_LANGUAGES ),
	'default' => false,
) );

// ----------------------------------------
// --- All settings -----------------------
$generalTab->createOption( array(
	'name' => __( 'Settings', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$generalTab->createOption( array(
    'name' => __( 'Enable All settings in Settings Menu', ICUSTOMIZER_ID_LANGUAGES ),
    'id' => 'icustomizer_enable_all_settings',
    'type' => 'enable',
    'default' => false,
    'desc' => __( 'Enable or disable All settings visibility for Admin Only - Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ),
) );
$generalTab->createOption( array(
    'name' => __( 'Hide connection errors', ICUSTOMIZER_ID_LANGUAGES ),
    'id' => 'icustomizer_hide_connection_errors',
    'type' => 'enable',
    'default' => false,
    'desc' => __( 'Hide Login Connection Errors - Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ),
) );

// ----------------------------------------
// --- Admin BAR -----------------------
$generalTab->createOption( array(
	'name' => __( 'Admin BAR', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$generalTab->createOption( array(
    'name' => __( 'Remove The WP Admin Bar', ICUSTOMIZER_ID_LANGUAGES ),
    'id' => 'icustomizer_remove_wp_adminbar',
    'type' => 'enable',
    'default' => false,
    'desc' => __( 'Enable or disable Logo WP - Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ),
) );
$generalTab->createOption( array(
    'name' => __( 'Remove Logo WP in Admin Bar', ICUSTOMIZER_ID_LANGUAGES ),
    'id' => 'icustomizer_remove_logo_wp_adminbar',
    'type' => 'enable',
    'default' => false,
    'desc' => __( 'Enable or disable Logo WP - Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ),
) );
$generalTab->createOption( array(
    'name' => __( 'Remove Logo COMMENT in Admin Bar', ICUSTOMIZER_ID_LANGUAGES ),
    'id' => 'icustomizer_remove_comment_wp_adminbar',
    'type' => 'enable',
    'default' => false,
    'desc' => __( 'Enable or disable COMMENT WP - Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ),
) );
$generalTab->createOption( array(
    'name' => __( 'Remove WP New Content in Admin Bar', ICUSTOMIZER_ID_LANGUAGES ),
    'id' => 'icustomizer_remove_new_content_wp_adminbar',
    'type' => 'enable',
    'default' => false,
    'desc' => __( 'Enable or disable New Content WP - Default: Disabled', ICUSTOMIZER_ID_LANGUAGES ),
) );
// ----------------------------------------
// --- Admin FOOTER -----------------------
$generalTab->createOption( array(
	'name' => __( 'Admin FOOTER', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$generalTab->createOption( array(
	'name' => __( 'Remove Admin Footer Text (Left)', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_remove_footer_admin',
	'type' => 'checkbox',
	'desc' => __( 'Yes - Default: Unchecked', ICUSTOMIZER_ID_LANGUAGES ),
	'default' => false,
) );
$generalTab->createOption( array(
	'name' => __( 'New text', ICUSTOMIZER_ID_LANGUAGES ) . ' <br><i>( ' . __( 'authorized HTML', ICUSTOMIZER_ID_LANGUAGES ) . ' )</i>',
	'id' => 'icustomizer_remove_footer_admin_txt',
	'type' => 'textarea',
) );
$generalTab->createOption( array(
	'name' => __( 'Remove Admin Footer WP Version (Right)', ICUSTOMIZER_ID_LANGUAGES ),
	'id' => 'icustomizer_remove_footer_version_admin',
	'type' => 'checkbox',
	'desc' => __( 'Yes - Default: Unchecked', ICUSTOMIZER_ID_LANGUAGES ),
	'default' => false,
) );
$generalTab->createOption( array(
	'name' => __( 'New text', ICUSTOMIZER_ID_LANGUAGES ) . ' <br><i>( ' . __( 'authorized HTML', ICUSTOMIZER_ID_LANGUAGES ) . ' )</i>',
	'id' => 'icustomizer_remove_footer_version_admin_txt',
	'type' => 'textarea',
) );



// -----------------------------------------
// -----------------------------------------
// -----------------------------------------
// -----------------------------------------
// -----------------------------------------
$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );

// -----------------------------------------
// --- Remove Wlwmanifest link
// -----------------------------------------
if ( $icustomizer_option->getOption( 'icustomizer_wlwmanifest_link' )) remove_action('wp_head', 'wlwmanifest_link');


// -----------------------------------------
// --- Remove Meta generator WP and Version number
// -----------------------------------------
if ( $icustomizer_option->getOption( 'icustomizer_wp_generator' )) remove_action('wp_head', 'wp_generator');


// -----------------------------------------
// --- Remove Meta generator WPML
// -----------------------------------------
if ( $icustomizer_option->getOption( 'icustomizer_wpml_generator' )) {
	function icustomizer_meta_generator_wpml_tag() {
		return false;
	}
	if (!is_admin()) {
		remove_action( 'wp_head', array($sitepress, 'meta_generator_tag') );
	}
	add_filter( 'meta_generator_tag', 'icustomizer_meta_generator_wpml_tag' );
}


// -----------------------------------------
// --- Custom Admin footer (Left)
// -----------------------------------------
if ( $icustomizer_option->getOption( 'icustomizer_remove_footer_admin' )) {
	add_filter('admin_footer_text', 'icustomizer_remove_footer_admin_function');
	function icustomizer_remove_footer_admin_function() {
		$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
		echo ' ' . html_entity_decode($icustomizer_option->getOption( 'icustomizer_remove_footer_admin_txt' )) . ' ';
	}
}

add_filter( 'admin_footer_text', create_function('', 'return;'), 999);


// -----------------------------------------
// --- Custom Admin WP Version footer (Right)
// -----------------------------------------
if ( $icustomizer_option->getOption( 'icustomizer_remove_footer_version_admin' )) {
	add_filter( 'update_footer', 'icustomizer_admin_version_footer_function', 11 );
	function icustomizer_admin_version_footer_function() {
		$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
		echo $icustomizer_option->getOption( 'icustomizer_remove_footer_version_admin_txt' );
	}
}


// -----------------------------------------
// --- Remove by css the WP adminbar
// -----------------------------------------
if ( $icustomizer_option->getOption( 'icustomizer_remove_wp_adminbar' )) {
	function icustomizer_remove_wp_adminbar() {
		wp_enqueue_style( 'icustomizer-admin-style', ICUSTOMIZER_URL . 'css/icustomizer-admin-style.css' );
		$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
		// --- Retrieve options
		wp_add_inline_style( 'icustomizer-admin-style', '#wpadminbar {display: none !important;}
														 #wpwrap {position: absolute; top: 0;}' );
	}
	add_action( 'admin_enqueue_scripts', 'icustomizer_remove_wp_adminbar' );
}


// -----------------------------------------
// --- Remove by css the WP Logo into the adminbar
// -----------------------------------------
if ( $icustomizer_option->getOption( 'icustomizer_remove_logo_wp_adminbar' )) {
	function icustomizer_remove_logo_wp_adminbar() {
		wp_enqueue_style( 'icustomizer-admin-style', ICUSTOMIZER_URL . 'css/icustomizer-admin-style.css' );
		$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
		// --- Retrieve options
		wp_add_inline_style( 'icustomizer-admin-style', '#wp-admin-bar-wp-logo {display: none !important;}' );
	}
	add_action( 'admin_enqueue_scripts', 'icustomizer_remove_logo_wp_adminbar' );
}


// -----------------------------------------
// --- Remove by css the WP COMMENTS into the adminbar
// -----------------------------------------
if ( $icustomizer_option->getOption( 'icustomizer_remove_comment_wp_adminbar' )) {
	function icustomizer_remove_comment_wp_adminbar() {
		wp_enqueue_style( 'icustomizer-admin-style', ICUSTOMIZER_URL . 'css/icustomizer-admin-style.css' );
		$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
		// --- Retrieve options
		wp_add_inline_style( 'icustomizer-admin-style', '#wp-admin-bar-comments {display: none !important;}' );
	}
	add_action( 'admin_enqueue_scripts', 'icustomizer_remove_comment_wp_adminbar' );
}


// -----------------------------------------
// --- Remove by css the WP COMMENTS into the adminbar
// -----------------------------------------
if ( $icustomizer_option->getOption( 'icustomizer_remove_new_content_wp_adminbar' )) {
	function icustomizer_remove_new_centent_wp_adminbar() {
		wp_enqueue_style( 'icustomizer-admin-style', ICUSTOMIZER_URL . 'css/icustomizer-admin-style.css' );
		$icustomizer_option = TitanFramework::getInstance( 'icustomizer' );
		// --- Retrieve options
		wp_add_inline_style( 'icustomizer-admin-style', '#wp-admin-bar-new-content {display: none !important;}' );
	}
	add_action( 'admin_enqueue_scripts', 'icustomizer_remove_new_centent_wp_adminbar' );
}


// -----------------------------------------
// --- Enable All settings into the settings menu
// -----------------------------------------
if ( $icustomizer_option->getOption( 'icustomizer_enable_all_settings' )) {
	function icustomizer_all_settings_menu() {
		add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
	}
	add_action('admin_menu', 'icustomizer_all_settings_menu');
}


// -----------------------------------------
// --- Hide connection errors
// -----------------------------------------
if ( $icustomizer_option->getOption( 'icustomizer_hide_connection_errors' )) add_filter('login_errors',create_function('$a', "return null;"));