<?php
/** Blocking direct access to plugin
=================================================== */
defined('ABSPATH') or die('Are you crazy!');

/** ICUSTOMIZER Admin Menu / Submenus
=================================================== */
add_action('admin_menu', 'icustomizer_add_pages');

/** Menu
=================================================== */
if (!function_exists("icustomizer_add_pages")) {
    function icustomizer_add_pages() {
        // Menu page
        // Position in menu (Default: bottom of menu structure):
        // 2  – Dashboard
        // 4  – Separator
        // 5  – Posts
        // 10 – Media
        // 15 – Links
        // 20 – Pages
        // 25 – Comments
        // 59 – Separator
        // 60 – Appearance
        // 65 – Plugins
        // 70 – Users
        // 75 – Tools
        // 80 – Settings
        // 99 – Separator

        add_menu_page(
             ICUSTOMIZER_NAME . ' - ' . __( 'Start', ICUSTOMIZER_ID_LANGUAGES ) // The text to be displayed in the title tags of the page when the menu is selected
            ,ICUSTOMIZER_NAME // The text to be used for the menu
            ,'manage_options' // 	The capability required for this menu to be displayed to the user
            ,ICUSTOMIZER_ID // The slug name to refer to this menu by. Should be unique.
            ,'icustomizer_general' // The function to be called to output the content for this page
            ,'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAABpklEQVQ4ja1Uy62DMBD0wRvlSAkpgRIoISWkBEpIB5TwSkgJKcEney3MsiVQAu/gD3aAhEixhMRnPMzOjleII0txBbqvQff1IfzRBTjcAGkGpBkMtb8jNtRGYqnd/XsGxZW09ABLXf5aWnokxTg+czxY6gDHp1Bc7fIWBHZUUrs72FEtpMs3MNS+4vdLttStSWgCOyqw1EV1K4zHdbvEnjxTaEeVkpCVCrqvX3FvrRBCCKndPQdLdE1QPEWPJbqmEHEkKREs0TWeNBKWl0TXnJEv0a41k+IKcLh5pcG/0IikyNIktbuDoTb9KJAtno9P34PhJhRX3q+tRiiutrKbZ3qJ28t+3dfbxEh/OXHuYeoB0nxGvuTPBfFbK5A4Rc5QG0g4xyxZDlYYajcTkjbqvpboms3MIs0nM1zPyJfgOX+MW+YhCyGiVZwfmJMZrr5SX+Hn+ZGBY7ln5Ev8Fu9B9/Xh4/zamCKzYTClPmxle/dIb6gNtvAGybQaUG9VK67iwClmQzHhyhEZf5As+2YVh+DTFPtmncxwXRQPt58RCxFip/v6aMn/MTmNvGNrwT4AAAAASUVORK5CYII=' // The URL to the icon to be used for this menu
            ,65 // The position in the menu order this item should appear
        );
    
        // Submenu: Dashboard
        add_submenu_page( ICUSTOMIZER_ID, ICUSTOMIZER_NAME . ' - ' . __( 'General Options', ICUSTOMIZER_ID_LANGUAGES ), __( 'General Options', ICUSTOMIZER_ID_LANGUAGES ), 'manage_options', 'icustomizer-general', 'icustomizer_general');    
        // Submenu: Options
        add_submenu_page( ICUSTOMIZER_ID, ICUSTOMIZER_NAME . ' - ' . __( 'Dashboard Options', ICUSTOMIZER_ID_LANGUAGES ), __( 'Dashboard Options', ICUSTOMIZER_ID_LANGUAGES ), 'manage_options', 'icustomizer-dashboard', 'icustomizer_dashboard');
        // Submenu: custom CSS site
        add_submenu_page( ICUSTOMIZER_ID, ICUSTOMIZER_NAME . ' - ' . __( 'Custom CSS Site', ICUSTOMIZER_ID_LANGUAGES ), __( 'Custom CSS Site', ICUSTOMIZER_ID_LANGUAGES ), 'manage_options', 'icustomizer-customcsssite', 'icustomizer_customcsssite');
        // Submenu: custom CSS backend
        add_submenu_page( ICUSTOMIZER_ID, ICUSTOMIZER_NAME . ' - ' . __( 'Custom CSS Backend', ICUSTOMIZER_ID_LANGUAGES ), __( 'Custom CSS Backend', ICUSTOMIZER_ID_LANGUAGES ), 'manage_options', 'icustomizer-customcssbackend', 'icustomizer_customcssbackend');
        // Submenu: custom JS
        add_submenu_page( ICUSTOMIZER_ID, ICUSTOMIZER_NAME . ' - ' . __( 'Custom JS Options', ICUSTOMIZER_ID_LANGUAGES ), __( 'Custom JS Options', ICUSTOMIZER_ID_LANGUAGES ), 'manage_options', 'icustomizer-customjs', 'icustomizer_customjs');
        // Submenu: Editor
        add_submenu_page( ICUSTOMIZER_ID, ICUSTOMIZER_NAME . ' - ' . __( 'Editor Options', ICUSTOMIZER_ID_LANGUAGES ), __( 'Editor Options', ICUSTOMIZER_ID_LANGUAGES ), 'manage_options', 'icustomizer-editor', 'icustomizer_editor');
        // Submenu: Login
        add_submenu_page( ICUSTOMIZER_ID, ICUSTOMIZER_NAME . ' - ' . __( 'Login Options', ICUSTOMIZER_ID_LANGUAGES ), __( 'Login Options', ICUSTOMIZER_ID_LANGUAGES ), 'manage_options', 'icustomizer-login', 'icustomizer_login');
        // Submenu: Security
        add_submenu_page( ICUSTOMIZER_ID, ICUSTOMIZER_NAME . ' - ' . __( 'Security Options', ICUSTOMIZER_ID_LANGUAGES ), __( 'Security Options', ICUSTOMIZER_ID_LANGUAGES ), 'manage_options', 'icustomizer-security', 'icustomizer_security');
        // Submenu: Credits
        add_submenu_page( ICUSTOMIZER_ID, ICUSTOMIZER_NAME . ' - ' . __( 'Credits', ICUSTOMIZER_ID_LANGUAGES ), __( 'Credits', ICUSTOMIZER_ID_LANGUAGES ), 'manage_options', 'icustomizer-credits', 'icustomizer_credits');
    }
}

