<?php
/*
 * Squelette : dist/agenda_mois.html
 * Date :      Wed, 07 Nov 2012 14:17:39 GMT
 * Compile :   Mon, 30 Dec 2013 01:08:43 GMT (0.02s)
 * Boucles :   _mois
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_moishtml_00c641804292ca527b8d58c5d4e5a2f8(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("articles.date",
		"articles.descriptif",
		"articles.titre",
		"articles.id_article",
		"articles.id_secteur",
		"articles.lang"), # SELECT
		array('articles' => 'spip_articles'), # FROM
		
			array(
			array('=', 'DATE_FORMAT(articles.date, \'%Y%m\')', 
sprintf("%04d", ($x = interdire_scripts(entites_html($Pile[0]['annee']))) ? $x : date("Y")) . 
sprintf("%02d", ($x = interdire_scripts(entites_html($Pile[0]['mois']))) ? $x : date("m"))), 
			array('=', 'articles.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'articles', # table
		'_mois', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= agenda_memo(vider_date($Pile[$SP]['date']),interdire_scripts(propre($Pile[$SP]['descriptif'])),interdire_scripts(typo($Pile[$SP]['titre'])),vider_url(generer_url_article($Pile[$SP]['id_article'])),('calendrier-couleur' .
	modulo($Pile[$SP]['id_secteur'],'14','1')));
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette dist/agenda_mois.html
//
function html_00c641804292ca527b8d58c5d4e5a2f8($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ((strval($t1 = BOUCLE_moishtml_00c641804292ca527b8d58c5d4e5a2f8($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
		($t1) :
		(agenda_affiche(vider_date($Pile[0]['date']),_T('public/spip/ecrire:aucun_article'),'mois')));

	return analyse_resultat_skel('html_00c641804292ca527b8d58c5d4e5a2f8', $Cache, $page);
}

?>