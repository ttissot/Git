<?php
/*
 * Squelette : plugins/forms_et_tables_1_9_1/formulaires/forms_structure.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Wed, 07 Nov 2012 14:38:27 GMT (0.23s)
 * Boucles :   _champs, _form
 */ 
//
// <BOUCLE forms_champs>
//
function BOUCLE_champshtml_fc26aa5628dd54de181ca62da67620a6(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forms_champs.type",
		"forms_champs.titre",
		"forms_champs.champ",
		"forms_champs.id_form",
		"forms_champs.obligatoire",
		"forms_champs.aide",
		"forms_champs.extra_info"), # SELECT
		array('forms_champs' => 'spip_forms_champs'), # FROM
		
			array(
			array('=', 'forms_champs.id_form', _q($Pile[$SP]['id_form'])), ($Pile[0]['champ'] ? 
			array('=', 'forms_champs.champ', _q($Pile[0]['champ'])) : ''), 
			array('NOT', 
			array('=', 'forms_champs.type', "'joint'")), 
			array('NOT', 
			array('=', 'forms_champs.saisie', "'non'"))), # WHERE
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
((strval($t1 = interdire_scripts((entites_html($Pile[0]['affiche_sondage']) ? '':' ')))!='') ?
		($t1 . ('
	' .
	((strval($t2 = ($Pile["vars"]['fieldset'] ? ' ':''))!='') ?
			($t2 . ('
		' .
		((strval($t3 = interdire_scripts(((typo($Pile[$SP]['type']) == 'separateur') ? interdire_scripts(typo($Pile[$SP]['titre'])):'')))!='') ?
				((($Pile["vars"]['need_fieldset'] ? '':'</fieldset>') .
			'<fieldset class=\'' .
			interdire_scripts($Pile[$SP]['champ']) .
			'\'><legend>') . $t3 . ('</legend> ' .
			vide($Pile['vars']['need_fieldset'] = '0'))) :
				('')) .
		'
		' .
		((strval($t3 = ($Pile["vars"]['need_fieldset'] ? ' ':''))!='') ?
				($t3 . ('<fieldset><legend>' .
			interdire_scripts(typo($Pile[$SP-1]['titre'])) .
			'</legend> ' .
			vide($Pile['vars']['need_fieldset'] = '0'))) :
				('')) .
		'
	')) :
			('')) .
	'
	' .
	((strval($t2 = interdire_scripts(((typo($Pile[$SP]['type']) == 'separateur') ? '':' ')))!='') ?
			($t2 . ('
		<div class=\'spip_form_champ ' .
		interdire_scripts($Pile[$SP]['champ']) .
		'\'>
			' .
		interdire_scripts(((typo($Pile[$SP]['type']) == 'textestatique') ? interdire_scripts(typo($Pile[$SP]['titre'])):'')) .
		'
			' .
		((strval($t3 = interdire_scripts(((typo($Pile[$SP]['type']) == 'textestatique') ? '':' ')))!='') ?
				($t3 . ('
				' .
			vide($Pile['vars']['afficher'] = '1') .
			'<span class=\'spip_form_label\'>
					' .
			((strval($t4 = interdire_scripts((match(typo($Pile[$SP]['type']),'^(select|multiple|mot)') ? '':' ')))!='') ?
					($t4 . ('<label for="input-' .
				$Pile[$SP]['id_form'] .
				'-' .
				interdire_scripts($Pile[$SP]['champ']) .
				'">' .
				interdire_scripts(typo($Pile[$SP]['titre'])) .
				'</label>')) :
					('')) .
			'
					' .
			((strval($t4 = interdire_scripts((match(typo($Pile[$SP]['type']),'^(select|multiple|mot)') ? ' ':'')))!='') ?
					($t4 . ('<span class=\'label\'>' .
				interdire_scripts(typo($Pile[$SP]['titre'])) .
				'</span>')) :
					('')) .
			'
					' .
			((strval($t4 = interdire_scripts((($Pile[$SP]['obligatoire'] == 'oui') ? _T('forms:info_obligatoire_02'):'')))!='') ?
					(('<span class=\'spip_form_label_obligatoire' .
				((strval($t5 = (forms_valeur($Pile[0]['erreur'],interdire_scripts($Pile[$SP]['champ'])) ? ' ':''))!='') ?
						($t5 . 'obligatoire_oublie') :
						('')) .
				'\'>
						') . $t4 . '</span>') :
					('')) .
			'
					' .
			interdire_scripts((strlen(typo($Pile[$SP]['titre'])) ? ':':'')) .
			'
				</span>
				' .
			((strval($t4 = interdire_scripts(($Pile[$SP]['aide'] ? '?':'')))!='') ?
					(('<span class="formInfo"><a href="' .
				interdire_scripts(generer_url_public('forms_tip',('id_form=' .
					$Pile[$SP]['id_form'] .
					'&champ=' .
					interdire_scripts($Pile[$SP]['champ']) .
					'&width=200'))) .
				'" class="jTip" id=\'aide-' .
				$Pile[$SP]['id_form'] .
				'-' .
				interdire_scripts($Pile[$SP]['champ']) .
				'\'>') . $t4 . '</a></span>') :
					('')) .
			'
				' .
			((strval($t4 = interdire_scripts(forms_label_details(typo($Pile[$SP]['type']))))!='') ?
					('<span class=\'spip_form_label_details\'>' . $t4 . '</span>') :
					('')) .
			'
				' .
			vide($Pile['vars']['type'] = 'text') .
			vide($Pile['vars']['class'] = '') .
			((strval($t4 = interdire_scripts(((typo($Pile[$SP]['type']) == 'date') ? ' ':'')))!='') ?
					($t4 . (' ' .
				vide($Pile['vars']['class'] = 'date-picker') .
				vide($Pile['vars']['date-picker'] = '1'))) :
					('')) .
			'
				' .
			((strval($t4 = interdire_scripts(((typo($Pile[$SP]['type']) == 'password') ? ' ':'')))!='') ?
					($t4 . (' ' .
				vide($Pile['vars']['type'] = 'password') .
				vide($Pile['vars']['afficher'] = '0'))) :
					('')) .
			'
				' .
			((strval($t4 = interdire_scripts(((typo($Pile[$SP]['type']) == 'texte') ? ' ':'')))!='') ?
					($t4 . (' ' .
				vide($Pile['vars']['afficher'] = '0') .
				forms_textarea(forms_valeur($Pile[0]['valeurs'],interdire_scripts($Pile[$SP]['champ']),''),'10','80',interdire_scripts(entites_html(sinon($Pile[0][('name_' .
						interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ'])))),('input-' .
					$Pile[$SP]['id_form'] .
					'-' .
					interdire_scripts($Pile[$SP]['champ'])),interdire_scripts(concat((($Pile[$SP]['obligatoire'] == 'oui') ? 'forml':'formo'),' ',interdire_scripts(entites_html(sinon($Pile[0]['crayon_active'],''))),' ',(forms_valeur($Pile[0]['erreur'],interdire_scripts($Pile[$SP]['champ'])) ? 'champ_obli_oubli':''))),'',interdire_scripts($Pile[$SP]['extra_info'])) .
				'
				')) :
					('')) .
			'
				' .
			((strval($t4 = interdire_scripts(((typo($Pile[$SP]['type']) == 'fichier') ? ' ':'')))!='') ?
					($t4 . (' ' .
				vide($Pile['vars']['afficher'] = '0') .
				'<input type=\'file\' name=\'' .
				interdire_scripts(entites_html(sinon($Pile[0][('name_' .
					interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ'])))) .
				'\' id=\'input-' .
				$Pile[$SP]['id_form'] .
				'-' .
				interdire_scripts($Pile[$SP]['champ']) .
				'\'
						class=\'' .
				interdire_scripts(entites_html(sinon($Pile[0]['crayon_active'],''))) .
				' ' .
				((strval($t5 = interdire_scripts(typo($Pile[$SP]['type'])))!='') ?
						($t5 . ' ') :
						('')) .
				interdire_scripts((($Pile[$SP]['obligatoire'] == 'oui') ? 'forml':'formo')) .
				((strval($t5 = (forms_valeur($Pile[0]['erreur'],interdire_scripts($Pile[$SP]['champ'])) ? ' ':''))!='') ?
						($t5 . ' champ_obli_oubli') :
						('')) .
				'\' 
						size=\'40\' />
					' .
				forms_valeur($Pile[0]['valeurs'],interdire_scripts($Pile[$SP]['champ']),'') .
				'
				')) :
					('')) .
			'
				' .
			((strval($t4 = interdire_scripts(((typo($Pile[$SP]['type']) == 'select') ? ' ':'')))!='') ?
					($t4 . (' ' .
				vide($Pile['vars']['afficher'] = '0') .
				
'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('formulaires/forms_champ_select') . ',
	\'id_form\' => ' . argumenter_squelette($Pile[$SP]['id_form']) . ',
	\'champ\' => ' . argumenter_squelette($Pile[$SP]['champ']) . ',
	\'valeur\' => ' . argumenter_squelette($Pile[0]['valeurs']) . ',
	\'name\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon($Pile[0][('name_' .
						interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ']))))) . ',
	\'crayon_active\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon($Pile[0]['crayon_active'],'')))) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
				'
				')) :
					('')) .
			'
				' .
			((strval($t4 = interdire_scripts(((typo($Pile[$SP]['type']) == 'multiple') ? ' ':'')))!='') ?
					($t4 . (' ' .
				vide($Pile['vars']['afficher'] = '0') .
				
'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('formulaires/forms_champ_multiple') . ',
	\'id_form\' => ' . argumenter_squelette($Pile[$SP]['id_form']) . ',
	\'champ\' => ' . argumenter_squelette($Pile[$SP]['champ']) . ',
	\'valeur\' => ' . argumenter_squelette($Pile[0]['valeurs']) . ',
	\'name\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon($Pile[0][('name_' .
						interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ']))))) . ',
	\'crayon_active\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon($Pile[0]['crayon_active'],'')))) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
				'
				')) :
					('')) .
			'
				' .
			((strval($t4 = interdire_scripts(((typo($Pile[$SP]['type']) == 'mot') ? ' ':'')))!='') ?
					($t4 . (' ' .
				vide($Pile['vars']['afficher'] = '0') .
				
'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('formulaires/forms_select_mot') . ',
	\'id_form\' => ' . argumenter_squelette($Pile[$SP]['id_form']) . ',
	\'id_groupe\' => ' . argumenter_squelette(interdire_scripts($Pile[$SP]['extra_info'])) . ',
	\'champ\' => ' . argumenter_squelette($Pile[$SP]['champ']) . ',
	\'valeur\' => ' . argumenter_squelette($Pile[0]['valeurs']) . ',
	\'name\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon($Pile[0][('name_' .
						interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ']))))) . ',
	\'crayon_active\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon($Pile[0]['crayon_active'],'')))) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
				'
				')) :
					('')) .
			'
				' .
			((strval($t4 = interdire_scripts(((typo($Pile[$SP]['type']) == 'articles_mot') ? ' ':'')))!='') ?
					($t4 . (' ' .
				vide($Pile['vars']['afficher'] = '0') .
				
'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('formulaires/forms_select_article_mot') . ',
	\'id_form\' => ' . argumenter_squelette($Pile[$SP]['id_form']) . ',
	\'id_mot\' => ' . argumenter_squelette(interdire_scripts($Pile[$SP]['extra_info'])) . ',
	\'champ\' => ' . argumenter_squelette($Pile[$SP]['champ']) . ',
	\'valeur\' => ' . argumenter_squelette($Pile[0]['valeurs']) . ',
	\'name\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon($Pile[0][('name_' .
						interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ']))))) . ',
	\'crayon_active\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon($Pile[0]['crayon_active'],'')))) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
				'
				')) :
					('')) .
			'
				' .
			'
				' .
			((strval($t4 = ($Pile["vars"]['afficher'] ? ' ':''))!='') ?
					($t4 . ('
				' .
				vide($Pile['vars']['input'] = ('<input type="' .
					$Pile["vars"]['type'] .
					'" name=\'' .
					interdire_scripts(entites_html(sinon($Pile[0][('name_' .
						interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ'])))) .
					'\' id=\'input-' .
					$Pile[$SP]['id_form'] .
					'-' .
					interdire_scripts($Pile[$SP]['champ']) .
					'\' value="' .
					entites_html(forms_valeur($Pile[0]['valeurs'],interdire_scripts($Pile[$SP]['champ']),'')) .
					'" 
						class=\'' .
					$Pile["vars"]['class'] .
					' ' .
					interdire_scripts(entites_html(sinon($Pile[0]['crayon_active'],''))) .
					' ' .
					((strval($t6 = interdire_scripts(typo($Pile[$SP]['type'])))!='') ?
							($t6 . ' ') :
							('')) .
					interdire_scripts((($Pile[$SP]['obligatoire'] == 'oui') ? 'forml':'formo')) .
					((strval($t6 = (forms_valeur($Pile[0]['erreur'],interdire_scripts($Pile[$SP]['champ'])) ? ' ':''))!='') ?
							($t6 . ' champ_obli_oubli') :
							('')) .
					'\' 
						size=\'40\' />
				')) .
				'
				' .
				forms_input_champs($Pile["vars"]['input'],$Pile[$SP]['id_form'],interdire_scripts(typo($Pile[$SP]['type'])),interdire_scripts($Pile[$SP]['champ']),interdire_scripts($Pile[$SP]['extra_info']),interdire_scripts($Pile[$SP]['obligatoire']),serialize($Pile[0])) .
				'
				')) :
					('')) .
			'
				' .
			((strval($t4 = interdire_scripts(((typo($Pile[$SP]['type']) == 'password') ? ' ':'')))!='') ?
					($t4 . ('
					<input type="' .
				$Pile["vars"]['type'] .
				'" name=\'' .
				interdire_scripts(entites_html(sinon($Pile[0][('name_' .
					interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ'])))) .
				'\' id=\'input-' .
				$Pile[$SP]['id_form'] .
				'-' .
				interdire_scripts($Pile[$SP]['champ']) .
				'\' value=""
						class=\'' .
				$Pile["vars"]['class'] .
				' ' .
				interdire_scripts(entites_html(sinon($Pile[0]['crayon_active'],''))) .
				' ' .
				((strval($t5 = interdire_scripts(typo($Pile[$SP]['type'])))!='') ?
						($t5 . ' ') :
						('')) .
				interdire_scripts((($Pile[$SP]['obligatoire'] == 'oui') ? 'forml':'formo')) .
				((strval($t5 = (forms_valeur($Pile[0]['erreur'],interdire_scripts($Pile[$SP]['champ'])) ? ' ':''))!='') ?
						($t5 . ' champ_obli_oubli') :
						('')) .
				'\' 
						size=\'40\' />
					' .
				((strval($t5 = interdire_scripts((strlen($Pile[$SP]['extra_info']) ? ' ':'')))!='') ?
						($t5 . ('
					<span class=\'nettoyeur\'> </span></div><div class=\'spip_form_champ ' .
					interdire_scripts($Pile[$SP]['champ']) .
					'\'>
					<span class=\'spip_form_label\'>' .
					interdire_scripts(typo($Pile[$SP]['extra_info'])) .
					'
						' .
					((strval($t6 = interdire_scripts((($Pile[$SP]['obligatoire'] == 'oui') ? _T('forms:info_obligatoire_02'):'')))!='') ?
							(('<span class=\'spip_form_label_obligatoire' .
						((strval($t7 = (forms_valeur($Pile[0]['erreur'],interdire_scripts($Pile[$SP]['champ'])) ? ' ':''))!='') ?
								($t7 . 'obligatoire_oublie') :
								('')) .
						'\'>
						') . $t6 . '</span>') :
							('')) .
					' :
					</span>
					<input type="' .
					$Pile["vars"]['type'] .
					'" name=\'' .
					interdire_scripts(entites_html(sinon($Pile[0][('name_' .
						interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ'])))) .
					'_confirm\' id=\'input-' .
					$Pile[$SP]['id_form'] .
					'-' .
					interdire_scripts($Pile[$SP]['champ']) .
					'-confirm\' value="" 
							class=\'' .
					$Pile["vars"]['class'] .
					' ' .
					interdire_scripts(entites_html(sinon($Pile[0]['crayon_active'],''))) .
					' ' .
					((strval($t6 = interdire_scripts(typo($Pile[$SP]['type'])))!='') ?
							($t6 . ' ') :
							('')) .
					interdire_scripts((($Pile[$SP]['obligatoire'] == 'oui') ? 'forml':'formo')) .
					((strval($t6 = (forms_valeur($Pile[0]['erreur'],interdire_scripts($Pile[$SP]['champ'])) ? ' ':''))!='') ?
							($t6 . ' champ_obli_oubli') :
							('')) .
					'\' 
							size=\'40\' />
					')) :
						('')) .
				'
				')) :
					('')) .
			'

				' .
			((strval($t4 = forms_valeur($Pile[0]['erreur'],interdire_scripts($Pile[$SP]['champ'])))!='') ?
					('<span class=\'erreur\'>' . $t4 . '</span>') :
					('')) .
			'
				<span class=\'nettoyeur\'> </span>
			')) :
				('')) .
		'
		</div>
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
function BOUCLE_formhtml_fc26aa5628dd54de181ca62da67620a6(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("forms.id_form",
		"forms.titre",
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
<div ' .
((strval($t1 = interdire_scripts(entites_html(sinon($Pile[0]['style'],''))))!='') ?
		('style=\'' . $t1 . '\'') :
		('')) .
'>
' .
vide($Pile['vars']['fieldset'] = interdire_scripts((entites_html(sinon($Pile[0]['champ'],'')) ? '0':'1'))) .
vide($Pile['vars']['need_fieldset'] = '1') .
vide($Pile['vars']['date-picker'] = '0') .
((strval($t1 = interdire_scripts(entites_html($Pile[0]['affiche_sondage'])))!='') ?
		($t1 . ('
<fieldset><legend>' .
	interdire_scripts(typo($Pile[$SP]['titre'])) .
	'</legend>
' .
	_T('forms:sondage_deja_repondu') .
	'
' .
	((strval($t2 = interdire_scripts((($Pile[$SP]['public'] == 'oui') ? ' ':'')))!='') ?
			($t2 . interdire_scripts(Forms_afficher_reponses_sondage($Pile[$SP]['id_form']))) :
			('')) .
	'
</fieldset>
')) :
		('')) .
'
' .
BOUCLE_champshtml_fc26aa5628dd54de181ca62da67620a6($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .
((strval($t1 = ($Pile["vars"]['fieldset'] ? ' ':''))!='') ?
		($t1 . ('
	' .
	($Pile["vars"]['need_fieldset'] ? '':'</fieldset>') .
	'
')) :
		('')) .
'
' .
((strval($t1 = interdire_scripts((entites_html(sinon($Pile[0]['champ'],'')) ? '':' ')))!='') ?
		($t1 . ('
' .
	((strval($t2 = interdire_scripts((entites_html($Pile[0]['affiche_sondage']) ? '':' ')))!='') ?
			($t2 . ('
	' .
		'
	<p style=\'display:none;\'><label for="nobotnobot-' .
		$Pile[$SP]['id_form'] .
		'">' .
		_T('public/spip/ecrire:antispam_champ_vide') .
		'</label>
	<input type="text" name="nobotnobot" id="nobotnobot-' .
		$Pile[$SP]['id_form'] .
		'" value="' .
		interdire_scripts(entites_html($Pile[0]['nobotnobot'])) .
		'" size="10" /></p>
	
	' .
		((strval($t3 = interdire_scripts((entites_html(sinon($Pile[0]['affiche_bouton'],'1')) ? ' ':'')))!='') ?
				($t3 . ('
		<div class=\'spip_bouton\'>' .
			((strval($t4 = interdire_scripts((table_valeur($GLOBALS["meta"]['forms_et_tables'],'bouton_image') ? '':' ')))!='') ?
					('<input
		 ' . $t4 . (' type="submit" name=\'Valider\' 
		 value="' .
				_T('public/spip/ecrire:bouton_valider') .
				'" />')) :
					('')) .
			((strval($t4 = interdire_scripts((table_valeur($GLOBALS["meta"]['forms_et_tables'],'bouton_image') ? ' ':'')))!='') ?
					('<input ' . $t4 . (' 
		 type="image" src=\'' .
				interdire_scripts(sinon(find_in_path('img_pack/bt-forms_bouton_valider.gif'),interdire_scripts(find_in_path('img_pack/bt-forms_bouton_valider.png')))) .
				'\' alt="' .
				_T('public/spip/ecrire:bouton_valider') .
				'" />')) :
					('')) .
			'
		</div>
	')) :
				('')) .
		'
')) :
			('')) .
	'
')) :
		('')) .
'
<script src="' .
interdire_scripts(url_absolue(find_in_path('javascript/jtip.js'))) .
'" type="text/javascript"></script>
' .
((strval($t1 = ($Pile["vars"]['date-picker'] ? ' ':''))!='') ?
		($t1 . ('
<script src="' .
	interdire_scripts(url_absolue(find_in_path('javascript/jquery-dom.js'))) .
	'" type="text/javascript"></script>
<script src="' .
	interdire_scripts(url_absolue(find_in_path('javascript/datePicker.js'))) .
	'" type="text/javascript"></script>
')) :
		('')) .
'
<script type="text/javascript"><!--
$(\'div.spip_forms input.formo\').bind(\'focus\',function(){$(this).addClass(\'formo-focus\');});
$(\'div.spip_forms input.formo\').bind(\'blur\',function(){$(this).removeClass(\'formo-focus\');});
$(\'div.spip_forms input.forml\').bind(\'focus\',function(){$(this).addClass(\'forml-focus\');});
$(\'div.spip_forms input.forml\').bind(\'blur\',function(){$(this).removeClass(\'forml-focus\');});
' .
((strval($t1 = ($Pile["vars"]['date-picker'] ? ' ':''))!='') ?
		($t1 . ('
	$.datePicker.setDateFormat(\'dmy\',\'/\');
	' .
	unicode2charset(charset2unicode(recuperer_fond('',array('fond' => 'formulaires/date_picker_init' ,'html' => $Pile[0]['html'] ,'lang' => $GLOBALS["spip_lang"] )),'html')) .
	'
	$(\'input.date-picker\').datePicker({startDate:\'01/01/1900\'});
')) :
		('')) .
'
//--></script>
</div>
');
	}

	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette plugins/forms_et_tables_1_9_1/formulaires/forms_structure.html
//
function html_fc26aa5628dd54de181ca62da67620a6($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = (BOUCLE_formhtml_fc26aa5628dd54de181ca62da67620a6($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_fc26aa5628dd54de181ca62da67620a6', $Cache, $page);
}

?>