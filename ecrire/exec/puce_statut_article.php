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

include_spip('inc/presentation');

// http://doc.spip.org/@exec_puce_statut_article_dist
function exec_puce_statut_article_dist()
{
	$id = intval(_request('id'));
	$type = _request('type');

	if ($type == 'article') {
		$s = spip_query("SELECT id_rubrique,statut FROM spip_articles WHERE id_article=$id");
		$r = spip_fetch_array($s);
		$statut = $r['statut'];
		$id_rubrique = $r['id_rubrique'];
	} else {
		$id_rubrique = $id;
		$id = 0;
		$statut = 'prop'; // arbitraire
	}
	ajax_retour(puce_statut_article($id,$statut,$id_rubrique,$type, true));
}
?>