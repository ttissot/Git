<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2007                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/presentation');
include_spip('inc/config');

// http://doc.spip.org/@exec_config_fonctions_dist
function exec_config_fonctions_dist()
{
  global $connect_statut, $connect_toutes_rubriques, $changer_config;
	if ($connect_statut != '0minirezo' OR !$connect_toutes_rubriques) {
		echo _T('avis_non_acces_page');
		exit;

	}

	init_config();
	if ($changer_config == 'oui') appliquer_modifs_config();

	global $flag_revisions, $options ;

	pipeline('exec_init',array('args'=>array('exec'=>'config_fonctions'),'data'=>''));
	$commencer_page = charger_fonction('commencer_page', 'inc');
	echo $commencer_page(_T('titre_page_config_fonctions'), "configuration", "configuration");

	echo "<br /><br /><br />";
	gros_titre(_T('titre_config_fonctions'));
	echo barre_onglets("configuration", "fonctions");

	debut_gauche();
	echo pipeline('affiche_gauche',array('args'=>array('exec'=>'config_fonctions'),'data'=>''));
	creer_colonne_droite();
	echo pipeline('affiche_droite',array('args'=>array('exec'=>'config_fonctions'),'data'=>''));
	debut_droite();
	lire_metas();

	$action = generer_url_ecrire('config_fonctions');

        echo "<form action='$action' method='post'><div>", form_hidden($action);
	echo "<input type='hidden' name='changer_config' value='oui' />";

//
// Activer/desactiver la creation automatique de vignettes
//
	vignettes_config();

//
// Indexation pour moteur de recherche
//
	moteur_config();

//
// Activer les statistiques
//
	statistiques_config();

//
// Notification de modification des articles
//
	if ($options == "avancees") notification_config();

//
// Gestion des revisions des articles
//
	if ($flag_revisions AND $options == "avancees") versions_config();

//
// Correcteur d'orthographe
//
	correcteur_config();

//
// Previsualisation sur le site public
//
	previsu_config();

//
// Utilisation d'un proxy pour aller lire les sites syndiques
//
	if ($options == 'avancees') proxy_config();

//
// Creer fichier .htpasswd ?
//
	if ($options == "avancees") htpasswd_config();

//
// Creer fichier .htaccess dans les repertoires de documents 
//

/* if ($options == "avancees" AND !$REMOTE_USER ) htaccess_config();*/

	echo pipeline('affiche_milieu',array('args'=>array('exec'=>'config_fonctions'),'data'=>''));
	echo "</div></form>";

	echo fin_gauche(), fin_page();
}


// http://doc.spip.org/@afficher_choix_vignette
function afficher_choix_vignette($process) {
	static $cpt_cellule = 0;
	global $couleur_foncee;
	//global $taille_preview;
	$taille_preview = 120;

	// Ici on va tester les capacites de GD independamment des tests realises
	// dans les images spip_image -- qui servent neanmoins pour la qualite
	/* if (function_exists('imageformats')) {
		
	} */

	if($cpt_cellule>=3) {
		$cpt_cellule = 0;
		$retour .= "\n</tr><tr>\n";
	}
	else {
		$cpt_cellule += 1;
		$retour = '';
	}

	$style = (($process == $GLOBALS['meta']['image_process'])
	? " border: 2px; border-style: dotted; border-color: $couleur_foncee; font-weight: bold;"
	: "");

	return 	$retour . "\n<td  style='text-align: center; vertical-align:center; width: ".($taille_preview+4)."px;$style'"
	. "><a href='"
	. generer_url_ecrire("config_fonctions", "image_process=$process")
	. "'><img src='"
	. generer_url_action("tester", "arg=$process")
	. "' alt='$process' /></a><br />$process</td>\n";

}

