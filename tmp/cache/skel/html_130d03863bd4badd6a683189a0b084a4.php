<?php
/*
 * Squelette : squelettes/modeles/doc.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Wed, 14 Nov 2012 17:09:47 GMT (0.03s)
 * Boucles :   _doc
 */ 
//
// <BOUCLE documents>
//
function BOUCLE_dochtml_130d03863bd4badd6a683189a0b084a4(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("documents.mode",
		"documents.id_document",
		"documents.largeur",
		"documents.hauteur",
		"J0.titre AS type_document",
		"documents.taille",
		"J0.mime_type",
		"documents.titre",
		"documents.descriptif"), # SELECT
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
		'_doc', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= ('
' .
'
' .
((strval($t1 = interdire_scripts((($Pile[$SP]['mode'] == 'vignette') ? ' ':'')))!='') ?
		($t1 . ('
	' .
	vide($Pile['vars']['fichier'] = vider_url(generer_url_document($Pile[$SP]['id_document']))) .
	vide($Pile['vars']['width'] = interdire_scripts($Pile[$SP]['largeur'])) .
	vide($Pile['vars']['height'] = interdire_scripts($Pile[$SP]['hauteur'])) .
	vide($Pile['vars']['url'] = interdire_scripts(entites_html($Pile[0]['lien']))))) :
		('')) .
'
' .
((strval($t1 = interdire_scripts((($Pile[$SP]['mode'] == 'vignette') ? '':' ')))!='') ?
		($t1 . ('
	' .
	vide($Pile['vars']['fichier'] = extraire_attribut(calcule_logo_document($Pile[$SP]['id_document'], '', $doublons, 0, '', '', ''),'src')) .
	'
	' .
	vide($Pile['vars']['width'] = extraire_attribut(calcule_logo_document($Pile[$SP]['id_document'], '', $doublons, 0, '', '', ''),'width')) .
	'
	' .
	vide($Pile['vars']['height'] = extraire_attribut(calcule_logo_document($Pile[$SP]['id_document'], '', $doublons, 0, '', '', ''),'height')) .
	'
	' .
	vide($Pile['vars']['url'] = interdire_scripts(entites_html(sinon($Pile[0]['lien'],vider_url(generer_url_document($Pile[$SP]['id_document'])))))))) :
		('')) .
'

<dl class=\'spip_document_' .
$Pile[$SP]['id_document'] .
' spip_documents' .
((strval($t1 = interdire_scripts(entites_html($Pile[0]['align'])))!='') ?
		(' spip_documents_' . $t1) :
		('')) .
((strval($t1 = interdire_scripts(entites_html($Pile[0]['class'])))!='') ?
		(' ' . $t1) :
		('')) .
' spip_lien_ok\'' .
((strval($t1 = interdire_scripts(match(entites_html($Pile[0]['align']),'left|right')))!='') ?
		(' style=\'float:' . $t1 . (';' .
	((strval($t2 = max(min($Pile["vars"]['width'],'350'),'120'))!='') ?
			('width:' . $t2) :
			('')) .
	'px;\'')) :
		('')) .
'>
<dt>' .
((strval($t1 = $Pile["vars"]['url'])!='') ?
		('<a href="' . $t1 . ('"' .
	((strval($t2 = interdire_scripts(entites_html($Pile[0]['lien_class'])))!='') ?
			(' class="' . $t2 . '"') :
			('')) .
	' title=\'' .
	interdire_scripts($Pile[$SP]['type_document']) .
	' - ' .
	interdire_scripts(texte_backend(taille_en_octets($Pile[$SP]['taille']))) .
	'\'' .
	((strval($t2 = interdire_scripts((entites_html($Pile[0]['lien']) ? '':('type="' .
		interdire_scripts($Pile[$SP]['mime_type']) .
		'"'))))!='') ?
			(' ' . $t2) :
			('')) .
	'>')) :
		('')) .
'<img src=\'' .
$Pile["vars"]['fichier'] .
'\' width=\'' .
$Pile["vars"]['width'] .
'\' height=\'' .
$Pile["vars"]['height'] .
'\' alt=\'' .
interdire_scripts($Pile[$SP]['type_document']) .
' - ' .
interdire_scripts(texte_backend(taille_en_octets($Pile[$SP]['taille']))) .
'\' />' .
($Pile["vars"]['url'] ? '</a>':'') .
'</dt>' .
((strval($t1 = interdire_scripts(typo($Pile[$SP]['titre'])))!='') ?
		(('
<dt class=\'spip_doc_titre\'' .
	((strval($t2 = max(min($Pile["vars"]['width'],'350'),'120'))!='') ?
			(' style=\'width:' . $t2 . 'px;\'') :
			('')) .
	'><strong>' .
	((strval($t2 = $Pile["vars"]['url'])!='') ?
			('<a href="' . $t2 . ('"' .
		((strval($t3 = interdire_scripts(entites_html($Pile[0]['lien_class'])))!='') ?
				(' class="' . $t3 . '"') :
				('')) .
		' title=\'' .
		interdire_scripts($Pile[$SP]['type_document']) .
		' - ' .
		interdire_scripts(texte_backend(taille_en_octets($Pile[$SP]['taille']))) .
		'\'' .
		((strval($t3 = interdire_scripts((entites_html($Pile[0]['lien']) ? '':('type="' .
			interdire_scripts($Pile[$SP]['mime_type']) .
			'"'))))!='') ?
				(' ' . $t3) :
				('')) .
		'>')) :
			(''))) . $t1 . '</a></strong></dt>') :
		('')) .
((strval($t1 = interdire_scripts(propre($Pile[$SP]['descriptif'])))!='') ?
		(('
<dd class=\'spip_doc_descriptif\'' .
	((strval($t2 = max(min($Pile["vars"]['width'],'350'),'120'))!='') ?
			(' style=\'width:' . $t2 . 'px;\'') :
			('')) .
	'>') . $t1 . (interdire_scripts(calculer_notes()) .
	'</dd>')) :
		('')) .
'
</dl>
');
	}

	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette squelettes/modeles/doc.html
//
function html_130d03863bd4badd6a683189a0b084a4($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = (BOUCLE_dochtml_130d03863bd4badd6a683189a0b084a4($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_130d03863bd4badd6a683189a0b084a4', $Cache, $page);
}

?>