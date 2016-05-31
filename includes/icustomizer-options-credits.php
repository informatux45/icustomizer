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
	'desc' => __( '<img width="96" height="96" class="icustomizer-credits" src="' . ICUSTOMIZER_URL . '/images/avatar-informatux.png" alt=""><br>' . __( 'Developed and maintened by', ICUSTOMIZER_ID_LANGUAGES ) . ' <a href="http://informatux.com" target="_blank">INFORMATUX</a><br>' . __( 'Written with ', ICUSTOMIZER_ID_LANGUAGES ) . '<a href="http://www.titanframework.net/" target="_blank">Titan Framework</a>', ICUSTOMIZER_ID_LANGUAGES )
) );