// http://doc.spip.org/@vignettes_config
function vignettes_config()
{
  global $image_process, $spip_lang_left, $spip_lang_right;

	debut_cadre_trait_couleur("image-24.gif");

	debut_cadre_relief("", false, "", _T("info_image_process_titre"));

	echo "<p class='verdana2'>";
	echo _T('info_image_process');
	echo "</p>";
		// application du choix de vignette
	if ($image_process) {
			// mettre a jour les formats graphiques lisibles
		switch ($image_process) {
				case 'gd1':
				case 'gd2':
					$formats_graphiques = $GLOBALS['meta']['gd_formats_read'];
					break;
				case 'netpbm':
					$formats_graphiques = $GLOBALS['meta']['netpbm_formats'];
					break;
				case 'convert':
				case 'imagick':
					$formats_graphiques = 'gif,jpg,png';
					break;
				default: #debug
					$formats_graphiques = '';
					$image_process = 'non';
					break;
			}
		ecrire_meta('formats_graphiques', $formats_graphiques,'non');
		ecrire_meta('image_process', $image_process,'non');
		ecrire_metas();
	} else 	$formats_graphiques = $GLOBALS['meta']["formats_graphiques"];

	echo "<table width='100%' align='center'><tr>";
	$nb_process = 0;

	// Tester les formats
	if ( /* GD disponible ? */
	function_exists('ImageGif')
	OR function_exists('ImageJpeg')
	OR function_exists('ImagePng')
	) {
		$nb_process ++;
		echo afficher_choix_vignette($p = 'gd1');

		if (function_exists("ImageCreateTrueColor")) {
			echo afficher_choix_vignette($p = 'gd2');
			$nb_process ++;
		}
	}

	if (_PNMSCALE_COMMAND!='') {
		echo afficher_choix_vignette($p = 'netpbm');
		$nb_process ++;
	}

	if (function_exists('imagick_readimage')) {
		echo afficher_choix_vignette('imagick');
		$nb_process ++;
	}

	if (_CONVERT_COMMAND!='') {
		echo afficher_choix_vignette($p = 'convert');
		$nb_process ++;
	}

	$cell = $nb_process%3?(3-$nb_process%3):0;
	while($cell--)
		echo "\n".'<td>&nbsp;</td>';

	echo "</tr></table>\n";
	
	echo "<p class='verdana2'>";
	echo _T('info_image_process2');
	echo "</p>";
	
	fin_cadre_relief();


	//
	// Une fois le process choisi, proposer vignettes
	//
	
	$creer_preview = $GLOBALS['meta']["creer_preview"];
	$taille_preview = $GLOBALS['meta']["taille_preview"];
	if ($taille_preview < 10) $taille_preview = 120;

	if (strlen($formats_graphiques) > 0) {
		debut_cadre_trait_couleur("", false, "", _T('info_generation_miniatures_images'));
		
		echo "<p class='verdana2'>";
		echo _T('info_ajout_image');
		echo "</p>\n";


		$block = "'block', 'none'"; 
		echo "<div class='verdana2'>";
		echo bouton_radio("creer_preview", "oui", _T('item_choix_generation_miniature'), $creer_preview == "oui", "changeVisible(this.checked, 'config-preview', $block);");
		echo '</div>';

		if ($creer_preview == "oui") $style = "display: block;";
		else $style = "display: none;";
	
		echo "<div id='config-preview' class='verdana2' style='$style margin-$spip_lang_left: 40px;'>"._T('info_taille_maximale_vignette');
		echo "<br /><input type='text' name='taille_preview' value='$taille_preview' class='fondl' size='5' />";
		echo " "._T('info_pixels');
		
		if ($creer_preview == "oui"){
			// detection de taille maxi d'image manipulable avec GDx pour faire les image_reduire notamment
			if ($GLOBALS['meta']['image_process']=='gd1' OR $GLOBALS['meta']['image_process']=='gd2') {
				lire_metas(); // on force une mise a jour des meta avant le test
				echo "<div dir='ltr' id='teste_memory_size_gd' style='text-align:left;float:$spip_lang_right;width:196px;background:url("._DIR_IMG_PACK . "jauge-test-gd.gif) no-repeat top left;'>";
				$max_size = isset($GLOBALS['meta']['max_taille_vignettes'])?$GLOBALS['meta']['max_taille_vignettes']:(500*500);
				$max_size_echec = isset($GLOBALS['meta']['max_taille_vignettes_echec'])?$GLOBALS['meta']['max_taille_vignettes_echec']:0;
				$max_size_test = isset($GLOBALS['meta']['max_taille_vignettes_test'])?$GLOBALS['meta']['max_taille_vignettes_test']:0;
				if ($max_size_test<$max_size_echec OR  ($max_size_test AND !$max_size_echec)){
					ecrire_meta('max_taille_vignettes_echec',$max_size_echec = $max_size_test,'non');
					ecrire_metas();
				}
				$maxtest = 1740; // 3MPixels
				$test = array();
				$time = time();
				if ($max_size >= ($maxtest-20)*($maxtest-20)) $maxtest = 2380; // 6MPixels
				$top = 16;
				for ($j = 320;$j>=20;$j = $j/2){
					echo "<div style='position:relative;top:{$top}px;$spip_lang_left:0px;'>";
					$l = round($j/10);
					$lok = 0; $lbad =0;
					$margin_left = 0;
					$top -= 8;
					for ($i = 480;$i*$i<$max_size && $i<=$maxtest;$i+=$j) $lok += $l;
					if ($lok-$l+2>0) 
						echo "<img src='"._DIR_IMG_PACK . 'jauge-vert.gif'."' width='".($lok-$l+2)."' style='margin-right:".($l-2)."px;' height='8' alt='' />";
					for (;(!$max_size_echec OR $i*$i<$max_size_echec) && $i<=$maxtest;$i+=$j){
						if (!isset($test[$i])){
							$url = generer_url_action("tester_taille", "arg=$i&time=$time");
							echo "<img src='$url' width='2' style='margin-left:{$margin_left}px;margin-right:".($l-2)."px;' height='8' alt='' />";
							$test[$i] = 1;
							$margin_left = 0;
						}
						else
							$margin_left += $l;
					}
					for (;$i<=$maxtest;$i+=$j) $lbad += $l;
					if ($lbad) echo "<img src='"._DIR_IMG_PACK . 'jauge-rouge.gif'."' width='$lbad' height='8' style='margin-left:{$margin_left}px;' alt='' />";
					
					echo "</div>";
				}
				echo "</div><br style='clear:both;' />";
			}
		}
		else {
			effacer_meta('max_taille_vignettes');
			effacer_meta('max_taille_vignettes_echec');
			effacer_meta('max_taille_vignettes_test');
			ecrire_metas();
		}
		echo '<br /><br />';
		echo "</div>";
					
		$block= "'none', 'block'";
		echo bouton_radio("creer_preview", "non", _T('item_choix_non_generation_miniature'), $creer_preview != "oui", "changeVisible(this.checked, 'config-preview', $block);");
		
		echo "<div style='text-align:$spip_lang_right'><input type='submit' value='"._T('bouton_valider')."' class='fondo' /></div>";
		
		fin_cadre_trait_couleur();
	}


	fin_cadre_trait_couleur();

}

