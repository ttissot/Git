<?php
/*
 * Squelette : plugins/forms_et_tables_1_9_1/forms_styles.css.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Wed, 07 Nov 2012 14:38:27 GMT (0.01s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette plugins/forms_et_tables_1_9_1/forms_styles.css.html
//
function html_3f20c1067668e6a2fa186656c64378bb($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<?php header("X-Spip-Cache: 604800"); ?>'.'<?php header("Cache-Control: max-age=604800"); ?>' .
'<'.'?php header("' . 'Content-Type: text/css' . '"); ?'.'>' .
compacte_css(forms_ajoute_styles((($c = find_in_path('spip_forms.css')) ? spip_file_get_contents($c) : ""))) .
'
' .
compacte_css((($c = find_in_path(interdire_scripts(url_absolue_css(find_in_path('donnee_voir.css'))))) ? spip_file_get_contents($c) : "")) .
'
' .
compacte_css((($c = find_in_path(interdire_scripts(url_absolue_css(find_in_path('donnees_tous.css'))))) ? spip_file_get_contents($c) : "")) .
'
' .
compacte_css((($c = find_in_path(interdire_scripts(url_absolue_css(find_in_path('img_pack/date_picker.css'))))) ? spip_file_get_contents($c) : "")) .
'
' .
compacte_css((($c = find_in_path(interdire_scripts(url_absolue_css(find_in_path('img_pack/jtip.css'))))) ? spip_file_get_contents($c) : "")));

	return analyse_resultat_skel('html_3f20c1067668e6a2fa186656c64378bb', $Cache, $page);
}

?>