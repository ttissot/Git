<?php
/*
 * Squelette : squelettes/inclusions/branding.html
 * Date :      Thu, 23 May 2013 22:00:00 GMT
 * Compile :   Fri, 08 Jan 2016 07:20:10 GMT (0.00s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes/inclusions/branding.html
//
function html_aa6d6d01cbcc0141ad0db7563fe729da($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<div id="branding">
  ' .
'
  <a rel="start" href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/">
  ' .
(affiche_logos(calcule_logo('id_syndic', 'ON', "'0'",'',  ''), '', '') ? (inserer_attribut(inserer_attribut(inserer_attribut(filtrer('image_reduire',affiche_logos(calcule_logo('id_syndic', 'ON', "'0'",'',  ''), '', ''),'770','200'),'alt',interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'])))),'class','logo'),'title',interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'])))) .
	'

    '):('<span id="nom_site_spip">' .
	interdire_scripts(typo($GLOBALS['meta']['nom_site'])) .
	'</span>
  ')) .
'
  </a>
  <a href="http://www.mesachatsfrancais.fr/" title="Mes Achats Francais" target="_blank"><img src="/IMG/jpg/Label-ofg.jpg" alt="Label origine France garantie" width="227" height="227" /></a>
  ' .
interdire_scripts(propre($GLOBALS['meta']['descriptif_site'])) .
'

</div>
');

	return analyse_resultat_skel('html_aa6d6d01cbcc0141ad0db7563fe729da', $Cache, $page);
}

?>