<?php
/*
 * Squelette : squelettes/rubrique=4.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Thu, 15 Nov 2012 16:37:23 GMT (0.06s)
 * Boucles :   _origine, _prems, _illustr, _compte_vignettes, _first_art, _art_de_garde, _rub, _art, _others_arts, _plan, _art_plan, _firstrub, _rubrique_principal
 */ 
//
// <BOUCLE rubriques>
//
function BOUCLE_originehtml_6bf124dfa70b4cc576f15d3bd4b0edac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.descriptif",
		"rubriques.lang"), # SELECT
		array('rubriques' => 'spip_rubriques'), # FROM
		
			array(
			array('=', 'rubriques.id_rubrique', "'4'"), 
			array('=', 'rubriques.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'rubriques', # table
		'_origine', # boucle
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
((strval($t1 = filtrer('image_reduire',affiche_logos(calcule_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],sql_parent($Pile[$SP]['id_rubrique']),  ''), '', ''),'150','109'))!='') ?
		(('<div class="logorub"><a href="' .
	vider_url(generer_url_rubrique($Pile[$SP]['id_rubrique'])) .
	'">') . $t1 . '</a></div>') :
		('')) .
'
					<div class="text">
						' .
((strval($t1 = interdire_scripts(majuscules(supprimer_numero(typo($Pile[$SP]['titre'])))))!='') ?
		('<h2>' . $t1 . '</h2>') :
		('')) .
'
						' .
