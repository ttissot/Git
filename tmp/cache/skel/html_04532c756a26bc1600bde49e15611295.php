<?php
/*
 * Squelette : plugins/forms_et_tables_1_9_1/modeles/form.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Wed, 07 Nov 2012 14:38:26 GMT (0.00s)
 * Boucles :   _f
 */ 
//
// <BOUCLE forms>
//
function BOUCLE_fhtml_04532c756a26bc1600bde49e15611295(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forms.id_form"), # SELECT
		array('forms' => 'spip_forms'), # FROM
		
			array(
			array('=', 'forms.id_form', _q($Pile[$SP]['id_form']))), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'forms', # table
		'_f', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= ('
' .
executer_balise_dynamique('FORMS',
	array($Pile[$SP]['id_form'],$Pile[0]['id_article'],$Pile[0]['id_donnee'],$Pile[0]['id_donnee_liee'],$Pile[0]['class']),
	array(''), $GLOBALS['spip_lang'],2) .
'
');
	}

	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette plugins/forms_et_tables_1_9_1/modeles/form.html
//
function html_04532c756a26bc1600bde49e15611295($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = BOUCLE_fhtml_04532c756a26bc1600bde49e15611295($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_04532c756a26bc1600bde49e15611295', $Cache, $page);
}

?>