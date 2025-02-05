<?php
/*
 * Squelette : dist/style_prive.html
 * Date :      Wed, 07 Nov 2012 14:17:40 GMT
 * Compile :   Wed, 07 Nov 2012 14:29:28 GMT (0.15s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette dist/style_prive.html
//
function html_985fc2efc6778135eb3731790d87f93c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('
' .
'<?php header("X-Spip-Cache: 360000"); ?>'.'<?php header("Cache-Control: max-age=360000"); ?>' .
'<'.'?php header("' . 'Content-Type: text/css; charset=iso-8859-15' . '"); ?'.'>' .
'<'.'?php header("' . 'Vary: Accept-Encoding' . '"); ?'.'>' .
'body { 
	font-family: Verdana,Arial,Sans,sans-serif; 
	color: #000000;
	background-color: #f8f7f3; 
	border: none;
	margin: 0px;
	scrollbar-face-color: #fff;
	scrollbar-shadow-color: #fff;
	scrollbar-highlight-color: #fff;
	scrollbar-3dlight-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
';
	scrollbar-darkshadow-color: #fff;
	scrollbar-track-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	scrollbar-arrow-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
}
td {
	text-align: ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
';
}
/* Espaceur de blocs */
.nettoyeur { clear: both; margin: 0; padding: 0; border: none; height: 0; line-height: 1px; font-size: 1px; }

/*
 * Formulaires
 */
.forml { 
	width: 100%;
	display: block;
	padding: 3px; 
	background-color: #e4e4e4; 
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
'; 
	background-position: center bottom; 
	float: none;
	behavior: url(../dist/win_width.htc);
	font-size: 12px;
	font-family: Verdana,Arial,Sans,sans-serif; 
}
.formo { 
	width: 100%; 
	display: block;
	padding: 3px; 
	background-color: ' .
'#FFF' .
'; 
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
'; 
	background-position: center bottom; float: none; 
	behavior: url(../dist/win_width.htc);
	font-size: 12px;
	font-family: Verdana,Arial,Sans,sans-serif; 
}
.fondl { 
	padding: 3px; 
	background-color: #e4e4e4; 
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
'; 
	background-position: center bottom; 
	float: none;
	font-size: 11px;
	font-family: Verdana,Arial,Sans,sans-serif; 
}
.fondo { background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
'; 
	background-position: center bottom; float: none; color: ' .
'#FFF' .
';
	font-size: 11px;
	font-family: Verdana,Arial,Sans,sans-serif; 
	font-weight: bold;
}
.fondf { background-color: #fff; border-style: solid ; border-width: 1px; border-color: #e86519; color: #e86519; 
}


select.fondl {
	padding: 0;
}
.maj-debut:first-letter { text-transform: uppercase; }


/*
 * Icones et bandeaux
 */

#bandeau-principal {
	background-color: #fff;
	margin: 0;
	padding: 0;
	border-bottom: 1px solid #000;
}

.bandeau-icones {
	background-color: #fff;
	margin: 0;
	padding: 0;
	padding-bottom: 2px; 
	padding-top: 4px;
}

.bandeau_sec .gauche {
	margin-top: 0;
	padding: 2px;
	padding-top: 0;
	background-color: #fff;
	border-bottom: 1px solid #000;
	border-left: 1px solid #000;
	border-right: 1px solid #000;
	-moz-border-radius-bottomleft: 5px;
	-moz-border-radius-bottomright: 5px;
	z-index: 100;
}

.bandeau-icones.separateur {
	vertical-align: middle;
	height: 100%;
	width: 11px;
	padding: 0;
	margin: 0;
	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=tirets-separation.gif);
	background-position: 5px 0px;
}
.bandeau_couleur {
	padding-right: 4px;
	padding-left: 4px;
	font-family: verdana, helvetica, arial, sans;
	font-size: 11px;
	color: #000;
	text-align: center;
	font-weight: bold;
	height: 22px;
}

.bandeau_couleur_sous {
	position: absolute; 
	visibility: hidden;
	top: 0; 
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
'; 
	color: #000;
	padding: 5px;
	padding-top: 2px;
	font-family: verdana, helvetica, arial, sans;
	font-size: 11px;
	border-bottom: 1px solid #fff;
	border-right: 1px solid #fff;
	-moz-border-radius-bottomleft: 5px;
	-moz-border-radius-bottomright: 5px;
}

a.lien_sous {
	color: #666;
}
a.lien_sous:hover {
	color: #000;
}