interdire_scripts(paragrapher(propre($Pile[$SP]['descriptif']))) .
'
					</div>
					');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_premshtml_6bf124dfa70b4cc576f15d3bd4b0edac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.id_secteur",
		"rubriques.id_rubrique",
		"rubriques.lang"), # SELECT
		array('rubriques' => 'spip_rubriques'), # FROM
		
			array(
			array('=', 'rubriques.id_parent', _q($Pile[$SP]['id_rubrique'])), 
			array('=', 'rubriques.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('rubriques.titre'), # ORDER
		'0,1', # LIMIT
		'', # sous
		
			array(), # HAVING
		'rubriques', # table
		'_prems', # boucle
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

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('sousmenu') . ',
	\'id_secteur\' => ' . argumenter_squelette($Pile[$SP]['id_secteur']) . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
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
// <BOUCLE documents>
//
function BOUCLE_illustrhtml_6bf124dfa70b4cc576f15d3bd4b0edac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("documents.id_document",
		"0+documents.titre AS num",
		"documents.fichier"), # SELECT
		array('L1' => 'spip_documents_articles','L2' => 'spip_types_documents','L3' => 'spip_types_documents','documents' => 'spip_documents'), # FROM
		
			array(
			array('=', 'L1.id_article', _q($Pile[$SP]['id_article'])), 
			array('=', 'documents.mode', "'document'"), 
			array('REGEXP', 'L3.extension', "'jpg|gif|png'"), 
			array('(documents.taille > 0 OR documents.distant="oui")')), # WHERE
		array(1 => array('documents', 'id_document'), 2 => array('documents', 'id_type'), 3 => array('L2', 'id_type')), # WHERE pour jointure
		"documents.id_document", # GROUP
		array('num'), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'documents', # table
		'_illustr', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= ('
					<div class="phto" id="numero' .
$Pile[$SP]['id_document'] .
'">
						' .
((strval($t1 = interdire_scripts(filtrer('image_reduire',$Pile[$SP]['fichier'],'241','326')))!='') ?
		(('<a href="' .
	vider_url(generer_url_document($Pile[$SP]['id_document'])) .
	'" rel="facebox">') . $t1 . '</a>') :
		('')) .
'
					</div>
					');
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE documents>
//
function BOUCLE_compte_vignetteshtml_6bf124dfa70b4cc576f15d3bd4b0edac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("documents.id_document",
		"0+documents.titre AS num"), # SELECT
		array('L1' => 'spip_documents_articles','L2' => 'spip_types_documents','L3' => 'spip_types_documents','documents' => 'spip_documents'), # FROM
		
			array(
			array('=', 'L1.id_article', _q($Pile[$SP]['id_article'])), 
			array('=', 'documents.mode', "'document'"), 
			array('REGEXP', 'L3.extension', "'jpg|png|gif'"), 
			array('(documents.taille > 0 OR documents.distant="oui")')), # WHERE
		array(1 => array('documents', 'id_document'), 2 => array('documents', 'id_type'), 3 => array('L2', 'id_type')), # WHERE pour jointure
		"documents.id_document", # GROUP
		array('num'), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'documents', # table
		'_compte_vignettes', # boucle
		''); # serveur
	$Numrows['_compte_vignettes']['total'] = @spip_abstract_count($result,'');
	$t0 = "";
	$SP++;
	for($x=$Numrows["_compte_vignettes"]["total"];$x>0;$x--)
			$t0 .= '
					';
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_first_arthtml_6bf124dfa70b4cc576f15d3bd4b0edac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("articles.id_article",
		"0+articles.titre AS num",
		"articles.lang"), # SELECT
		array('articles' => 'spip_articles'), # FROM
		
			array(
			array('=', 'articles.id_rubrique', _q($Pile[$SP]['id_rubrique'])), 
			array('=', 'articles.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('num'), # ORDER
		'0,1', # LIMIT
		'', # sous
		
			array(), # HAVING
		'articles', # table
		'_first_art', # boucle
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
BOUCLE_illustrhtml_6bf124dfa70b4cc576f15d3bd4b0edac($Cache, $Pile, $doublons, $Numrows, $SP) .
'

					' .
((strval($t1 = BOUCLE_compte_vignetteshtml_6bf124dfa70b4cc576f15d3bd4b0edac($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
		($t1 . ('
					' .
		((strval($t3 = (($Numrows['_compte_vignettes']['total'] > '1') ? ' ':''))!='') ?
				($t3 . ('
					' .
			
'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('vignettes') . ',
	\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
			'
					')) :
				('')) .
		'
					' .
		(($Numrows['_compte_vignettes']['total'] > '1') ? '':' ') .
		'
					')) :
		('')) .
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
function BOUCLE_art_de_gardehtml_6bf124dfa70b4cc576f15d3bd4b0edac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("0+articles.titre AS num",
		"articles.titre",
		"articles.soustitre",
		"articles.chapo",
		"articles.texte",
		"articles.lang"), # SELECT
		array('articles' => 'spip_articles'), # FROM
		
			array(
			array('=', 'articles.id_rubrique', _q($Pile[$SP]['id_rubrique'])), 
			array('=', 'articles.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('num'), # ORDER
		'0,1', # LIMIT
		'', # sous
		
			array(), # HAVING
		'articles', # table
		'_art_de_garde', # boucle
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
((strval($t1 = interdire_scripts(supprimer_numero(typo($Pile[$SP]['titre']))))!='') ?
		('<h1>' . $t1 . '</h1>') :
		('')) .
'
					' .
((strval($t1 = interdire_scripts(typo($Pile[$SP]['soustitre'])))!='') ?
		('<h2 class="soustitre">' . $t1 . '</h2>') :
		('')) .
'
					<div class="text">
						' .
((strval($t1 = interdire_scripts(paragrapher(propre(nettoyer_chapo($Pile[$SP]['chapo'])))))!='') ?
		('<div class="chapo">' . $t1 . '</div>') :
		('')) .
'
						' .
interdire_scripts(paragrapher(propre($Pile[$SP]['texte']))) .
'
					</div>
					');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubhtml_6bf124dfa70b4cc576f15d3bd4b0edac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.titre",
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
		'_rub', # boucle
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
((strval($t1 = interdire_scripts(majuscules(typo($Pile[$SP]['titre']))))!='') ?
		('<h2>' . $t1 . '</h2>') :
		('')) .
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
function BOUCLE_arthtml_6bf124dfa70b4cc576f15d3bd4b0edac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("0+articles.titre AS num",
		"articles.titre",
		"articles.id_article",
		"articles.lang"), # SELECT
		array('articles' => 'spip_articles'), # FROM
		
			array(
			array('=', 'articles.id_rubrique', _q($Pile[$SP]['id_rubrique'])), 
			array('=', 'articles.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('num'), # ORDER
		'0,1', # LIMIT
		'', # sous
		
			array(), # HAVING
		'articles', # table
		'_art', # boucle
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
((strval($t1 = interdire_scripts(supprimer_numero(typo($Pile[$SP]['titre']))))!='') ?
		(('<li class="on"><a href="' .
	vider_url(generer_url_article($Pile[$SP]['id_article'])) .
	'">') . $t1 . '</a></li>') :
		('')) .
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
function BOUCLE_others_artshtml_6bf124dfa70b4cc576f15d3bd4b0edac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("0+articles.titre AS num",
		"articles.titre",
		"articles.id_article",
		"articles.lang"), # SELECT
		array('articles' => 'spip_articles'), # FROM
		
			array(
			array('=', 'articles.id_rubrique', _q($Pile[$SP]['id_rubrique'])), 
			array('=', 'articles.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('num'), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'articles', # table
		'_others_arts', # boucle
		''); # serveur

	// Partition
	$nombre_boucle = @spip_abstract_count($result,"");
	$debut_boucle = 1;
	$fin_boucle = min($debut_boucle + $nombre_boucle - 1, $nombre_boucle - 1);
	$Numrows['_others_arts']["grand_total"] = $nombre_boucle;
	$Numrows['_others_arts']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_others_arts']['compteur_boucle'] = 0;
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$Numrows['_others_arts']['compteur_boucle']++;
		if ($Numrows['_others_arts']['compteur_boucle']-1 >= $debut_boucle) {
		if ($Numrows['_others_arts']['compteur_boucle']-1 > $fin_boucle) break;
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
							' .
((strval($t1 = interdire_scripts(supprimer_numero(typo($Pile[$SP]['titre']))))!='') ?
		(('<li><a href="' .
	vider_url(generer_url_article($Pile[$SP]['id_article'])) .
	'">') . $t1 . '</a></li>') :
		('')) .
'
						');
		}

	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE documents>
//
function BOUCLE_planhtml_6bf124dfa70b4cc576f15d3bd4b0edac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("documents.id_document",
		"documents.fichier",
		"documents.descriptif"), # SELECT
		array('L1' => 'spip_documents_articles','L2' => 'spip_types_documents','L3' => 'spip_types_documents','documents' => 'spip_documents'), # FROM
		
			array(
			array('=', 'L1.id_article', _q($Pile[$SP]['id_article'])), 
			array('=', 'documents.mode', "'vignette'"), 
			array('REGEXP', 'L3.extension', "'jpg|gif|png'"), 
			array('=', 'documents.titre', "'plan'"), 
			array('(documents.taille > 0 OR documents.distant="oui")')), # WHERE
		array(1 => array('documents', 'id_document'), 2 => array('documents', 'id_type'), 3 => array('L2', 'id_type')), # WHERE pour jointure
		"documents.id_document", # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'documents', # table
		'_plan', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= ('
						' .
((strval($t1 = interdire_scripts(filtrer('image_reduire',$Pile[$SP]['fichier'],'246','246')))!='') ?
		(('<a href="' .
	vider_url(generer_url_document($Pile[$SP]['id_document'])) .
	'" rel="facebox">') . $t1 . '</a>') :
		('')) .
'
						<p>' .
interdire_scripts(propre($Pile[$SP]['descriptif'])) .
'</p>
						');
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_art_planhtml_6bf124dfa70b4cc576f15d3bd4b0edac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("articles.id_article",
		"0+articles.titre AS num",
		"articles.lang"), # SELECT
		array('articles' => 'spip_articles'), # FROM
		
			array(
			array('=', 'articles.id_rubrique', _q($Pile[$SP]['id_rubrique'])), 
			array('=', 'articles.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('num'), # ORDER
		'0,1', # LIMIT
		'', # sous
		
			array(), # HAVING
		'articles', # table
		'_art_plan', # boucle
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
BOUCLE_planhtml_6bf124dfa70b4cc576f15d3bd4b0edac($Cache, $Pile, $doublons, $Numrows, $SP) .
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
function BOUCLE_firstrubhtml_6bf124dfa70b4cc576f15d3bd4b0edac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.id_rubrique",
		"rubriques.lang"), # SELECT
		array('rubriques' => 'spip_rubriques'), # FROM
		
			array(
			array('=', 'rubriques.id_parent', _q($Pile[$SP]['id_rubrique'])), 
			array('=', 'rubriques.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('rubriques.titre'), # ORDER
		'0,1', # LIMIT
		'', # sous
		
			array(), # HAVING
		'rubriques', # table
		'_firstrub', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
				<div id="illustr">
					' .
BOUCLE_first_arthtml_6bf124dfa70b4cc576f15d3bd4b0edac($Cache, $Pile, $doublons, $Numrows, $SP) .
'
					<div class="clear"></div>
				</div>
				<div id="principal">
					' .
BOUCLE_art_de_gardehtml_6bf124dfa70b4cc576f15d3bd4b0edac($Cache, $Pile, $doublons, $Numrows, $SP) .
'
					<div class="plan">
						' .
BOUCLE_rubhtml_6bf124dfa70b4cc576f15d3bd4b0edac($Cache, $Pile, $doublons, $Numrows, $SP) .
'
						' .
((strval($t1 = BOUCLE_others_artshtml_6bf124dfa70b4cc576f15d3bd4b0edac($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
		(('
						<ul>
						' .
		BOUCLE_arthtml_6bf124dfa70b4cc576f15d3bd4b0edac($Cache, $Pile, $doublons, $Numrows, $SP) .
		'
						') . $t1 . '
						</ul>
						') :
		('')) .
'
						' .
BOUCLE_art_planhtml_6bf124dfa70b4cc576f15d3bd4b0edac($Cache, $Pile, $doublons, $Numrows, $SP) .
'
						<div class="contact_prdt">
							<p>VOUS SOUHAITEZ AVOIR DES INFORMATIONS SUR CE PRODUIT ?<br /><a href="spip.php?rubrique6">CLIQUEZ ICI POUR NOUS CONTACTER</a></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubrique_principalhtml_6bf124dfa70b4cc576f15d3bd4b0edac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.id_rubrique",
		"rubriques.lang",
		"rubriques.titre",
		"rubriques.texte"), # SELECT
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
		'_rubrique_principal', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
<!DOCTYPE html PUBLIC \'-//W3C//DTD XHTML 1.0 Strict//EN\' \'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\'>
<html dir="' .
lang_dir(($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']),'ltr','rtl') .
'" lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'">
<head>
<title>' .
((strval($t1 = interdire_scripts(textebrut(supprimer_numero(typo($Pile[$SP]['titre'])))))!='') ?
		($t1 . ' - ') :
		('')) .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site']))) .
'</title>
' .
((strval($t1 = interdire_scripts(textebrut(couper(calcul_introduction('rubriques', $Pile[$SP]['texte'], '', ''),'150'))))!='') ?
		('<meta name="description" content="' . $t1 . '" />') :
		('')) .
'
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-head') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'
' .
'
<link rel="alternate" type="application/rss+xml" title="' .
_T('public/spip/ecrire:syndiquer_rubrique') .
'" href="' .
interdire_scripts(parametre_url(generer_url_public('backend'),'id_rubrique',$Pile[$SP]['id_rubrique'])) .
'" />
<script language="javascript" type="text/javascript" src="' .
interdire_scripts(find_in_path('javascript/jquery-1.2.3.js')) .
'"></script>
<script language="javascript" type="text/javascript" src="' .
interdire_scripts(find_in_path('javascript/jquery.idTabs.pack.js')) .
'"></script>
<script language="javascript" type="text/javascript" src="' .
interdire_scripts(find_in_path('facebox/facebox.js')) .
'"></script>
<link rel="stylesheet" href="' .
interdire_scripts(find_in_path('facebox/facebox.css')) .
'" media="screen" />
<script type="text/javascript">
jQuery(document).ready(function($) {
  $(\'a[rel*=facebox]\').facebox() 
})
</script>
</head>

<body>

	<div id="container">
		' .
'
		' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('branding') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'
		<div id="content">

			' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-entete') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'
			
			<div id="content_main">
				<div class="entete4">
					' .
BOUCLE_originehtml_6bf124dfa70b4cc576f15d3bd4b0edac($Cache, $Pile, $doublons, $Numrows, $SP) .
'
					' .
BOUCLE_premshtml_6bf124dfa70b4cc576f15d3bd4b0edac($Cache, $Pile, $doublons, $Numrows, $SP) .
'
					<div class="clear"></div>
				</div>

				' .
BOUCLE_firstrubhtml_6bf124dfa70b4cc576f15d3bd4b0edac($Cache, $Pile, $doublons, $Numrows, $SP) .
'
				<div class="clear"></div>
			</div>
			' .
'
			' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-pied') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'
		</div>
		<div class="clear"></div>
	</div>
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-ga') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'
</body>
</html>
');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette squelettes/rubrique=4.html
//
function html_6bf124dfa70b4cc576f15d3bd4b0edac($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<?php header("X-Spip-Cache: 7200"); ?>' .
BOUCLE_rubrique_principalhtml_6bf124dfa70b4cc576f15d3bd4b0edac($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_6bf124dfa70b4cc576f15d3bd4b0edac', $Cache, $page);
}

?>