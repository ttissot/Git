<?php
/*
 * Squelette : dist/formulaires/oubli.html
 * Date :      Tue, 06 Nov 2012 23:00:00 GMT
 * Compile :   Mon, 07 Apr 2014 06:54:31 GMT (0.01s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette dist/formulaires/oubli.html
//
function html_e421ce9de97d8b09b7d8d94a0c0d7fb0($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<div class="formulaire_spip formulaire_oubli">' .
((strval($t1 = interdire_scripts($Pile[0]['message']))!='') ?
		('
' . $t1 . '
') :
		('')) .
((strval($t1 = interdire_scripts(($Pile[0]['message'] ? '':' ')))!='') ?
		('
' . $t1 . ('

<form id="oubli_form" action="' .
	interdire_scripts(entites_html($Pile[0]['action'])) .
	'" method="post">
	<fieldset>
	<legend>' .
	_T('public/spip/ecrire:pass_nouveau_pass') .
	'</legend>' .
	((strval($t2 = interdire_scripts(entites_html($Pile[0]['p'])))!='') ?
			('
	<input type="hidden" name="p" value="' . $t2 . ('" />
	<p><label for="oubli">' .
		_T('public/spip/ecrire:pass_choix_pass') .
		'</label><br />
	<input type="password" name="oubli" id="oubli" /></p>
	')) :
			('')) .
	((strval($t2 = interdire_scripts((entites_html($Pile[0]['p']) ? '':' ')))!='') ?
			('
	' . $t2 . ('
	<p>' .
		_T('public/spip/ecrire:pass_indiquez_cidessous') .
		'</p>
	<p><label for="oubli">' .
		_T('public/spip/ecrire:form_pet_votre_email') .
		'</label><br />
	<input type="text" name="oubli" id="oubli" /></p>
	')) :
			('')) .
	'
	<p class="spip_bouton"><input type="submit" value="' .
	_T('public/spip/ecrire:pass_ok') .
	'" /></p>
	</fieldset>
</form>
')) :
		('')) .
'
</div>

<div align="' .
lang_dir(($Pile[0]['lang'] ? $Pile[0]['lang'] : $GLOBALS['spip_lang']),'right','left') .
'">
<script type="text/javascript"><!--
' .
((strval($t1 = interdire_scripts(($Pile[0]['message'] ? '':' ')))!='') ?
		('
' . $t1 . '
document.getElementById(\'oubli\').focus()
') :
		('')) .
'
document.write("<a style=\'color: #e86519\' href=\'")
document.write((window.opener) ? "javascript:close()" : "./")
document.write("\'>' .
_T('public/spip/ecrire:pass_quitter_fenetre') .
'<" + "/a>");
//--></script>
<noscript>
	&#91;<a style="color: #e86519" href=\'./\'>' .
_T('public/spip/ecrire:pass_retour_public') .
'</a>&#93;
</noscript>
</div>');

	return analyse_resultat_skel('html_e421ce9de97d8b09b7d8d94a0c0d7fb0', $Cache, $page);
}

?>