div.bandeau_rubriques {
	background-color: #eee; 
	border: 1px solid #555555;
}
a.bandeau_rub {
	display: block;
	font-size: 10px;
	padding: 2px;
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
': 13px;
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 16px;
	color: #666;
	text-decoration: none;
	border-bottom: 1px solid #ccc;
	background-repeat: no-repeat;
	background-position: ' .
((strval($t1 = interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','1','99')))!='') ?
		($t1 . '%') :
		('')) .
' center;
	background-image: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=rubrique-12.gif);
}
a.bandeau_rub:hover {
	background-color: #fff;
	text-decoration: none;
	color: #333;
	background-repeat: no-repeat;
	background-position: ' .
((strval($t1 = interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','1','99')))!='') ?
		($t1 . '%') :
		('')) .
' center;
}
div.bandeau_rub {
	position: absolute;
	' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 120px;
	background-color: #eee;
	padding: 0;
	border: 1px solid #555555;
	visibility: hidden;
	min-width:100%;
}

div.brt {
	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=triangle-droite' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','','_rtl')) .
'.gif) ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
' center no-repeat;
}
div.pos_r {
	position: relative;
}

option.selec_rub {
	background-position: ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
' center;
	background-image: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=rubrique-12.gif);
	background-repeat: no-repeat;
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 16px;
}


div.messages {
	padding: 5px;
	border-bottom: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	font-size: 10px;
	font-weight: bold;
}


/* Icones de fonctions */

a.icone26 {
	font-family: verdana, helvetica, arial, sans;
	font-size: 11px;
	font-weight: bold;
	color: #000;
	text-decoration: none;
	padding: 1px; 
	margin-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
': 2px;
}
a.icone26:hover {
	text-decoration: none;
}
a.icone26 img {
	vertical-align: middle;
	behavior: url(../win_png.htc);
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
}
a.icone26:hover img {
	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=fond-gris-anim.gif);
}


.icone36, icone36-danger {
	border: none;
	padding: 0;
	margin: 0;
	vertical-align: top;
	text-align: center;
	text-decoration: none;
}
.icone36 a, .icone36 a:hover, icone36-danger a, .icone36-danger a:hover {
	text-decoration: none;
}
.icone36 a img {
	margin: 0; 
	display: inline;
	padding: 4px;
	background-color: #eee;
	border: 2px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	-moz-border-radius: 5px;
}
.icone36 a:hover img {
	margin: 0; 
	display: inline;
	padding: 4px;
	background-color: #fff;
	border: 2px solid #666;
	-moz-border-radius: 5px;
}
.icone36-danger a img {
	margin: 0; 
	display: inline;
	padding: 3px;
	background-color: #fff;
	border: 2px solid #ff9999;
	-moz-border-radius: 5px;
}
.icone36-danger a:hover img {
	margin: 0; 
	display: inline;
	padding: 3px;
	background-color: #fff;
	border: 2px solid red;
	-moz-border-radius: 5px;
}
.icone36-danger a span {
	font-family: Verdana, Arial, Sans, sans-serif;
	font-weight: bold;
	font-size: 10px;
	color: red; display: block; margin: 2px;
	width: 100%
}
.icone36 a span {
	font-family: Verdana, Arial, Sans, sans-serif;
	font-weight: bold;
	font-size: 10px;
	color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
'; 
	display: block; 
	margin: 2px;
	width: 100%
}
.icone36 a:hover span {
	font-family: Verdana, Arial, Sans, sans-serif;
	font-weight: bold;
	font-size: 10px;
	color: #000; display: block; margin: 2px;
	width: 100%;
}


/* Icones 48 * 48 et 24 * 24 */

.cellule36, .cellule48 {
	border: none;
	padding: 0;
	vertical-align: top;
	font-family: Verdana, Arial, Sans, sans-serif;
	font-weight: bold;
	text-align: center;
	text-decoration: none;
}
.cellule36 {
	margin: 0;
	font-size: 10px;
}
.cellule48 {
	margin: 2px;
	font-size: 12px;
}
.cellule36 a, .cellule36 a:hover, .cellule48 a, .cellule48 a:hover {
	text-decoration: none;
}
.cellule36 a, .cellule48 a {
	display: block; text-align: center;
}


.cellule48 a img {
	behavior: url(../win_png.htc);
	display: inline;
	margin: 4px;
	padding: 0;
	border: none;
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
';
}

.cellule48 a.selection img {
	display: inline;
	margin: 4px;
	padding: 0;
	border: none;
	background-color: #999;
}
.cellule48 a:hover img {
	display: inline;
	margin: 4px;
	padding: 0;
	border: none;
	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=fond-gris-anim.gif);
}


