<?php
/*
 * Squelette : plugins/forms_et_tables_1_9_1/formulaires/forms.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Wed, 07 Nov 2012 14:38:26 GMT (0.04s)
 * Boucles :   _joint, _form
 */ 
//
// <BOUCLE forms_champs>
//
function BOUCLE_jointhtml_0b443c9b9258af9c3dc60ea23acdb3d7(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forms_champs.champ",
		"forms_champs.id_form",
		"forms_champs.titre"), # SELECT
		array('forms_champs' => 'spip_forms_champs'), # FROM
		
			array(
			array('=', 'forms_champs.id_form', _q($Pile[$SP]['id_form'])), 
			array('=', 'forms_champs.type', "'joint'")), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('forms_champs.rang'), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'forms_champs', # table
		'_joint', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= ('
' .
((strval($t1 = interdire_scripts((entites_html($Pile[0]['formvisible']) ? ' ':'')))!='') ?
		($t1 . ('
	' .
	((strval($t2 = interdire_scripts(entites_html($Pile[0]['formactif'])))!='') ?
			($t2 . ('
		' .
		((strval($t3 = interdire_scripts(forms_boite_jointure(entites_html($Pile[0]['id_donnee']),interdire_scripts($Pile[$SP]['champ']),$Pile[$SP]['id_form'])))!='') ?
				(('<span class=\'spip_form_label\'><div class=\'spip_form_champ\'><span class=\'label\'>' .
			interdire_scripts(typo($Pile[$SP]['titre'])) .
			'</span></span>
		') . $t3 . '</div>') :
				('')) .
		'
	')) :
			('')) .
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
function BOUCLE_formhtml_0b443c9b9258af9c3dc60ea23acdb3d7(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forms.id_form",
		"forms.descriptif",
		"forms.type_form",
		"forms.public"), # SELECT
		array('forms' => 'spip_forms'), # FROM
		
			array(
			array('=', 'forms.id_form', _q(interdire_scripts(entites_html($Pile[0]['id_form']))))), # WHERE
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

		$t0 .= ('
<a name=\'form' .
$Pile[$SP]['id_form'] .
'\'></a>
<div class=\'spip_forms form_' .
$Pile[$SP]['id_form'] .
'\'>
<div class=\'spip_descriptif\'>' .
interdire_scripts(propre($Pile[$SP]['descriptif'])) .
'</div>
' .
((strval($t1 = interdire_scripts((($Pile[$SP]['type_form'] == 'sondage') ? ' ':'')))!='') ?
		($t1 . (' ' .
	((strval($t2 = interdire_scripts((($Pile[$SP]['public'] == 'oui') ? ' ':'')))!='') ?
			($t2 . ('
		<a href=\'' .
		interdire_scripts(parametre_url(generer_url_public('sondage'),'id_form',$Pile[$SP]['id_form'])) .
		'\' class=\'spip_in resultats_sondage\'
		 target="spip_sondage" onclick="javascript:window.open(this.href, \'spip_sondage\', \'scrollbars=yes, resizable=yes, width=450, height=300\'); return false;"
		 onkeypress="javascript:window.open(this.href, \'spip_sondage\', \'scrollbars=yes,resizable=yes, width=450, height=300\'); return false;">' .
		_T('forms:voir_resultats') .
		'</a>
')) :
			('')))) :
		('')) .
'
' .
((strval($t1 = interdire_scripts($Pile[0]['formok']))!='') ?
		('<p class=\'spip_form_ok\'>' . $t1 . ('
	' .
	((strval($t2 = interdire_scripts((($Pile[$SP]['type_form'] == 'sondage') ? ' ':'')))!='') ?
			($t2 . ('	<a href=\'' .
		interdire_scripts(ancre_url(parametre_url(entites_html($Pile[0]['self']),'resultats',$Pile[$SP]['id_form']),('form' .
			$Pile[$SP]['id_form']))) .
		'\'>' .
		_T('forms:voir_resultats') .
		'</a>')) :
			('')) .
	'
	' .
	((strval($t2 = interdire_scripts(entites_html($Pile[0]['reponse'])))!='') ?
			('<span class=\'spip_form_ok_confirmation\'>' . $t2 . '</span>') :
			('')) .
	'
</p>
' .
	interdire_scripts($Pile[0]['message_complementaire']))) :
		('')) .
'
' .
((strval($t1 = interdire_scripts($Pile[0]['erreur_message']))!='') ?
		('<p class=\'spip_form_erreur\'>' . $t1 . '</p>') :
		('')) .
'
' .
((strval($t1 = interdire_scripts(entites_html($Pile[0]['url_validation'])))!='') ?
		('<img src=\'' . $t1 . '\' width=\'1\' height=\'1\' alt=\'validation de la saisie\' />') :
		('')) .
'
' .
((strval($t1 = interdire_scripts((entites_html($Pile[0]['formvisible']) ? ' ':'')))!='') ?
		($t1 . ('
	' .
	((strval($t2 = interdire_scripts(entites_html($Pile[0]['formactif'])))!='') ?
			($t2 . ('
	<form method=\'post\' action=\'' .
		interdire_scripts(entites_html($Pile[0]['self'])) .
		'#form' .
		$Pile[$SP]['id_form'] .
		'\'
		enctype=\'multipart/form-data\'>
	')) :
			('')) .
	'
		<div>
		' .
	interdire_scripts(form_hidden(entites_html($Pile[0]['self']))) .
	'
		<input type=\'hidden\' name=\'ajout_reponse\' value=\'' .
	$Pile[$SP]['id_form'] .
	'\' />
		' .
	((strval($t2 = interdire_scripts(entites_html($Pile[0]['id_donnee'])))!='') ?
			('<input type=\'hidden\' name=\'id_donnee\' value=\'' . $t2 . '\' />') :
			('')) .
	'

		<input type=\'hidden\' name=\'retour_form\' value=\'' .
	interdire_scripts(entites_html($Pile[0]['url_retour'])) .
	'\' />
		' .
	((strval($t2 = interdire_scripts((entites_html($Pile[0]['pose_cookie']) ? ' ':'')))!='') ?
			($t2 . '<input type=\'hidden\' name=\'ajout_cookie_form\' value=\'oui\' />') :
			('')) .
	'
		</div>
			' .
	
'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette(interdire_scripts(entites_html($Pile[0]['class']))) . ',
	\'id_form\' => ' . argumenter_squelette($Pile[$SP]['id_form']) . ',
	\'affiche_sondage\' => ' . argumenter_squelette($Pile[0]['affiche_sondage']) . ',
	\'erreur\' => ' . argumenter_squelette($Pile[0]['erreur']) . ',
	\'valeurs\' => ' . argumenter_squelette($Pile[0]['valeurs']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
	'
	' .
	((strval($t2 = interdire_scripts(entites_html($Pile[0]['formactif'])))!='') ?
			($t2 . '
	</form>
	') :
			('')) .
	'
	' .
	'
	' .
	((strval($t2 = interdire_scripts(calculer_notes()))!='') ?
			('<div class=\'spip_form_notes\'>' . $t2 . '</div>') :
			('')) .
	'
')) :
		('')) .
'
' .
((strval($t1 = BOUCLE_jointhtml_0b443c9b9258af9c3dc60ea23acdb3d7($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
		('
<div id=\'forms_lier_donnees\'>
' . $t1 . '
</div>
') :
		('')) .
'
</div>
');
	}

	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette plugins/forms_et_tables_1_9_1/formulaires/forms.html
//
function html_0b443c9b9258af9c3dc60ea23acdb3d7($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = BOUCLE_formhtml_0b443c9b9258af9c3dc60ea23acdb3d7($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_0b443c9b9258af9c3dc60ea23acdb3d7', $Cache, $page);
}

?>