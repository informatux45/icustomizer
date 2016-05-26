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
$icustomizer_check_readme_file  = (file_exists($icustomizer_readme_file)) ? __( '<span class="icustomizer-red">You must delete this file</span>', ICUSTOMIZER_ID_LANGUAGES ) :  __( '<span class="icustomizer-green">OK</span>', ICUSTOMIZER_ID_LANGUAGES );
// --- License.txt
$icustomizer_license_file       = ABSPATH . 'license.txt';
$icustomizer_check_license_file = (file_exists($icustomizer_license_file)) ?  __( '<span class="icustomizer-red">You must delete this file</span>', ICUSTOMIZER_ID_LANGUAGES ) :  __( '<span class="icustomizer-green">OK</span>', ICUSTOMIZER_ID_LANGUAGES );
// ---
$securityTab->createOption( array(
	'name' => 'Check Readme.html & License.txt Files',
    'type' => 'note',
    'desc' => 'readme.html => ' . $icustomizer_check_readme_file . '<br>license.txt => ' . $icustomizer_check_license_file,
	'color' => 'red'
) );

// ----------------------------------------
// --- Check Htaccess files -------
$securityTab->createOption( array(
	'name' => __( 'HTACCESS Files', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
// --- ROOT Htaccess
$icustomizer_root_htaccess_file        = ABSPATH . '/.htaccess';
$icustomizer_check_root_htaccess_file  = (is_writable($icustomizer_root_htaccess_file)) ? __( '<span class="icustomizer-red">You must change permission of this file (This file is writable)</span>', ICUSTOMIZER_ID_LANGUAGES ) :  __( '<span class="icustomizer-green">OK</span>', ICUSTOMIZER_ID_LANGUAGES );
// --- UPLOADS htaccess
$icustomizer_upload_htaccess_file       = ABSPATH . '/wp-content/uploads/.htaccess';
$icustomizer_check_upload_htaccess_file = (is_writable($icustomizer_upload_htaccess_file)) ?  __( '<span class="icustomizer-red">You must change permission of this file (This file is writable)</span>', ICUSTOMIZER_ID_LANGUAGES ) :  __( '<span class="icustomizer-green">OK</span>', ICUSTOMIZER_ID_LANGUAGES );
// ---
$securityTab->createOption( array(
	'name' => 'Check HTACCESS Files Permissions',
    'type' => 'note',
    'desc' => '[ROOT] htaccess => ' . $icustomizer_check_root_htaccess_file . '<br>[UPLOADS] htaccess => ' . $icustomizer_check_upload_htaccess_file,
) );

// ----------------------------------------
// --- Htaccess Security ------------------
$securityTab->createOption( array(
	'name' => __( 'Increased security on the file HTACCESS', ICUSTOMIZER_ID_LANGUAGES ),
	'type' => 'heading',
) );
$securityTab->createOption( array(
	'name' => 'Increased security<br><em class="icustomizer-red">Increased security on<br>"wp-config.php" file,<br>"htaccess" file<br>and prevent the listing of files</em><br><br>Copy / Paste this code in your ROOT HTACCESS File',
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







