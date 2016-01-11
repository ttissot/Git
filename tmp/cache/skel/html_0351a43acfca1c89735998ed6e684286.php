<?php
/*
 * Squelette : squelettes/rubrique-5.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Wed, 14 Nov 2012 17:09:47 GMT (0.02s)
 * Boucles :   _img_portfolio, _art_de_garde, _rubrique_principal
 */ 
//
// <BOUCLE documents>
//
function BOUCLE_img_portfoliohtml_0351a43acfca1c89735998ed6e684286(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("documents.id_document",
		"documents.fichier",
		"documents.titre",
		"documents.descriptif"), # SELECT
		array('L1' => 'spip_documents_articles','L2' => 'spip_types_documents','L3' => 'spip_types_documents','documents' => 'spip_documents'), # FROM
		
			array(
			array('=', 'L1.id_article', _q($Pile[$SP]['id_article'])), 
			array('=', 'documents.mode', "'document'"), 
			array('REGEXP', 'L3.extension', "'jpg|png|gif'"), 
			array('(documents.taille > 0 OR documents.distant="oui")')), # WHERE
		array(1 => array('documents', 'id_document'), 2 => array('documents', 'id_type'), 3 => array('L2', 'id_type')), # WHERE pour jointure
		"documents.id_document", # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'documents', # table
		'_img_portfolio', # boucle
		''); # serveur
	$Numrows['_img_portfolio']['compteur_boucle'] = 0;
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {

		$Numrows['_img_portfolio']['compteur_boucle']++;
		$t0 .= ('
                <div class="panel" title="Panel ' .
$Numrows['_img_portfolio']['compteur_boucle'] .
'">
                  <div class="wrapper">
                    ' .
interdire_scripts(filtrer('image_reduire',$Pile[$SP]['fichier'],'260','360')) .
'
                    <div class="text">
                      ' .
((strval($t1 = interdire_scripts(supprimer_numero(typo($Pile[$SP]['titre']))))!='') ?
		('<h4>' . $t1 . '</h4>') :
		('')) .
'
                      ' .
interdire_scripts(paragrapher(propre($Pile[$SP]['descriptif']))) .
'
                    </div>
                    <div class="clear"></div>
                  </div>
                </div>
                ');
	}

	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_art_de_gardehtml_0351a43acfca1c89735998ed6e684286(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("articles.id_article",
		"articles.chapo",
		"articles.texte",
		"articles.lang"), # SELECT
		array('articles' => 'spip_articles'), # FROM
		
			array(
			array('=', 'articles.id_article', "'5'"), 
			array('=', 'articles.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'articles', # table
		'_art_de_garde', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('

          <div class="slider-wrap">
            <div id="slider1" class="csw">
              <div class="panelContainer">

                ' .
BOUCLE_img_portfoliohtml_0351a43acfca1c89735998ed6e684286($Cache, $Pile, $doublons, $Numrows, $SP) .
'

              </div><!-- .panelContainer -->
            </div><!-- #slider1 -->
          </div><!-- .slider-wrap -->
          ' .
((strval($t1 = interdire_scripts(paragrapher(propre(nettoyer_chapo($Pile[$SP]['chapo'])))))!='') ?
		('<div class="chapo_variations">' . $t1 . '</div>') :
		('')) .
'
          ' .
((strval($t1 = interdire_scripts(paragrapher(propre($Pile[$SP]['texte']))))!='') ?
		('<div class="text_variations">' . $t1 . '</div>') :
		('')) .
'


          <div class="clear"></div>
          ');
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubrique_principalhtml_0351a43acfca1c89735998ed6e684286(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	// REQUETE
	$result = spip_optim_select(
		array("rubriques.lang",
		"rubriques.titre",
		"rubriques.texte",
		"rubriques.id_rubrique"), # SELECT
		array('rubriques' => 'spip_rubriques'), # FROM
		
			array(
			array('=', 'rubriques.id_rubrique', _q($Pile[$SP]['id_rubrique'])), 
			array('=', 'rubriques.statut', '"publie"')), # WHERE
		array(), # WHERE pour jointure
		'', # GROUP
		array(), # ORDER
		'', # LIMIT
		'', # sous
		
			array(), # HAVING
		'rubriques', # table
		'_rubrique_principal', # boucle
		''); # serveur
	$t0 = "";
	$SP++;
	$old_lang = $GLOBALS['spip_lang'];

	// RESULTATS
	while ($Pile[$SP] = @spip_abstract_fetch($result,"")) {
		if (!$GLOBALS['forcer_lang'])
	 		$GLOBALS['spip_lang'] = ($x = $Pile[$SP]['lang']) ? $x : $old_lang;
		$t0 .= ('
<!DOCTYPE html PUBLIC \'-//W3C//DTD XHTML 1.0 Strict//EN\' \'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\'>
<html dir="' .
lang_dir(($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']),'ltr','rtl') .
'" lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'">
<head>
<title>' .
((strval($t1 = interdire_scripts(textebrut(supprimer_numero(typo($Pile[$SP]['titre'])))))!='') ?
		($t1 . ' - ') :
		('')) .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site']))) .
'</title>
' .
((strval($t1 = interdire_scripts(textebrut(couper(calcul_introduction('rubriques', $Pile[$SP]['texte'], '', ''),'150'))))!='') ?
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
' .
'
<link rel="alternate" type="application/rss+xml" title="' .
_T('public/spip/ecrire:syndiquer_rubrique') .
'" href="' .
interdire_scripts(parametre_url(generer_url_public('backend'),'id_rubrique',$Pile[$SP]['id_rubrique'])) .
'" />
<script src="' .
interdire_scripts(find_in_path('javascript/jquery-1.2.1.pack.js')) .
'" type="text/javascript"></script>
<script src="' .
interdire_scripts(find_in_path('javascript/jquery-easing.1.2.pack.js')) .
'" type="text/javascript"></script>
<script src="' .
interdire_scripts(find_in_path('javascript/jquery-easing-compatibility.1.2.pack.js')) .
'" type="text/javascript"></script>
<script src="' .
interdire_scripts(find_in_path('javascript/coda-slider.1.1.1.js')) .
'" type="text/javascript"></script>
<link rel="stylesheet" href="' .
interdire_scripts(find_in_path('css/slider.css')) .
'" type="text/css" />

<!-- Initialize each slider on the page. Each slider must have a unique id -->
<script type="text/javascript">
  jQuery(window).bind("load", function() {
    jQuery("div#slider1").codaSlider()
    // jQuery("div#slider2").codaSlider()
    // etc, etc. Beware of cross-linking difficulties if using multiple sliders on one page.
  });
</script>
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
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include(_DIR_RESTREINT . "public.php");
?'.'>' .
'

      <div id="content_main">
        <div class="article">
          ' .
affiche_logos(calcule_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],sql_parent($Pile[$SP]['id_rubrique']),  ''), '', '') .
'

          ' .
BOUCLE_art_de_gardehtml_0351a43acfca1c89735998ed6e684286($Cache, $Pile, $doublons, $Numrows, $SP) .
'
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
	}

	$GLOBALS['spip_lang'] = $old_lang;
	@spip_abstract_free($result,'');
	return $t0;
}



//
// Fonction principale du squelette squelettes/rubrique-5.html
//
function html_0351a43acfca1c89735998ed6e684286($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<?php header("X-Spip-Cache: 7200"); ?>' .
BOUCLE_rubrique_principalhtml_0351a43acfca1c89735998ed6e684286($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_0351a43acfca1c89735998ed6e684286', $Cache, $page);
}

?>