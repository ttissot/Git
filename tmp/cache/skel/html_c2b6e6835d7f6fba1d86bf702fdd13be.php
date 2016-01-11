<?php
/*
 * Squelette : squelettes/rubrique-1.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Wed, 07 Nov 2012 14:29:39 GMT (0.01s)
 * Boucles :   _plan, _art_de_garde, _rubrique_principal
 */ 
//
// <BOUCLE documents>
//
function BOUCLE_planhtml_c2b6e6835d7f6fba1d86bf702fdd13be(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
function BOUCLE_art_de_gardehtml_c2b6e6835d7f6fba1d86bf702fdd13be(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
			array('=', 'articles.id_article', "'1'"), 
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
		('<h1>' . $t1 . '</h1>') :
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
((strval($t1 = BOUCLE_planhtml_c2b6e6835d7f6fba1d86bf702fdd13be($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
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
// <BOUCLE rubriques>
//
function BOUCLE_rubrique_principalhtml_c2b6e6835d7f6fba1d86bf702fdd13be(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.lang",
		"rubriques.titre",
		"rubriques.texte",
		"rubriques.id_rubrique"), # SELECT
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
				<div class="article">
					' .
BOUCLE_art_de_gardehtml_c2b6e6835d7f6fba1d86bf702fdd13be($Cache, $Pile, $doublons, $Numrows, $SP) .
'
				</div>
				<img src="' .
interdire_scripts(find_in_path('css/navpics/visuels/frise.jpg')) .
'" alt="" />
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
// Fonction principale du squelette squelettes/rubrique-1.html
//
function html_c2b6e6835d7f6fba1d86bf702fdd13be($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<?php header("X-Spip-Cache: 7200"); ?>' .
BOUCLE_rubrique_principalhtml_c2b6e6835d7f6fba1d86bf702fdd13be($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_c2b6e6835d7f6fba1d86bf702fdd13be', $Cache, $page);
}

?>