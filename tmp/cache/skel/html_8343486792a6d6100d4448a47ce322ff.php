<?php
/*
 * Squelette : dist/jquery.js.html
 * Date :      Wed, 07 Nov 2012 14:17:40 GMT
 * Compile :   Wed, 07 Nov 2012 14:29:26 GMT (0.00s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette dist/jquery.js.html
//
function html_8343486792a6d6100d4448a47ce322ff($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<?php header("X-Spip-Cache: 604800"); ?>'.'<?php header("Cache-Control: max-age=604800"); ?>' .
'<'.'?php header("' . 'Content-Type: text/javascript' . '"); ?'.'>' .
'/*
 * jQuery 1.1 - New Wave Javascript
 *
 * Copyright (c) 2007 John Resig (jquery.com)
 * Dual licensed under the MIT (MIT-LICENSE.txt)
 * and GPL (GPL-LICENSE.txt) licenses.
 *
 * + form.js (plugins @ jQuery.com)
 * + ajaxCallback.js (www.spip.net)
 */
' .
compacte_js((($c = find_in_path('javascript/jquery-1.1.js')) ? spip_file_get_contents($c) : "")) .
'
' .
compacte_js((($c = find_in_path('javascript/form.js')) ? spip_file_get_contents($c) : "")) .
'
' .
compacte_js((($c = find_in_path('javascript/ajaxCallback.js')) ? spip_file_get_contents($c) : "")) .
'
');

	return analyse_resultat_skel('html_8343486792a6d6100d4448a47ce322ff', $Cache, $page);
}

?>