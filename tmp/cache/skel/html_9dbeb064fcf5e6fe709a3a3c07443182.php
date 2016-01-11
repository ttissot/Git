<?php
/*
 * Squelette : dist/forum.html
 * Date :      Wed, 07 Nov 2012 14:17:39 GMT
 * Compile :   Mon, 30 Dec 2013 01:10:15 GMT (0.11s)
 * Boucles :   _ariane_site, _contexte_site, _ariane_rubrique, _contexte_rubrique, _ariane_breve, _contexte_breve, _ariane_article, _contexte_article, _contexte_forum, _article, _breve, _rubrique, _syndic, _forum_parent
 */ 
//
// <BOUCLE hierarchie>
//
function BOUCLE_ariane_sitehtml_9dbeb064fcf5e6fe709a3a3c07443182(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {
	$hierarchie = calculer_hierarchie($Pile[$SP]['id_rubrique'], true);

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.id_rubrique",
		"rubriques.titre",
		"FIELD(rubriques.id_rubrique, $hierarchie) AS rang",
		"rubriques.lang"), # SELECT
		array('rubriques' => 'spip_rubriques'), # FROM
		
			array(), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('rang'), # ORDER
		'', # LIMIT
		'', # sous
		
			array(
			array('<>', 'rang', 0)), # HAVING
		'rubriques', # table
		'_ariane_site', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
		&gt; <a href="' .
vider_url(generer_url_rubrique($Pile[$SP]['id_rubrique'])) .
'">' .
interdire_scripts(couper(typo($Pile[$SP]['titre']),'80')) .
'</a>
		');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE syndication>
//
function BOUCLE_contexte_sitehtml_9dbeb064fcf5e6fe709a3a3c07443182(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("syndic.id_syndic",
		"syndic.id_rubrique"), # SELECT
		array('syndic' => 'spip_syndic'), # FROM
		
			array(
			array('=', 'syndic.id_syndic', _q($Pile[$SP]['id_syndic'])), 
			array('=', 'syndic.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'syndic', # table
		'_contexte_site', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= ('
		' .
BOUCLE_ariane_sitehtml_9dbeb064fcf5e6fe709a3a3c07443182($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		&gt; <a href="' .
generer_url_site($Pile[$SP]['id_syndic']) .
'">' .
interdire_scripts(couper(typo($Pile[0]['titre']),'80')) .
'</a>
		');
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE hierarchie>
//
function BOUCLE_ariane_rubriquehtml_9dbeb064fcf5e6fe709a3a3c07443182(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {
	$hierarchie = calculer_hierarchie($Pile[$SP]['id_rubrique'], true);

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.id_rubrique",
		"rubriques.titre",
		"FIELD(rubriques.id_rubrique, $hierarchie) AS rang",
		"rubriques.lang"), # SELECT
		array('rubriques' => 'spip_rubriques'), # FROM
		
			array(), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('rang'), # ORDER
		'', # LIMIT
		'', # sous
		
			array(
			array('<>', 'rang', 0)), # HAVING
		'rubriques', # table
		'_ariane_rubrique', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
		&gt; <a href="' .
vider_url(generer_url_rubrique($Pile[$SP]['id_rubrique'])) .
'">' .
interdire_scripts(couper(typo($Pile[$SP]['titre']),'80')) .
'</a>
		');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_contexte_rubriquehtml_9dbeb064fcf5e6fe709a3a3c07443182(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.id_rubrique",
		"rubriques.titre",
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
		'_contexte_rubrique', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
		' .
BOUCLE_ariane_rubriquehtml_9dbeb064fcf5e6fe709a3a3c07443182($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		&gt; <a href="' .
vider_url(generer_url_rubrique($Pile[$SP]['id_rubrique'])) .
'">' .
interdire_scripts(couper(typo($Pile[$SP]['titre']),'80')) .
'</a>
		');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_ariane_brevehtml_9dbeb064fcf5e6fe709a3a3c07443182(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.id_rubrique",
		"rubriques.titre",
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
		'_ariane_breve', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
		&gt; <a href="' .
vider_url(generer_url_rubrique($Pile[$SP]['id_rubrique'])) .
'">' .
interdire_scripts(couper(typo($Pile[$SP]['titre']),'80')) .
'</a>
		');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE breves>
//
function BOUCLE_contexte_brevehtml_9dbeb064fcf5e6fe709a3a3c07443182(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("breves.id_rubrique",
		"breves.id_breve",
		"breves.titre",
		"breves.lang"), # SELECT
		array('breves' => 'spip_breves'), # FROM
		
			array(
			array('=', 'breves.id_breve', _q($Pile[$SP]['id_breve'])), 
			array('=', 'breves.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'breves', # table
		'_contexte_breve', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
		' .
BOUCLE_ariane_brevehtml_9dbeb064fcf5e6fe709a3a3c07443182($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		&gt; <a href="' .
vider_url(generer_url_breve($Pile[$SP]['id_breve'])) .
'">' .
interdire_scripts(couper(typo($Pile[$SP]['titre']),'80')) .
'</a>
		');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE hierarchie>
//
function BOUCLE_ariane_articlehtml_9dbeb064fcf5e6fe709a3a3c07443182(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {
	$hierarchie = calculer_hierarchie($Pile[$SP]['id_rubrique'], false);

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.id_rubrique",
		"rubriques.titre",
		"FIELD(rubriques.id_rubrique, $hierarchie) AS rang",
		"rubriques.lang"), # SELECT
		array('rubriques' => 'spip_rubriques'), # FROM
		
			array(), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('rang'), # ORDER
		'', # LIMIT
		'', # sous
		
			array(
			array('<>', 'rang', 0)), # HAVING
		'rubriques', # table
		'_ariane_article', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
		&gt; <a href="' .
vider_url(generer_url_rubrique($Pile[$SP]['id_rubrique'])) .
'">' .
interdire_scripts(couper(typo($Pile[$SP]['titre']),'80')) .
'</a>
		');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_contexte_articlehtml_9dbeb064fcf5e6fe709a3a3c07443182(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("articles.id_article",
		"articles.titre",
		"articles.id_rubrique",
		"articles.lang"), # SELECT
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
		'_contexte_article', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
		' .
BOUCLE_ariane_articlehtml_9dbeb064fcf5e6fe709a3a3c07443182($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		&gt; <a href="' .
vider_url(generer_url_article($Pile[$SP]['id_article'])) .
'">' .
interdire_scripts(couper(typo($Pile[$SP]['titre']),'80')) .
'</a>
		');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE forums>
//
function BOUCLE_contexte_forumhtml_9dbeb064fcf5e6fe709a3a3c07443182(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forum.id_forum",
		"forum.titre",
		"forum.id_article",
		"forum.id_breve",
		"forum.id_rubrique",
		"forum.id_syndic"), # SELECT
		array('forum' => 'spip_forum'), # FROM
		
			array(
			array('=', 'forum.id_forum', _q($Pile[$SP]['id_forum'])), 
			array('=', 'forum.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'forum', # table
		'_contexte_forum', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$Cache['id_forum'][intval(calcul_index_forum($Pile[$SP]['id_article'],$Pile[$SP]['id_breve'],$Pile[$SP]['id_rubrique'],$Pile[$SP]['id_syndic']))] = 1; // invalideurs

		$t0 .= ('
		&gt; <a href="' .
safehtml(vider_url(generer_url_forum($Pile[$SP]['id_forum'], false))) .
'">' .
interdire_scripts(couper(safehtml(typo($Pile[$SP]['titre'])),'80')) .
'</a>
		');
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_articlehtml_9dbeb064fcf5e6fe709a3a3c07443182(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("articles.id_article",
		"articles.titre",
		"articles.date",
		"articles.texte",
		"articles.chapo",
		"articles.descriptif",
		"articles.lang"), # SELECT
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
		'_article', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
					' .
filtrer('image_reduire',affiche_logos(calcule_logo('id_article', 'ON', $Pile[$SP]['id_article'],'',  ''), '', ''),'150','100') .
'
					<h2 class="titre"><a href="' .
vider_url(generer_url_article($Pile[$SP]['id_article'])) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'])) .
'</a></h2>
					<small>' .
affdate_jourcourt(vider_date($Pile[$SP]['date'])) .
((strval($t1 = recuperer_fond(
			'modeles/lesauteurs',
			array('id_article' => $Pile[$SP]['id_article'])))!='') ?
		((', ' .
	_T('public/spip/ecrire:par_auteur') .
	' ') . $t1) :
		('')) .
'</small>
					' .
((strval($t1 = interdire_scripts(calcul_introduction('articles', $Pile[$SP]['texte'], $Pile[$SP]['chapo'], $Pile[$SP]['descriptif'])))!='') ?
		('<div class="texte">' . $t1 . '</div>') :
		('')) .
'
					');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE breves>
//
function BOUCLE_brevehtml_9dbeb064fcf5e6fe709a3a3c07443182(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("breves.id_breve",
		"breves.titre",
		"breves.date_heure AS date",
		"breves.texte",
		"breves.lang"), # SELECT
		array('breves' => 'spip_breves'), # FROM
		
			array(
			array('=', 'breves.id_breve', _q($Pile[$SP]['id_breve'])), 
			array('=', 'breves.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'breves', # table
		'_breve', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
					' .
filtrer('image_reduire',affiche_logos(calcule_logo('id_breve', 'ON', $Pile[$SP]['id_breve'],'',  ''), '', ''),'150','100') .
'
					<h2 class="titre"><a href="' .
vider_url(generer_url_breve($Pile[$SP]['id_breve'])) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'])) .
'</a></h2>
					<small>' .
affdate_jourcourt(vider_date($Pile[$SP]['date'])) .
'</small>
					' .
((strval($t1 = interdire_scripts(calcul_introduction('breves', $Pile[$SP]['texte'], '', '')))!='') ?
		('<div class="texte">' . $t1 . '</div>') :
		('')) .
'
					');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubriquehtml_9dbeb064fcf5e6fe709a3a3c07443182(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.texte",
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
		'_rubrique', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
					<h2 class="titre"><a href="' .
vider_url(generer_url_rubrique($Pile[$SP]['id_rubrique'])) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'])) .
'</a></h2>
					' .
((strval($t1 = interdire_scripts(propre($Pile[$SP]['texte'])))!='') ?
		('<div class="texte">' . $t1 . '</div>') :
		('')) .
'
					');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE syndication>
//
function BOUCLE_syndichtml_9dbeb064fcf5e6fe709a3a3c07443182(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("syndic.id_syndic",
		"syndic.nom_site",
		"syndic.url_site",
		"syndic.descriptif"), # SELECT
		array('syndic' => 'spip_syndic'), # FROM
		
			array(
			array('=', 'syndic.id_syndic', _q($Pile[$SP]['id_syndic'])), 
			array('=', 'syndic.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'syndic', # table
		'_syndic', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= ('
					<h2 class="titre"><a href="' .
generer_url_site($Pile[$SP]['id_syndic']) .
'">' .
interdire_scripts(construire_titre_lien($Pile[$SP]['nom_site'],$Pile[$SP]['url_site'])) .
'</a></h2>
					' .
((strval($t1 = interdire_scripts(propre($Pile[$SP]['descriptif'])))!='') ?
		('<div class="texte">' . $t1 . '</div>') :
		('')) .
'
					');
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE forums>
//
function BOUCLE_forum_parenthtml_9dbeb064fcf5e6fe709a3a3c07443182(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forum.id_forum",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.auteur AS nom",
		"forum.texte",
		"forum.id_article",
		"forum.id_breve",
		"forum.id_rubrique",
		"forum.id_syndic"), # SELECT
		array('forum' => 'spip_forum'), # FROM
		
			array(
			array('=', 'forum.id_forum', _q($Pile[$SP]['id_forum'])), 
			array('=', 'forum.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'forum', # table
		'_forum_parent', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$Cache['id_forum'][intval(calcul_index_forum($Pile[$SP]['id_article'],$Pile[$SP]['id_breve'],$Pile[$SP]['id_rubrique'],$Pile[$SP]['id_syndic']))] = 1; // invalideurs

		$t0 .= ('
					<h2 class="titre"><a href="' .
safehtml(vider_url(generer_url_forum($Pile[$SP]['id_forum'], false))) .
'">' .
interdire_scripts(safehtml(typo($Pile[$SP]['titre']))) .
'</a></h2>
					<small>' .
affdate_jourcourt(vider_date($Pile[$SP]['date'])) .
((strval($t1 = heures(vider_date($Pile[$SP]['date'])))!='') ?
		('&nbsp;' . $t1) :
		('')) .
((strval($t1 = minutes(vider_date($Pile[$SP]['date'])))!='') ?
		(':' . $t1) :
		('')) .
((strval($t1 = interdire_scripts(safehtml(typo($Pile[$SP]['nom']))))!='') ?
		((', ' .
	_T('public/spip/ecrire:par_auteur') .
	' ') . $t1) :
		('')) .
'</small>
					' .
((strval($t1 = interdire_scripts(lignes_longues(calcul_introduction('forums', $Pile[$SP]['texte'], '', ''))))!='') ?
		('<div class="texte">' . $t1 . '</div>') :
		('')) .
'
					');
	}

	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette dist/forum.html
//
function html_9dbeb064fcf5e6fe709a3a3c07443182($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<?php header("X-Spip-Cache: 3600"); ?>' .
'<'.'?php header("' . 'Cache-Control: max-age=3600, must-revalidate' . '"); ?'.'>' .
'<!DOCTYPE html PUBLIC \'-//W3C//DTD XHTML 1.0 Strict//EN\' \'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\'>
<html dir="' .
lang_dir(($Pile[0]['lang'] ? $Pile[0]['lang'] : $GLOBALS['spip_lang']),'ltr','rtl') .
'" lang="' .
htmlentities($Pile[0]['lang'] ? $Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'">
<head>
<title>' .
_T('public/spip/ecrire:poster_message') .
' - ' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site']))) .
'</title>
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-head') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'
<meta name="robots" content="none" />
</head>

<body class="page_forum">
<div id="page">

	' .
'
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-entete') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'

	' .
'
	<div id="hierarchie"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/">' .
_T('public/spip/ecrire:accueil_site') .
'</a>

		' .
((strval($t1 = BOUCLE_contexte_articlehtml_9dbeb064fcf5e6fe709a3a3c07443182($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
		($t1 . '
		') :
		(('

		' .
	((strval($t2 = BOUCLE_contexte_brevehtml_9dbeb064fcf5e6fe709a3a3c07443182($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
			($t2) :
			(('

		' .
		((strval($t3 = BOUCLE_contexte_rubriquehtml_9dbeb064fcf5e6fe709a3a3c07443182($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
				($t3) :
				(('

		' .
			((strval($t4 = BOUCLE_contexte_sitehtml_9dbeb064fcf5e6fe709a3a3c07443182($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
					($t4) :
					('

		')) .
			'
		'))) .
		'
		'))) .
	'
		'))) .
'

		' .
BOUCLE_contexte_forumhtml_9dbeb064fcf5e6fe709a3a3c07443182($Cache, $Pile, $doublons, $Numrows, $SP) .
'

		&gt; ' .
_T('public/spip/ecrire:poster_message') .
'
		
	</div>


	<div id="conteneur">

		' .
'
		<div id="contenu">

			<div class="cartouche">
				<h1 class="titre">' .
_T('public/spip/ecrire:poster_message') .
'</h1>
				<p class="surtitre">' .
_T('public/spip/ecrire:en_reponse') .
'</p>
			</div>

			<div class="liste-articles">

				<ul><li>

					' .
((strval($t1 = BOUCLE_forum_parenthtml_9dbeb064fcf5e6fe709a3a3c07443182($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
		($t1) :
		(('

					' .
	BOUCLE_articlehtml_9dbeb064fcf5e6fe709a3a3c07443182($Cache, $Pile, $doublons, $Numrows, $SP) .
	'

					' .
	BOUCLE_brevehtml_9dbeb064fcf5e6fe709a3a3c07443182($Cache, $Pile, $doublons, $Numrows, $SP) .
	'

					' .
	BOUCLE_rubriquehtml_9dbeb064fcf5e6fe709a3a3c07443182($Cache, $Pile, $doublons, $Numrows, $SP) .
	'

					' .
	BOUCLE_syndichtml_9dbeb064fcf5e6fe709a3a3c07443182($Cache, $Pile, $doublons, $Numrows, $SP) .
	'

					'))) .
'

				</li></ul>

			</div>

			' .

	// invalideur id_forum
	(!($Cache['id_forum'][
		calcul_index_forum($Pile[0]['id_article'],$Pile[0]['id_breve'],$Pile[0]['id_rubrique'],$Pile[0]['id_syndic'])
	]=1) ? '':
	executer_balise_dynamique('FORMULAIRE_FORUM',
	array($Pile[0]['id_rubrique'],$Pile[0]['id_forum'],$Pile[0]['id_article'],$Pile[0]['id_breve'],$Pile[0]['id_syndic'],$Pile[0]['ajouter_mot'],$Pile[0]['ajouter_groupe'],$Pile[0]['afficher_texte']),
	array(''), $GLOBALS['spip_lang'],113))
 .
'

		</div><!-- fin contenu -->

		' .
'
		<div id="navigation">

			' .
'
			' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-rubriques') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'

		</div><!-- fin navigation -->

	</div><!-- fin conteneur -->

	' .
'
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-pied') . ',
	\'skel\' => ' . argumenter_squelette('dist/forum.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'

</div><!-- fin page -->
</body>
</html>
');

	return analyse_resultat_skel('html_9dbeb064fcf5e6fe709a3a3c07443182', $Cache, $page);
}

?>