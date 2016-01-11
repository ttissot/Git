<?php
/*
 * Squelette : squelettes/article.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Wed, 14 Nov 2012 17:37:07 GMT (0.02s)
 * Boucles :   _illustr, _vignettes, _plan, _art_de_garde, _article_principal
 */ 
//
// <BOUCLE documents>
//
function BOUCLE_illustrhtml_cacdcec900dda37f91a9aadf1f0cd7f1(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
					<div id="numero' .
$Pile[$SP]['id_document'] .
'">
						' .
((strval($t1 = interdire_scripts(filtrer('image_reduire',$Pile[$SP]['fichier'],'241','326')))!='') ?
		(('<a href="' .
	vider_url(generer_url_document($Pile[$SP]['id_document'])) .
	'">') . $t1 . '</a>') :
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
function BOUCLE_vignetteshtml_cacdcec900dda37f91a9aadf1f0cd7f1(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("documents.id_document",
		"0+documents.titre AS num"), # SELECT
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
		'_vignettes', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= ('
						<li><a href="#numero' .
$Pile[$SP]['id_document'] .
'">' .
calcule_logo_document($Pile[$SP]['id_document'], '', $doublons, 0, '', '', '') .
'</a></li>
						');
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE documents>
//
function BOUCLE_planhtml_cacdcec900dda37f91a9aadf1f0cd7f1(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
((strval($t1 = interdire_scripts(filtrer('image_reduire',$Pile[$SP]['fichier'],'246')))!='') ?
		(('<a href="' .
	vider_url(generer_url_document($Pile[$SP]['id_document'])) .
	'">') . $t1 . '</a>') :
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
function BOUCLE_art_de_gardehtml_cacdcec900dda37f91a9aadf1f0cd7f1(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("articles.id_article",
		"articles.titre",
		"articles.soustitre",
		"articles.chapo",
		"articles.texte",
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
((strval($t1 = interdire_scripts(typo($Pile[$SP]['titre'])))!='') ?
		('<h1 class="plv">' . $t1 . '</h1>') :
		('')) .
'
					' .
((strval($t1 = interdire_scripts(typo($Pile[$SP]['soustitre'])))!='') ?
		('<h2 class="soustitre">' . $t1 . '</h2>') :
		('')) .
'
					' .
((strval($t1 = interdire_scripts(paragrapher(propre(nettoyer_chapo($Pile[$SP]['chapo'])))))!='') ?
		('<div class="chapo">' . $t1 . '</div>') :
		('')) .
'
					' .
((strval($t1 = interdire_scripts(paragrapher(propre($Pile[$SP]['texte']))))!='') ?
		('<div class="text">' . $t1 . '</div>') :
		('')) .
'
					' .
((strval($t1 = BOUCLE_planhtml_cacdcec900dda37f91a9aadf1f0cd7f1($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
		('
					<div class="plan">
						' . $t1 . '
						<div class="contact_prdt">
							<p>VOUS SOUHAITEZ AVOIR DES INFORMATIONS SUR CE PRODUIT ?<br /><a href="spip.php?rubrique6">CLIQUEZ ICI POUR NOUS CONTACTER</a></p>
						</div>
					</div>
					') :
		('')) .
'
					<div class="clear"></div>
					');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_article_principalhtml_cacdcec900dda37f91a9aadf1f0cd7f1(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("articles.id_article",
		"articles.lang",
		"articles.titre",
		"articles.texte",
		"articles.chapo",
		"articles.descriptif",
		"articles.id_rubrique"), # SELECT
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
		'_article_principal', # boucle
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
((strval($t1 = interdire_scripts(textebrut(typo($Pile[$SP]['titre']))))!='') ?
		($t1 . ' - ') :
		('')) .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site']))) .
'</title>
' .
((strval($t1 = interdire_scripts(textebrut(couper(calcul_introduction('articles', $Pile[$SP]['texte'], $Pile[$SP]['chapo'], $Pile[$SP]['descriptif']),'150'))))!='') ?
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
<script language="javascript" src="' .
interdire_scripts(find_in_path('javascript/jquery-1.2.3.js')) .
'" type="text/javascript"></script>
<script language="javascript" src="' .
interdire_scripts(find_in_path('javascript/jquery.idTabs.pack.js')) .
'" type="text/javascript"></script>
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
				<div class="entete' .
$Pile[$SP]['id_rubrique'] .
'">
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
					' .
'
					' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('sousmenu') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'id_article\' => ' . argumenter_squelette('16') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'
					<div class="clear"></div>
				</div>
				<div id="illustr">
					' .
BOUCLE_illustrhtml_cacdcec900dda37f91a9aadf1f0cd7f1($Cache, $Pile, $doublons, $Numrows, $SP) .
'
					<ul class="idTabs">
						' .
BOUCLE_vignetteshtml_cacdcec900dda37f91a9aadf1f0cd7f1($Cache, $Pile, $doublons, $Numrows, $SP) .
'
					</ul>
					<div class="clear"></div>
				</div>
				<div id="principal">
					' .
BOUCLE_art_de_gardehtml_cacdcec900dda37f91a9aadf1f0cd7f1($Cache, $Pile, $doublons, $Numrows, $SP) .
'
				</div>
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
// Fonction principale du squelette squelettes/article.html
//
function html_cacdcec900dda37f91a9aadf1f0cd7f1($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<?php header("X-Spip-Cache: 86400"); ?>' .
BOUCLE_article_principalhtml_cacdcec900dda37f91a9aadf1f0cd7f1($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_cacdcec900dda37f91a9aadf1f0cd7f1', $Cache, $page);
}

?>