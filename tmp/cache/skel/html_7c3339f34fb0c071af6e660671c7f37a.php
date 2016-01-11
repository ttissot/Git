<?php
/*
 * Squelette : squelettes/modeles/lesauteurs.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Wed, 14 Nov 2012 17:37:09 GMT (0.00s)
 * Boucles :   _auteurs
 */ 
//
// <BOUCLE auteurs>
//
function BOUCLE_auteurshtml_7c3339f34fb0c071af6e660671c7f37a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("auteurs.id_auteur",
		"auteurs.nom"), # SELECT
		array('L1' => 'spip_auteurs_articles','auteurs' => 'spip_auteurs'), # FROM
		
			array(
			array('=', 'L1.id_article', _q($Pile[$SP]['id_article'])), 
			array('!=', 'auteurs.statut', '"5poubelle"')), # WHERE
		array(1 => array('auteurs', 'id_auteur')), # WHERE pour jointure
		'', # GROUP
		array('auteurs.nom'), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'auteurs', # table
		'_auteurs', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t1 = ('
<a href="' .
generer_url_auteur($Pile[$SP]['id_auteur']) .
'">' .
interdire_scripts(typo($Pile[$SP]['nom'])) .
'</a>');
		$t0 .= (($t1 && $t0) ? ', ' : '') . $t1;
	}

	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette squelettes/modeles/lesauteurs.html
//
function html_7c3339f34fb0c071af6e660671c7f37a($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('
' .
BOUCLE_auteurshtml_7c3339f34fb0c071af6e660671c7f37a($Cache, $Pile, $doublons, $Numrows, $SP));

	return analyse_resultat_skel('html_7c3339f34fb0c071af6e660671c7f37a', $Cache, $page);
}

?>