<?php
/**
 * ICustomizer
 *
 * @package     			ICustomizer
 * @author      			DEV By INFORMATUX
 * @copyright   			2024 INFORMATUX
 * @license     			GPL-3.0+
 *
 * @icustomizer
 * Plugin Name: 			ICustomizer
 * Plugin URI:  			https://dev.informatux.com/wordpress-icustomizer
 * Description: 			Sécurité du front et personnalisation de votre administration sous Wordpress
 * Version:     			1.6.6
 * Author:      			DEV By INFORMATUX
 * Author URI:  			https://dev.informatux.com
 * Text Domain: 			icustomizer
 * Domain Path:				/languages
 * License:     			GPL-3.0+
 * License URI: 			http://www.gnu.org/licenses/gpl-3.0.txt
 * Requires at least:		5.9
 * Tested up to:			6.6
 * Requires PHP:			7.4
 *
 * ██╗███╗   ██╗███████╗ ██████╗ ██████╗ ███╗   ███╗ █████╗ ████████╗██╗   ██╗██╗  ██╗
 * ██║████╗  ██║██╔════╝██╔═══██╗██╔══██╗████╗ ████║██╔══██╗╚══██╔══╝██║   ██║╚██╗██╔╝
 * ██║██╔██╗ ██║█████╗  ██║   ██║██████╔╝██╔████╔██║███████║   ██║   ██║   ██║ ╚███╔╝
 * ██║██║╚██╗██║██╔══╝  ██║   ██║██╔══██╗██║╚██╔╝██║██╔══██║   ██║   ██║   ██║ ██╔██╗
 * ██║██║ ╚████║██║     ╚██████╔╝██║  ██║██║ ╚═╝ ██║██║  ██║   ██║   ╚██████╔╝██╔╝ ██╗
 * ╚═╝╚═╝  ╚═══╝╚═╝      ╚═════╝ ╚═╝  ╚═╝╚═╝     ╚═╝╚═╝  ╚═╝   ╚═╝    ╚═════╝ ╚═╝  ╚═╝
 * 
 */

/** Blocking direct access to plugin
=================================================== */
defined('ABSPATH') or die('Are you crazy!');

/** Define constants
=================================================== */
defined('ICUSTOMIZER_PATH') or define('ICUSTOMIZER_PATH', plugin_dir_path(__FILE__));
defined('ICUSTOMIZER_URL') or define('ICUSTOMIZER_URL', plugin_dir_url(__FILE__));
defined('ICUSTOMIZER_BASE') or define('ICUSTOMIZER_BASE', plugin_basename(__FILE__));
defined('ICUSTOMIZER_NAME') or define('ICUSTOMIZER_NAME', 'ICUSTOMIZER');
defined('ICUSTOMIZER_ID') or define('ICUSTOMIZER_ID', 'icustomizer');
defined('ICUSTOMIZER_ID_LANGUAGES') or define('ICUSTOMIZER_ID_LANGUAGES', 'icustomizer-translate');
defined('ICUSTOMIZER_COOKIE') or define('ICUSTOMIZER_COOKIE', 'icustomizerCookie');

/** ICustomizer Get Infos
=================================================== */
if ( ! function_exists( 'get_plugin_data' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
if ( ! function_exists('icustomizer_get_version') ) {
	function icustomizer_get_version( $icustomizer_infos = 'Version' ) {	
		/* *************************************************************************************
		 * Name - Name of the plugin, must be unique.
		 * Title - Title of the plugin and the link to the plugin's web site.
		 * Description - Description of what the plugin does and/or notes from the author.
		 * Author - The author's name
		 * AuthorURI - The authors web site address.
		 * Version - The plugin version number.
		 * PluginURI - Plugin web site address.
		 * TextDomain - Plugin's text domain for localization.
		 * DomainPath - Plugin's relative directory path to .mo files.
		 * Network - Boolean. Whether the plugin can only be activated network wide.
		 * ********************************************************************************** */
		$plugin_data = get_plugin_data( __FILE__ );
		$plugin_version = $plugin_data[ "$icustomizer_infos" ];
		return $plugin_version;
	}
}

/** Load plugin translations
=================================================== */
add_action( 'plugins_loaded', 'icustomizer_translate_load_textdomain', 1 );
if ( ! function_exists( 'icustomizer_translate_load_textdomain' ) ) {
	function icustomizer_translate_load_textdomain() {
		$path = basename( dirname( __FILE__ ) ) . '/languages/';
		load_plugin_textdomain( ICUSTOMIZER_ID_LANGUAGES, false, $path );
	}
}

/** ICUSTOMIZER Framework
=================================================== */
// --- Framework Path / URL
defined('FRAMEWORK_ICUSTOMIZER_PATH') or define('FRAMEWORK_ICUSTOMIZER_PATH', ICUSTOMIZER_PATH . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR);
defined('FRAMEWORK_ICUSTOMIZER_URL') or define('FRAMEWORK_ICUSTOMIZER_URL', ICUSTOMIZER_URL . 'core/');
$icustomizerFrameworkExist = FRAMEWORK_ICUSTOMIZER_PATH . "framework.php";
if (file_exists($icustomizerFrameworkExist)) {
	require_once($icustomizerFrameworkExist);
	$icustomizer_framework = new icustomizer_framework( ICUSTOMIZER_ID );
}

/** Initialize plugin Files
=================================================== */
$icustomizerFiles = ['system', 'style', 'functions', 'menu'];
foreach ($icustomizerFiles as $icustomizerFile) {
	$icustomizerFileExist = ICUSTOMIZER_PATH . ICUSTOMIZER_ID . '-' . $icustomizerFile . '.php';
	if (file_exists($icustomizerFileExist))
		require_once($icustomizerFileExist);
}

/** Create tab's plugin
============================================= */
$icustomizerOptions = [ 'general', 'dashboard', 'customcssbackend', 'customcsssite', 'customjs', 'editor', 'login', 'pot', 'security', 'credits' ];
foreach ($icustomizerOptions as $icustomizerOption) {
	$icustomizerOptionFile = ICUSTOMIZER_PATH . 'includes/' . ICUSTOMIZER_ID . '-' . $icustomizerOption . '.php';
	if (file_exists($icustomizerOptionFile)) require_once($icustomizerOptionFile);
}

/** ICustomizer Meta links in plugins page
=================================================== */
add_filter( 'plugin_row_meta', 'icustomizer_plugin_row_meta', 10, 2 );
if ( ! function_exists('icustomizer_plugin_row_meta') ) {
	function icustomizer_plugin_row_meta( $links, $file ) {
		if (strpos($file, ICUSTOMIZER_BASE) !== false) {
			$new_links = array(
                'doc' => '<a href="https://dev.informatux.com/wordpress-icustomizer" target="_blank"><span class="dashicons dashicons-book-alt"></span>' . __( 'Documentation', ICUSTOMIZER_ID_LANGUAGES ) . '</a>'
			);
			
			$links = array_merge($links, $new_links);
		}
		
		return $links;
	}
}

?>