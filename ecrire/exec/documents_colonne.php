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

if (!defined("_ECRIRE_INC_VERSION")) return;

// http://doc.spip.org/@exec_documents_colonne_dist
function exec_documents_colonne_dist()
{
	global $id, $type, $show_docs;
	$id = intval($id);

	if (!($type == 'article' 
		? autoriser('modifier','article',$id)
		: autoriser('publierdans','rubrique',$id))) {
		include_spip('inc/minipres');
		echo minipres();
		exit;
	}

	include_spip("inc/documents");
	include_spip("inc/presentation");

	// TODO: return au lieu de echo
	$documents = explode(",",$show_docs);
	$script = $type."s_edit";
	$res = "";
	foreach($documents as $doc) {
    $res .= afficher_case_document($doc, $id, $script, $type, $deplier = false);
  }
  
  ajax_retour("<div class='upload_answer upload_document_added'>".
	$res.
	"</div>",false);
}

?>
