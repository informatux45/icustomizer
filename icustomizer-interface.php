<?php
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Blocking direct access to plugin      -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
defined('ABSPATH') or die('Are you crazy!');


add_action( 'tf_create_options', 'icustomizer_create_options' );
function icustomizer_create_options() {
	
	remove_filter( 'admin_footer_text', 'addTitanCreditText' );

    /***************************************************************
     * Launch options framework instance
     ***************************************************************/
    $icustomizer_option = TitanFramework::getInstance( 'icustomizer' );


    /***************************************************************
     * Create option menu item
     ***************************************************************/
    $icustomizer_panel = $icustomizer_option->createAdminPanel( array(
        'name' => ICUSTOMIZER_NAME,
        'icon' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAABpklEQVQ4ja1Uy62DMBD0wRvlSAkpgRIoISWkBEpIB5TwSkgJKcEney3MsiVQAu/gD3aAhEixhMRnPMzOjleII0txBbqvQff1IfzRBTjcAGkGpBkMtb8jNtRGYqnd/XsGxZW09ABLXf5aWnokxTg+czxY6gDHp1Bc7fIWBHZUUrs72FEtpMs3MNS+4vdLttStSWgCOyqw1EV1K4zHdbvEnjxTaEeVkpCVCrqvX3FvrRBCCKndPQdLdE1QPEWPJbqmEHEkKREs0TWeNBKWl0TXnJEv0a41k+IKcLh5pcG/0IikyNIktbuDoTb9KJAtno9P34PhJhRX3q+tRiiutrKbZ3qJ28t+3dfbxEh/OXHuYeoB0nxGvuTPBfFbK5A4Rc5QG0g4xyxZDlYYajcTkjbqvpboms3MIs0nM1zPyJfgOX+MW+YhCyGiVZwfmJMZrr5SX+Hn+ZGBY7ln5Ev8Fu9B9/Xh4/zamCKzYTClPmxle/dIb6gNtvAGybQaUG9VK67iwClmQzHhyhEZf5As+2YVh+DTFPtmncxwXRQPt58RCxFip/v6aMn/MTmNvGNrwT4AAAAASUVORK5CYII=',
        'id' => ICUSTOMIZER_ID,
		'capability' => 'manage_options',
		'desc' => '',
            ) );


    // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // Create option panel tabs              -=
    // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $generalTab = $icustomizer_panel->createTab( array(
        'name' => __( 'General Options', ICUSTOMIZER_ID_LANGUAGES ),
		'id' => 'general',
            ) );
    $dashboardTab = $icustomizer_panel->createTab( array(
        'name' => __( 'Dashboard Options', ICUSTOMIZER_ID_LANGUAGES ),
		'id' => 'dashboard',
            ) );
    $customcssTab = $icustomizer_panel->createTab( array(
        'name' => __( 'Custom CSS Options', ICUSTOMIZER_ID_LANGUAGES ),
		'id' => 'customcss',
            ) );
    $customjsTab = $icustomizer_panel->createTab( array(
        'name' => __( 'Custom JS Options', ICUSTOMIZER_ID_LANGUAGES ),
		'id' => 'customjs',
            ) );
    $editorTab = $icustomizer_panel->createTab( array(
        'name' => __( 'Editor Options', ICUSTOMIZER_ID_LANGUAGES ),
		'id' => 'editor',
            ) );
    $loginTab = $icustomizer_panel->createTab( array(
        'name' => __( 'Login Options', ICUSTOMIZER_ID_LANGUAGES ),
		'id' => 'login',
            ) );
    $securityTab = $icustomizer_panel->createTab( array(
        'name' => __( 'Security Options', ICUSTOMIZER_ID_LANGUAGES ),
		'id' => 'security',
            ) );
    $creditsTab = $icustomizer_panel->createTab( array(
        'name' => __( 'Credits', ICUSTOMIZER_ID_LANGUAGES ),
		'id' => 'credits',
            ) );
			
	// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	// Create tab's options                  -=
	// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$icustomizerOptions = ['general', 'dashboard', 'login', 'customcss', 'customjs', 'editor', 'security', 'credits'];
	foreach ($icustomizerOptions as $icustomizerOption) {
		$icustomizerOptionFile = ICUSTOMIZER_PATH . 'includes/' . ICUSTOMIZER_ID . '-options-' . $icustomizerOption . '.php';
		if (file_exists($icustomizerOptionFile))
			require_once($icustomizerOptionFile);
	}

    // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	// Launch options framework instance     -=
	// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $generalTab->createOption( array(
        'type' => 'save',
        'save' => __( 'Save Changes', ICUSTOMIZER_ID_LANGUAGES ),
        'reset' => __( 'Reset to Defaults', ICUSTOMIZER_ID_LANGUAGES ),
    ) );
    
    $dashboardTab->createOption( array(
        'type' => 'save',
        'save' => __( 'Save Changes', ICUSTOMIZER_ID_LANGUAGES ),
        'reset' => __( 'Reset to Defaults', ICUSTOMIZER_ID_LANGUAGES ),
    ) );

    $customcssTab->createOption( array(
        'type' => 'save',
        'save' => __( 'Save Changes', ICUSTOMIZER_ID_LANGUAGES ),
        'reset' => __( 'Reset to Defaults', ICUSTOMIZER_ID_LANGUAGES ),
    ) );
    
    $customjsTab->createOption( array(
        'type' => 'save',
        'save' => __( 'Save Changes', ICUSTOMIZER_ID_LANGUAGES ),
        'reset' => __( 'Reset to Defaults', ICUSTOMIZER_ID_LANGUAGES ),
    ) );

    $editorTab->createOption( array(
        'type' => 'save',
        'save' => __( 'Save Changes', ICUSTOMIZER_ID_LANGUAGES ),
        'reset' => __( 'Reset to Defaults', ICUSTOMIZER_ID_LANGUAGES ),
    ) );
	
    $loginTab->createOption( array(
        'type' => 'save',
        'save' => __( 'Save Changes', ICUSTOMIZER_ID_LANGUAGES ),
        'reset' => __( 'Reset to Defaults', ICUSTOMIZER_ID_LANGUAGES ),
    ) );
	
} // END icustomizer_create_options

