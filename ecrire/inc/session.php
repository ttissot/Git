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

include_spip('inc/meta');

/*
 * Gestion de l'authentification par sessions
 * a utiliser pour valider l'acces (bloquant)
 * ou pour reconnaitre un utilisateur (non bloquant)
 *
 */

$GLOBALS['auteur_session'] = ''; # gloable decrivant l'auteur
$GLOBALS['rejoue_session'] = ''; # globale pour insertion de JS en fin de page

//
// 3 actions sur les sessions, selon le type de l'argument:
//
// - numerique: efface toutes les sessions de l'auteur (retour quelconque)
// - tableau: cree une session pour l'auteur decrit et retourne l'identifiant
// - autre: predicat de validite de la session indiquee par le cookie

// http://doc.spip.org/@inc_session_dist
function inc_session_dist($auteur=false)
{
	if (is_numeric($auteur))
		return supprimer_sessions($auteur);
	else if (is_array($auteur))
		return ajouter_session($auteur);
	else return verifier_session($auteur);
}

//
// Ajoute une session pour l'auteur decrit par un tableau issu d'un SELECT-SQL
//

// http://doc.spip.org/@ajouter_session
function ajouter_session($auteur) {

	global $spip_session;

	if (!$spip_session) 
		$spip_session = $auteur['id_auteur'].'_'.md5(uniqid(rand(),true));

	$fichier_session = fichier_session($spip_session, $GLOBALS['meta']['alea_ephemere']);

	if (!isset($auteur['hash_env'])) $auteur['hash_env'] = hash_env();

	$texte = "<"."?php\n";
	foreach (array('id_auteur', 'nom', 'login', 'email', 'statut', 'lang', 'ip_change', 'hash_env') AS $var) {
		$code = addslashes($auteur[$var]);
		$texte .= "\$GLOBALS['auteur_session']['$var'] = '$code';\n";
	}
	$texte .= "?".">\n";

	if (!ecrire_fichier($fichier_session, $texte)) {
		include_spip('inc/headers');
		redirige_par_entete(generer_url_action('test_dirs','test_dir=' . _DIR_SESSIONS,true));
	} else return $spip_session;
}

//
// Cette fonction efface toutes les sessions appartenant a l'auteur
// On en profite pour effacer toutes les sessions creees il y a plus de 48 h
//

// http://doc.spip.org/@supprimer_sessions
function supprimer_sessions($id_auteur) {

	$dir = opendir(_DIR_SESSIONS);
	$t = time()  - (48 * 3600);
	while(($f = readdir($dir)) !== false) {
		if (ereg("^session_([0-9]+)_[a-z0-9]+\.php[3]?$", $f, $regs)){
			$f = _DIR_SESSIONS . $f;
			if (($regs[1] == $id_auteur) OR ($t > filemtime($f)))
				@unlink($f);
		}
	}
}

//
// Verifie si le cookie spip_session indique une session valide.
// Si oui, la decrit dans le tableau $auteur_session et retourne id_auteur
// La rejoue si IP change puis accepte le changement si $change=true
//

// http://doc.spip.org/@verifier_session
function verifier_session($change=false) {

	global $auteur_session, $spip_session; 

	// si pas de cookie, c'est fichu
	if (!$spip_session) return false;

	// Tester avec alea courant
	$fichier_session = fichier_session($spip_session, $GLOBALS['meta']['alea_ephemere']);
	if (@file_exists($fichier_session)) {
		include($fichier_session);
	} else {
		// Sinon, tester avec alea precedent
		$fichier_session = fichier_session($spip_session, $GLOBALS['meta']['alea_ephemere_ancien']);
		if (!@file_exists($fichier_session)) return false;

		// Renouveler la session avec l'alea courant
		include($fichier_session);
		@unlink($fichier_session);
		ajouter_session($GLOBALS['auteur_session']);
	}

	// Si l'adresse IP change, inc/presentation mettra une balise image
	// avec un URL de rappel demandant a changer le nom de la session.
	// Seul celui qui a l'IP d'origine est rejoue
	// ainsi un eventuel voleur de cookie ne pourrait pas deconnecter
	// sa victime, mais se ferait deconnecter par elle.

	if (hash_env() != $GLOBALS['auteur_session']['hash_env']) {
	    if (!$GLOBALS['auteur_session']['ip_change']) {
		$GLOBALS['rejoue_session'] = rejouer_session();
		$GLOBALS['auteur_session']['ip_change'] = true;
		ajouter_session($GLOBALS['auteur_session']);
	    } else if ($change)
	      spip_log("session non rejouee, vol de cookie ?");
	} else { if ($change) {
		spip_log("rejoue session $fichier_session $spip_session");
		@unlink($fichier_session);
		$auteur_session['ip_change'] = false;
		unset($spip_session);
		$cookie= ajouter_session($auteur_session);
		preg_match(',^[^/]*//[^/]*(.*)/$,',
			   url_de_base(),
			   $r);
		spip_setcookie('spip_session', $cookie,0,$r[1]);
	  }
	}
	return 	$auteur_session['id_auteur'];
}

// Code a inserer par inc/presentation pour rejouer la session
// Voir action/cookie qui sera appele.

// http://doc.spip.org/@rejouer_session
function rejouer_session()
{
	include_spip('inc/minipres');
	return	  http_img_pack('rien.gif', " ", "id='img_session' width='0' height='0'") .
		  http_script("\ndocument.img_session.src='" . generer_url_action('cookie','change_session=oui', true) .  "'");
}

//
// Calcule le nom du fichier session
//
// http://doc.spip.org/@fichier_session
function fichier_session($id_session, $alea) {
	if (ereg("^([0-9]+_)", $id_session, $regs))
		$id_auteur = $regs[1];
		
	$repertoire = _DIR_SESSIONS;
	if(!@file_exists($repertoire)) {
		$repertoire = preg_replace(','._DIR_TMP.',', '', $repertoire);
		$repertoire = sous_repertoire(_DIR_TMP, $repertoire);
	}
	return $repertoire . 'session_'.$id_auteur.md5($id_session.' '.$alea). '.php';
}

//
// On verifie l'IP et le nom du navigateur
//

// http://doc.spip.org/@hash_env
function hash_env() {
  static $res ='';
  if ($res) return $res;
  return $res = md5($GLOBALS['ip'] . $_SERVER['HTTP_USER_AGENT']);
}

?>
