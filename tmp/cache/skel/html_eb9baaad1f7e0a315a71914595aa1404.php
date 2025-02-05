<?php
/*
 * Squelette : plugins/forms_et_tables_1_9_1/valide_form.html
 * Date :      Wed, 07 Nov 2012 14:17:41 GMT
 * Compile :   Mon, 19 Nov 2012 10:08:47 GMT (0.59s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette plugins/forms_et_tables_1_9_1/valide_form.html
//
function html_eb9baaad1f7e0a315a71914595aa1404($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = ('<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
'<'.'?php header("' . 'Content-Type: image/gif' . '"); ?'.'>' .
'
<?php
/*
 * forms
 * version plug-in de spip_form
 *
 * Auteur :
 * Antoine Pitrou
 * adaptation en 182e puis plugin par cedric.morin@yterium.com
 * © 2005,2006 - Distribue sous licence GNU/GPL
 *
 */

include_spip("inc/forms");
include_spip("inc/admin");
include_spip("inc/session");

function valide_sondage()
{
	$verif_cookie = _request(\'verif_cookie\');
	$id_donnee = intval(_request(\'id_donnee\'));
	$hash = _request(\'hash\');
	$mel_confirm = _request(\'mel_confirm\');

	$renvoyer_image = false;

	if ($verif_cookie == \'oui\' AND ($id_donnee = intval($id_donnee))) {
		$query = "SELECT * FROM spip_forms_donnees WHERE id_donnee=$id_donnee AND confirmation=\'attente\'";
		$result = spip_query($query);
		if ($row = spip_fetch_array($result)) {
			$id_form = $row[\'id_form\'];
			$cookie = $row[\'cookie\'];
			$nom_cookie = Forms_nom_cookie_form($id_form);
			// D\'abord verifier que l\'URL est legitime, donc que la demande a bien
			// ete generee par SPIP
			$hash_verif = md5("forms valide reponse sondage $id_donnee $cookie ".hash_env());
			if ($cookie && $cookie == $_COOKIE[$nom_cookie]
				&& ($hash_verif==$hash)) {
				// Ensuite verifier que le cookie n\'a pas deja ete utilise pour le meme formulaire
				$query = "SELECT id_donnee FROM spip_forms_donnees ".
					"WHERE id_form=$id_form AND id_donnee!=$id_donnee AND confirmation=\'valide\' AND cookie=\'".addslashes($cookie)."\'";
				if (!spip_num_rows(spip_query($query))) {
					$query = "UPDATE spip_forms_donnees SET confirmation=\'valide\' WHERE id_donnee=$id_donnee";
					spip_query($query);
				}
			}
		}
		$renvoyer_image = true;
	}
	else if ($mel_confirm == \'oui\' AND ($id_donnee = intval($id_donnee))) {
		$query = "SELECT * FROM spip_forms_donnees WHERE id_donnee=$id_donnee";
		$result = spip_query($query);
		if ($row = spip_fetch_array($result)) {
			$id_form = $row[\'id_form\'];
			$cookie = $row[\'cookie\'];
			// D\'abord verifier que l\'URL est legitime, donc que la demande a bien
			// ete generee par SPIP
			$hash_verif = md5("forms confirme reponse $id_donnee $cookie ".hash_env());
			if ($hash_verif==$hash) {
				$env = unserialize(\'' .
interdire_scripts(texte_script(serialize($Pile[0]))) .
'\');
				Forms_generer_mail_reponse_formulaire($id_form, $id_donnee, $env);
			}
		}
		$renvoyer_image = true;
	}

	if ($renvoyer_image) {
		$image = "47494638396118001800800000ffffff00000021f90401000000002c0000000018001800000216848fa9cbed0fa39cb4da8bb3debcfb0f86e248965301003b";
		$image = pack("H*", $image);
		$size = strlen($image);

		//Header("Content-Type: image/gif");
		Header("Content-Length: ".$size);
		Header("Cache-Control: no-cache,no-store");
		Header("Pragma: no-cache");
		Header("Connection: close");

		echo $image;
	}

}

valide_sondage();
?>
');

	return analyse_resultat_skel('html_eb9baaad1f7e0a315a71914595aa1404', $Cache, $page);
}

?>