.cellule36 a img {
	margin: 0; 
	display: inline;
	padding: 3px;
	border: none;
	border: 1px solid #fff;
	-moz-border-radius: 5px;
}
.cellule36 a.selection img{
	margin: 0; 
	display: inline;
	padding: 3px;
	background-color: #fff;
	border: 1px solid #aaa;
	-moz-border-radius: 5px;
}
.cellule36 a:hover img {
	margin: 0; 
	display: inline;
	padding: 3px;
	background-color: #e4e4e4;
	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=fond-gris-anim.gif);
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	-moz-border-radius: 5px;
}
.cellule36 a span, .cellule48 a span {
	color: #666; display: block; margin: 1px;
	width: 100%;
}
.cellule36 a:hover span, .cellule48 a:hover span {
	color: #000; display: block; margin: 1px;
	width: 100%;
}
.cellule36 a.selection span, .cellule48 a.selection span {
	color: #000; display: block; margin: 1px;
	width: 100%;
}

img.aide {
	width: 12px;
	height: 12px;
	margin-top: 5px;
	vertical-align: middle;
}

.cellule36 a.aide, .cellule36 a.aide:hover {
	display: inline;
	background: none;
	margin: 0;
	padding: 0;
}
.cellule36 a.aide img {
	margin: 0;
	padding: 0;
}

/* Navigation texte */

.cellule-texte {
	border: none;
	padding: 0;
	margin: 0;
	vertical-align: top;
	font-family: Verdana, Arial, Sans, sans-serif;
	font-weight: bold;
	text-align: center;
	text-decoration: none;
	font-size: 10px;
}
.cellule-texte a, .cellule-texte a:hover {
	text-decoration: none;
	display: block;
}
.cellule-texte a {
	padding: 4px; margin: 1px; border: none;
	color: #606060;
}
.cellule-texte a.selection {
	padding: 3px; margin: 1px; 
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
'; 
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
';
	-moz-border-radius: 5px;
	color: #000;
}
.cellule-texte a:hover {
	padding: 3px; margin: 1px; 
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
'; 
	background-color: #fff;
	-moz-border-radius: 5px;
	color: #333;
}
.cellule-texte a.aide, .cellule-texte a.aide:hover {
	border: none;
	background: none;
	display: inline;
}
.cellule-texte a.aide img {
	margin: 0;
}


/*
 * Icones horizontales
 */

a.cellule-h {
	display: block;
}
a.cellule-h {
	font-family: Verdana, Arial, Sans, sans-serif;
	font-weight: bold;
	font-size: 10px;
	text-align: ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
';
	text-decoration: none; 
	color: #666;
}
a.cellule-h:hover, a.cellule-h:hover a.cellule-h, a.cellule-h a.cellule-h:hover {
	font-family: Verdana, Arial, Sans, sans-serif;
	font-weight: bold;
	font-size: 10px;
	text-align: ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
';
	text-decoration: none; 
	color: #000;
}
a.cellule-h div.cell-i {
	padding: 0;
	border: 1px solid #fff;
	-moz-border-radius: 5px;
	margin: 0;
	margin-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
': 3px;
}
a.cellule-h:hover div.cell-i {
	padding: 0;
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=fond-gris-anim.gif);
	-moz-border-radius: 5px;
	margin: 0;
	margin-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
': 3px;
}

table.cellule-h-table {
	border: none;
	padding: 0;
	margin: 0;
}

a.cellule-h img {
	width: 24px;
	height: 24px;
	border: none;
	margin: 3px;
	background-repeat: no-repeat;
	background-position: center center;
}

a.cellule-h a.aide img {
	width: 12px; height: 12px;
}


a.cellule-h-texte {
	display: block;
	clear: both;
	text-align: ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
';
	font-family: Trebuchet Sans MS, Arial, Sans, sans-serif;
	font-weight: bold;
	font-size: 11px;
	color: #606060;
	padding: 4px;
	margin: 3px;
	border: 1px solid #ddd;
	-moz-border-radius: 5px;
	background-color: #f0f0f0;
	width: 92%;
}
.danger a.cellule-h-texte {
	border: 1px dashed #000;
	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=rayures-sup.gif);
}
a.cellule-h-texte:hover {
	text-decoration: none;
	color: #000;
	border-right: solid 1px #fff;
	border-bottom: solid 1px #fff;
	border-left: solid 1px #666;
	border-top: solid 1px #666;
	background-color: #eee;
}



/*
 * Style des icones
 */

.fondgris { cursor: pointer; padding: 4px; margin: 1px; }
.fondgrison {
	cursor: pointer; padding: 3px; margin: 1px; border: 1px dashed #999; background-color: ' .
'#E' .
'4E4E4; 
}
.fondgrison2 {
	cursor: pointer; padding: 3px; margin: 1px; border: 1px dashed #999; background-color: ' .
'#FFF' .
';
}
.bouton36gris {
	padding: 6px;
	margin-top: 2px;
	border: 1px solid #aaa;
	background-color: #eee;
	-moz-border-radius: 5px;
}
.bouton36blanc {
	padding: 6px;
	margin-top: 2px;
	border: 1px solid #999;
	background-color: #fff;
	-moz-border-radius: 5px;
}
.bouton36rouge {
	padding: 6px;
	margin-top: 2px;
	border: 1px solid red;
	background-color: #fff;
	-moz-border-radius: 5px;
}
.bouton36off {
	padding: 6px;
	margin-top: 2px;
	width: 24px;
	height: 24px;
}

