<?php
/*
 * Squelette : plugins/forms_et_tables_1_9_1/modeles/form_reponse_email_confirm.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Mon, 19 Nov 2012 10:08:48 GMT (0.07s)
 * Boucles :   _champs, _form, _reponses
 */ 
//
// <BOUCLE forms_champs>
//
function BOUCLE_champshtml_ebc7ec0f83a03de2d9a477c4240faa0c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forms_champs.titre",
		"forms_champs.champ",
		"forms_champs.id_form"), # SELECT
		array('forms_champs' => 'spip_forms_champs'), # FROM
		
			array(
			array('=', 'forms_champs.id_form', _q($Pile[$SP]['id_form']))), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('forms_champs.rang'), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'forms_champs', # table
		'_champs', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= ('
' .
interdire_scripts(supprimer_tags(typo($Pile[$SP]['titre']))) .
' : ' .
supprimer_tags(forms_calcule_les_valeurs('forms_champs', $Pile[$SP-2]['id_donnee'], $Pile[$SP]['champ'], $Pile[$SP]['id_form'] , ',')) .
' ');
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE forms>
//
function BOUCLE_formhtml_ebc7ec0f83a03de2d9a477c4240faa0c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forms.id_form",
		"forms.texte"), # SELECT
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
		'_form', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= (interdire_scripts(supprimer_tags(propre($Pile[$SP]['texte']))) .
'
' .
_T('forms:reponse_envoyee') .
' ' .
affdate(vider_date($Pile[$SP-1]['date'])) .
'
' .
_T('forms:reponse_depuis') .
' ' .
interdire_scripts(url_absolue($Pile[$SP-1]['url'])) .
'
' .
BOUCLE_champshtml_ebc7ec0f83a03de2d9a477c4240faa0c($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE forms_donnees>
//
function BOUCLE_reponseshtml_ebc7ec0f83a03de2d9a477c4240faa0c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forms_donnees.id_donnee",
		"forms_donnees.id_form",
		"forms_donnees.date",
		"forms_donnees.url"), # SELECT
		array('forms_donnees' => 'spip_forms_donnees'), # FROM
		
			array(
			array('=', 'forms_donnees.id_donnee', _q($Pile[$SP]['id_donnee']))), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'forms_donnees', # table
		'_reponses', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= ('
' .
BOUCLE_formhtml_ebc7ec0f83a03de2d9a477c4240faa0c($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}

	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette plugins/forms_et_tables_1_9_1/modeles/form_reponse_email_confirm.html
//
function html_ebc7ec0f83a03de2d9a477c4240faa0c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = BOUCLE_reponseshtml_ebc7ec0f83a03de2d9a477c4240faa0c($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_ebc7ec0f83a03de2d9a477c4240faa0c', $Cache, $page);
}

?>