// http://doc.spip.org/@moteur_config
function moteur_config()
{
	global $spip_lang_right;

	debut_cadre_trait_couleur("racine-site-24.gif", false, "", _T('info_moteur_recherche').aide ("confmoteur"));


	$activer_moteur = $GLOBALS['meta']["activer_moteur"];

	echo "<div class='verdana2'>";
		echo _T('info_question_utilisation_moteur_recherche');
	echo "</div>";

	echo "<div class='verdana2'>";
	echo afficher_choix('activer_moteur', $activer_moteur,
		array('oui' => _T('item_utiliser_moteur_recherche'),
			'non' => _T('item_non_utiliser_moteur_recherche')), ' &nbsp; ');
	echo "</div>";
	echo "<div style='text-align:$spip_lang_right'><input type='submit' value='"._T('bouton_valider')."' class='fondo' /></div>";

	fin_cadre_trait_couleur();
		
	echo "<br />";
}

// http://doc.spip.org/@statistiques_config
function statistiques_config()
{
	global $spip_lang_right;

	debut_cadre_trait_couleur("statistiques-24.gif", false, "", _T('info_forum_statistiques').aide ("confstat"));

	$activer_statistiques = $GLOBALS['meta']["activer_statistiques"];

	echo "<div class='verdana2'>";
	echo _T('info_question_gerer_statistiques');
	echo "</div>";

	echo "<div class='verdana2'>";
echo afficher_choix('activer_statistiques', $activer_statistiques,
	array('oui' => _T('item_gerer_statistiques'),
		'non' => _T('item_non_gerer_statistiques')), ' &nbsp; ');
	echo "</div>";
	echo "<div style='text-align:$spip_lang_right'><input type='submit' value='"._T('bouton_valider')."' class='fondo' /></div>";

	fin_cadre_trait_couleur();
	
	echo "<br />";
}

