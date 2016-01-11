<?php
/*
 * Squelette : plugins/forms_et_tables_1_9_1/formulaires/forms_champ_multiple.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Wed, 07 Nov 2012 14:38:27 GMT (0.01s)
 * Boucles :   _choix, _choix2, _champs, _f
 */ 
//
// <BOUCLE forms_champs_choix>
//
function BOUCLE_choixhtml_8327af65b2cbc507e5d76ad1087f0b86(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forms_champs_choix.champ",
		"forms_champs_choix.id_form",
		"forms_champs_choix.choix",
		"forms_champs_choix.titre"), # SELECT
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

	// Partition
	$nombre_boucle = @spip_abstract_count($result,"");
	$debut_boucle = ceil(($nombre_boucle * 0)/2);
	$fin_boucle = min(ceil (($nombre_boucle * 1)/2) - 1, $nombre_boucle - 1);
	$Numrows['_choix']["grand_total"] = $nombre_boucle;
	$Numrows['_choix']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_choix']['compteur_boucle'] = 0;
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$Numrows['_choix']['compteur_boucle']++;
		if ($Numrows['_choix']['compteur_boucle']-1 >= $debut_boucle) {
		if ($Numrows['_choix']['compteur_boucle']-1 > $fin_boucle) break;

		$t0 .= ('<li>
	<input type=\'checkbox\' name=\'' .
interdire_scripts(entites_html(sinon($Pile[0]['name'],interdire_scripts($Pile[$SP]['champ'])))) .
'[]\' id=\'input-' .
$Pile[$SP]['id_form'] .
'-' .
interdire_scripts($Pile[$SP]['choix']) .
'\' value=\'' .
interdire_scripts($Pile[$SP]['choix']) .
'\'
	' .
interdire_scripts((in_any($Pile[$SP]['choix'],forms_valeur($Pile[0]['valeur'],interdire_scripts($Pile[$SP]['champ'])),'') ? 'checked="checked"':'')) .
' />
	<label for=\'input-' .
$Pile[$SP]['id_form'] .
'-' .
interdire_scripts($Pile[$SP]['choix']) .
'\'>' .
interdire_scripts(supprimer_numero(typo($Pile[$SP]['titre']))) .
'</label></li>
	');
		}

	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE forms_champs_choix>
//
function BOUCLE_choix2html_8327af65b2cbc507e5d76ad1087f0b86(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forms_champs_choix.champ",
		"forms_champs_choix.id_form",
		"forms_champs_choix.choix",
		"forms_champs_choix.titre"), # SELECT
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
		'_choix2', # boucle
		''); # serveur

	// Partition
	$nombre_boucle = @spip_abstract_count($result,"");
	$debut_boucle = ceil(($nombre_boucle * 1)/2);
	$fin_boucle = min(ceil (($nombre_boucle * 2)/2) - 1, $nombre_boucle - 1);
	$Numrows['_choix2']["grand_total"] = $nombre_boucle;
	$Numrows['_choix2']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_choix2']['compteur_boucle'] = 0;
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$Numrows['_choix2']['compteur_boucle']++;
		if ($Numrows['_choix2']['compteur_boucle']-1 >= $debut_boucle) {
		if ($Numrows['_choix2']['compteur_boucle']-1 > $fin_boucle) break;

		$t0 .= ('<li>
	<input type=\'checkbox\' name=\'' .
interdire_scripts(entites_html(sinon($Pile[0]['name'],interdire_scripts($Pile[$SP]['champ'])))) .
'[]\' id=\'input-' .
$Pile[$SP]['id_form'] .
'-' .
interdire_scripts($Pile[$SP]['choix']) .
'\' value=\'' .
interdire_scripts($Pile[$SP]['choix']) .
'\'
	' .
interdire_scripts((in_any($Pile[$SP]['choix'],forms_valeur($Pile[0]['valeur'],interdire_scripts($Pile[$SP]['champ'])),'') ? 'checked="checked"':'')) .
' />
	<label for=\'input-' .
$Pile[$SP]['id_form'] .
'-' .
interdire_scripts($Pile[$SP]['choix']) .
'\'>' .
interdire_scripts(supprimer_numero(typo($Pile[$SP]['titre']))) .
'</label></li>
	');
		}

	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE forms_champs>
//
function BOUCLE_champshtml_8327af65b2cbc507e5d76ad1087f0b86(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forms_champs.id_form",
		"forms_champs.champ"), # SELECT
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
((strval($t1 = BOUCLE_choixhtml_8327af65b2cbc507e5d76ad1087f0b86($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
		(('
	<input type=\'hidden\' name=\'' .
		interdire_scripts(entites_html(sinon($Pile[0]['name'],interdire_scripts($Pile[$SP]['champ'])))) .
		'[]\' id=\'input-' .
		$Pile[$SP]['id_form'] .
		'-' .
		interdire_scripts($Pile[$SP]['champ']) .
		'\' value=\'\' />
	<ul class="spip_form_choix_multiple' .
		((strval($t3 = interdire_scripts(entites_html(sinon($Pile[0]['crayon_active'],''))))!='') ?
				(' ' . $t3) :
				('')) .
		'">
	') . $t1 . '
	</ul>
') :
		('')) .
'
' .
((strval($t1 = BOUCLE_choix2html_8327af65b2cbc507e5d76ad1087f0b86($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
		(('
	<ul class="spip_form_choix_multiple' .
		((strval($t3 = interdire_scripts(entites_html(sinon($Pile[0]['crayon_active'],''))))!='') ?
				(' ' . $t3) :
				('')) .
		'">
	') . $t1 . '
	</ul>
') :
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
function BOUCLE_fhtml_8327af65b2cbc507e5d76ad1087f0b86(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
BOUCLE_champshtml_8327af65b2cbc507e5d76ad1087f0b86($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}

	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette plugins/forms_et_tables_1_9_1/formulaires/forms_champ_multiple.html
//
function html_8327af65b2cbc507e5d76ad1087f0b86($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = BOUCLE_fhtml_8327af65b2cbc507e5d76ad1087f0b86($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_8327af65b2cbc507e5d76ad1087f0b86', $Cache, $page);
}

?>