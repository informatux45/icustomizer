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
        $informatux_dev     = '<a href="https://github.com/informatux45/" target="_blank">GITHUB</a>';
        
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
        echo $icustomizer_framework->addNote( __( 'CREDITS', ICUSTOMIZER_ID_LANGUAGES ) . ' <br /><i style="color: red;"> ' . ICUSTOMIZER_NAME . '<i>', '<img width="96" height="96" class="icustomizer-credits" src="' . ICUSTOMIZER_URL . '/images/avatar-informatux.gif" alt=""><br>' . __( 'Developed and maintained by', ICUSTOMIZER_ID_LANGUAGES ) . ' <a href="https://informatux.com" target="_blank">INFORMATUX</a><br>' . __( 'Find all my developments on ', ICUSTOMIZER_ID_LANGUAGES ) . ' ' . $informatux_dev );
        // ----------------------------------------
		// Mieux utiliser le web, Dégooglisez votre Internet !
        echo $icustomizer_framework->addNote(
            __( 'Better use the web, Ungooglized your Internet!', ICUSTOMIZER_ID_LANGUAGES ),
            '            <table cellspacing="0" cellpadding="7" border="0" style="width: 500px;">
                <tbody>
                    <tr>
                        <td style="padding-top: 5px;" colspan="2" valign="middle" align="left">
                            <font style="color: #505050; font-size: 10pt; font-family: Arial">
                            <a style="float: left; color: #0078cc; width: 100%;" href="https://plik.root.gg/" title="Plik - ' . __('File Transfer / Deposit', ICUSTOMIZER_ID_LANGUAGES ) . '">
                                <img alt="' . __('File Transfer / Deposit', ICUSTOMIZER_ID_LANGUAGES ) . '" data-class="external" style="float: left; height: 18px; padding-right: 10px; max-width: 30px; width: 100%;" src="https://informatux.com/imgs/plik.png">
                                <span style="line-height: 18px;">' . __('File Transfer / Deposit', ICUSTOMIZER_ID_LANGUAGES ) . '</span>
                            </a>
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 5px; padding-bottom: 7px;" colspan="2" valign="middle" align="left">
                            <font style="color: #505050; font-size: 10pt; font-family: Arial">
                            <a style="float: left; color: #0078cc; width: 100%;" href="https://framasoft.org/" title="Framasoft - framaforms, framadate, framapad, framagenda, framatalk">
                                <img alt="Framasoft - dégoogliser Internet" data-class="external" style="float: left; height: 18px; padding-right: 10px; padding-bottom: 7px; max-width: 30px; width: 100%;" src="https://informatux.com/imgs/framasoft.png">
                                <span style="line-height: 18px;">FRAMASOFT</span>&nbsp;<a style="color: #0078cc; text-decoration: none;" href="https://framatalk.org" title="Échangez en audio-vidéo en trois clics seulement">Framatalk</a> <a style="color: #0078cc; text-decoration: none;" href="https://framadate.org" title="Planifiez vos réunions ou prenez des décisions">Framadate</a> <a style="color: #0078cc; text-decoration: none;" href="https://framapad.org" title="Rédigez vos textes en ligne et à plusieurs">Framapad</a> <a style="color: #0078cc; text-decoration: none;" href="https://framagenda.org" title="Gérez et partagez vos agendas">Framagenda</a> <a style="color: #0078cc; text-decoration: none;" href="https://framaforms.org" title="Concevez vos enquêtes en ligne facilement tout en respectant votre public">Framaforms</a> <a style="color: #0078cc; text-decoration: none;" href="https://framacalc.org" title="Partagez vos tableaux et collaborez !">Framacalc</a> <a style="color: #0078cc; text-decoration: none;" href="https://framacarte.org" title="Créez vos cartes personnalisées en ligne">Framacarte</a> <a style="color: #0078cc; text-decoration: none;" href="https://framadrive.org" title="Hébergez vos documents en ligne">Framadrive</a> <a style="color: #0078cc; text-decoration: none;" href="https://framagit.org" title="Discover projects, groups and snippets. Share your projects with others">Framagit</a> <a style="color: #0078cc; text-decoration: none;" href="https://framagames.org" title="Des jeux libres pour jouer en ligne ou déconnecté">Framagames</a> <a style="color: #0078cc; text-decoration: none;" href="https://framapiaf.org" title="Microblogging libre et fédéré">Framapiaf</a> <a style="color: #0078cc; text-decoration: none;" href="https://framateam.org" title="Communication collaborative">Framateam</a> <a style="color: #0078cc; text-decoration: none;" href="https://framadrop.org" title="Partage de fichiers">Framadrop</a>
                            </a>
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 5px;" colspan="2" valign="middle" align="left">
                            <font style="color: #505050; font-size: 10pt; font-family: Arial">
                            <a style="float: left; color: #0078cc; width: 100%;" href="https://www.chatons.org/" title="Chatons - le Collectif des Hébergeurs Alternatifs, Transparents, Ouverts, Neutres et Solidaires">
                                <img alt="Les CHATONS" data-class="external" style="float: left; height: 18px; padding-right: 10px; max-width: 30px; width: 100%;" src="https://informatux.com/imgs/chatons.png">
                                <span style="line-height: 18px;">' . __( 'Do you know the CHATONS?', ICUSTOMIZER_ID_LANGUAGES ) . '</span>
                            </a>
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 5px;" colspan="2" valign="middle" align="left">
                            <font style="color: #505050; font-size: 10pt; font-family: Arial">
                            <a style="float: left; color: #0078cc; width: 100%;" href="https://framablog.org/2016/02/09/chatons-le-collectif-anti-gafam/" title="La création d’un Collectif d’Hébergeurs Alternatifs, Transparents, Ouverts, Neutres et Solidaires (C.H.A.T.O.N.S.)">
                                <img alt="Le collectif anti-GAFAM" data-class="external" style="float: left; height: 18px; padding-right: 10px; max-width: 30px; width: 100%;" src="https://informatux.com/imgs/framablog.png">
                                <span style="line-height: 18px;">' . __( 'The anti-GAFAM collective', ICUSTOMIZER_ID_LANGUAGES ) . '</span>
                            </a>
                            </font>
                        </td>
                    </tr>
                </tbody>
            </table>' );
        // ----------------------------------------
        echo $icustomizer_framework->closeTable();
    }
}
// ----------------------------------------
// ----------------------------------------
// ----------------------------------------
?>