div.onglet {
	font-family: Arial, Sans, sans-serif; 
	font-size: 11px;
	font-weight: bold; 
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	margin-right: 3px;
	padding: 5px;
	background-color: #fff;
}
div.onglet a {
	color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
}

div.onglet_on {
	font-family: Arial, Sans, sans-serif; 
	font-size: 11px;
	font-weight: bold; 
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	margin-right: 3px;
	padding: 5px;
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
';
}
div.onglet_on a, div.onglet_on a:hover {
	color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	text-decoration: none;
}

div.onglet_off {
	font-family: Arial, Sans, sans-serif; 
	font-size: 11px;
	font-weight: bold; 
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	margin-right: 3px;
	padding: 5px;
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	color: #fff;
}



.reliefblanc {
	 background-image: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=barre-blanc.gif);
}
.reliefgris { 
	 background-image: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=barre-noir.gif);
}
.iconeoff {
	padding: 3px; margin: 1px; border: 1px dashed #aaa; background-color: #f0f0f0;
}
.iconeon {
	cursor: pointer; padding: 3px; margin: 1px; border-right: solid 1px #fff; border-bottom: solid 1px #fff; border-left: solid 1px #666; border-top: solid 1px #666; background-color: #eee;
}
.iconedanger { padding: 3px; margin: 1px; border: 1px dashed #000;
	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=rayures-sup.gif);
}

/* Raccourcis pour les polices (utile pour les tableaux) */
.arial0 { font-family: Arial, Sans, sans-serif; font-size: 9px; }
.arial1 { font-family: Arial, Sans, sans-serif; font-size: 10px; }
.arial11 { font-family: Arial, Sans, sans-serif; font-size: 11px; }
.arial2 { font-family: Arial, Sans, sans-serif; font-size: 12px; }
.verdana1 { font-family: Verdana, Arial, Sans, sans-serif; font-size: 10px; }
.verdana2 { font-family: Verdana, Arial, Sans, sans-serif; font-size: 11px; }
.verdana3 { font-family: Verdana, Arial, Sans, sans-serif; font-size: 13px; }
.serif { font-family: Georgia, Garamond, Times New Roman, serif; }
.serif1 { font-family: Georgia, Garamond, Times New Roman, serif; font-size: 11px; }
.serif2 { font-family: Georgia, Garamond, Times New Roman, serif; font-size: 13px; }

.spip_xx-large {font-size: 32px;}
.spip_x-large {font-size: 26px;}
.spip_large {font-size: 18px;}
.spip_medium {font-size: 16px;}
.spip_small {font-size: 14px;}
.spip_x-small {font-size: 12px;}
.spip_xx-small {font-size: 10px;}


/* Liens hypertexte */
a { text-decoration: none; color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
'}
a:hover { text-decoration: none; }
a.icone { text-decoration: none; }
a.icone:hover { text-decoration: none; }

/*
 * Correction orthographique
 */

.ortho {
	background: #ffe0e0;
	margin: 0;
	margin-bottom: -2px;
	border-bottom: 2px dashed red;
	color: inherit;
	text-decoration: none;
}
a.ortho:hover {
	margin: -2px;
	border: 2px dashed red;
	color: inherit;
	text-decoration: none;
}
.ortho-dico {
	background: #e0f4d0;
	margin: 0;
	margin-bottom: -2px;
	border-bottom: 2px dashed #a0b890;
	color: inherit;
	text-decoration: none;
}
a.ortho-dico:hover {
	margin: -2px;
	border: 2px dashed #a0b890;
	color: inherit;
	text-decoration: none;
}

#ortho-fixed {
	position: fixed; top: 0; ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
': 0; width: 25%; padding: 15px; margin: 0;
}
.ortho-content {
	position: absolute; top: 0; width: 70%; padding: 15px; margin: 0;
}
.suggest-actif, .suggest-inactif {
	font-family: "Trebuchet Sans MS", Verdana, Arial, sans-serif;
	font-size: 95%;
	font-weight: bold;
	margin: 8px;
	z-index: 1;
}
.suggest-actif .detail, .suggest-inactif .detail {
	margin: 8px;
	margin-top: -0.5em;
	padding: 0.5em;
	padding-top: 1em;
	border: 1px solid #c8c8c8;
	background: #f3f2f3;
	font-family: Georgia, Garamond, "Times New Roman", serif;
	font-weight: normal;
	z-index: 0;
}
.suggest-actif .detail ul, .suggest-inactif .detail ul {
	 list-style-image: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'puce.gif);
	background: #f3f2f3;
	margin: 0;
	padding: 0;
	padding-left: 25px;
}
.suggest-actif {
	display: block;
}
.suggest-inactif {
	display: none;
}
.form-ortho select {
	background: #ffe0e0;
}


