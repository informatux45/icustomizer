<?php
/** Blocking direct access to plugin
=================================================== */
defined('ABSPATH') or die('Are you crazy!');

/** Create tab's SECURITY
=============================================== */
if (!function_exists("icustomizer_security")) {
	function icustomizer_security() {
		/** INFORMATUX Framework
		=================================================== */
		global $icustomizer_framework;
		
		/** Intialisation
		=============================================== */
		$page = "security";
		// --- Readme.html
		$icustomizer_readme_file        = ABSPATH . 'readme.html';
		$icustomizer_check_readme_file  = (file_exists($icustomizer_readme_file)) ? '<span class="icustomizer-red">' . __( 'You need to delete this file', ICUSTOMIZER_ID_LANGUAGES ) . '</span>' :  '<span class="icustomizer-green">' . __( 'OK (not present)', ICUSTOMIZER_ID_LANGUAGES ) . '</span>';
		// --- License.txt
		$icustomizer_license_file       = ABSPATH . 'license.txt';
		$icustomizer_check_license_file = (file_exists($icustomizer_license_file)) ?  '<span class="icustomizer-red">' . __( 'You need to delete this file', ICUSTOMIZER_ID_LANGUAGES ) . '</span>' :  '<span class="icustomizer-green">' . __( 'OK (not present)', ICUSTOMIZER_ID_LANGUAGES ) . '</span>';
		// --- ROOT Htaccess
		$icustomizer_root_htaccess_file        = ABSPATH . '.htaccess';
		$icustomizer_check_root_htaccess_file  = (is_writable($icustomizer_root_htaccess_file)) ? '<span class="icustomizer-red">' . __( 'You should change permission of this file (This file is writable)', ICUSTOMIZER_ID_LANGUAGES ) . '</span>' :  '<span class="icustomizer-green">' . __( 'Rights OK', ICUSTOMIZER_ID_LANGUAGES ) . '</span>';
		// --- UPLOADS htaccess
		$icustomizer_upload_htaccess_file       = ABSPATH . 'wp-content/uploads/.htaccess';
		$icustomizer_check_upload_htaccess_file = (is_writable($icustomizer_upload_htaccess_file)) ?  '<span class="icustomizer-red">' . __( 'You should change permission of this file (This file is writable)', ICUSTOMIZER_ID_LANGUAGES ) . '</span>' :  '<span class="icustomizer-green">' . __( 'Rights OK', ICUSTOMIZER_ID_LANGUAGES ) . '</span>';
		
		/** Title
        =================================================== */
		echo $icustomizer_framework->general_infos(
			 'start'
			,[
				 'PLUGIN_ID'      => ICUSTOMIZER_ID
				,'PLUGIN_NAME'    => ICUSTOMIZER_NAME
				,'PLUGIN_VERSION' => icustomizer_get_version()
			  ]);
		
		/** Tabs
        =================================================== */
		echo $icustomizer_framework->nav_tabs(icustomizer_nav_tabs(), "icustomizer-$page", ICUSTOMIZER_ID_LANGUAGES);
		
		/** Content
        =================================================== */		
		echo $icustomizer_framework->openTable();
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->addBreak( __( 'Readme / License Files', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		echo $icustomizer_framework->addNote(
			 __( 'Check Readme.html & License.txt Files', ICUSTOMIZER_ID_LANGUAGES )
			,'readme.html: ' . $icustomizer_check_readme_file . '<br>license.txt:  ' . $icustomizer_check_license_file
			,'top' // top, bottom, middle - Tag TR valign - Alignement de la cellule
		);
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->addBreak( __( 'HTACCESS Files', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		echo $icustomizer_framework->addNote(
			 __( 'Check HTACCESS Files Permissions', ICUSTOMIZER_ID_LANGUAGES )
			,'HTACCESS [ROOT] : ' . $icustomizer_check_root_htaccess_file . '<br>HTACCESS [UPLOADS] : ' . $icustomizer_check_upload_htaccess_file
			,'top' // top, bottom, middle - Tag TR valign - Alignement de la cellule
		);
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->addBreak( __( 'Increased security on the file HTACCESS', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		echo $icustomizer_framework->addTextarea(
			 __( 'New text', ICUSTOMIZER_ID_LANGUAGES ) . ' <br><i>( ' . __( 'Authorized HTML', ICUSTOMIZER_ID_LANGUAGES ) . ' )</i><br>' . __( 'Increased security', ICUSTOMIZER_ID_LANGUAGES ) . '<br><em class="icustomizer-red">' . __( 'Increased security on<br>"wp-config.php" file,<br>"htaccess" file<br>and prevent the listing of files', ICUSTOMIZER_ID_LANGUAGES ) . '</em><br><br>' . __( 'Copy / Paste this code in your ROOT HTACCESS File', ICUSTOMIZER_ID_LANGUAGES )
			,'<FilesMatch ^wp-config.php$>
 deny from all
 </FilesMatch>

# Restriction Access
<Files .htaccess>
order allow,deny
deny from all
</Files>

# Forbidden Listage
Options All -Indexes' // Default: void
			,[
				 'name'        => 'icustomizer_remove_footer_admin_txt'
				,'id'          => 'icustomizer_remove_footer_admin_txt'
				,'value'       => get_option('icustomizer_remove_footer_admin_txt', '') // Default: void
				,'placeholder' => ""
				,'style'       => 'width: 100%; height: 200px; max-height: 100%;'
			]
			,false // true, false (required)
			,'' // Description
		);
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->closeTable();
		// ----------------------------------------
		
		/** End
        =================================================== */
		echo $icustomizer_framework->general_infos('end');
    }
}
// ----------------------------------------
// ----------------------------------------
// ----------------------------------------

?>