<?php
/*
 * Squelette : dist/backend.html
 * Date :      Wed, 07 Nov 2012 14:17:39 GMT
 * Compile :   Wed, 14 Nov 2012 17:37:09 GMT (0.01s)
 * Boucles :   _10recents, _tres_recents
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_10recentshtml_5c759b9494210182833bdddba659202a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {
	$doublons_index = array();

	// REQUETE
	$result = spip_optim_select(
		array("articles.id_article",
		"articles.lang"), # SELECT
		array('L1' => 'spip_mots_articles','articles' => 'spip_articles'), # FROM
		
			array(($Pile[$SP]['lang'] ? 
			array('=', 'articles.lang', _q($GLOBALS['spip_lang'])) : ''), ($Pile[$SP]['id_rubrique'] ? calcul_mysql_in('articles.id_rubrique', calcul_branche($Pile[$SP]['id_rubrique']), '') : 1), ($Pile[$SP]['id_mot'] ? 
			array('=', 'L1.id_mot', _q($Pile[$SP]['id_mot'])) : ''), 
			array(calcul_mysql_in('articles.id_article', "0".$doublons[$doublons_index[]= ('articles')], 'NOT')), 
			array('=', 'articles.statut', '"publie"')), # WHERE
		array(1 => array('articles', 'id_article')), # WHERE pour jointure
		"articles.id_article", # GROUP
		array('articles.date' . ' DESC'), # ORDER
		'0,10', # LIMIT
		'', # sous
		
			array(), # HAVING
		'articles', # table
		'_10recents', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-rss-item') . ',
	\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'
');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_tres_recentshtml_5c759b9494210182833bdddba659202a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {
	$doublons_index = array();

	// REQUETE
	$result = spip_optim_select(
		array("articles.id_article",
		"articles.lang"), # SELECT
		array('L1' => 'spip_mots_articles','articles' => 'spip_articles'), # FROM
		
			array(($Pile[$SP]['lang'] ? 
			array('=', 'articles.lang', _q($GLOBALS['spip_lang'])) : ''), ($Pile[$SP]['id_rubrique'] ? calcul_mysql_in('articles.id_rubrique', calcul_branche($Pile[$SP]['id_rubrique']), '') : 1), ($Pile[$SP]['id_mot'] ? 
			array('=', 'L1.id_mot', _q($Pile[$SP]['id_mot'])) : ''), 
			array('<', 'LEAST((UNIX_TIMESTAMP(now())-UNIX_TIMESTAMP(articles.date))/86400,
	TO_DAYS(now())-TO_DAYS(articles.date),
	DAYOFMONTH(now())-DAYOFMONTH(articles.date)+30.4368*(MONTH(now())-MONTH(articles.date))+365.2422*(YEAR(now())-YEAR(articles.date)))', "'3'"), 
			array(calcul_mysql_in('articles.id_article', "0".$doublons[$doublons_index[]= ('articles')], 'NOT')), 
			array('=', 'articles.statut', '"publie"')), # WHERE
		array(1 => array('articles', 'id_article')), # WHERE pour jointure
		"articles.id_article", # GROUP
		array('articles.date' . ' DESC'), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'articles', # table
		'_tres_recents', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-rss-item') . ',
	\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'
');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette dist/backend.html
//
function html_5c759b9494210182833bdddba659202a($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<?php header("X-Spip-Cache: 3600"); ?>' .
'<'.'?php header("' . ('Content-type: text/xml' .
	((strval($t2 = interdire_scripts($GLOBALS['meta']['charset']))!='') ?
			('; charset=' . $t2) :
			(''))) . '"); ?'.'>' .
'
' .
'<'.'?php header("' . 'X-Xml-Hack: ok' . '"); ?'.'>' .
'<?xml version="1.0"' .
((strval($t1 = interdire_scripts($GLOBALS['meta']['charset']))!='') ?
		(' encoding="' . $t1 . '"') :
		('')) .
'?>
<rss version="2.0"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
>

<channel>
	<title>' .
interdire_scripts(texte_backend(typo($GLOBALS['meta']['nom_site']))) .
'</title>
	<link>' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/</link>
	<description>' .
interdire_scripts(texte_backend(supprimer_tags(propre($GLOBALS['meta']['descriptif_site'])))) .
'</description>
	<language>' .
htmlentities($Pile[0]['lang'] ? $Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'</language>
	<generator>SPIP - www.spip.net</generator>

' .
((strval($t1 = texte_backend(url_absolue(extraire_attribut(affiche_logos(calcule_logo('id_syndic', 'ON', "'0'",'',  ''), '', ''),'src'))))!='') ?
		(('	<image>
		<title>' .
	interdire_scripts(texte_backend(typo($GLOBALS['meta']['nom_site']))) .
	'</title>
		<url>') . $t1 . ('</url>
		<link>' .
	htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/</link>
		' .
	((strval($t2 = extraire_attribut(affiche_logos(calcule_logo('id_syndic', 'ON', "'0'",'',  ''), '', ''),'height'))!='') ?
			('<height>' . $t2 . '</height>') :
			('')) .
	'
		' .
	((strval($t2 = extraire_attribut(affiche_logos(calcule_logo('id_syndic', 'ON', "'0'",'',  ''), '', ''),'width'))!='') ?
			('<width>' . $t2 . '</width>') :
			('')) .
	'
	</image>
')) :
		('')) .
'

' .
BOUCLE_10recentshtml_5c759b9494210182833bdddba659202a($Cache, $Pile, $doublons, $Numrows, $SP) .
'

' .
BOUCLE_tres_recentshtml_5c759b9494210182833bdddba659202a($Cache, $Pile, $doublons, $Numrows, $SP) .
'

</channel>

</rss>
');

	return analyse_resultat_skel('html_5c759b9494210182833bdddba659202a', $Cache, $page);
}

?>