/*
 * Comparaison d articles
 */

.diff-para-deplace {
	background: #e8e8ff;
}
.diff-para-ajoute {
	background: #d0ffc0;
	color: #000;
}
.diff-para-supprime {
	background: #ffd0c0;
	color: #904040;
	text-decoration: line-through;
}
.diff-deplace {
	background: #e8e8ff;
}
.diff-ajoute {
	background: #d0ffc0;
}
.diff-supprime {
	background: #ffd0c0;
	color: #802020;
	text-decoration: line-through;
}
.diff-para-deplace .diff-ajoute {
	border: 1px solid #808080;
	background: #b8ffb8;
}
.diff-para-deplace .diff-supprime {
	border: 1px solid #808080;
	background: #ffb8b8;
}
.diff-para-deplace .diff-deplace {
	border: 1px solid #808080;
	background: #b8b8ff;
}

/*
 * Barre de raccourcis
 */

table.spip_barre {
	width: 100%;
	border-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
': 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
';
}

table.spip_barre td {
	text-align: ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
';
	border-top: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
';
	border-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
';
}

table.spip_barre a img {
	padding: 3px;
	margin: 0;
	background-color: #eee;
	border-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
': 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
';
}
table.spip_barre a:hover img {
	background-color: #fff;
}

td.icone table {
}
td.icone a {
	color: #000;
	text-decoration: none;
	font-family: Verdana,Arial,Sans,sans-serif;
	font-size: 10px;
	font-weight: bold;
}
td.icone a:hover {
	text-decoration: none;
}
td.icone a img {
	border: none;
}

.bouton_rotation {
	display: block;
	padding: 1px;
	margin-bottom: 1px;
	background-color: #eee;
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
';
}

.bouton_rotation:hover {
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
}


/*
* Cadre couleur foncee
*/

.cadre-padding {
	font-family: verdana, arial, helvetica, sans;
	font-size: 12px;
	padding: 6px;
	position: relative;
}

.cadre-titre {
	font-family: verdana, arial, helvetica, sans;
	font-weight: bold;
	font-size: 12px;
	padding: 3px;
}

.cadre-fonce {
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	-moz-border-radius: 8px;
}

.cadre-gris-fonce {
	background: #666;
	-moz-border-radius: 8px;
}

.cadre-gris-clair {
	border: 1px solid #aaa;
	background-color: #ccc;
	-moz-border-radius: 8px;
}

.cadre-couleur {
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
';
	-moz-border-radius: 8px;
}
.cadre-couleur div.cadre-titre {
	-moz-border-radius-topleft: 8px;
	-moz-border-radius-topright: 8px;
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	border-bottom: 2px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	color: #fff;	
}

.cadre-couleur-foncee {
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	-moz-border-radius: 8px;
}
.cadre-couleur-foncee div.cadre-titre {
	color: #fff;	
}



.cadre-trait-couleur {
	background-color: #fff;
	border: 2px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	-moz-border-radius: 8px;
}
.cadre-trait-couleur div.cadre-titre {
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	border-bottom: 2px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	color: #fff;	
}

.cadre-r {
	background-color: #fff;
	border: 1px solid #666;
	-moz-border-radius: 8px;
}


.cadre-r div.cadre-titre {
	background-color: #aaa;
	border-bottom: 1px solid #666;
	color: #000;	
}

.cadre-e {
	background-color: #ddd;
	border-top: 1px solid #aaa;
	border-left: 1px solid #aaa;
	border-bottom: 1px solid #fff;
	border-right: 1px solid #fff;
	-moz-border-radius: 8px;
}

.cadre-e div.cadre-titre {
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
';
	border-bottom: 1px solid #666;
	color: #000;	
}

.cadre-e-noir {
	border: 1px solid #666;
	-moz-border-radius: 8px;
}

.cadre-forum {
	background-color: #fff;
	border: 1px solid #aaa;
	-moz-border-radius-top' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 8px;
}
.cadre-forum div.cadre-titre {
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
';
	border-bottom: 1px solid #aaa;
	color: #000;	
}

.cadre-sous_rub {
	background-color: #fff;
	border: 1px solid #666;
	-moz-border-radius-bottomleft: 8px;
	-moz-border-radius-bottomright: 8px;
	-moz-border-radius-top' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 8px;
}


