<?php
/*
Plugin Name: ICustomizer
Plugin URI: http://www.informatux.com
Description: Un plugin de personnalisation de votre administration sous Wordpress
Version: 1.0.0
Author: INFORMATUX
Author URI: //www.informatux.com/
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// blocking direct access to plugin      -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once( 'includes/titan-framework-checker.php' );

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//        ICustomizer Meta links         -=
//            in plugins page            -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
function icustomizer_plugin_row_meta( $links, $file ) {
	if ( strpos( $file, 'icustomizer.php' ) !== false ) {
		$new_links = array(
			'donate' => '<a href="//informatux.com/donate" target="_blank">Donate</a>',
			'doc' => '<a href="//informatux.com/icustomizer" target="_blank">Documentation</a>'
		);
		
		$links = array_merge( $links, $new_links );
	}
	
	return $links;
}
add_filter( 'plugin_row_meta', 'icustomizer_plugin_row_meta', 10, 2 );
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//           ICustomizer Widget
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
class icustomizer_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct('inf_customizer_wg', 'ICustomizer WIDGET', array('description' => 'Un widget ICustomizer.'));
    }

    public function widget_icustomizer_retail($args, $instance) {
        echo 'widget ICustomizer';
    }

	public function form($instance) {	
		$title = isset($instance['title']) ? $instance['title'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo  $title; ?>" />
		</p>
		<?php
	}
	
	public function widget($args, $instance) {
		echo $args['before_widget'];
		echo $args['before_title'];
		echo apply_filters('widget_title', $instance['title']);
		echo $args['after_title'];
		?>
		<form action="" method="post">
			<p>
				<label for="zero_newsletter_email">Votre email :</label>
				<input id="zero_newsletter_email" name="zero_newsletter_email" type="email"/>
			</p>
			<input type="submit"/>
		</form>
		<?php
		echo $args['after_widget'];
	}
}

add_action('widgets_init', function( ) {
	register_widget('icustomizer_Widget');
});

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Le Hook pour ajouter l'action dans la pile WP
add_action( 'admin_menu', 'my_plugin_menu' );
// Le hook pour ajouter la feuille de style
add_action( 'admin_head', 'myplugin_styles' );

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// les paramètres de la fonction
// add_options_page(
//     'My Plugin Options', // Le texte utilisé dans la balise title
//     'My Plugin',         // le texte utilisé pour le menu
//     'manage_options',    // La capacité requise pour ce menu à afficher à l'utilisateur.
//     'my-slug',           // Le texte utilisé dans l'URL (slug)
//     'my_plugin_callback' // Le nom de la fonction à appeler pour afficher la page (callback)
// );
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// --- Cette fonction ajoute tous les liens dans le menu
function my_plugin_menu() {
	// ajoute un lien dans le menu Réglages / settings
	add_options_page( 'My Plugin Options', 'ICustomizer', 'manage_options', 'myplugin-settings', 'my_settings_callback' );
	// ajoute un lien dans le menu Outils / Tools
	add_management_page( 'My Plugin Tools', 'ICustomizer', 'manage_options', 'myplugin-tools', 'my_tools_callback' );
	// ajoute un lien dans le menu / top menu
	add_menu_page( 'My Plugin Menu', 'ICustomizer', 'manage_options', 'myplugin-menu', 'my_menu_callback', plugins_url( 'icustomizer/images/icon.png' ));
	// ajoute une ou plusieurs sous page au menu 
	add_submenu_page( 'myplugin-menu', 'My Plugin submenu1', 'My Plugin', 'manage_options', 'myplugin-submenu1', 'my_submenu1_callback' );
	add_submenu_page( 'myplugin-menu', 'My Plugin submenu2', 'My Plugin', 'manage_options', 'myplugin-submenu2', 'my_submenu2_callback' );
}
// Ajout du lien vers la feuille de style personnalisée
function myplugin_styles() {
  echo '<link href="' . WP_CONTENT_URL . '/plugins/icustomizer/css/style.css" rel="stylesheet" media="all" type="text/css" />';
}
// affichage de la page Réglages / Settings
function my_settings_callback(){
	echo '<div class="wrap"><div class="icon32" id="icon-options-general"></div>'; 
        echo '<h2>INF Customizer</h2>'; 
        echo '<h3>Réglages / Settings</h3>'; 
        echo '</div>'; 
} 
// Affichage de la page Outils / Tools
function my_tools_callback(){ 
        echo '<div class="wrap"><div class="icon32" id="icon-tools"></div>'; 
        echo '<h2>ResaForm</h2>'; 
        echo '<h3>Outils / Tools</h3>'; 
        echo '</div>'; 
}

	function create_options() {
		// Initialize our instance
		$titan = TitanFramework::getInstance( 'icustomizer' );
	 
		// Create an option
		$titan->createOption( array(
			'name' => __( 'Enable Plugin', 'default' ),
			'type' => 'enable',
			'id' => 'enable'
		) );
	 
		$titan->createOption( array(
			'type' => 'save',
		) );
	}

// Affichage de la page Top menu
function my_menu_callback(){
	
	echo '<div class="wrap"><h2>ICustomizer</h2></div>';
	// Due to a limitations of variables and functions, you must globally define
	// variables inside functions.

	add_action( 'tf_create_options', 'create_options' );


	
} 
// Affichage des sous liens 1 et 2 du menu précédent
function my_submenu1_callback(){ 
        echo '<div class="wrap"><h2>My Plugin subpage 1</h2></div>'; 
} 
function my_submenu2_callback(){ 
        echo '<div class="wrap"><h2>My Plugin subpage 2</h2></div>'; 
}
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
?>