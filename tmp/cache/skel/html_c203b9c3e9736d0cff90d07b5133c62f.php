<?php
/*
 * Squelette : squelettes/modeles/img.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Wed, 07 Nov 2012 14:29:39 GMT (0.03s)
 * Boucles :   _document
 */ 
//
// <BOUCLE documents>
//
function BOUCLE_documenthtml_c203b9c3e9736d0cff90d07b5133c62f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("documents.id_document",
		"documents.mode",
		"documents.largeur",
		"documents.hauteur",
		"documents.titre",
		"J0.mime_type",
		"J0.titre AS type_document"), # SELECT
		array('J0' => 'spip_types_documents','documents' => 'spip_documents'), # FROM
		
			array(
			array('=', 'documents.id_document', _q($Pile[$SP]['id_document'])), 
			array('=', 'documents.id_type', 'J0.id_type'), 
			array('(documents.taille > 0 OR documents.distant="oui")')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'documents', # table
		'_document', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= ('
' .
'
' .
vide($Pile['vars']['image'] = interdire_scripts((sinon(($Pile[$SP]['mode'] == 'vignette'),interdire_scripts(entites_html($Pile[0]['embed']))) ? ' ':''))) .
((strval($t1 = $Pile["vars"]['image'])!='') ?
		($t1 . ('
<span class=\'spip_document_' .
	$Pile[$SP]['id_document'] .
	' spip_documents' .
	((strval($t2 = interdire_scripts(entites_html($Pile[0]['align'])))!='') ?
			(' spip_documents_' . $t2) :
			('')) .
	((strval($t2 = interdire_scripts(entites_html($Pile[0]['class'])))!='') ?
			(' ' . $t2) :
			('')) .
	' spip_lien_ok\'' .
	((strval($t2 = interdire_scripts(match(entites_html($Pile[0]['align']),'left|right')))!='') ?
			(' style=\'float:' . $t2 . (';' .
		((strval($t3 = interdire_scripts($Pile[$SP]['largeur']))!='') ?
				(' width:' . $t3 . 'px;') :
				('')) .
		'\'')) :
			('')) .
	'>
' .
	((strval($t2 = interdire_scripts(entites_html($Pile[0]['lien'])))!='') ?
			('<a href="' . $t2 . ('"' .
		((strval($t3 = interdire_scripts(entites_html($Pile[0]['lien_class'])))!='') ?
				(' class="' . $t3 . '"') :
				('')) .
		'>')) :
			('')) .
	'<img src=\'' .
	vider_url(generer_url_document($Pile[$SP]['id_document'])) .
	'\'' .
	((strval($t2 = interdire_scripts($Pile[$SP]['largeur']))!='') ?
			(' width="' . $t2 . '"') :
			('')) .
	((strval($t2 = interdire_scripts($Pile[$SP]['hauteur']))!='') ?
			(' height="' . $t2 . '"') :
			('')) .
	' alt="' .
	interdire_scripts(texte_backend(typo($Pile[$SP]['titre']))) .
	'"' .
	((strval($t2 = interdire_scripts(texte_backend(typo($Pile[$SP]['titre']))))!='') ?
			(' title="' . $t2 . '"') :
			('')) .
	' />' .
	interdire_scripts((entites_html($Pile[0]['lien']) ? '</a>':'')) .
	'</span>
')) :
		('')) .
((strval($t1 = ($Pile["vars"]['image'] ? '':' '))!='') ?
		($t1 . ('
<span class=\'spip_document_' .
	$Pile[$SP]['id_document'] .
	' spip_documents' .
	((strval($t2 = interdire_scripts(entites_html($Pile[0]['align'])))!='') ?
			(' spip_documents_' . $t2) :
			('')) .
	((strval($t2 = interdire_scripts(entites_html($Pile[0]['class'])))!='') ?
			(' ' . $t2) :
			('')) .
	' spip_lien_ok\'' .
	((strval($t2 = interdire_scripts(match(entites_html($Pile[0]['align']),'left|right')))!='') ?
			(' style=\'float:' . $t2 . (';' .
		((strval($t3 = largeur(calcule_logo_document($Pile[$SP]['id_document'], '', $doublons, 0, '', '', '')))!='') ?
				(' width:' . $t3 . 'px;') :
				('')) .
		'\'')) :
			('')) .
	'><a href="' .
	interdire_scripts(sinon(entites_html($Pile[0]['lien']),vider_url(generer_url_document($Pile[$SP]['id_document'])))) .
	'"' .
	((strval($t2 = interdire_scripts((entites_html($Pile[0]['lien']) ? '':('type="' .
		interdire_scripts($Pile[$SP]['mime_type']) .
		'"'))))!='') ?
			(' ' . $t2) :
			('')) .
	((strval($t2 = interdire_scripts(texte_backend(typo($Pile[$SP]['titre']))))!='') ?
			(' title="' . $t2 . '"') :
			('')) .
	'>' .
	inserer_attribut(calcule_logo_document($Pile[$SP]['id_document'], '', $doublons, 0, '', '', ''),'alt',interdire_scripts((strlen(typo($Pile[$SP]['titre'])) ? (interdire_scripts(typo($Pile[$SP]['titre'])) .
			' {' .
			interdire_scripts($Pile[$SP]['type_document']) .
			'}'):interdire_scripts($Pile[$SP]['type_document'])))) .
	'</a></span>
')) :
		('')));
	}

	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette squelettes/modeles/img.html
//
function html_c203b9c3e9736d0cff90d07b5133c62f($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = (BOUCLE_documenthtml_c203b9c3e9736d0cff90d07b5133c62f($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_c203b9c3e9736d0cff90d07b5133c62f', $Cache, $page);
}

?>