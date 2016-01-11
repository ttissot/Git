<?php
/*
 * Squelette : dist/agenda.html
 * Date :      Wed, 07 Nov 2012 14:17:39 GMT
 * Compile :   Mon, 30 Dec 2013 01:08:43 GMT (0.03s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette dist/agenda.html
//
function html_6daa19b0d5b37bbfe0760034fe20773b($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<?php header("X-Spip-Cache: 7200"); ?>' .
'<!DOCTYPE html PUBLIC \'-//W3C//DTD XHTML 1.0 Strict//EN\' \'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\'>
<html dir="' .
lang_dir(($Pile[0]['lang'] ? $Pile[0]['lang'] : $GLOBALS['spip_lang']),'ltr','rtl') .
'" lang="' .
htmlentities($Pile[0]['lang'] ? $Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'">
<head>
<title>' .
_T('public/spip/ecrire:icone_agenda') .
' - ' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site']))) .
'</title>
' .
((strval($t1 = interdire_scripts(textebrut(couper(propre($GLOBALS['meta']['descriptif_site']),'150'))))!='') ?
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
<meta name="robots" content="none" />
<link rel="stylesheet" href="' .
interdire_scripts(find_in_path('agenda.css')) .
'" type="text/css" /> 
<script type="text/javascript" src="' .
interdire_scripts(eval('return '.'_DIR_JAVASCRIPT'.';')) .
'layer.js"> </script> 
<script type="text/javascript" src="' .
interdire_scripts(eval('return '.'_DIR_JAVASCRIPT'.';')) .
'presentation.js"> </script> 
</head>

<body class="page_agenda">
' .
((strval($t1 = interdire_scripts(agenda_connu(entites_html(sinon($Pile[0]['type'],'mois')))))!='') ?
		($t1 . 
'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette(('agenda_' .
		interdire_scripts(entites_html(sinon($Pile[0]['type'],'mois'))))) . ',
	\'type\' => ' . argumenter_squelette($Pile[0]['type']) . ',
	\'delais\' => ' . argumenter_squelette('900') . ',
	\'annee\' => ' . argumenter_squelette($Pile[0]['annee']) . ',
	\'mois\' => ' . argumenter_squelette($Pile[0]['mois']) . ',
	\'jour\' => ' . argumenter_squelette($Pile[0]['jour']) . ',
	\'echelle\' => ' . argumenter_squelette($Pile[0]['echelle']) . ',
	\'partie_cal\' => ' . argumenter_squelette($Pile[0]['partie_cal']) . ',
	\'theme\' => ' . argumenter_squelette($Pile[0]['theme']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>') :
		('')) .
'
</body></html>
');

	return analyse_resultat_skel('html_6daa19b0d5b37bbfe0760034fe20773b', $Cache, $page);
}

?>