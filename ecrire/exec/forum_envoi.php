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
include_spip('inc/barre');

// http://doc.spip.org/@exec_forum_envoi_dist
function exec_forum_envoi_dist()
{
	forum_envoi(  
		    intval(_request('id')),
		    intval(_request('id_parent')),
		    _request('modif_forum'),
		    _request('nom_site'),
		    _request('statut'),
		    _request('texte'),
		    _request('titre_message'),
		    _request('url_site'),
		    _request('script'));
}

// http://doc.spip.org/@forum_envoi
function forum_envoi(  
		     $id,
		     $id_parent,
		     $modif_forum,
		     $nom_site,
		     $statut,
		     $texte,
		     $titre_message,
		     $url_site,
		     $script)
{
	global     $options, $spip_lang_rtl;

	// Chercher a quoi on repond pour preremplir le titre
	// et le bouton "retour"
	if ($id_parent) {
		$result = spip_query("SELECT * FROM spip_forum WHERE id_forum=$id_parent");
		if ($row = spip_fetch_array($result)) {
			$id_article = $row['id_article'];
			$id_breve = $row['id_breve'];
			$id_rubrique = $row['id_rubrique'];
			$id_message = $row['id_message'];
			$id_syndic = $row['id_syndic'];
			$statut = $row['statut'];
			$titre_parent = typo($row['titre']);
			$texte_parent = $row['texte'];
			$auteur_parent = $row['auteur'];
			$id_auteur_parent = $row['id_auteur'];
			$date_heure_parent = $row['date_heure'];
			$nom_site_parent = $row['nom_site'];
			$url_site_parent = $row['url_site'];

			$parent = debut_cadre_forum("forum-interne-24.gif", true, "", $titre_parent)
			. "<span class='arial2'>$date_heure_parent</span> ";

			if ($id_auteur_parent) {
				$formater_auteur = charger_fonction('formater_auteur', 'inc');
				list($s, $mail, $nom, $w, $p) = $formater_auteur($id_auteur_parent);
				$parent .="$mail&nbsp;$nom";
			} else 	$parent .=" " . typo($auteur_parent);

			$parent .= justifier(propre($texte_parent));

			if (strlen($url_site_parent) > 10 AND $nom_site_parent) {
				$parent .="<p style='text-align: left; font-weight: bold;' class='verdana1'><a href='$url_site_parent'>$nom_site_parent</a></p>";
			}
			$parent .= fin_cadre_forum(true);
		}

	} else { $parent = $titre_parent = $id_message = ''; $row = array();}

	list($script,$retour) = split('\?', urldecode($script));
	if (function_exists($f = 'forum_envoi_' . $script))
	  list($table, $objet, $titre, $num, $retour, $id, $corps) =
	    $f($id, $row, $retour);
	else $table = $objet = $titre = $num = $retour = $corps ='';

	if (!$titre_message) {
		if ($table) {
			$q = spip_query("SELECT $titre AS titre FROM spip_$table WHERE $objet=$id");
			$q = spip_fetch_array($q);
			$titre_message = $q['titre'];
		} else 	$titre_message = _T('texte_nouveau_message');
	}

	// debut de page
	$commencer_page = charger_fonction('commencer_page', 'inc');
	echo $commencer_page(_T('texte_nouveau_message'), "accueil", $id_message ? "messagerie" : "accueil");
	debut_gauche();

	debut_droite();
	gros_titre(($num ? "$num $id<br />" :'') . $titre_message);

	// previsualisation/validation
	if ($modif_forum == "oui") {
		$corps .= forum_envoi_entete($parent, $titre_parent, $texte, $titre_message, $nom_site, $url_site);
		$parent = '';
	}

	// formulaire
	$corps .= debut_cadre_formulaire(($statut == 'privac') ? "" : 'background-color: #dddddd;', true)
	. forum_envoi_formulaire($id, generer_url_ecrire($script, $retour), $statut, $texte, $titre_message,  $nom_site, $url_site)
	. "<div align='right'><input class='fondo' type='submit' value='"
	. _T('bouton_voir_message')
	. "' /></div>"
	. fin_cadre_formulaire(true);

	$cat = intval($id) . '/'
	  . intval($id_parent) . '/'
	  . $statut . '/'
	  . $script . '/'
	  . $objet;

	echo  $parent,
	  "\n<div>&nbsp;</div>"
	  . redirige_action_auteur('poster_forum_prive',$cat, $script, $retour, $corps, "\nmethod='post' name='formulaire' id='formulaire'")
	  . fin_gauche()
	  . fin_page();
}

function forum_envoi_articles($id, $row, $retour) {
	$table ='articles';
	$objet = 'id_article';
	$titre = 'titre';
	$num = _T('info_numero_article');
	if (!$id)  $id = $row['id_article'];
	if (!$retour) $retour = "$objet=$id"; 
	return array($table, $objet, $titre, $num, $retour, $id, '');
}

function forum_envoi_breves_voir($id, $row, $retour) {
	$table = 'breves';
	$objet = 'id_breve';
	$titre = 'titre';
	$num = _T('info_gauche_numero_breve');
	if (!$id)  $id = $row['id_breve'];
	if (!$retour) $retour = "$objet=$id"; 
	return array($table, $objet, $titre, $num, $retour, $id, '');
}

