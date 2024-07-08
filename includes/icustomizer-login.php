<?php
/** Blocking direct access to plugin
=================================================== */
defined('ABSPATH') or die('Are you crazy!');

/** Create tab's LOGIN
=============================================== */
if (!function_exists("icustomizer_login")) {
	function icustomizer_login() {
		/** INFORMATUX Framework
		=================================================== */
		global $icustomizer_framework;
		
		/** Intialisation
		=============================================== */
		$page = "login";
		
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
		
		/** Form construct
		=================================================== */
		echo $icustomizer_framework->openForm(
			[
				 'action'  => admin_url("admin.php?page=icustomizer-$page")
				,'name'    => "$page"
				,'id'      => "$page"
				,'method'  => "post"
				,'enctype' => "multipart/form-data"
			]
		);

		/** Content
        =================================================== */		
		echo $icustomizer_framework->openTable();
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->addBreak( __( 'Background Image', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		echo $icustomizer_framework->addUpload(
			 __( 'Background', ICUSTOMIZER_ID_LANGUAGES )
			,[
				 'name'            => 'icustomizer_login_background'
				,'id'              => 'icustomizer_login_background'
				,'value'           => get_option('icustomizer_login_background', '') // Default: void
				,'uploadButtonTxt' => __( 'Upload image', ICUSTOMIZER_ID_LANGUAGES )
				,'removeButtonTxt' => __( 'Remove image', ICUSTOMIZER_ID_LANGUAGES )
			]
			,false // true, false - Required
			,__( 'Upload your Login background image', ICUSTOMIZER_ID_LANGUAGES )
		);
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->addBreak( __( 'Logo Image', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		echo $icustomizer_framework->addUpload(
			 __( 'Logo', ICUSTOMIZER_ID_LANGUAGES )
			,[
				 'name'            => 'icustomizer_login_logo'
				,'id'              => 'icustomizer_login_logo'
				,'value'           => get_option('icustomizer_login_logo', '') // Default: void
				,'uploadButtonTxt' => __( 'Upload image', ICUSTOMIZER_ID_LANGUAGES )
				,'removeButtonTxt' => __( 'Remove image', ICUSTOMIZER_ID_LANGUAGES )
			]
			,false // true, false - Required
			,__( 'Upload your Login Logo image', ICUSTOMIZER_ID_LANGUAGES )
		);
		// ----------------------------------------
		echo $icustomizer_framework->addNumber(
			 __( 'Logo height', ICUSTOMIZER_ID_LANGUAGES ) . ' <i>( ' . __( 'Pixels', ICUSTOMIZER_ID_LANGUAGES ) . ' )</i>'
			,array(
				 'id'      => 'icustomizer_login_logo_height'
				,'name'    => 'icustomizer_login_logo_height'
				,'step'    => 1
				,'min'     => 80
				,'max'     => 300
				,'value'   => get_option('icustomizer_login_logo_height', 80) // Default: 80
			)
			,true // Required: true OR false
			,'<i>' . __( 'Setting of the height logo. Will not be applied if logo image is set to None - Default: 80px', ICUSTOMIZER_ID_LANGUAGES ) . '</i>' // Description
		);
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->addBreak( __( 'Login Form', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		echo $icustomizer_framework->addNumber(
			 __( 'Login Form Border Radius', ICUSTOMIZER_ID_LANGUAGES ) . ' <i>( ' . __( 'Pixels', ICUSTOMIZER_ID_LANGUAGES ) . ' )</i>'
			,array(
				 'id'      => 'icustomizer_login_form_radius'
				,'name'    => 'icustomizer_login_form_radius'
				,'step'    => 1
				,'min'     => 0
				,'max'     => 30
				,'value'   => get_option('icustomizer_login_form_radius', 0) // Default: 0
			)
			,true // Required: true OR false
			,'<i>' . __( 'Setting of the Login Form Border Radius. Will not be applied if value is set to 0 - Default: 0px', ICUSTOMIZER_ID_LANGUAGES ) . '</i>' // Description
		);
		// ----------------------------------------
		echo $icustomizer_framework->addColor(
			 __( 'Login Form Background Color', ICUSTOMIZER_ID_LANGUAGES )
			,[
				 'name'  => 'icustomizer_login_form_bg_color'
				,'id'    => 'icustomizer_login_form_bg_color'
				,'value' => get_option( 'icustomizer_login_form_bg_color', '#ffffff' ) // Default: #ffffff
			]
			,false // true, false - Required
			,__( 'Pick a color', ICUSTOMIZER_ID_LANGUAGES )
		);
		// ----------------------------------------
		echo $icustomizer_framework->addColor(
			 __( 'Login Form Text Color', ICUSTOMIZER_ID_LANGUAGES )
			,[
				 'name'  => 'icustomizer_login_form_color'
				,'id'    => 'icustomizer_login_form_color'
				,'value' => get_option( 'icustomizer_login_form_color', '#000000' ) // Default: #000000
			]
			,false // true, false - Required
			,__( 'Pick a color', ICUSTOMIZER_ID_LANGUAGES )
		);
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->addBreak( __( 'Title link / Text Logo <code>&lt;a href="http:&#47;&#47;wordpress.org&#47;" title="Propulsé par WordPress"&gt;Mon Site&lt;&#47;a&gt;</code>', ICUSTOMIZER_ID_LANGUAGES ) );
		// ----------------------------------------
		echo $icustomizer_framework->addInput(
			'text'
		   ,__( 'Title link logo (TITLE TAG)', ICUSTOMIZER_ID_LANGUAGES )
		   ,[
				'name'        => 'icustomizer_login_title_link'
			   ,'id'          => 'icustomizer_login_title_link'
			   ,'value'       => get_option('icustomizer_login_title_link', get_bloginfo( 'name' )) // Default: Blog name
			   ,'placeholder' => 'Ex: ' . get_bloginfo( 'name' )
			   ,'style'       => 'width: 100%; max-width: 400px;'
		   ]
		   ,true
		   ,__( 'Change text Title link', ICUSTOMIZER_ID_LANGUAGES ) . '<br>Ex: ' . get_bloginfo( 'name' ) // Description
	   );
		// ----------------------------------------
		echo $icustomizer_framework->addInput(
			'text'
		   ,__( 'Link logo (HREF TAG)', ICUSTOMIZER_ID_LANGUAGES )
		   ,[
				'name'        => 'icustomizer_login_href_link'
			   ,'id'          => 'icustomizer_login_href_link'
			   ,'value'       => get_option('icustomizer_login_href_link', site_url()) // Default: Site url
			   ,'placeholder' => 'Ex: ' . site_url()
			   ,'style'       => 'width: 100%; max-width: 400px;'
		   ]
		   ,true
		   ,__( 'Change link Href', ICUSTOMIZER_ID_LANGUAGES ) . '<br>Ex: ' . site_url() // Description
	   );
		// ----------------------------------------
		
		// ----------------------------------------
		// --- Hiddens / Buttons
		// ----------------------------------------
		echo $icustomizer_framework->addInput('submit', '', [ 'value' => __( "Save changes", ICUSTOMIZER_ID_LANGUAGES) ] );
		// ----------------------------------------
		// ----------------------------------------
		// ----------------------------------------
		echo $icustomizer_framework->closeTable();
		echo $icustomizer_framework->closeForm();
		// ----------------------------------------
		
		/** End
        =================================================== */
		echo $icustomizer_framework->general_infos('end');
	}
}
// ----------------------------------------
// ----------------------------------------
// ----------------------------------------

/** Change HREF link logo
=================================================== */
if (trim(get_option( 'icustomizer_login_href_link' )) != '') {
	add_filter( 'login_headerurl', 'icustomizer_login_logo_url' );	
	if (!function_exists("icustomizer_login_logo_url")) {
		function icustomizer_login_logo_url() {
			return esc_url(get_option( 'icustomizer_login_href_link' ));
		}
	}
}

/** Change Title link logo
=================================================== */
if (trim(get_option( 'icustomizer_login_title_link' )) != '') {
	add_filter( 'login_headertext', 'icustomizer_login_logo_url_title' );
	if (!function_exists("icustomizer_login_logo_url_title")) {
		function icustomizer_login_logo_url_title() {
			return get_option( 'icustomizer_login_title_link' );
		}
	}
}

/** Change Background image
=================================================== */
add_action( 'login_enqueue_scripts', 'icustomizer_custom_login_styles' );
if (!function_exists('icustomizer_custom_login_styles')) {
	function icustomizer_custom_login_styles() {
		wp_enqueue_style( 'icustomizer-login-style', ICUSTOMIZER_URL . 'css/icustomizer-login-style.css' );
		// --- Retrieve option BG
		$icustomizer_background = get_option( 'icustomizer_login_background' );
		if ($icustomizer_background) {
			wp_add_inline_style( 'icustomizer-login-style', 'body.login {background:url("' . esc_url( $icustomizer_background ) . '") no-repeat center center fixed !important;
															 background-size: cover !important;}' );
		}

		// --- Retrieve option Logo
		$icustomizer_logo = get_option( 'icustomizer_login_logo' );
		if ($icustomizer_logo) {
			wp_add_inline_style( 'icustomizer-login-style', 'body.login div#login h1 a {background-image: url("' . esc_url( $icustomizer_logo ) .  '") !important;
															 background-size: ' . get_option( 'icustomizer_login_logo_height' ) .  'px auto !important;
															 height: ' . get_option( 'icustomizer_login_logo_height' ) .  'px !important;
															 width: 100%;}
															 #language-switcher {background-color: transparent !important}'
			);
		}

		// --- Retrieve option Login Form Border Radius
		// --- Retrieve option Login Form Background Color
		$icustomizer_login_form_radius = get_option( 'icustomizer_login_form_radius' );
		$icustomizer_login_form_bg     = get_option( 'icustomizer_login_form_bg_color' );
		$icustomizer_login_form_color  = get_option( 'icustomizer_login_form_color' );
		if ($icustomizer_login_form_radius > 0 || $icustomizer_login_form_bg != "#ffffff") {
			wp_add_inline_style( 'icustomizer-login-style', '.login form#loginform {
								border-radius: ' . $icustomizer_login_form_radius . 'px !important;
								background-color: ' . $icustomizer_login_form_bg . ' !important;
								color: ' . $icustomizer_login_form_color . ' !important;}
								p#nav a, p#backtoblog a {color: ' . $icustomizer_login_form_color . ' !important;}
								');
		}
	}
}

?>