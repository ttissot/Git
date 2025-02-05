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
include_spip('inc/sites_voir');

// http://doc.spip.org/@exec_sites_tous_dist
function exec_sites_tous_dist()
{
	global $connect_statut, $options;

pipeline('exec_init',array('args'=>array('exec'=>'sites_tous'),'data'=>''));
$commencer_page = charger_fonction('commencer_page', 'inc');
echo $commencer_page(_T('titre_page_sites_tous'),"naviguer","sites");
debut_gauche();
echo pipeline('affiche_gauche',array('args'=>array('exec'=>'sites_tous'),'data'=>''));
creer_colonne_droite();
echo pipeline('affiche_droite',array('args'=>array('exec'=>'sites_tous'),'data'=>''));	  
debut_droite();

 echo afficher_sites('<b>' . _T('titre_sites_tous') . '</b>', array("FROM" => 'spip_syndic', 'WHERE' => "syndication='non' AND statut='publie'", 'ORDER BY'=> "nom_site"));

 echo afficher_sites('<b>' . _T('titre_sites_syndiques') . '</b>', array('FROM' => 'spip_syndic', 'WHERE' => "(syndication='oui' OR syndication='sus') AND statut='publie'", 'ORDER BY' => "nom_site"));

 echo afficher_sites('<b>' . _T('titre_sites_proposes') . '</b>', array("FROM" => 'spip_syndic', 'WHERE' => "statut='prop'", 'ORDER BY' => "nom_site"));

if ($connect_statut == '0minirezo' OR $GLOBALS['meta']["proposer_sites"] > 0) {
	echo "<div align='right'>";
	icone(_T('icone_referencer_nouveau_site'), generer_url_ecrire('sites_edit'), "site-24.gif", "creer.gif");
	echo "</div>";
}

echo pipeline('affiche_milieu',array('args'=>array('exec'=>'sites_tous'),'data'=>''));	  


 echo afficher_sites('<b>' . _T('avis_sites_probleme_syndication') . '</b>', array("FROM" => 'spip_syndic', 'WHERE' => "syndication='off' AND statut='publie'", 'ORDER BY' => "nom_site"));

if ($options == 'avancees' AND $connect_statut == '0minirezo') {
  echo afficher_sites('<b>' . _T('info_sites_refuses') . '</b>', array("FROM" => 'spip_syndic', 'WHERE' => "statut='refuse'", 'ORDER BY' => "nom_site"));
}

 echo afficher_syndic_articles('<b>' . _T('titre_dernier_article_syndique') . '</b>', array('FROM' => 'spip_syndic_articles', 'ORDER BY' => "date DESC",  'LIMIT' => "50"));

echo fin_gauche(), fin_page();
}

?>
