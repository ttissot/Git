<?php
/*
 * Squelette : squelettes/inclusions/sousmenu.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Wed, 07 Nov 2012 14:29:42 GMT (0.00s)
 * Boucles :   _sousmenu, _origine
 */ 
//
// <BOUCLE rubriques>
//
function BOUCLE_sousmenuhtml_25111daebb3e9ed9c162c8950d4d02d1(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang"), # SELECT
		array('rubriques' => 'spip_rubriques'), # FROM
		
			array(
			array('=', 'rubriques.id_parent', _q($Pile[$SP]['id_rubrique'])), 
			array('=', 'rubriques.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('rubriques.titre'), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'rubriques', # table
		'_sousmenu', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
							<li' .
((strval($t1 = (calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0]) ? 'on' : ''))!='') ?
		(' class="' . $t1 . '"') :
		('')) .
'><a href="' .
vider_url(generer_url_rubrique($Pile[$SP]['id_rubrique'])) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'])) .
'</a></li>
							');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_originehtml_25111daebb3e9ed9c162c8950d4d02d1(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.id_rubrique",
		"rubriques.lang"), # SELECT
		array('rubriques' => 'spip_rubriques'), # FROM
		
			array(
			array('=', 'rubriques.id_secteur', _q($Pile[$SP]['id_secteur'])), 
			array('=', 'rubriques.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'rubriques', # table
		'_origine', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
							' .
BOUCLE_sousmenuhtml_25111daebb3e9ed9c162c8950d4d02d1($Cache, $Pile, $doublons, $Numrows, $SP) .
'
							');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette squelettes/inclusions/sousmenu.html
//
function html_25111daebb3e9ed9c162c8950d4d02d1($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('					<div class="nav_supp">
						' .
((strval($t1 = BOUCLE_originehtml_25111daebb3e9ed9c162c8950d4d02d1($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
		('
						<ul>
							' . $t1 . '
						</ul>
						') :
		('')) .
'
					</div>');

	return analyse_resultat_skel('html_25111daebb3e9ed9c162c8950d4d02d1', $Cache, $page);
}

?>