/** Initialize Nav Tabs
=================================================== */
if (!function_exists("icustomizer_nav_tabs")) {
	function icustomizer_nav_tabs() {
		$icustomizer_nav_tabs = [
			 ICUSTOMIZER_ID . "-general"          => __( 'General Options', ICUSTOMIZER_ID_LANGUAGES )
			,ICUSTOMIZER_ID . "-dashboard"        => __( 'Dashboard Options', ICUSTOMIZER_ID_LANGUAGES )
			,ICUSTOMIZER_ID . "-customcsssite"    => __( 'Custom CSS Site', ICUSTOMIZER_ID_LANGUAGES )
			,ICUSTOMIZER_ID . "-customcssbackend" => __( 'Custom CSS Backend', ICUSTOMIZER_ID_LANGUAGES )
			,ICUSTOMIZER_ID . "-customjs"         => __( 'Custom JS Options', ICUSTOMIZER_ID_LANGUAGES )
			,ICUSTOMIZER_ID . "-editor"           => __( 'Editor Options', ICUSTOMIZER_ID_LANGUAGES )
			,ICUSTOMIZER_ID . "-login"            => __( 'Login Options', ICUSTOMIZER_ID_LANGUAGES )
			,ICUSTOMIZER_ID . "-security"         => __( 'Security Options', ICUSTOMIZER_ID_LANGUAGES )
			,ICUSTOMIZER_ID . "-credits"          => __( 'Credits', ICUSTOMIZER_ID_LANGUAGES )
		];
		return $icustomizer_nav_tabs;
	}
}

?>