.cadre-thread-forum {
	background-color: #eee;
	border: 1px solid #ccc;
	border-top: 0;
}
.cadre-thread-forum div.cadre-titre {
	background-color: ' .
'#CCC' .
';
	color: #000;	
}

.cadre-info{
	background-color: #fff;
	border: 2px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	padding: 5px;
	-moz-border-radius: 8px;
}


.cadre-formulaire {
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	background-color: #ddd;
	padding: 5px;
	color: #444;
	font-family: verdana, arial, helvetica, sans;
	font-size: 11px;
}



/*
 * Styles pour "Tout le site"
 */

.plan-rubrique {
	margin-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 12px;
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 10px;
	border-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 1px dotted #888;
}
.plan-secteur {
	margin-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 12px;
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 10px;
	border-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 1px dotted #404040;
}
 
.plan-articles, .plan-articles-bloques {
	border-top: 1px solid #ccc;
	border-left: 1px solid #ccc;
	border-right: 1px solid #ccc;
}
.plan-articles a, .plan-articles-bloques .publie, .plan-articles-bloques .prepa, .plan-articles-bloques .prop, .plan-articles-bloques .refuse, .plan-articles-bloques .poubelle {
	display: block;
	padding: 2px;
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 18px;
	border-bottom: 1px solid #ccc;
	 background: ' .
((strval($t1 = interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','1','99')))!='') ?
		($t1 . '%') :
		('')) .
' no-repeat;
	background-color: #e0e0e0;
	font-family: Verdana, Arial, Sans, sans-serif;
	font-size: 11px;
	text-decoration: none;
}
.plan-articles a:hover {
	background-color: #fff; 
	text-decoration: none;
}
.plan-articles .publie, .plan-articles-bloques .publie {
	 background-image: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=puce-verte.gif);
}
.plan-articles .prepa, .plan-articles-bloques .prepa {
	 background-image: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=puce-blanche.gif);
}
.plan-articles .prop, .plan-articles-bloques .prop {
	 background-image: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=puce-orange.gif);
}
.plan-articles .refuse, .plan-articles-bloques .refuse {
	 background-image: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=puce-rouge.gif);
}
.plan-articles .poubelle, .plan-articles-bloques .poubelle {
	 background-image: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=puce-poubelle.gif);
}

a.foncee, a.foncee:hover, a.claire, a.claire:hover, span.creer, span.lang_base {
	display: inline;
	float: none;
	padding: 2px;
	margin: 0;
	margin-left: 1px;
	margin-right: 1px;
	border: none;
	font-family: Arial, Helvetica, Sans, sans-serif;
	font-size: 9px;
	text-decoration: none;
	z-index: 1;

}
a.foncee, a.foncee:hover {
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	color: #fff;
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
}
a.claire, a.claire:hover {
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
';
	color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
}
span.lang_base {
	color: #666;
	border: 1px solid #666;
	background-color: #eee;
}
span.creer {
	color: #333;
	border: 1px solid #333;
	background-color: #fff;
}
.trad_float {
	float: ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
';
	z-index: 20;
	margin-top: 4px;
}

