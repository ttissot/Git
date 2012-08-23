<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2007                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/



////////////////////////////////////////////////////////////////////////////////////
// Pour utiliser les champs "extra", il faut installer dans le fichier
// ecrire/mes_options un tableau definissant les champs pour chaque
// type d'objet que l'on veut Žtendre (article, rubrique, breve, auteur,
// site ou mot). Pour acceder aux valeurs des champs extra dans les
// squelettes du site public, utiliser la notation :
//                     [(#EXTRA|extra{nom_du_champ})]
// Exemples :

/*

//
// Definition de tous les extras possibles
//
*/
$GLOBALS['champs_extra'] = Array (
	
	'rubriques' => Array (
			"footer" => "bloc|typo|Pied-de-page R&eacute;f&eacute;rencement",
			"title" => "ligne|propre|Title R&eacute;f&eacute;rencement",
			"metadescript" => "bloc|propre|Meta Description R&eacute;f&eacute;rencement",
			"metakeywords" => "bloc|propre|Meta Keywords R&eacute;f&eacute;rencement"
		),
		
	'articles' => Array (
			"footer" => "bloc|typo|Pied-de-page R&eacute;f&eacute;rencement",
			"title" => "ligne|propre|Title R&eacute;f&eacute;rencement",
			"metadescript" => "bloc|propre|Meta Description R&eacute;f&eacute;rencement",
			"metakeywords" => "bloc|propre|Meta Keywords R&eacute;f&eacute;rencement"
		)
	
	);

$GLOBALS['champs_extra_proposes'] = Array (

	'rubriques' => Array (
		// tous : par defaut aucun champs extra sur les articles
		'tous' => 'footer|title|metadescript|metakeywords'
		),
		
	'articles' => Array (
		// tous : par defaut aucun champs extra sur les articles
		'tous' => 'footer|title|metadescript|metakeywords'
		
		)
		
	);

////////////////////////////////////////////////////////////////////////////////////

$type_urls = "propres2";

// Personnalisation des dossiers contenant des squelettes
$GLOBALS['dossier_squelettes'] = "squelettes:squelettes/inclusions:squelettes";

?>
