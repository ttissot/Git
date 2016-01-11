<?php
/*
 * Squelette : squelettes/sommaire.html
 * Date :      Tue, 06 Nov 2012 23:00:00 GMT
 * Compile :   Fri, 08 Jan 2016 07:20:10 GMT (0.01s)
 * Boucles :   _sousmenu, _sousmenu_last, _menu
 */ 
//
// <BOUCLE rubriques>
//
function BOUCLE_sousmenuhtml_5b363c7b492789dfc7457fa41ebc5b8c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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

	// Partition
	$nombre_boucle = @spip_abstract_count($result,"");
	$debut_boucle = 0;
	$fin_boucle = min($debut_boucle + $nombre_boucle - 2, $nombre_boucle - 1);
	$Numrows['_sousmenu']["grand_total"] = $nombre_boucle;
	$Numrows['_sousmenu']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_sousmenu']['compteur_boucle'] = 0;
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$Numrows['_sousmenu']['compteur_boucle']++;
		if ($Numrows['_sousmenu']['compteur_boucle']-1 >= $debut_boucle) {
		if ($Numrows['_sousmenu']['compteur_boucle']-1 > $fin_boucle) break;
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
							<span class="sousrub"><a href="' .
vider_url(generer_url_rubrique($Pile[$SP]['id_rubrique'])) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'])) .
'</a>&nbsp;|</span>
							');
		}

	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_sousmenu_lasthtml_5b363c7b492789dfc7457fa41ebc5b8c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		'_sousmenu_last', # boucle
		''); # serveur

	// Partition
	$nombre_boucle = @spip_abstract_count($result,"");
	$debut_boucle = $nombre_boucle - 1;
	$fin_boucle = min($debut_boucle, $nombre_boucle - 1);
	$Numrows['_sousmenu_last']["grand_total"] = $nombre_boucle;
	$Numrows['_sousmenu_last']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_sousmenu_last']['compteur_boucle'] = 0;
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$Numrows['_sousmenu_last']['compteur_boucle']++;
		if ($Numrows['_sousmenu_last']['compteur_boucle']-1 >= $debut_boucle) {
		if ($Numrows['_sousmenu_last']['compteur_boucle']-1 > $fin_boucle) break;
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
							<span class="sousrub"><a href="' .
vider_url(generer_url_rubrique($Pile[$SP]['id_rubrique'])) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'])) .
'</a></span>
							');
		}

	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_menuhtml_5b363c7b492789dfc7457fa41ebc5b8c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {
	$in0 = array();
	$in0[]= 2;
	$in0[]= 3;
	$in0[]= 4;

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.id_rubrique",
		"FIELD(rubriques.id_rubrique," . join(',',array_map('_q', $in0)) . ") AS cpt1",
		"rubriques.titre",
		"rubriques.descriptif",
		"rubriques.lang"), # SELECT
		array('rubriques' => 'spip_rubriques'), # FROM
		
			array(
			array('=', 'rubriques.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array('cpt1'), # ORDER
		'', # LIMIT
		'', # sous
		
			array(
			array('<>', 'cpt1', 0)), # HAVING
		'rubriques', # table
		'_menu', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
					<div class="entree' .
$Pile[$SP]['id_rubrique'] .
'">
						' .
((strval($t1 = inserer_attribut(affiche_logos(calcule_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],sql_parent($Pile[$SP]['id_rubrique']),  ''), '', ''),'class','logorub'))!='') ?
		(('<a href="' .
	vider_url(generer_url_rubrique($Pile[$SP]['id_rubrique'])) .
	'">') . $t1 . '</a>') :
		('')) .
'
						' .
((strval($t1 = interdire_scripts(majuscules(supprimer_numero(typo($Pile[$SP]['titre'])))))!='') ?
		(('<h2><a href="' .
	vider_url(generer_url_rubrique($Pile[$SP]['id_rubrique'])) .
	'">') . $t1 . '</a></h2>') :
		('')) .
'
						' .
interdire_scripts(paragrapher(propre($Pile[$SP]['descriptif']))) .
'
						<p>
							' .
BOUCLE_sousmenuhtml_5b363c7b492789dfc7457fa41ebc5b8c($Cache, $Pile, $doublons, $Numrows, $SP) .
'
							' .
BOUCLE_sousmenu_lasthtml_5b363c7b492789dfc7457fa41ebc5b8c($Cache, $Pile, $doublons, $Numrows, $SP) .
'
						</p>
					</div>
					');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette squelettes/sommaire.html
//
function html_5b363c7b492789dfc7457fa41ebc5b8c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<?php header("X-Spip-Cache: 7200"); ?>' .
'<!DOCTYPE html PUBLIC \'-//W3C//DTD XHTML 1.0 Strict//EN\' \'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\'>
<html dir="' .
lang_dir(($Pile[0]['lang'] ? $Pile[0]['lang'] : $GLOBALS['spip_lang']),'ltr','rtl') .
'" lang="' .
htmlentities($Pile[0]['lang'] ? $Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'">
<head>
<title>' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site']))) .
'</title>
' .
((strval($t1 = interdire_scripts(textebrut(couper(propre($GLOBALS['meta']['descriptif_site']),'150'))))!='') ?
		('<meta name="description" content="' . $t1 . '" />') :
		('')) .
'
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-head') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'
</head>

<body>

	<div id="container">
		
		' .
'
		' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('branding') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'
		
		<div id="content">

			' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-entete') . ',
	\'id_rubrique\' => ' . argumenter_squelette('0') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'
			
			<div id="content_main">
				<div class="entrees">
					' .
BOUCLE_menuhtml_5b363c7b492789dfc7457fa41ebc5b8c($Cache, $Pile, $doublons, $Numrows, $SP) .
'
					<div class="clear"></div>
				</div>
			</div>
			' .
'
			' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-pied') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'
		</div>
		<div class="clear"></div>
		<div id="nav_supp"></div>
	</div>
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-ga') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'
</body>
</html>
');

	return analyse_resultat_skel('html_5b363c7b492789dfc7457fa41ebc5b8c', $Cache, $page);
}

?>