div.liste {
	border: 1px solid #444;
	margin-top: 3px; 
	margin-bottom: 3px;
}

	
.tout-site ul#articles_tous,.tout-site ul#articles_tous ul {
	list-style: none;
}
.tout-site ul {
	margin-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 10px;
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 12px;
	border-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 1px dotted #888;
}
.tout-site ul,.tout-site li {clear:both;}
li.sec, li.rub {display:inline;}
ul>li.sec,ul>li.rub {display:block;}
li.sec a.titre,  li.rub a.titre {
	display:block;
	font-weight:bold;
	margin:0px;
	padding: 0; 
	padding-top: 4px;
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 5px; 
	margin-bottom:5px;
	height:20px;
}
li.art {display:block; height:24px;}
li.sec a.titre {background-color: #' .
interdire_scripts(entites_html($Pile[0]['couleur_claire'])) .
';}
li.rub a.titre {background-color: transparent;}
li.art a.titre {
	display:inline;
	background-color: transparent;
	font-weight:normal;
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 5px; 
	padding-top: 4px;
	height:20px;
}
span.icone {
	float:' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
';
	position:relative;
	display:block;
	width:28px;
	height:24px;
	margin-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
':-14px;	
}
li.art span.icone {	margin-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
':0px;}

span.holder {}
li.sec span.icone {	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=secteur-24.gif) ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
' bottom no-repeat;}
li.rub span.icone {	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=rubrique-24.gif) ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
' top no-repeat;}
li.art span.icone {	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=article-24.gif) ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
' top no-repeat;}
li.sec ul{display:none;}
li.rub ul{display:none;}

li .puce_statut{float:' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
';	padding-top: 5px;}
li .puce_article_popup {padding:0px;}
li img.expandImage{
	display:block;
	float:' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
';
	position:relative;
	' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
':-20px;
	width:16px;
	height:16px;
}
li.selected {background-color: #' .
interdire_scripts(entites_html($Pile[0]['couleur_claire'])) .
'}

a.liste-mot {
	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=petite-cle.gif) ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
' center no-repeat; 
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 30px;
}

.tr_liste {
	background-color: #eee;
}
.tr_liste_over, .tr_liste:hover {
	background-color: #fff;
}

.tr_liste td, .tr_liste:hover td, .tr_liste_over td {
	border-bottom: 1px solid #ccc;
}

.tr_liste td div.liste_clip {
	height: 12px;
	overflow: hidden;
}

.tr_liste:hover td div.liste_clip, span.liste_clip {
	overflow: visible;
	height: 100%;
}

div.puce_article, span.puce_article, div.puce_breve, span.puce_breve {
	position: relative; 
}
div.puce_article_fixe, div.puce_breve_fixe, span.puce_article_fixe, span.puce_breve_fixe {
	position: relative;
}

div.puce_article_popup, div.puce_breve_popup, span.puce_article_popup, span.puce_breve_popup {
	position: absolute;
	top: 0;
	left: 0;
	visibility: hidden;
	border: 1px solid #666; 
	background-color: #ccc; z-index: 10; 
	-moz-border-radius: 3px;
}

div.puce_article_popup img, div.puce_breve_popup img, span.puce_article_popup img, span.puce_breve_popup img {
	padding: 1px;
	border: none;
}

div.puce_article_popup, span.puce_article_popup {
	width: 55px; 
}

div.puce_breve_popup, span.puce_breve_popup {
	width: 27px; 
}

img.puce {
	width: 7px;
	height: 7px;
	border: 0px;
}

img.lang {
	width: 12px;
	height: 12px;
	border: 0px;
}

div.brouteur_rubrique {
	display: block;
	padding: 3px;
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
': 10px;
	border-top: 0px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	border-bottom: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	border-left: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	border-right: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=triangle-droite' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','','_rtl')) .
'.gif)' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
' center no-repeat;
	background-color: #fff;
}

div.brouteur_rubrique_on {
	display: block;
	padding: 3px;
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
': 10px;
	border-top: 0px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	border-bottom: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	border-left: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	border-right: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=triangle-droite' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','','_rtl')) .
'.gif) ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
' center no-repeat;
	background-color: #e0e0e0;
}

xdiv.brouteur_rubrique:hover {
	background-color: #e0e0e0;
}

div.brouteur_rubrique div, div.brouteur_rubrique_on div {
	padding-top: 5px; 
	padding-bottom: 5px; 
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 28px; 
	background-repeat: no-repeat;
	background-position: center ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
';
	font-weight: bold;
	font-family: Arial,Sans,sans-serif;
	font-size: 12px;
}

div.brouteur_rubrique div a {
	color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
}

div.brouteur_rubrique_on div a {
	color: #000;
}

.iframe-brouteur {
	background-color: #eee; 
	border: none;
	z-index: 1;
}


/*
 * Styles generes par les raccourcis de mise en page
 */

i.spip {}
strong.spip {}
hr.spip {}

.spip_puce { list-style-position: outside; }

ul.spip {}
ol.spip {}
li.spip {}

h3.spip {
	text-align: center; 
	margin: 2em 0 1.4em 0;
	font: 1.15em Verdana,Arial,Sans,sans-serif;
	font-weight: bold; }

p.spip {
	line-height: 140%;
}
p.spip_note {
	margin-bottom: 3px;
	margin-top: 3px;
	margin-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 17px;
	text-indent: -17px;
}


a.spip_in {
	border-bottom: 1px dashed;
}
a.spip_out {
	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=spip_out.gif)' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
' center no-repeat;
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
': 10px;
	border-bottom: 1px solid;
}

a.spip_note {
	background-color: #eee;
}
a.spip_glossaire:hover {
	text-decoration: underline overline;
}

.spip_recherche {
	padding: 3px; 
	width: 100%; 
	font-size: 10px;
	border: 1px solid #fff;
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	color: #fff;
}

/* Citations, code et poesie */
q, blockquote.spip, .spip_poesie, .spip_serif { font-family: Georgia, Times, serif; }

blockquote.spip {
	margin-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 40px;
	margin-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
': 0;
	margin-top: 10px;
	margin-bottom: 10px;
	border: solid 1px #aaa;
	background-color: #fff;
	padding-left: 10px;
	padding-right: 10px;
}

div.spip_poesie {
	margin-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 10px;
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 10px;
	border-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 1px solid #999;
}
div.spip_poesie div {
	text-indent: -60px;
	margin-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 60px;
}

