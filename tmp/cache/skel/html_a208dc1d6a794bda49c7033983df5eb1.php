<?php
/*
 * Squelette : squelettes/inclusions/inc-entete.html
 * Date :      Tue, 06 Nov 2012 23:00:00 GMT
 * Compile :   Fri, 08 Jan 2016 07:20:10 GMT (0.00s)
 * Boucles :   _nav
 */ 
//
// <BOUCLE rubriques>
//
function BOUCLE_navhtml_a208dc1d6a794bda49c7033983df5eb1(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.lang"), # SELECT
		array('rubriques' => 'spip_rubriques'), # FROM
		
			array(
			array('=', 'rubriques.id_parent', 0), 
			array('NOT', 
			array('=', 'rubriques.id_rubrique', "'7'")), 
			array('=', 'rubriques.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('num'), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'rubriques', # table
		'_nav', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
					<li id="menu' .
(($Pile[0]['rang'])?($Pile[0]['rang']):recuperer_numero($Pile[$SP]['titre'])) .
'"' .
((strval($t1 = (calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0]) ? 'on' : ''))!='') ?
		(' class="' . $t1 . '"') :
		('')) .
'><a href="' .
vider_url(generer_url_rubrique($Pile[$SP]['id_rubrique'])) .
'">' .
interdire_scripts(majuscules(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a></li>
					');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette squelettes/inclusions/inc-entete.html
//
function html_a208dc1d6a794bda49c7033983df5eb1($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('			
			<div id="header">
				<img src="' .
interdire_scripts(find_in_path('css/navpics/titres/baseline.png')) .
'" alt="Précision et savoir-faire" class="baseline" />
				<ul id="nav_main">
					<li id="menu0"' .
(($Pile[0]['id_rubrique'] == '0') ? ' class="on"':'') .
'><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'">ACCUEIL</a></li>
					' .
BOUCLE_navhtml_a208dc1d6a794bda49c7033983df5eb1($Cache, $Pile, $doublons, $Numrows, $SP) .
'
				</ul>
				<img src="' .
interdire_scripts(find_in_path('css/navpics/visuels/carres.gif')) .
'" alt="" class="carres" />
			</div>');

	return analyse_resultat_skel('html_a208dc1d6a794bda49c7033983df5eb1', $Cache, $page);
}

?>