function forum_envoi_message($id, $row, $retour) {
	$table = 'messages';
	$objet = 'id_message';
	$titre = 'titre';
	$num = _T('message') . ' ' ._T('info_numero_abbreviation');
	if (!$id)  $id = $row['id_message'];
	if (!$retour) $retour = "$objet=$id"; 
	return array($table, $objet, $titre, $num, $retour, $id, '');
}

function forum_envoi_naviguer($id, $row, $retour) {
	$table = 'rubriques';
	$objet = 'id_rubrique';
	$titre = 'titre';
	$num = _T('titre_numero_rubrique');
	if (!$id)  $id = $row['id_rubrique'];
	if (!$retour) $retour = "$objet=$id"; 
	return array($table, $objet, $titre, $num, $retour, $id, '');
}

function forum_envoi_sites($id, $row, $retour) {
	$table = 'syndic';
	$objet = 'id_syndic';
	$titre = 'nom_site';
	$num = _T('titre_site_numero');
	if (!$id)  $id = $row['id_syndic'];
	if (!$retour) $retour = "$objet=$id"; 
	return array($table, $objet, $titre, $num, $retour, $id, '');
}

function forum_envoi_forum($id, $row, $retour) {

	$table = $titre = $num = '';
	$id = 0; // pour forcer la creation dans action/poster
	$objet = 'id_forum';
	$debut = intval(_request('debut'));
	$retour = ("debut=$debut"); 
	$corps .= "<input type='hidden' name='debut' value='$debut' />";
	return array($table, $objet, $titre, $num, $retour, $id, $corps);
}

function forum_envoi_forum_admin($id, $row, $retour) {
	return forum_envoi_forum($id, $row, $retour);
}

// http://doc.spip.org/@forum_envoi_formulaire
function forum_envoi_formulaire($id, $retour, $statut, $texte, $titre_page, $nom_site, $url_site)
{
	global $options;

	if ($statut == "prive") $logo = "forum-interne-24.gif";
	else if ($statut == "privadm") $logo = "forum-admin-24.gif";
	else if ($statut == "privrac") $logo = "forum-interne-24.gif";
	else $logo = "forum-public-24.gif";

	return "\n<table border='0' cellpadding='0' cellspacing='0' width='100%'><tr><td>"
	  . icone(_T('icone_retour'), $retour, $logo, '','', false)
	  ."</td>"
	  ."\n<td><img src='"
	  . _DIR_IMG_PACK
	  . "rien.gif' style='width: 10px; border: 0px;' alt=''/></td><td style='width: 100%'>"
	  ."<b><label for='titre_message'>"
	  . _T('info_titre')
	  ."</label></b><br />\n"
	  . "<input id='titre_message' name='titre_message' type='text' value=\""
	  . entites_html($titre_page)
	  . "\" size='40'  class='formo' />\n"
	  . "</td></tr></table><br />"
	  .
	  "<b><label for='texte'>" .
	  _T('info_texte_message') .
	  "</label></b><br />\n" .
	  _T('info_creation_paragraphe') .
	  "<br />\n" .
	  afficher_textarea_barre($texte, true) .
	  "<input type='hidden' name='modif_forum' value='oui' />\n" .
	  (!($statut != 'perso' AND $options == "avancees")
	   ? ''
	   : ("<b>"._T('info_lien_hypertexte')."</b><br />\n"
		. _T('texte_lien_hypertexte')."<br />\n"
		. "<label for='nom_site'>"
		. _T('form_prop_nom_site')
		. "</label><br />\n"
		. "<input type='text' id='nom_site' name='nom_site' value=\""
	        . entites_html($nom_site)
	        . "\" size='40' class='forml' />"
		. "<label for='url_site'>"
		. _T('info_url')
		."</label><br /><br />\n"
		. "<input type='text' class='forml' id='url_site' name='url_site' value=\"".entites_html($url_site)
		. "\" size='40' />"	      ));
}

// http://doc.spip.org/@forum_envoi_entete
function forum_envoi_entete($parent, $titre_parent, $texte, $titre_texte, $nom_site, $url_site)
{
	global $spip_lang_rtl;

	return "\n<table width='100%' cellpadding='0' cellspacing='0' border='0'>"
		. (!$parent ? '' : "<tr><td colspan='2'>$parent</td></tr>")
		. "<tr>"
		. (!$parent ? "<td colsan='2'"
			: (" <td style='width: 10px; background-image: url("
			   . _DIR_IMG_PACK
			   . "forum-vert.gif" 
			   . ");'>"
			   . http_img_pack('rien.gif', ' ', " style='width: 0px; height: 0px; border: 0px;'")
			   . "</td>\n<td "))
		.  " style='width: 100%' valign='top' rowspan='2'>"
		.  debut_cadre_thread_forum("", true, "", typo($titre_texte))
		. propre($texte)
		. (!$nom_site ? '' : "<p><a href='$url_site'>$nom_site</a></p>")
		. "\n<div align='right'><input class='fondo' type='submit' name='valider_forum' value='"
		. _T('bouton_envoyer_message')
		. "' /></div>"
		. fin_cadre_thread_forum(true)
		. "</td>"
		. "</tr>\n"
		. (!$parent ? ''
			: ("<tr><td valign='top' style='width: 10px; background-image: url("
			  . _DIR_IMG_PACK
			  . "rien.gif);'>"
			  .  http_img_pack("forum-droite$spip_lang_rtl.gif", $titre_parent, " style='width: 10px; height: 13px'")
		      . "</td>\n</tr>"))
		. "</table>"
		. "\n<div>&nbsp;</div>";
}

?>
