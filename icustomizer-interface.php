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
        'icon' => 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjAiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNTAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCA1MCA1MCIgZmlsbD0iIzY2NjY2NiIgPiAgICA8cGF0aCBzdHlsZT0idGV4dC1pbmRlbnQ6MDt0ZXh0LWFsaWduOnN0YXJ0O2xpbmUtaGVpZ2h0Om5vcm1hbDt0ZXh0LXRyYW5zZm9ybTpub25lO2Jsb2NrLXByb2dyZXNzaW9uOnRiOy1pbmtzY2FwZS1mb250LXNwZWNpZmljYXRpb246Qml0c3RyZWFtIFZlcmEgU2FucyIgZD0iTSAyMS4wOTM3NSAwIEwgMjAuOTY4NzUgMC44NDM3NSBMIDE5LjkwNjI1IDcuNDA2MjUgQyAxOC41OTUzODcgNy43ODI2ODgzIDE3LjMzMDUxMiA4LjI2MjE3MjMgMTYuMTU2MjUgOC45MDYyNSBMIDEwLjc1IDUuMDYyNSBMIDEwLjA2MjUgNC41NjI1IEwgOS40Njg3NSA1LjE1NjI1IEwgNS4yMTg3NSA5LjQwNjI1IEwgNC42MjUgMTAgTCA1LjEyNSAxMC42ODc1IEwgOC45MDYyNSAxNi4xMjUgQyA4LjI1NTg3NjkgMTcuMzAxODEzIDcuNzU5OTI2NCAxOC41NTcyNjggNy4zNzUgMTkuODc1IEwgMC44NDM3NSAyMC45Njg3NSBMIDAgMjEuMDkzNzUgTCAwIDIxLjk2ODc1IEwgMCAyNy45Njg3NSBMIDAgMjguNzgxMjUgTCAwLjgxMjUgMjguOTM3NSBMIDcuMzQzNzUgMzAuMDkzNzUgQyA3LjcyNzA1MTUgMzEuNDExMzY5IDguMjUzMzQ1MyAzMi42NjQ4OTkgOC45MDYyNSAzMy44NDM3NSBMIDUuMDYyNSAzOS4yNSBMIDQuNTYyNSAzOS45Mzc1IEwgNS4xNTYyNSA0MC41MzEyNSBMIDkuNDA2MjUgNDQuNzgxMjUgTCAxMCA0NS4zNzUgTCAxMC42ODc1IDQ0Ljg3NSBMIDE2LjA5Mzc1IDQxLjA2MjUgQyAxNy4yNzg0NDIgNDEuNzE2ODkgMTguNTUxMDY0IDQyLjIxMDYzNSAxOS44NzUgNDIuNTkzNzUgTCAyMC45Njg3NSA0OS4xNTYyNSBMIDIxLjA5Mzc1IDUwIEwgMjEuOTM3NSA1MCBMIDI3LjkzNzUgNTAgTCAyOC43ODEyNSA1MCBMIDI4LjkzNzUgNDkuMTg3NSBMIDMwLjA5Mzc1IDQyLjYyNSBDIDMxLjQwOTA5NiA0Mi4yMzkyMDUgMzIuNjM2MzY0IDQxLjY4NDk0MyAzMy44MTI1IDQxLjAzMTI1IEwgMzkuMzEyNSA0NC44NzUgTCA0MCA0NS4zNzUgTCA0MC41OTM3NSA0NC43ODEyNSBMIDQ0Ljg0Mzc1IDQwLjUzMTI1IEwgNDUuNDM3NSAzOS45Mzc1IEwgNDQuOTM3NSAzOS4yMTg3NSBMIDQxLjAzMTI1IDMzLjgxMjUgQyA0MS42NzA4MyAzMi42NDgyNzUgNDIuMTg1Nzc2IDMxLjM5MjkxNyA0Mi41NjI1IDMwLjA5Mzc1IEwgNDkuMTg3NSAyOC45Mzc1IEwgNTAgMjguNzgxMjUgTCA1MCAyNy45Njg3NSBMIDUwIDIxLjk2ODc1IEwgNTAgMjEuMDkzNzUgTCA0OS4xNTYyNSAyMC45Njg3NSBMIDQyLjU5Mzc1IDE5LjkwNjI1IEMgNDIuMjE0MzAxIDE4LjU5NjMyOSA0MS42NzU4MTMgMTcuMzYwOTMxIDQxLjAzMTI1IDE2LjE4NzUgTCA0NC44NzUgMTAuNjg3NSBMIDQ1LjM3NSAxMCBMIDQ0Ljc4MTI1IDkuNDA2MjUgTCA0MC41MzEyNSA1LjE1NjI1IEwgMzkuOTM3NSA0LjU2MjUgTCAzOS4yMTg3NSA1LjA2MjUgTCAzMy44NDM3NSA4LjkzNzUgQyAzMi42Njg1MzkgOC4yODQ0NTIzIDMxLjQxMTI1NCA3Ljc5MDY3MzMgMzAuMDkzNzUgNy40MDYyNSBMIDI4LjkzNzUgMC44MTI1IEwgMjguNzgxMjUgMCBMIDI3LjkzNzUgMCBMIDIxLjkzNzUgMCBMIDIxLjA5Mzc1IDAgeiBNIDIyLjgxMjUgMiBMIDI3LjEyNSAyIEwgMjguMjE4NzUgOC4yODEyNSBMIDI4LjMxMjUgOC45MDYyNSBMIDI4Ljk2ODc1IDkuMDYyNSBDIDMwLjU3MzE1MyA5LjQ2MTk1MjEgMzIuMDYxNzUgMTAuMTA0NTEyIDMzLjQzNzUgMTAuOTM3NSBMIDM0IDExLjI4MTI1IEwgMzQuNTMxMjUgMTAuOTA2MjUgTCAzOS42ODc1IDcuMTg3NSBMIDQyLjc1IDEwLjIxODc1IEwgMzkuMDkzNzUgMTUuNDY4NzUgTCAzOC43MTg3NSAxNiBMIDM5LjAzMTI1IDE2LjU2MjUgQyAzOS44NTU3MzYgMTcuOTM0NDQ0IDQwLjQ3NTk3NCAxOS40MzYwODkgNDAuODc1IDIxLjAzMTI1IEwgNDEuMDYyNSAyMS42NTYyNSBMIDQxLjY4NzUgMjEuNzgxMjUgTCA0OCAyMi44MTI1IEwgNDggMjcuMTI1IEwgNDEuNjg3NSAyOC4yMTg3NSBMIDQxLjAzMTI1IDI4LjM0Mzc1IEwgNDAuODc1IDI4Ljk2ODc1IEMgNDAuNDgwMDc4IDMwLjU2MjU3NSAzOS44NTU1MjcgMzIuMDY1OTAyIDM5LjAzMTI1IDMzLjQzNzUgTCAzOC43MTg3NSAzNCBMIDM5LjA5Mzc1IDM0LjUzMTI1IEwgNDIuODEyNSAzOS43MTg3NSBMIDM5Ljc4MTI1IDQyLjc1IEwgMzQuNTMxMjUgMzkuMDkzNzUgTCAzNCAzOC43MTg3NSBMIDMzLjQzNzUgMzkuMDYyNSBDIDMyLjA2OTI1OSAzOS44OTUzMDIgMzAuNTY3NTQ0IDQwLjUzMTkwNiAyOC45Njg3NSA0MC45Mzc1IEwgMjguMzQzNzUgNDEuMDkzNzUgTCAyOC4yMTg3NSA0MS43MTg3NSBMIDI3LjEyNSA0OCBMIDIyLjc4MTI1IDQ4IEwgMjEuNzUgNDEuNzUgTCAyMS42NTYyNSA0MS4wOTM3NSBMIDIxIDQwLjkzNzUgQyAxOS4zOTM4ODkgNDAuNTQwNjg1IDE3Ljg4MzgxOSAzOS45MjUxNzMgMTYuNSAzOS4wOTM3NSBMIDE1Ljk2ODc1IDM4Ljc1IEwgMTUuNDA2MjUgMzkuMTI1IEwgMTAuMjE4NzUgNDIuNzUgTCA3LjE4NzUgMzkuNjg3NSBMIDEwLjg0Mzc1IDM0LjU2MjUgTCAxMS4yMTg3NSAzNC4wMzEyNSBMIDEwLjkwNjI1IDMzLjQ2ODc1IEMgMTAuMDY2MTc3IDMyLjA4MDg4NiA5LjQwMDUwODYgMzAuNTgxMTUxIDkgMjguOTY4NzUgTCA4Ljg0Mzc1IDI4LjM0Mzc1IEwgOC4yMTg3NSAyOC4yMTg3NSBMIDIgMjcuMTI1IEwgMiAyMi44MTI1IEwgOC4yMTg3NSAyMS43ODEyNSBMIDguODc1IDIxLjY1NjI1IEwgOS4wMzEyNSAyMS4wMzEyNSBDIDkuNDM2MDEyNSAxOS40MTMxNDMgMTAuMDY5MDYyIDE3Ljg4NTg4NSAxMC45MDYyNSAxNi41IEwgMTEuMjUgMTUuOTM3NSBMIDEwLjg3NSAxNS40MDYyNSBMIDcuMjUgMTAuMjE4NzUgTCAxMC4yODEyNSA3LjE4NzUgTCAxNS40Mzc1IDEwLjg0Mzc1IEwgMTUuOTY4NzUgMTEuMjUgTCAxNi41MzEyNSAxMC45MDYyNSBDIDE3LjkwODYyMSAxMC4wNzgzMjIgMTkuNDI0MTI4IDkuNDU2NzM1MyAyMS4wMzEyNSA5LjA2MjUgTCAyMS42ODc1IDguOTA2MjUgTCAyMS43ODEyNSA4LjI1IEwgMjIuODEyNSAyIHogTSAyNSAxNiBDIDIwLjA0MTQ4NCAxNiAxNiAyMC4wNDE0ODQgMTYgMjUgQyAxNiAyOS45NTg1MTYgMjAuMDQxNDg0IDM0IDI1IDM0IEMgMjkuOTU4NTE2IDM0IDM0IDI5Ljk1ODUxNiAzNCAyNSBDIDM0IDIwLjA0MTQ4NCAyOS45NTg1MTYgMTYgMjUgMTYgeiBNIDI1IDE4IEMgMjguODc3NDg0IDE4IDMyIDIxLjEyMjUxNiAzMiAyNSBDIDMyIDI4Ljg3NzQ4NCAyOC44Nzc0ODQgMzIgMjUgMzIgQyAyMS4xMjI1MTYgMzIgMTggMjguODc3NDg0IDE4IDI1IEMgMTggMjEuMTIyNTE2IDIxLjEyMjUxNiAxOCAyNSAxOCB6IiBjb2xvcj0iIzAwMCIgb3ZlcmZsb3c9InZpc2libGUiIGVuYWJsZS1iYWNrZ3JvdW5kPSJhY2N1bXVsYXRlIiBmb250LWZhbWlseT0iQml0c3RyZWFtIFZlcmEgU2FucyI+PC9wYXRoPjwvc3ZnPg==',
        'id' => ICUSTOMIZER_ID,
            ) );


    // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // Create option panel tabs              -=
    // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $generalTab = $icustomizer_panel->createTab( array(
        'name' => __( 'General Options', ICUSTOMIZER_ID_LANGUAGES ),
            ) );
    $dashboardTab = $icustomizer_panel->createTab( array(
        'name' => __( 'Dashboard Options', ICUSTOMIZER_ID_LANGUAGES ),
            ) );
    $customcssTab = $icustomizer_panel->createTab( array(
        'name' => __( 'Custom CSS Options', ICUSTOMIZER_ID_LANGUAGES ),
            ) );
    $customjsTab = $icustomizer_panel->createTab( array(
        'name' => __( 'Custom JS Options', ICUSTOMIZER_ID_LANGUAGES ),
            ) );
    $editorTab = $icustomizer_panel->createTab( array(
        'name' => __( 'Editor Options', ICUSTOMIZER_ID_LANGUAGES ),
            ) );
    $loginTab = $icustomizer_panel->createTab( array(
        'name' => __( 'Login Options', ICUSTOMIZER_ID_LANGUAGES ),
            ) );
    $securityTab = $icustomizer_panel->createTab( array(
        'name' => __( 'Security Options', ICUSTOMIZER_ID_LANGUAGES ),
            ) );
    $creditsTab = $icustomizer_panel->createTab( array(
        'name' => __( 'Credits', ICUSTOMIZER_ID_LANGUAGES ),
            ) );
			
	// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	// Create tab's options                  -=
	// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$icustomizerOptions = array('general', 'dashboard', 'login', 'customcss', 'customjs', 'editor', 'security', 'credits');
	foreach ($icustomizerOptions as $icustomizerOption) {
		require_once(ICUSTOMIZER_PATH . 'includes/' . ICUSTOMIZER_ID . '-options-' . $icustomizerOption . '.php');
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

