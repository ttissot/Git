<?php
/*
 * Squelette : plugins/forms_et_tables_1_9_1/formulaires/forms_champ_select.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Wed, 07 Nov 2012 14:38:27 GMT (0.02s)
 * Boucles :   _choix, _champs, _f
 */ 
//
// <BOUCLE forms_champs_choix>
//
function BOUCLE_choixhtml_53887b9961c41e5ad9930c1fa5e7fd77(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forms_champs_choix.choix",
		"forms_champs_choix.champ",
		"forms_champs_choix.titre",
		"forms_champs_choix.id_form"), # SELECT
		array('forms_champs_choix' => 'spip_forms_champs_choix'), # FROM
		
			array(
			array('=', 'forms_champs_choix.id_form', _q($Pile[$SP]['id_form'])), 
			array('=', 'forms_champs_choix.champ', _q($Pile[$SP]['champ']))), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('forms_champs_choix.rang'), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'forms_champs_choix', # table
		'_choix', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= ('
' .
((strval($t1 = interdire_scripts((($Pile[$SP-1]['extra_info'] == 'liste') ? ' ':'')))!='') ?
		($t1 . ('
	<option value=\'' .
	interdire_scripts($Pile[$SP]['choix']) .
	'\' ' .
	interdire_scripts((($Pile[$SP]['choix'] == forms_valeur($Pile[0]['valeur'],interdire_scripts($Pile[$SP]['champ']))) ? 'selected="selected"':'')) .
	'>
		&nbsp;&nbsp;&nbsp;' .
	interdire_scripts(supprimer_numero(typo($Pile[$SP]['titre']))) .
	'
	</option>
')) :
		('')) .
'
' .
((strval($t1 = interdire_scripts((($Pile[$SP-1]['extra_info'] == 'liste') ? '':' ')))!='') ?
		($t1 . ('<li>
	&nbsp; <input type=\'radio\' name=\'' .
	interdire_scripts(entites_html(sinon($Pile[0]['name'],interdire_scripts($Pile[$SP]['champ'])))) .
	'\' value=\'' .
	interdire_scripts($Pile[$SP]['choix']) .
	'\' id=\'input-' .
	$Pile[$SP]['id_form'] .
	'-' .
	interdire_scripts($Pile[$SP]['choix']) .
	'\'
	' .
	interdire_scripts((($Pile[$SP]['choix'] == forms_valeur($Pile[0]['valeur'],interdire_scripts($Pile[$SP]['champ']))) ? 'checked="checked"':'')) .
	' />
	<label for=\'input-' .
	$Pile[$SP]['id_form'] .
	'-' .
	interdire_scripts($Pile[$SP]['choix']) .
	'\'>' .
	interdire_scripts(supprimer_numero(typo($Pile[$SP]['titre']))) .
	'</label>
	</li>')) :
		('')) .
'
	');
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE forms_champs>
//
function BOUCLE_champshtml_53887b9961c41e5ad9930c1fa5e7fd77(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forms_champs.id_form",
		"forms_champs.champ",
		"forms_champs.extra_info",
		"forms_champs.obligatoire"), # SELECT
		array('forms_champs' => 'spip_forms_champs'), # FROM
		
			array(
			array('=', 'forms_champs.id_form', _q($Pile[$SP]['id_form'])), 
			array('=', 'forms_champs.champ', _q($Pile[0]['champ']))), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
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
((strval($t1 = BOUCLE_choixhtml_53887b9961c41e5ad9930c1fa5e7fd77($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
		(('
' .
		((strval($t3 = interdire_scripts((($Pile[$SP]['extra_info'] == 'liste') ? ' ':'')))!='') ?
				($t3 . ('
<select name=\'' .
			interdire_scripts(entites_html(sinon($Pile[0]['name'],interdire_scripts($Pile[$SP]['champ'])))) .
			'\' id=\'input-' .
			$Pile[$SP]['id_form'] .
			'-' .
			interdire_scripts($Pile[$SP]['champ']) .
			'\' 
	class=\'' .
			((strval($t4 = interdire_scripts(entites_html(sinon($Pile[0]['crayon_active'],''))))!='') ?
					($t4 . ' ') :
					('')) .
			interdire_scripts((($Pile[$SP]['obligatoire'] == 'oui') ? 'fondl':'fondo')) .
			'\'>
	<option value=\'\'>' .
			interdire_scripts(entites_html(sinon($Pile[0]['titre_select'],''))) .
			'</option>')) :
				('')) .
		'
' .
		((strval($t3 = interdire_scripts((($Pile[$SP]['extra_info'] == 'liste') ? '':' ')))!='') ?
				($t3 . ('<ul class=\'spip_form_choix_unique' .
			((strval($t4 = interdire_scripts(entites_html(sinon($Pile[0]['crayon_active'],''))))!='') ?
					(' ' . $t4) :
					('')) .
			'\'>')) :
				('')) .
		'
	') . $t1 . ('
' .
		interdire_scripts((($Pile[$SP]['extra_info'] == 'liste') ? '</select>':'</ul>')) .
		'
')) :
		('')) .
'
');
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE forms>
//
function BOUCLE_fhtml_53887b9961c41e5ad9930c1fa5e7fd77(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
BOUCLE_champshtml_53887b9961c41e5ad9930c1fa5e7fd77($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}

	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette plugins/forms_et_tables_1_9_1/formulaires/forms_champ_select.html
//
function html_53887b9961c41e5ad9930c1fa5e7fd77($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = (BOUCLE_fhtml_53887b9961c41e5ad9930c1fa5e7fd77($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_53887b9961c41e5ad9930c1fa5e7fd77', $Cache, $page);
}

?>