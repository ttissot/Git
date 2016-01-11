<?php
/*
 * Squelette : squelettes/inclusions/vignettes.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Wed, 14 Nov 2012 15:59:23 GMT (0.00s)
 * Boucles :   _vignettes
 */ 
//
// <BOUCLE documents>
//
function BOUCLE_vignetteshtml_4bdc032627fcca05eae70752b83e22f0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("documents.id_document",
		"0+documents.titre AS num",
		"documents.fichier"), # SELECT
		array('L1' => 'spip_documents_articles','L2' => 'spip_types_documents','L3' => 'spip_types_documents','documents' => 'spip_documents'), # FROM
		
			array(
			array('=', 'L1.id_article', _q($Pile[$SP]['id_article'])), 
			array('=', 'documents.mode', "'document'"), 
			array('REGEXP', 'L3.extension', "'jpg|gif|png'"), 
			array('(documents.taille > 0 OR documents.distant="oui")')), # WHERE
		array(1 => array('documents', 'id_document'), 2 => array('documents', 'id_type'), 3 => array('L2', 'id_type')), # WHERE pour jointure
		"documents.id_document", # GROUP
		array('num'), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'documents', # table
		'_vignettes', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= ('
						<li><a href="#numero' .
$Pile[$SP]['id_document'] .
'">' .
interdire_scripts(filtrer('image_reduire',$Pile[$SP]['fichier'],'110','110')) .
'</a></li>
						');
	}

	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette squelettes/inclusions/vignettes.html
//
function html_4bdc032627fcca05eae70752b83e22f0($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('					' .
((strval($t1 = BOUCLE_vignetteshtml_4bdc032627fcca05eae70752b83e22f0($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
		('
					<ul class="idTabs">
						' . $t1 . '
					</ul>
					') :
		('')));

	return analyse_resultat_skel('html_4bdc032627fcca05eae70752b83e22f0', $Cache, $page);
}

?>