// http://doc.spip.org/@notification_config
function notification_config()
{
	global $spip_lang_right;

	debut_cadre_trait_couleur("article-24.gif", false, "", _T('info_travail_colaboratif').aide("artmodif"));
	$articles_modif = $GLOBALS['meta']["articles_modif"];


	echo "<div class='verdana2'>";
	echo _T('texte_travail_collaboratif');
	echo "</div>";

	echo "<div class='verdana2'>";
	echo afficher_choix('articles_modif', $articles_modif,
		array('oui' => _T('item_activer_messages_avertissement'),
			'non' => _T('item_non_activer_messages_avertissement')));
	echo "</div>";
	echo "<div style='text-align:$spip_lang_right'><input type='submit' value='"._T('bouton_valider')."' class='fondo' /></div>";

	fin_cadre_trait_couleur();

	echo "<br />";
}

// http://doc.spip.org/@versions_config
function versions_config()
 {
	global $spip_lang_right;

	debut_cadre_trait_couleur("historique-24.gif", false, "", _T('info_historique_titre').aide("suivimodif"));
	$articles_versions = $GLOBALS['meta']["articles_versions"];


	echo "<div class='verdana2'>";
	echo _T('info_historique_texte');
	echo "</div>";

	echo "<div class='verdana2'>";
	echo afficher_choix('articles_versions', $articles_versions,
		array('oui' => _T('info_historique_activer'),
			'non' => _T('info_historique_desactiver')));
	echo "</div>";
	echo "<div style='text-align:$spip_lang_right'><input type='submit' value='"._T('bouton_valider')."' class='fondo' /></div>";
	
	fin_cadre_trait_couleur();

	echo "<br />";
}


// http://doc.spip.org/@correcteur_config
function correcteur_config()
{

	global $spip_lang_right;
	debut_cadre_trait_couleur("ortho-24.gif", false, "", _T('ortho_orthographe').aide("corrortho"));
	$articles_ortho = $GLOBALS['meta']["articles_ortho"];

	echo "<div class='verdana2'>";
	echo _T('ortho_avis_privacy');
	echo "</div>";

	echo "<div class='verdana2'>";
	echo "<blockquote class='spip'>";
	echo _T('ortho_avis_privacy2');
	echo "</blockquote>\n";
	echo "</div>";

	echo "<div class='verdana2'>";
	echo afficher_choix('articles_ortho', $articles_ortho,
		array('oui' => _T('info_ortho_activer'),
			'non' => _T('info_ortho_desactiver')));
	echo "</div>";
	echo "<div style='text-align:$spip_lang_right'><input type='submit' value='"._T('bouton_valider')."' class='fondo' /></div>";
	
	fin_cadre_trait_couleur();

	echo "<br />";
}

// http://doc.spip.org/@previsu_config
function previsu_config()
{
	global $spip_lang_right;

	debut_cadre_trait_couleur("naviguer-site.png", false, "", _T('previsualisation').aide("previsu"));
	$preview = $GLOBALS['meta']["preview"];
	# non = personne n'est autorise a previsualiser (defaut)
	# oui = les admins
	# 1comite = admins et redacteurs

	echo "<div class='verdana2'>";
	echo _T('info_preview_texte');
	echo "</div>";

	echo "<div class='verdana2'>";
	echo afficher_choix('preview', $preview,
		array('oui' => _T('info_preview_admin'),
			'1comite' => _T('info_preview_comite'),
			'non' => _T('info_preview_desactive')
		)
	);
	echo "</div>";
		echo "<div style='text-align:$spip_lang_right'><input type='submit' value='"._T('bouton_valider')."' class='fondo' /></div>";
	
fin_cadre_trait_couleur();

	echo "<br />";
}

