<?php
/*
 * Squelette : plugins/forms_et_tables_1_9_1/modeles/form_reponse_email_admin.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Mon, 19 Nov 2012 10:08:48 GMT (0.01s)
 * Boucles :   _champs, _form, _reponses
 */ 
//
// <BOUCLE forms_champs>
//
function BOUCLE_champshtml_c4340ce6316a503df1417e68d5ce8a7c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forms_champs.titre",
		"forms_champs.champ",
		"forms_champs.id_form",
		"forms_champs.type"), # SELECT
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
' ' .
((strval($t1 = interdire_scripts(((typo($Pile[$SP]['type']) == 'fichier') ? ' ':'')))!='') ?
		($t1 . ('	' .
	((strval($t2 = interdire_scripts(((entites_html($Pile[0]['mail_admin']) == 'oui') ? ' ':'')))!='') ?
			($t2 . (' ' .
		interdire_scripts(generer_url_ecrire('forms_telecharger',('id_donnee=' .
			$Pile[$SP-2]['id_donnee'] .
			'&champ=' .
			interdire_scripts($Pile[$SP]['champ'])))))) :
			('')) .
	' ')) :
		('')));
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE forms>
//
function BOUCLE_formhtml_c4340ce6316a503df1417e68d5ce8a7c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forms.id_form",
		"forms.texte",
		"forms.titre"), # SELECT
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
((strval($t1 = interdire_scripts(((entites_html($Pile[0]['mail_admin']) == 'oui') ? ' ':'')))!='') ?
		($t1 . ('
' .
	_T('forms:formulaire') .
	' ' .
	interdire_scripts(typo($Pile[$SP]['titre'])) .
	'
' .
	_T('forms:reponse_retrovez') .
	' ' .
	interdire_scripts(generer_url_ecrire('forms_reponses',('id_form=' .
		$Pile[$SP]['id_form']))))) :
		('')) .
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
BOUCLE_champshtml_c4340ce6316a503df1417e68d5ce8a7c($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE forms_donnees>
//
function BOUCLE_reponseshtml_c4340ce6316a503df1417e68d5ce8a7c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
BOUCLE_formhtml_c4340ce6316a503df1417e68d5ce8a7c($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}

	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette plugins/forms_et_tables_1_9_1/modeles/form_reponse_email_admin.html
//
function html_c4340ce6316a503df1417e68d5ce8a7c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = BOUCLE_reponseshtml_c4340ce6316a503df1417e68d5ce8a7c($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_c4340ce6316a503df1417e68d5ce8a7c', $Cache, $page);
}

?>