<?php
/*
 * Squelette : dist/404.html
 * Date :      Wed, 07 Nov 2012 14:17:39 GMT
 * Compile :   Thu, 22 Nov 2012 16:43:23 GMT (0.01s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette dist/404.html
//
function html_42e07ccffb74dc69415216d5668e03b1($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<?php header("X-Spip-Cache: 86400"); ?>' .
'<'.'?php header("' . 'Cache-Control: no-store, no-cache, must-revalidate' . '"); ?'.'>' .
'<'.'?php header("' . 'Pragma: no-cache' . '"); ?'.'>' .
'<!DOCTYPE html PUBLIC \'-//W3C//DTD XHTML 1.0 Strict//EN\' \'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\'>
<html dir="' .
lang_dir(($Pile[0]['lang'] ? $Pile[0]['lang'] : $GLOBALS['spip_lang']),'ltr','rtl') .
'" lang="' .
htmlentities($Pile[0]['lang'] ? $Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'">
<head>
<title>' .
_T('public/spip/ecrire:pass_erreur') .
' 404 - ' .
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
<body class="page_404">
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
'</a> &gt; ' .
_T('public/spip/ecrire:pass_erreur') .
' 404</div>

	<div id="conteneur">

		<div id="contenu">

			<div class="cartouche">
			<h1 class="titre">' .
_T('public/spip/ecrire:pass_erreur') .
' 404</h1>
			</div>
			' .
((strval($t1 = interdire_scripts(propre($Pile[0]['erreur'])))!='') ?
		('<div class="chapo">' . $t1 . '</div>') :
		('')) .
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
	\'skel\' => ' . argumenter_squelette('dist/404.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'

	</div><!-- fin page -->
</body>
</html>
');

	return analyse_resultat_skel('html_42e07ccffb74dc69415216d5668e03b1', $Cache, $page);
}

?>