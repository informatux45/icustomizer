<?php
/** Blocking direct access to plugin
=================================================== */
defined('ABSPATH') or die('Are you crazy!');

/** Create tab's CREDITS
=============================================== */
if (!function_exists("icustomizer_credits")) {
	function icustomizer_credits() {
		/** INFORMATUX Framework
		=================================================== */
		global $icustomizer_framework;
		
		/** Intialisation
		=============================================== */
		$icustomizer_page   = "credits";
        $informatux_url     = '<a href="https://informatux.com/" target="_blank">INFORMATUX</a>';
        $informatux_support = '<a href="https://informatux.com/contact" target="_blank">INFORMATUX</a>';
        $informatux_contact = '<a href="https://informatux.com/contact" target="_blank">' . __('INFORMATUX contact', ICUSTOMIZER_ID_LANGUAGES) . '</a>';
        $informatux_dev     = '<a href="https://dev.informatux.com/" target="_blank">DEV By INFORMATUX</a>';
        
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
		echo $icustomizer_framework->nav_tabs(icustomizer_nav_tabs(), "icustomizer-$icustomizer_page", ICUSTOMIZER_ID_LANGUAGES);

		/** Content
        =================================================== */		
		echo $icustomizer_framework->openTable();
        // ----------------------------------------
        echo $icustomizer_framework->addNote( __( 'CREDITS', ICUSTOMIZER_ID_LANGUAGES ) . ' <br /><i> ' . ICUSTOMIZER_NAME . '<i>', '<img width="96" height="96" class="icustomizer-credits" src="' . ICUSTOMIZER_URL . '/images/avatar-informatux.gif" alt=""><br>' . __( 'Developed and maintained by', ICUSTOMIZER_ID_LANGUAGES ) . ' <a href="https://informatux.com" target="_blank">INFORMATUX</a><br>' . __( 'Find all our developments on ', ICUSTOMIZER_ID_LANGUAGES ) . ' ' . $informatux_dev );
		// ----------------------------------------
		echo $icustomizer_framework->addNote(
			'INFORMATUX<br><i>' . __( 'It is also', ICUSTOMIZER_ID_LANGUAGES ),
			'<strong>PLUG & BORNE</strong> : <a href="https://plugandborne.fun" target="_blank">Votre borne d\'arcade sur mesure</a>
			 <br><strong>SBUIADMIN</strong> : <a href="https://dev.informatux.com/cms-sbuiadmin" target="_blank">Le CMS informatux</a>
			 <br>Plugins WORDPRESS</strong> :
			 <br><strong>ICUSTOMIZER</strong> : <a href="https://dev.informatux.com/wordpress-icustomizer" target="_blank">Personnalisez Wordpress</a>
			 <br><strong>ILIST KADO</strong> : <a href="https://dev.informatux.com/woocommerce-ilist" target="_blank">"Fêtes" vos listes de cadeaux</a>
			 <br><strong>WCGATEWAYMP</strong> : <a href="https://dev.informatux.com/woocommerce-wcgatewaymp" target="_blank">Passerelle de paiement MangoPay</a>
			 <br><strong>NEXTCLOUD FILES</strong> : <a href="https://dev.informatux.com/wordpress-nextcloud" target="_blank">Vos fichiers Nextcloud sur Wordpress</a>
			 <br><strong>PIXEL STAT</strong> : <a href="https://dev.informatux.com/woocommerce-pixel-stat" target="_blank">Vos pixels Google et FB sur WooCommerce</a>
			 <br><strong>ICLOAK REDIRECTION</strong> : <a href="https://dev.informatux.com/wordpress-icloak" target="_blank">Gérer vos redirections</a>'
		);
        // ----------------------------------------
        echo $icustomizer_framework->addNote(
            __( 'SERVICES', ICUSTOMIZER_ID_LANGUAGES ) . ' <br /><i style="font-weight: normal;">' . $informatux_url . '<i>',
            '<div class="informatux_outerdiv">
                <div class="informatux_outer">
                    <img src="https://informatux.com/data/uploads/giphy/informatux-securite-wp.gif" class="informatux_gs_image" alt="">
                    <div class="informatux_centered">' . __( 'SECURITY', ICUSTOMIZER_ID_LANGUAGES ) . '</div>
                    <div>
                      <p class="informatux_p_services">' . __( "Tired of your WORDPRESS sites being attacked", ICUSTOMIZER_ID_LANGUAGES ) . '<br>
                      ' . __( "Too complicated to put back", ICUSTOMIZER_ID_LANGUAGES ) . '<br>
                      '. $informatux_contact . '
                      </p>       
                    </div>
                </div>
                
                <div class="informatux_outer">
                    <img src="https://informatux.com/data/uploads/giphy/informatux-installation-wordpress.gif" class="informatux_gs_image" alt="">
                    <div class="informatux_centered">INSTALLATION</div>
                    <div>
                      <p class="informatux_p_services">Wordpress / WooCommerce<br>
                      ' . __( 'Wordpress Themes', ICUSTOMIZER_ID_LANGUAGES ) . '<br>
                      ' . __( 'Web Hosting', ICUSTOMIZER_ID_LANGUAGES ) . '<br>
                      ' . __( 'Manage your WP sites by ANDROID / APPLE application', ICUSTOMIZER_ID_LANGUAGES ) . '<br>
                      '. $informatux_contact . '</p>
                    </div>
                </div>
                
                <div class="informatux_outer informatux_last">
                    <img src="https://informatux.com/data/uploads/giphy/informatux-maintenance.gif" class="informatux_gs_image" alt="">
                    <div class="informatux_centered">' . __( 'MAINTENANCE', ICUSTOMIZER_ID_LANGUAGES ) . '</div>
                    <div>
                      <p class="informatux_p_services">' . __( 'No time', ICUSTOMIZER_ID_LANGUAGES ) . '<br>
                      ' . __( 'No envy', ICUSTOMIZER_ID_LANGUAGES ) . '<br>
                      ' . __( 'Too complicated', ICUSTOMIZER_ID_LANGUAGES ) . '<br>
                      '. $informatux_contact . '
                      </p>       
                    </div>
                </div>
            </div>' );
        // ----------------------------------------
        echo $icustomizer_framework->closeTable();
    }
}
// ----------------------------------------
// ----------------------------------------
// ----------------------------------------
?>