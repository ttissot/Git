<?php
/*
 * Squelette : squelettes/inclusions/inc-head.html
 * Date :      Tue, 06 Nov 2012 23:00:00 GMT
 * Compile :   Fri, 08 Jan 2016 07:20:10 GMT (0.01s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes/inclusions/inc-head.html
//
function html_b87a4581faa69647f896a3fc70952285($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<?php header("X-Spip-Cache: 86400"); ?>' .
'
' .
'
<meta http-equiv="Content-Type" content="text/html; charset=' .
interdire_scripts($GLOBALS['meta']['charset']) .
'" />

' .
'
<meta name="generator" content="SPIP' .
((strval($t1 = spip_version())!='') ?
		(' ' . $t1) :
		('')) .
'" />

' .
'
' .
((strval($t1 = interdire_scripts(find_in_path('favicon.ico')))!='') ?
		('<link rel="shortcut icon" href="' . $t1 . '" />') :
		('')) .
'

' .
'
<link rel="alternate" type="application/rss+xml" title="' .
_T('public/spip/ecrire:syndiquer_site') .
'" href="' .
interdire_scripts(generer_url_public('backend')) .
'" />

' .
'
<link rel="stylesheet" href="' .
interdire_scripts(direction_css(find_in_path('css/spip_style.css'))) .
'" type="text/css" media="all" />

' .
'
<link rel="stylesheet" href="' .
interdire_scripts(direction_css(find_in_path('css/habillage.css'))) .
'" type="text/css" media="projection, screen, tv" />

' .
'
<link rel="stylesheet" href="' .
interdire_scripts(direction_css(find_in_path('css/impression.css'))) .
'" type="text/css" media="print" />

' .
'
<link rel="stylesheet" href="' .
interdire_scripts(direction_css(find_in_path('css/menu.css'))) .
'" type="text/css" media="projection, screen, tv" />

' .
'
' .
pipeline('insert_head','<!-- insert_head -->') .
'

<!--[if IE 6]>
	<link href="' .
interdire_scripts(direction_css(find_in_path('css/ie6.css'))) .
'" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 7]>
	<link href="' .
interdire_scripts(direction_css(find_in_path('css/ie7.css'))) .
'" rel="stylesheet" type="text/css" />
<![endif]-->
<style type="text/css">
img {
   behavior: url("/win_png.htc");
}
</style>');

	return analyse_resultat_skel('html_b87a4581faa69647f896a3fc70952285', $Cache, $page);
}

?>