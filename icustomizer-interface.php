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
        'icon' => 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjAiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjYiIGhlaWdodD0iMjYiIHZpZXdCb3g9IjAgMCAyNiAyNiIgZmlsbD0iI2MwMzkyYiIgPiAgICA8cGF0aCBkPSJNIDExLjQ2ODc1IDAuOTY4NzUgTCAxMC45MDYyNSA0LjUzMTI1IEMgMTAuMDUyMjUgNC43NDEyNSA5LjIzNCA1LjA1OSA4LjUgNS41IEwgNS41NjI1IDMuNDA2MjUgTCAzLjQzNzUgNS41MzEyNSBMIDUuNSA4LjQ2ODc1IEMgNS4wNTUgOS4yMDU3NSA0LjcxNSAxMC4wMTUgNC41IDEwLjg3NSBMIDAuOTY4NzUgMTEuNDY4NzUgTCAwLjk2ODc1IDE0LjQ2ODc1IEwgNC41IDE1LjA5Mzc1IEMgNC43MTMgMTUuOTUxNzUgNS4wNTMgMTYuNzYyIDUuNSAxNy41IEwgMy40MDYyNSAyMC40Mzc1IEwgNS41MzEyNSAyMi41NjI1IEwgOC40Njg3NSAyMC41IEMgOS4yMDQ3NSAyMC45NDIgMTAuMDIgMjEuMjU3NzUgMTAuODc1IDIxLjQ2ODc1IEwgMTEuNDY4NzUgMjUuMDMxMjUgTCAxNC40Njg3NSAyNS4wMzEyNSBMIDE1LjEyNSAyMS40Njg3NSBDIDE1Ljk3NiAyMS4yNTM3NSAxNi43NyAyMC45MTI3NSAxNy41IDIwLjQ2ODc1IEwgMjAuNDY4NzUgMjIuNTYyNSBMIDIyLjU5Mzc1IDIwLjQzNzUgTCAyMC40Njg3NSAxNy41IEMgMjAuOTA2NzUgMTYuNzcgMjEuMjU4NzUgMTUuOTc0IDIxLjQ2ODc1IDE1LjEyNSBMIDI1LjAzMTI1IDE0LjQ2ODc1IEwgMjUuMDMxMjUgMTEuNDY4NzUgTCAyMS40Njg3NSAxMC44NzUgQyAyMS4yNTY3NSAxMC4wMjYgMjAuOTA2NzUgOS4yMyAyMC40Njg3NSA4LjUgTCAyMi41NjI1IDUuNTMxMjUgTCAyMC40Mzc1IDMuNDA2MjUgTCAxNy41IDUuNTMxMjUgQyAxNi43NjggNS4wODgyNSAxNS45NDg3NSA0Ljc0NDI1IDE1LjA5Mzc1IDQuNTMxMjUgTCAxNC40Njg3NSAwLjk2ODc1IEwgMTEuNDY4NzUgMC45Njg3NSB6IE0gMTMgNi40Njg3NSBDIDE2LjYwNCA2LjQ2ODc1IDE5LjUzMTI1IDkuMzk2IDE5LjUzMTI1IDEzIEMgMTkuNTMxMjUgMTYuNjA0IDE2LjYwNCAxOS41MzEyNSAxMyAxOS41MzEyNSBDIDkuMzk2IDE5LjUzMTI1IDYuNDY4NzUgMTYuNjAzIDYuNDY4NzUgMTMgQyA2LjQ2ODc1IDkuMzk3IDkuMzk2IDYuNDY4NzUgMTMgNi40Njg3NSB6IE0gMTMgOC4wNjI1IEMgMTAuMjgyIDguMDYyNSA4LjA2MjUgMTAuMjgyIDguMDYyNSAxMyBDIDguMDYyNSAxNS43MTggMTAuMjgyIDE3LjkzNzUgMTMgMTcuOTM3NSBDIDE1LjcxOCAxNy45Mzc1IDE3LjkzNzUgMTUuNzE4IDE3LjkzNzUgMTMgQyAxNy45Mzc1IDEwLjI4MiAxNS43MTggOC4wNjI1IDEzIDguMDYyNSB6IE0gMTIuOTY4NzUgMTAuOTM3NSBDIDE0LjExNDc1IDEwLjkzNzUgMTUuMDYyNSAxMS44NTMgMTUuMDYyNSAxMyBDIDE1LjA2MjUgMTQuMTQ2IDE0LjExNDc1IDE1LjA2MjUgMTIuOTY4NzUgMTUuMDYyNSBDIDExLjgyMjc1IDE1LjA2MjUgMTAuOTA2MjUgMTQuMTQ2IDEwLjkwNjI1IDEzIEMgMTAuOTA2MjUgMTEuODUzIDExLjgyMjc1IDEwLjkzNzUgMTIuOTY4NzUgMTAuOTM3NSB6Ij48L3BhdGg+PC9zdmc+',
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

