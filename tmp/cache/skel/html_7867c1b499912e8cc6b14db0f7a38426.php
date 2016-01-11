<?php
/*
 * Squelette : dist/inc-rss-item.html
 * Date :      Wed, 07 Nov 2012 14:17:40 GMT
 * Compile :   Wed, 14 Nov 2012 17:37:09 GMT (0.03s)
 * Boucles :   _mots_rss, _rubrique_mf, _mots_mf, _documents, _un_article
 */ 
//
// <BOUCLE mots>
//
function BOUCLE_mots_rsshtml_7867c1b499912e8cc6b14db0f7a38426(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("mots.id_mot",
		"mots.titre"), # SELECT
		array('L1' => 'spip_mots_articles','mots' => 'spip_mots'), # FROM
		
			array(
			array('=', 'L1.id_article', _q($Pile[$SP]['id_article']))), # WHERE
		array(1 => array('mots', 'id_mot')), # WHERE pour jointure
		"mots.id_mot", # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'mots', # table
		'_mots_rss', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= ('
		' .
((strval($t1 = interdire_scripts(texte_backend(typo($Pile[$SP]['titre']))))!='') ?
		('<dc:subject>' . $t1 . '</dc:subject>') :
		('')));
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubrique_mfhtml_7867c1b499912e8cc6b14db0f7a38426(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.lang"), # SELECT
		array('rubriques' => 'spip_rubriques'), # FROM
		
			array(
			array('=', 'rubriques.id_rubrique', _q($Pile[$SP]['id_rubrique'])), 
			array('=', 'rubriques.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'rubriques', # table
		'_rubrique_mf', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('-
' .
((strval($t1 = interdire_scripts(texte_backend(supprimer_tags(typo($Pile[$SP]['titre'])))))!='') ?
		(('&lt;a href="' .
	url_absolue(vider_url(generer_url_rubrique($Pile[$SP]['id_rubrique']))) .
	'" rel="directory"&gt;') . $t1 . '&lt;/a&gt;') :
		('')) .
'
');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_mots_mfhtml_7867c1b499912e8cc6b14db0f7a38426(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("mots.id_mot",
		"mots.titre"), # SELECT
		array('L1' => 'spip_mots_articles','mots' => 'spip_mots'), # FROM
		
			array(
			array('=', 'L1.id_article', _q($Pile[$SP]['id_article']))), # WHERE
		array(1 => array('mots', 'id_mot')), # WHERE pour jointure
		"mots.id_mot", # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'mots', # table
		'_mots_mf', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t1 = ('
' .
((strval($t1 = interdire_scripts(texte_backend(typo($Pile[$SP]['titre']))))!='') ?
		(('&lt;a href="' .
	url_absolue(vider_url(generer_url_mot($Pile[$SP]['id_mot']))) .
	'" rel="tag"&gt;') . $t1 . '&lt;/a&gt;') :
		('')));
		$t0 .= (($t1 && $t0) ? ', ' : '') . $t1;
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE documents>
//
function BOUCLE_documentshtml_7867c1b499912e8cc6b14db0f7a38426(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {
	$doublons_index = array();

	// REQUETE
	$result = spip_optim_select(
		array("documents.id_document",
		"documents.taille",
		"J1.mime_type"), # SELECT
		array('L1' => 'spip_documents_articles','J1' => 'spip_types_documents','documents' => 'spip_documents'), # FROM
		
			array(
			array('=', 'L1.id_article', _q($Pile[$SP]['id_article'])), 
			array('=', 'documents.mode', "'document'"), 
			array(calcul_mysql_in('documents.id_document', "0".$doublons[$doublons_index[]= ('documents')], 'NOT')), 
			array('=', 'documents.id_type', 'J1.id_type'), 
			array('(documents.taille > 0 OR documents.distant="oui")')), # WHERE
		array(1 => array('documents', 'id_document')), # WHERE pour jointure
		"documents.id_document", # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'documents', # table
		'_documents', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_document']; // doublons

		$t0 .= (((strval($t1 = unique(url_absolue(vider_url(generer_url_document($Pile[$SP]['id_document'])))))!='') ?
		('
		<enclosure url="' . $t1 . ('"' .
	((strval($t2 = interdire_scripts($Pile[$SP]['taille']))!='') ?
			(' length="' . $t2 . '"') :
			('')) .
	((strval($t2 = interdire_scripts($Pile[$SP]['mime_type']))!='') ?
			(' type="' . $t2 . '"') :
			('')) .
	' />')) :
		('')) .
'
		');
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_un_articlehtml_7867c1b499912e8cc6b14db0f7a38426(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("articles.id_article",
		"articles.id_rubrique",
		"articles.titre",
		"articles.date",
		"articles.lang",
		"articles.texte",
		"articles.chapo",
		"articles.descriptif",
		"articles.ps"), # SELECT
		array('articles' => 'spip_articles'), # FROM
		
			array(
			array('=', 'articles.id_article', _q($Pile[$SP]['id_article'])), 
			array('=', 'articles.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'articles', # table
		'_un_article', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
	<item>
		<title>' .
interdire_scripts(texte_backend(supprimer_tags(typo($Pile[$SP]['titre'])))) .
'</title>
		<link>' .
url_absolue(vider_url(generer_url_article($Pile[$SP]['id_article']))) .
'</link>
		' .
((strval($t1 = url_absolue(vider_url(generer_url_article($Pile[$SP]['id_article']))))!='') ?
		('<guid isPermaLink="true">' . $t1 . '</guid>') :
		('')) .
'
		' .
((strval($t1 = date_iso(vider_date($Pile[$SP]['date'])))!='') ?
		('<dc:date>' . $t1 . '</dc:date>') :
		('')) .
'
		<dc:format>text/html</dc:format>
		' .
((strval($t1 = htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']))!='') ?
		('<dc:language>' . $t1 . '</dc:language>') :
		('')) .
'
		' .
((strval($t1 = texte_backend(supprimer_tags(recuperer_fond(
			'modeles/lesauteurs',
			array('id_article' => $Pile[$SP]['id_article'])))))!='') ?
		('<dc:creator>' . $t1 . '</dc:creator>') :
		('')) .
'

' .
BOUCLE_mots_rsshtml_7867c1b499912e8cc6b14db0f7a38426($Cache, $Pile, $doublons, $Numrows, $SP) .
'

		<description>' .
interdire_scripts(texte_backend(calcul_introduction('articles', $Pile[$SP]['texte'], $Pile[$SP]['chapo'], $Pile[$SP]['descriptif']))) .
'

' .
BOUCLE_rubrique_mfhtml_7867c1b499912e8cc6b14db0f7a38426($Cache, $Pile, $doublons, $Numrows, $SP) .
((strval($t1 = BOUCLE_mots_mfhtml_7867c1b499912e8cc6b14db0f7a38426($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
		('
/ ' . $t1) :
		('')) .
'

		</description>

' .
((strval($t1 = interdire_scripts((($GLOBALS["meta"]['syndication_integrale'] == 'oui') ? ' ':'')))!='') ?
		('
' . $t1 . ('<content:encoded>' .
	((strval($t2 = texte_backend(affiche_logos(calcule_logo('id_article', 'ON', $Pile[$SP]['id_article'],'',  ''), '', 'right')))!='') ?
			($t2 . '
		') :
			('')) .
	((strval($t2 = interdire_scripts(texte_backend(traiter_doublons_documents($doublons, propre(nettoyer_chapo($Pile[$SP]['chapo']))))))!='') ?
			('&lt;div class=\'rss_chapo\'&gt;' . $t2 . '&lt;/div&gt;
		') :
			('')) .
	((strval($t2 = interdire_scripts(texte_backend(filtrer('image_reduire',traiter_doublons_documents($doublons, propre($Pile[$SP]['texte'])),'520','0'))))!='') ?
			('&lt;div class=\'rss_texte\'&gt;' . $t2 . '&lt;/div&gt;
		') :
			('')) .
	((strval($t2 = interdire_scripts(texte_backend(calculer_notes())))!='') ?
			('&lt;hr /&gt;
		&lt;div class=\'rss_notes\'&gt;' . $t2 . '&lt;/div&gt;
		') :
			('')) .
	((strval($t2 = interdire_scripts(texte_backend(traiter_doublons_documents($doublons, propre($Pile[$SP]['ps'])))))!='') ?
			('&lt;div class=\'rss_ps\'&gt;' . $t2 . '&lt;/div&gt;') :
			('')) .
	'
		</content:encoded>
')) :
		('')) .
'

' .
'		' .
BOUCLE_documentshtml_7867c1b499912e8cc6b14db0f7a38426($Cache, $Pile, $doublons, $Numrows, $SP) .
'

	</item>
');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette dist/inc-rss-item.html
//
function html_7867c1b499912e8cc6b14db0f7a38426($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<?php header("X-Spip-Cache: 3600"); ?>' .
BOUCLE_un_articlehtml_7867c1b499912e8cc6b14db0f7a38426($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_7867c1b499912e8cc6b14db0f7a38426', $Cache, $page);
}

?>