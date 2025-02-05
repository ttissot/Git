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

// http://doc.spip.org/@inc_import_1_3_dist
function inc_import_1_3_dist($lecteur, $request, $gz='fread', $atts=array()) {
  global $import_ok, $tables_trans,  $trans;
	static $tables = '';
	static $phpmyadmin, $fin;
	static $field_desc = array ();
	static $defaut = array('field' => array());

	// au premier appel, init des invariants de boucle 

	if (!$tables OR $trans) {
		$init = $request['init'];
		$tables = $init($request);
		$phpmyadmin = preg_match("{^phpmyadmin::}is",
			$GLOBALS['meta']['version_archive_restauration'])
			? array(array('&quot;','&gt;'),array('"','>'))
			: false;
		$fin = '/' . $GLOBALS['meta']['tag_archive_restauration'];
	}

	$b = false;
	if (!($table = xml_fetch_tag($lecteur, $b, $gz))) return false;
	if ($table == $fin) return !($import_ok = true);
	if (strpos($table,'=')) {
	  list($table, $attl) = xml_parse_tag($table);
	  $atts = array_merge($atts, $attl);
	}

	$new = isset($tables_trans[$table]) ? $tables_trans[$table]: $table; 

	// indique a la fois la fonction a appliquer
	// et les infos qu'il faut lui communiquer
	$boucle = $request['boucle'];

	if (!in_array($new,$tables))
		$field_desc[$boucle][$table] = $desc = $defaut;
	elseif (isset($field_desc[$boucle][$table]))
		$desc = $field_desc[$boucle][$table];
	else {
// recuperer la description de la table pour connaitre ses champs valides
		list($nom,$desc) = description_table($table);
		if (!isset($desc['field']))
			$desc = $defaut;
		elseif ($request['insertion']=='on')
			$desc['field'] = import_collecte($desc); 
		$field_desc[$boucle][$table] = $desc;
	}

	$values = import_lire_champs($lecteur,
				     $desc['field'],
				     $gz,
				     $phpmyadmin,
				     '/' . $table);

	if ($values === false) return  ($import_ok = false);

	if ($values) $boucle($values, $new, $desc, $request, $atts);

	return $import_ok = $new;
}

// Au premier tour de l'insertion, ne memoriser que le strict necessaire 
// pour pouvoir identifier avec l'existant.
// (Faudrait convenir d'une structure de donnees, c'est lourd & inextensible)

// http://doc.spip.org/@import_collecte
function import_collecte($desc)
{
	$fields = $desc['field'];
	$b = array();
	if (isset($fields[$p='titre']))
	  $b[$p]= $fields[$p];
	if (isset($fields[$p='id_groupe']))
	  $b[$p]= $fields[$p];
	if (isset($fields[$p='id_parent']))
	  $b[$p]= $fields[$p];
	if (isset($fields[$p='id_rubrique']))
	  $b[$p]= $fields[$p];
	if (isset($fields[$p='fichier']))
	  $b[$p]= $fields[$p];
	if (isset($fields[$p='taille']))
	  $b[$p]= $fields[$p];
	if (isset($fields[$p='extension']))
	  $b[$p]= $fields[$p];

	$p = $desc['key']["PRIMARY KEY"];
	$b[$p] = $fields[$p];
	return $b;
}

// Les 2 derniers args ne servent que pour l'insertion

// http://doc.spip.org/@import_replace
function import_replace($values, $table, $desc, $request, $atts='') {
	if (!isset($desc['field']['impt'])) {// pas de champ de gestion d'import
		if (!spip_query("REPLACE $table (" . join(',',array_keys($values)) . ') VALUES (' .join(',',array_map('_q', $values)) . ')')) {
			$GLOBALS['erreur_restauration'] = spip_sql_error();
	  }
	}
	else {
		// la table contient un champ 'impt' qui permet de gerer des interdiction d'overwrite par import
		// impt=oui : la ligne est surchargeable par import
		// impt=non : la ligne ne doit pas etre ecrasee par un import
		// il faut gerer l'existence de la primary, et l'autorisation ou non de mettre a jour
		$where = "";
		if (!isset($desc['key']["PRIMARY KEY"]))
			$GLOBALS['erreur_restauration'] = "champ impt sans cle primaire sur la table $table";
		else {
			$keys = $desc['key']["PRIMARY KEY"];
			$keys = explode(",",$keys);
			if (!is_array($keys)) $keys = array($keys);
			$w = "";
			foreach($keys as $key){
				if (!isset($values[$key])){
					$GLOBALS['erreur_restauration'] = "champ $key manquant a l'import sur la table $table";
					$w .= " AND 0=1";
					continue;
				}
				$w .= " AND $key="._q($values[$key]);
			}
			$where = strlen($w)?substr($w,5):"0=1";
		}
		if ($where!="") {
			$res = spip_query("SELECT * FROM $table WHERE ".$where." AND impt='oui'");
			if (spip_num_rows($res)){
				$set = "";
				foreach($values as $key=>$value) $set .= ",$key="._q($value);
				$set = substr($set,1);
				if (!spip_query("UPDATE $table SET $set WHERE ".$where." AND impt='oui'")) {
					$GLOBALS['erreur_restauration'] = spip_sql_error();
				}
			}
			else{
				spip_query("INSERT $table (" . join(',',array_keys($values)) . ') VALUES (' .join(',',array_map('_q', $values)) . ')');
			}
		}
	}
}

// http://doc.spip.org/@import_lire_champs
function import_lire_champs($f, $fields, $gz, $phpmyadmin, $table)
{
	$values = array();
	
	if (!isset($GLOBALS['meta']['charset_insertion']))
		$charset = '';
	else {
		$charset == $GLOBALS['meta']['charset_insertion'];
		if ($charset == $GLOBALS['meta']['charset'])
			$charset = '';
	}

	for (;;) {
		$b = false;
		if (!($col = xml_fetch_tag($f, $b, $gz))) return false;
		if ($col[0] == '/') { 
			if ($col != $table) {
				spip_log("table $table, tag fermant inattendu:$col");
		  }
			break;
		}
		$value = $b = (($col != 'maj') AND (isset($fields[$col])));
		if (!xml_fetch_tag($f, $value, $gz)) return false;

		if ($b) {
			if ($phpmyadmin)
				$value = str_replace($phpmyadmin[0],$phpmyadmin[1],$value);
			if ($char) 
				$value = importer_charset($value, $charset);
			$values[$col]= $value;
		}
	}

	return $values;
}
?>