.spip_code, .spip_cadre { font-family: monospace; font-style: normal; font-size: 1.1em; }
.spip_cadre {
	width: 100%;
	background-color: #eee;
	margin-top: 10px;
	padding: 5px;
	border: 1px solid #666;
	behavior: url(../dist/win_width.htc);
}

/* Tableaux */
table.spip {
	margin: auto;
	margin-bottom: 1em;
	border: 1px solid;
	border-collapse: collapse;
	font-family: Verdana,Arial,Sans,sans-serif;
	font-size: 0.90em; }
table.spip caption {
	caption-side: top; /* bottom pas pris en compte par IE */
	text-align: center;
	margin: auto;
	padding: 3px;
	font-weight: bold; }
table.spip tr.row_first { background-color: #fcf4d0; }
table.spip tr.row_odd { background-color: #d0d0d0; }
table.spip tr.row_even { background-color: #f0f0f0; }
table.spip th, table.spip td { padding: 3px; text-align: left; vertical-align: middle; }

/* Logos, documents et images */
img, .spip_logos { margin: 0; padding: 0; border: none; }

.spip_documents { text-align: center; font-family: Verdana,Arial,Sans,sans-serif; font-size: 0.90em; }
.spip_documents_center { clear: both; width: 100%; margin: auto; }
span.spip_documents_center { display:block; margin-top:1em; }
.spip_documents_left { float: left; margin-right: 15px; margin-bottom: 5px; }
.spip_documents_right { float: right; margin-left: 15px; margin-bottom: 5px; }
.spip_doc_titre { font-weight: bold; font-size: 0.8em; margin-left:auto; margin-right:auto;}
.spip_doc_descriptif { clear: both; font-size: 0.8em; margin-left:auto; margin-right:auto;
}

/* modeles par defaut */
.spip_modele {float:right; display:block; border:1px dotted grey; width:180px;}

/* pour le plugin "revision_nbsp" */
.spip-nbsp {
	border-bottom: 2px solid #c8c8c8;
	padding-left: 2px;
	padding-right: 2px;
	margin-left: -1px;
	margin-right: -1px;
}

.boutonlien {
	font-family: Verdana,Arial,Sans,sans-serif;
	font-weight: bold;
	font-size: 9px;
}
a.boutonlien:hover {
	color:#454545; text-decoration: none;
}
a.boutonlien {
	color:#808080; text-decoration: none;
}

a.triangle_block {
	margin-top: -3px;
	margin-bottom: -3px;
	margin-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
': -3px;
	filter:alpha(opacity=70);
	-moz-opacity:0.7;
	opacity: 0.7;	
}
a.triangle_block:hover {
	filter:alpha(opacity=100);
	-moz-opacity:1;
	opacity: 1;	
}

.fond-agenda {
	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=fond-agenda.gif) ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
' center no-repeat;
	float: ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
'; 
	margin-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
': 3px;
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
': 4px;
	line-height: 12px;
	color: #666; 
}

a.highlight, div.highlight {
	color: #000;
	padding: 2px;
	background-color: #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_claire'],'edf3fe'))) .
';
	display:block;
}

a.pashighlight, div.pashighlight {
	color: #666;
	padding: 2px;
	background-color: white;
	display:block;
}

a.highlight:hover, a.pashighlight:hover {
	color: #000;
	cursor: pointer;
}


div.petite-racine, a.petite-racine {
	background: ' .
((strval($t1 = interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','1','99')))!='') ?
		($t1 . '%') :
		('')) .
' no-repeat;
	background-image: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=racine-site-12.gif);
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 15px;
	background-color: white; 
	border: 1px solid #' .
interdire_scripts(entites_html(sinon($Pile[0]['couleur_foncee'],'3874b0'))) .
';
	border-bottom: 0;
	width: 134px;
}
div.petite-rubrique, a.petite-rubrique {
	background: ' .
((strval($t1 = interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','1','99')))!='') ?
		($t1 . '%') :
		('')) .
' no-repeat;
	background-image: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=rubrique-12.gif);
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 15px;
}
div.petit-secteur, a.petit-secteur {
	background: ' .
((strval($t1 = interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','1','99')))!='') ?
		($t1 . '%') :
		('')) .
' no-repeat;
	background-image: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=secteur-12.gif);
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','left','right')) .
': 15px;
}
div.rub-ouverte, a.rub-ouverte {
	padding-' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
': 10px;
	background: url(' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'wrapper.php?file=triangle-droite' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','','_rtl')) .
'.gif) ' .
interdire_scripts(choixsiegal(entites_html($Pile[0]['ltr']),'left','right','left')) .
' center no-repeat;
}

.swap-couche {
	border: 0px;
	height: 10px;
	width: 10px;
}');

	return analyse_resultat_skel('html_985fc2efc6778135eb3731790d87f93c', $Cache, $page);
}

?>