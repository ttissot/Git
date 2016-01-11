<?php
/*
 * Squelette : squelettes/rubrique.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Wed, 14 Nov 2012 17:36:31 GMT (0.01s)
 * Boucles :   _rubrique_principal
 */ 
//
// <BOUCLE rubriques>
//
function BOUCLE_rubrique_principalhtml_719970a31cff9e519e12f643558900dc(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		<div id="nav_supp"></div>
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
// Fonction principale du squelette squelettes/rubrique.html
//
function html_719970a31cff9e519e12f643558900dc($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<?php header("X-Spip-Cache: 7200"); ?>' .
BOUCLE_rubrique_principalhtml_719970a31cff9e519e12f643558900dc($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_719970a31cff9e519e12f643558900dc', $Cache, $page);
}

?>