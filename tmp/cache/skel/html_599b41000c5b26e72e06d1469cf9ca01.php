<?php
/*
 * Squelette : dist/formulaires/administration.html
 * Date :      Tue, 06 Nov 2012 23:00:00 GMT
 * Compile :   Fri, 08 Jan 2016 07:20:10 GMT (0.01s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette dist/formulaires/administration.html
//
function html_599b41000c5b26e72e06d1469cf9ca01($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<div' .
((strval($t1 = interdire_scripts(entites_html(sinon($Pile[0]['divclass'],'spip-admin-bloc'))))!='') ?
		(' class="' . $t1 . '"') :
		('')) .
' dir="' .
lang_dir(($Pile[0]['lang'] ? $Pile[0]['lang'] : $GLOBALS['spip_lang']),'ltr','rtl') .
'">' .
((strval($t1 = interdire_scripts(entites_html($Pile[0]['analyser'])))!='') ?
		('
	<a href="' . $t1 . ('" class="spip-admin-boutons">' .
	_T('public/spip/ecrire:analyse_xml') .
	interdire_scripts((entites_html($Pile[0]['xhtml_error']) ? ' *':'')) .
	'</a>')) :
		('')) .
((strval($t1 = interdire_scripts(entites_html($Pile[0]['id_article'])))!='') ?
		(('
	<a href="' .
	interdire_scripts(entites_html($Pile[0]['voir_article'])) .
	'" class="spip-admin-boutons">' .
	_T('public/spip/ecrire:admin_modifier_article') .
	' (') . $t1 . ')</a>') :
		('')) .
((strval($t1 = interdire_scripts(entites_html($Pile[0]['id_breve'])))!='') ?
		(('
	<a href="' .
	interdire_scripts(entites_html($Pile[0]['voir_breve'])) .
	'" class="spip-admin-boutons">' .
	_T('public/spip/ecrire:admin_modifier_breve') .
	' (') . $t1 . ')</a>') :
		('')) .
((strval($t1 = interdire_scripts(entites_html($Pile[0]['id_rubrique'])))!='') ?
		(('
	<a href="' .
	interdire_scripts(entites_html($Pile[0]['voir_rubrique'])) .
	'" class="spip-admin-boutons">' .
	_T('public/spip/ecrire:admin_modifier_rubrique') .
	' (') . $t1 . ')</a>') :
		('')) .
((strval($t1 = interdire_scripts(entites_html($Pile[0]['id_mot'])))!='') ?
		(('
	<a href="' .
	interdire_scripts(entites_html($Pile[0]['voir_mot'])) .
	'" class="spip-admin-boutons">' .
	_T('public/spip/ecrire:admin_modifier_mot') .
	' (') . $t1 . ')</a>') :
		('')) .
((strval($t1 = interdire_scripts(entites_html($Pile[0]['id_syndic'])))!='') ?
		(('
	<a href="' .
	interdire_scripts(entites_html($Pile[0]['voir_site'])) .
	'" class="spip-admin-boutons">' .
	_T('public/spip/ecrire:icone_modifier_site') .
	' (') . $t1 . ')</a>') :
		('')) .
((strval($t1 = interdire_scripts(entites_html($Pile[0]['id_auteur'])))!='') ?
		(('
	<a href="' .
	interdire_scripts(entites_html($Pile[0]['voir_auteur'])) .
	'" class="spip-admin-boutons">' .
	_T('public/spip/ecrire:admin_modifier_auteur') .
	' (') . $t1 . ')</a>') :
		('')) .
((strval($t1 = interdire_scripts(entites_html($Pile[0]['ecrire'])))!='') ?
		('
	<a href="' . $t1 . ('" class="spip-admin-boutons">' .
	_T('public/spip/ecrire:espace_prive') .
	'</a>')) :
		('')) .
'
	<a href="' .
parametre_url(quote_amp(self()),'var_mode',interdire_scripts(entites_html($Pile[0]['calcul']))) .
'" class="spip-admin-boutons">' .
_T('public/spip/ecrire:admin_recalculer') .
interdire_scripts(entites_html($Pile[0]['use_cache'])) .
'</a>' .
((strval($t1 = interdire_scripts(entites_html($Pile[0]['statistiques'])))!='') ?
		('
	<a href="' . $t1 . ('" class="spip-admin-boutons">' .
	((strval($t2 = interdire_scripts(entites_html($Pile[0]['visites'])))!='') ?
			((_T('public/spip/ecrire:info_visites') .
		'&nbsp;') . $t2) :
			('')) .
	((strval($t2 = interdire_scripts(entites_html($Pile[0]['popularite'])))!='') ?
			((';&nbsp;' .
		_T('public/spip/ecrire:info_popularite_5') .
		'&nbsp;') . $t2) :
			('')) .
	'</a>')) :
		('')) .
((strval($t1 = interdire_scripts(entites_html($Pile[0]['preview'])))!='') ?
		('
	<a href="' . $t1 . ('" class="spip-admin-boutons">' .
	_T('public/spip/ecrire:previsualisation') .
	'</a>')) :
		('')) .
((strval($t1 = interdire_scripts(entites_html($Pile[0]['debug'])))!='') ?
		('
	<a href="' . $t1 . ('" class="spip-admin-boutons">' .
	_T('public/spip/ecrire:admin_debug') .
	'</a>')) :
		('')) .
'
</div>');

	return analyse_resultat_skel('html_599b41000c5b26e72e06d1469cf9ca01', $Cache, $page);
}

?>