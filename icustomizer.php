<?php
/**
 * ICustomizer
 *
 * @package     ICustomizer
 * @author      INFORMATUX
 * @copyright   2016 INFORMATUX
 * @license     GPL-3.0+
 *
 * @wordpress-plugin
 * Plugin Name: ICustomizer
 * Plugin URI:  http://informatux.com/category/WORDPRESS
 * Description: Sécurité du front et personnalisation de votre administration sous Wordpress.
 * Version:     1.0.0
 * Author:      INFORMATUX
 * Author URI:  http://informatux.com
 * Text Domain: plugin-name
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Blocking direct access to plugin      -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
defined('ABSPATH') or die('Are you crazy!');


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Define constants                      -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
defined('ICUSTOMIZER_PATH') or define('ICUSTOMIZER_PATH', plugin_dir_path(__FILE__));
defined('ICUSTOMIZER_URL') or define('ICUSTOMIZER_URL', plugin_dir_url(__FILE__));
defined('ICUSTOMIZER_BASE') or define('ICUSTOMIZER_BASE', plugin_basename(__FILE__));
defined('ICUSTOMIZER_NAME') or define('ICUSTOMIZER_NAME', 'ICustomizer');
defined('ICUSTOMIZER_ID') or define('ICUSTOMIZER_ID', 'icustomizer');
defined('ICUSTOMIZER_ID_LANGUAGES') or define('ICUSTOMIZER_ID_LANGUAGES', 'icustomizer-translate');
defined('ICUSTOMIZER_COOKIE') or define('ICUSTOMIZER_COOKIE', 'icustomizerCookie');


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Load plugin translations              -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
function icustomizer_translate_load_textdomain() {
    $path = basename( dirname( __FILE__ ) ) . '/languages/';
    load_plugin_textdomain( ICUSTOMIZER_ID_LANGUAGES, false, $path );
}
add_action( 'plugins_loaded', 'icustomizer_translate_load_textdomain', 1 );


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Load plugin files                     -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
require_once(ICUSTOMIZER_PATH . 'lib/titan-framework/titan-framework-embedder.php');

$icustomizerFiles = array('interface', 'style', 'functions');
foreach ($icustomizerFiles as $icustomizerFile) {
    require_once(ICUSTOMIZER_PATH . ICUSTOMIZER_ID . '-' . $icustomizerFile . '.php');
}


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//        ICustomizer Meta links         -=
//            in plugins page            -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
function icustomizer_plugin_row_meta( $links, $file ) {
	if (strpos($file, ICUSTOMIZER_BASE) !== false) {
		$new_links = array(
			'donate' => '<a href="//informatux.com/donate" target="_blank"><span class="dashicons dashicons-star-filled"></span>Donate</a>',
			'doc' => '<a href="//informatux.com/index.php?category=wordpress" target="_blank"><span class="dashicons dashicons-book-alt"></span>Documentation</a>'
		);
		
		$links = array_merge($links, $new_links);
	}
	
	return $links;
}
add_filter( 'plugin_row_meta', 'icustomizer_plugin_row_meta', 10, 2 );
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//        ICustomizer Get Infos          -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
if ( ! function_exists( 'get_plugin_data' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
	function icustomizer_get_version( $icustomizer_infos = 'Version' ) {

		/* *************************************************************************************
		 *
		 * 'Name' - Name of the plugin, must be unique.
		 * 'Title' - Title of the plugin and the link to the plugin's web site.
		 * 'Description' - Description of what the plugin does and/or notes from the author.
		 * 'Author' - The author's name
		 * 'AuthorURI' - The authors web site address.
		 * 'Version' - The plugin version number.
		 * 'PluginURI' - Plugin web site address.
		 * 'TextDomain' - Plugin's text domain for localization.
		 * 'DomainPath' - Plugin's relative directory path to .mo files.
		 * 'Network' - Boolean. Whether the plugin can only be activated network wide.
		 *
		 * ********************************************************************************** */

		$plugin_data = get_plugin_data( __FILE__ );
		$plugin_version = $plugin_data[ "$icustomizer_infos" ];
		return $plugin_version;
	}
}
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

?>