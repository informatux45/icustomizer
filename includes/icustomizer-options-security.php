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

// ----------------------------------------
// --- Check Readme & License files -------
$securityTab->createOption( array(
	'name' => __( 'Readme / License Files', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
// --- Readme.html
$icustomizer_readme_file        = ABSPATH . 'readme.html';
$icustomizer_check_readme_file  = (file_exists($icustomizer_readme_file)) ? '<span class="icustomizer-red">' . __( 'You need to delete this file', ICUSTOMIZER_ID_LANGUAGES ) . '</span>' :  '<span class="icustomizer-green">' . __( 'OK (not present)', ICUSTOMIZER_ID_LANGUAGES ) . '</span>';
// --- License.txt
$icustomizer_license_file       = ABSPATH . 'license.txt';
$icustomizer_check_license_file = (file_exists($icustomizer_license_file)) ?  '<span class="icustomizer-red">' . __( 'You need to delete this file', ICUSTOMIZER_ID_LANGUAGES ) . '</span>' :  '<span class="icustomizer-green">' . __( 'OK (not present)', ICUSTOMIZER_ID_LANGUAGES ) . '</span>';;
// ---
$securityTab->createOption( array(
	'name' => 'Check Readme.html & License.txt Files',
    'type' => 'note',
    'desc' => 'readme.html: ' . $icustomizer_check_readme_file . '<br>license.txt:  ' . $icustomizer_check_license_file,
	'color' => 'red'
) );

// ----------------------------------------
// --- Check Htaccess files -------
$securityTab->createOption( array(
	'name' => __( 'HTACCESS Files', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
// --- ROOT Htaccess
$icustomizer_root_htaccess_file        = ABSPATH . '.htaccess';
$icustomizer_check_root_htaccess_file  = (is_writable($icustomizer_root_htaccess_file)) ? '<span class="icustomizer-red">' . __( 'You should change permission of this file (This file is writable)', ICUSTOMIZER_ID_LANGUAGES ) . '</span>' :  '<span class="icustomizer-green">' . __( 'Rights OK', ICUSTOMIZER_ID_LANGUAGES ) . '</span>';
// --- UPLOADS htaccess
$icustomizer_upload_htaccess_file       = ABSPATH . 'wp-content/uploads/.htaccess';
$icustomizer_check_upload_htaccess_file = (is_writable($icustomizer_upload_htaccess_file)) ?  '<span class="icustomizer-red">' . __( 'You should change permission of this file (This file is writable)', ICUSTOMIZER_ID_LANGUAGES ) . '</span>' :  '<span class="icustomizer-green">' . __( 'Rights OK', ICUSTOMIZER_ID_LANGUAGES ) . '</span>';
// ---
$securityTab->createOption( array(
	'name' => __( 'Check HTACCESS Files Permissions', ICUSTOMIZER_ID_LANGUAGES ),
    'type' => 'note',
    'desc' => 'HTACCESS [ROOT] : ' . $icustomizer_check_root_htaccess_file . '<br>HTACCESS [UPLOADS] : ' . $icustomizer_check_upload_htaccess_file,
) );

// ----------------------------------------
// --- Htaccess Security ------------------
$securityTab->createOption( array(
	'name' => __( 'Increased security on the file HTACCESS', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$securityTab->createOption( array(
	'name' => __( 'Increased security', ICUSTOMIZER_ID_LANGUAGES ) . '<br><em class="icustomizer-red">' . __( 'Increased security on<br>"wp-config.php" file,<br>"htaccess" file<br>and prevent the listing of files', ICUSTOMIZER_ID_LANGUAGES ) . '</em><br><br>' . __( 'Copy / Paste this code in your ROOT HTACCESS File', ICUSTOMIZER_ID_LANGUAGES ),
    'type' => 'textarea',
    'default' => '# Restriction Access
<FilesMatch ^wp-config.php$>
 deny from all
 </FilesMatch>

# Restriction Access
<Files .htaccess>
order allow,deny
deny from all
</Files>

# Forbidden Listage
Options All -Indexes',
	'is_code' => true,
) );