// http://doc.spip.org/@proxy_config
function proxy_config()
{
	global $spip_lang_right, $spip_lang_left;
	global $retour_proxy;

	debut_cadre_trait_couleur("base-24.gif", false, "", _T('info_sites_proxy').aide ("confhttpproxy"));

	// Masquer un eventuel password authentifiant
	if ($http_proxy = $GLOBALS['meta']["http_proxy"]) {
		include_spip('inc/distant');
		$http_proxy=entites_html(no_password_proxy_url($http_proxy));
	}

	echo "<div class='verdana2'>";
	echo propre(_T('texte_proxy'));
	echo "</div>";

	echo "<div class='verdana2'>";
	echo "<input type='text' name='http_proxy' value='$http_proxy' size='40' class='forml' />";

	if ($http_proxy) {
		echo "<p align='$spip_lang_left' style='color: #000000;' class='verdana1 spip_small'>"
			. _T('texte_test_proxy');
		echo "</p>";

		echo "<p>";
		echo "<input type='text' name='test_proxy' value='http://www.spip.net/' size='40' class='forml' />";
		echo "</p>";

		if($retour_proxy) {
			echo debut_boite_info(true);
			echo $retour_proxy;
			echo fin_boite_info(true);
		}

		echo "<div style='text-align: $spip_lang_right;'><input type='submit' name='tester_proxy' value='"._T('bouton_test_proxy')."' class='fondo' /></div>";

	}


	echo "</div>";
	echo "<div style='text-align:$spip_lang_right'><input type='submit' value='"._T('bouton_valider')."' class='fondo' /></div>";
	
	fin_cadre_trait_couleur();
}

// http://doc.spip.org/@htpasswd_config
function htpasswd_config()
{
	global $spip_lang_right;

	include_spip('inc/acces');
	ecrire_acces();

	debut_cadre_trait_couleur("cadenas-24.gif", false, "",
		_T('info_fichiers_authent'));

	$creer_htpasswd = $GLOBALS['meta']["creer_htpasswd"];

	echo "<div class='verdana2'>", _T('texte_fichier_authent', array('dossier' => '<tt>'.joli_repertoire(_DIR_TMP).'</tt>')), "</div>";

	echo "<div class='verdana2'>";
	echo afficher_choix('creer_htpasswd', $creer_htpasswd,
		array('oui' => _T('item_creer_fichiers_authent'),
			'non' =>  _T('item_non_creer_fichiers_authent')),
		' &nbsp; ');
	echo "</div>";
	echo "<div style='text-align:$spip_lang_right'><input type='submit' value='"._T('bouton_valider')."' class='fondo' /></div>";
	
	fin_cadre_trait_couleur();
}

##### n'est pas encore utilise #######
// http://doc.spip.org/@htaccess_config
function htaccess_config()
 {

	global $spip_lang_right;

	debut_cadre_trait_couleur("cadenas-24.gif", false, "", 
			  _L("Acc&egrave;s aux document joints par leur URL"));
#	include_spip('inc/acces'); vient d'etre fait
	$creer_htaccess = gerer_htaccess();

	echo "<div class='verdana2'>";
	echo _L("Cette option interdit la lecture des documents joints si le texte auquel ils se rattachent n'est pas publi&eacute");
	echo "</div>";

	echo "<div class='verdana2'>";
	echo afficher_choix('creer_htaccess', $creer_htaccess,
		       array('oui' => _L("interdire la lecture"),
			     'non' => _L("autoriser la lecture")),
		       ' &nbsp; ');
	echo "</div>";
	echo "<div style='text-align:$spip_lang_right'><input type='submit'  value='"._T('bouton_valider')."' class='fondo' /></div>";
	
	fin_cadre_trait_couleur();

	echo "<br />";
}

?>
