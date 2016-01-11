<?php
/*
 * Squelette : dist/formulaires/menu_lang.html
 * Date :      Wed, 07 Nov 2012 14:17:39 GMT
 * Compile :   Wed, 07 Nov 2012 14:29:04 GMT (0.00s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette dist/formulaires/menu_lang.html
//
function html_e582066e42828eb4aa1c1f3b5c8ff846($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<div class="formulaire_spip formulaire_menu_lang">
<a name="formulaire_menu_lang" id="formulaire_menu_lang"></a>

<form method="post" action="' .
interdire_scripts(entites_html($Pile[0]['url'])) .
'"><div>
	' .
interdire_scripts(form_hidden(entites_html($Pile[0]['url']))) .
'
	<label for="' .
interdire_scripts(entites_html($Pile[0]['nom'])) .
'">' .
_T('public/spip/ecrire:info_langues') .
'</label>
	<select class="forml" name="' .
interdire_scripts(entites_html($Pile[0]['nom'])) .
'" id="' .
interdire_scripts(entites_html($Pile[0]['nom'])) .
'" onchange="document.location.href=\'' .
interdire_scripts(entites_html($Pile[0]['url'])) .
'&amp;' .
interdire_scripts(entites_html($Pile[0]['nom'])) .
'=\'+this.options[this.selectedIndex].value">
	' .
interdire_scripts($Pile[0]['langues']) .
'</select>
	<noscript><div style="display:inline;">
		<input type="submit" value="&gt;&gt;" />
	</div></noscript>
</div></form>

</div>');

	return analyse_resultat_skel('html_e582066e42828eb4aa1c1f3b5c8ff846', $Cache, $page);
}

?>