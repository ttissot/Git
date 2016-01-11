<?php
/*
 * Squelette : squelettes/inclusions/inc-pied.html
 * Date :      Tue, 06 Nov 2012 23:00:00 GMT
 * Compile :   Fri, 08 Jan 2016 07:20:10 GMT (0.01s)
 * Boucles :   _img_variations, _art_variations, _variations
 */ 
//
// <BOUCLE documents>
//
function BOUCLE_img_variationshtml_f23a026dde941f59093b71621ecdd39a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("documents.id_document",
		"RAND() AS alea",
		"documents.fichier",
		"documents.titre",
		"documents.descriptif"), # SELECT
		array('L1' => 'spip_documents_articles','L2' => 'spip_types_documents','L3' => 'spip_types_documents','documents' => 'spip_documents'), # FROM
		
			array(
			array('=', 'L1.id_article', _q($Pile[$SP]['id_article'])), 
			array('=', 'documents.mode', "'document'"), 
			array('=', 'L3.extension', "'png'"), 
			array('(documents.taille > 0 OR documents.distant="oui")')), # WHERE
		array(1 => array('documents', 'id_document'), 2 => array('documents', 'id_type'), 3 => array('L2', 'id_type')), # WHERE pour jointure
		"documents.id_document", # GROUP
		array('alea'), # ORDER
		'0,1', # LIMIT
		'', # sous
		
			array(), # HAVING
		'documents', # table
		'_img_variations', # boucle
		''); # serveur
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$t0 .= ('
            ' .
interdire_scripts(inserer_attribut(filtrer('image_reduire',$Pile[$SP]['fichier'],'246','145'),'class','visuel')) .
'
            <div class="text_illustr">
              ' .
((strval($t1 = interdire_scripts(typo($Pile[$SP]['titre'])))!='') ?
		('<h3>' . $t1 . '</h3>') :
		('')) .
'
              ' .
((strval($t1 = interdire_scripts(propre($Pile[$SP]['descriptif'])))!='') ?
		('<p>' . $t1 . '</p>') :
		('')) .
'
            </div>
            <div class="clear"></div>
            ');
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_art_variationshtml_f23a026dde941f59093b71621ecdd39a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("articles.id_article",
		"articles.lang"), # SELECT
		array('articles' => 'spip_articles'), # FROM
		
			array(
			array('=', 'articles.id_rubrique', _q($Pile[$SP]['id_rubrique'])), 
			array('=', 'articles.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'0,1', # LIMIT
		'', # sous
		
			array(), # HAVING
		'articles', # table
		'_art_variations', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
          ' .
((strval($t1 = BOUCLE_img_variationshtml_f23a026dde941f59093b71621ecdd39a($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
		('
          <div class="illustr">
            ' . $t1) :
		('')) .
'
          </div>
          <B_img_variations>
          ');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_variationshtml_f23a026dde941f59093b71621ecdd39a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.descriptif",
		"rubriques.lang"), # SELECT
		array('rubriques' => 'spip_rubriques'), # FROM
		
			array(
			array('=', 'rubriques.id_rubrique', "'7'"), 
			array('=', 'rubriques.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'rubriques', # table
		'_variations', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
          <div class="text">
            ' .
((strval($t1 = interdire_scripts(majuscules(supprimer_numero(typo($Pile[$SP]['titre'])))))!='') ?
		('<h2>' . $t1 . '</h2>') :
		('')) .
'
            ' .
interdire_scripts(paragrapher(propre($Pile[$SP]['descriptif']))) .
'
            <ul>
              <li><a href="/spip.php?rubrique5">Voir le portfolio</a></li>
              <li><a href="/spip.php?rubrique6">Nous contacter</a></li>
            </ul>
          </div>
          ' .
BOUCLE_art_variationshtml_f23a026dde941f59093b71621ecdd39a($Cache, $Pile, $doublons, $Numrows, $SP) .
'
        ');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette squelettes/inclusions/inc-pied.html
//
function html_f23a026dde941f59093b71621ecdd39a($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('    <div id="site_info">
      ' .
((strval($t1 = BOUCLE_variationshtml_f23a026dde941f59093b71621ecdd39a($Cache, $Pile, $doublons, $Numrows, $SP))!='') ?
		('
      <div class="variations">
        ' . $t1 . '
        <div class="clear"></div>
      </div>
      ') :
		('')) .
'
      <div class="coords">
        <img src="' .
interdire_scripts(find_in_path('css/navpics/visuels/donner_forme_imagination.gif')) .
'" alt="" class="visuel" />
        <div class="clear"></div>
      </div>
      <div class="clear"></div>

    </div>
    <div id="site_footer">
    <div class="coords">
        <img src="' .
interdire_scripts(find_in_path('css/navpics/logos/afaq_imprimvert.png')) .
'" alt="" class="flotright" />
        <p>RAYNARD SAS - 6, rue de la Peltière - 35130 La Guerche de Bretagne<br />Tel : 02 99 96 31 01 - <a href="mailto:raynard@raynard.fr">raynard@raynard.fr</a></p>

        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    </div>

' .
"<!-- SPIP-CRON --><div style=\"background-image: url('http://www.raynard.fr/spip.php?action=cron');\"></div>" .
'
');

	return analyse_resultat_skel('html_f23a026dde941f59093b71621ecdd39a', $Cache, $page);
}

?>