<?php
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Blocking direct access to plugin      -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
defined('ABSPATH') or die('Are you crazy!');


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Create tab's options                  -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// ----------------------------------------
// --- Security Options -------------------
// ----------------------------------------
$creditsTab->createOption( array(
	'name' => __( 'CREDITS', ICUSTOMIZER_ID_LANGUAGES ) . ' <br /><i> ' . ICUSTOMIZER_NAME . '<i>',
	'id'   => 'icustomizer_credits',
	'type' => 'note',
	'desc' => __( 'Credits ICustomizer', ICUSTOMIZER_ID_LANGUAGES )
) );