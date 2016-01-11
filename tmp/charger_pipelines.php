<?php
if (!defined('_ECRIRE_INC_VERSION')) return;
// Pipeline affichage_final 
function execute_pipeline_affichage_final($val){
$val = minipipe('f_surligne', $val);
$val = minipipe('f_tidy', $val);
$val = minipipe('f_admin', $val);
return $val;
}

// Pipeline affiche_droite 
function execute_pipeline_affiche_droite($val){
@include_once(_DIR_PLUGINS.'forms_et_tables_1_9_1/forms_pipeline.php');
$val = minipipe('Forms_affiche_droite', $val);
return $val;
}

// Pipeline affiche_gauche 
function execute_pipeline_affiche_gauche($val){
return $val;
}

// Pipeline affiche_milieu 
function execute_pipeline_affiche_milieu($val){
@include_once(_DIR_PLUGINS.'forms_et_tables_1_9_1/forms_pipeline.php');
$val = minipipe('Forms_affiche_milieu', $val);
return $val;
}

// Pipeline ajouter_boutons 
function execute_pipeline_ajouter_boutons($val){
@include_once(_DIR_PLUGINS.'forms_et_tables_1_9_1/forms_pipeline.php');
$val = minipipe('Forms_ajouter_boutons', $val);
return $val;
}

// Pipeline ajouter_onglets 
function execute_pipeline_ajouter_onglets($val){
return $val;
}

// Pipeline body_prive 
function execute_pipeline_body_prive($val){
return $val;
}

// Pipeline exec_init 
function execute_pipeline_exec_init($val){
return $val;
}

// Pipeline header_prive 
function execute_pipeline_header_prive($val){
@include_once(_DIR_PLUGINS.'forms_et_tables_1_9_1/forms_pipeline.php');
$val = minipipe('f_jQuery', $val);
$val = minipipe('Forms_header_prive', $val);
return $val;
}

// Pipeline insert_head 
function execute_pipeline_insert_head($val){
@include_once(_DIR_PLUGINS.'forms_et_tables_1_9_1/forms_filtres.php');
$val = minipipe('f_jQuery', $val);
$val = minipipe('Forms_insert_head', $val);
return $val;
}

// Pipeline mots_indexation 
function execute_pipeline_mots_indexation($val){
return $val;
}

// Pipeline nettoyer_raccourcis_typo 
function execute_pipeline_nettoyer_raccourcis_typo($val){
return $val;
}

// Pipeline pre_propre 
function execute_pipeline_pre_propre($val){
@include_once(_DIR_PLUGINS.'forms_et_tables_1_9_1/forms_filtres.php');
$val = minipipe('extraire_multi', $val);
$val = minipipe('Forms_forms_avant_propre', $val);
return $val;
}

// Pipeline post_propre 
function execute_pipeline_post_propre($val){
@include_once(_DIR_PLUGINS.'forms_et_tables_1_9_1/forms_filtres.php');
$val = minipipe('Forms_forms_apres_propre', $val);
return $val;
}

// Pipeline pre_typo 
function execute_pipeline_pre_typo($val){
$val = minipipe('extraire_multi', $val);
return $val;
}

// Pipeline post_typo 
function execute_pipeline_post_typo($val){
$val = minipipe('quote_amp', $val);
return $val;
}

// Pipeline pre_edition 
function execute_pipeline_pre_edition($val){
$val = minipipe('premiere_revision', $val);
return $val;
}

// Pipeline post_edition 
function execute_pipeline_post_edition($val){
@include_once(_DIR_PLUGINS.'forms_et_tables_1_9_1/forms_filtres.php');
$val = minipipe('nouvelle_revision', $val);
$val = minipipe('Forms_post_edition', $val);
return $val;
}

// Pipeline pre_syndication 
function execute_pipeline_pre_syndication($val){
return $val;
}

// Pipeline post_syndication 
function execute_pipeline_post_syndication($val){
return $val;
}

// Pipeline pre_indexation 
function execute_pipeline_pre_indexation($val){
return $val;
}

// Pipeline requete_dico 
function execute_pipeline_requete_dico($val){
return $val;
}

// Pipeline agenda_rendu_evenement 
function execute_pipeline_agenda_rendu_evenement($val){
return $val;
}

// Pipeline taches_generales_cron 
function execute_pipeline_taches_generales_cron($val){
return $val;
}

// Pipeline calculer_rubriques 
function execute_pipeline_calculer_rubriques($val){
return $val;
}

// Pipeline forms_types_champs 
function execute_pipeline_forms_types_champs($val){
return $val;
}

// Pipeline forms_bloc_edition_champ 
function execute_pipeline_forms_bloc_edition_champ($val){
return $val;
}

// Pipeline forms_update_edition_champ 
function execute_pipeline_forms_update_edition_champ($val){
return $val;
}

// Pipeline forms_label_details 
function execute_pipeline_forms_label_details($val){
return $val;
}

// Pipeline forms_input_champs 
function execute_pipeline_forms_input_champs($val){
return $val;
}

// Pipeline forms_ajoute_styles 
function execute_pipeline_forms_ajoute_styles($val){
return $val;
}

// Pipeline forms_pre_remplit_formulaire 
function execute_pipeline_forms_pre_remplit_formulaire($val){
return $val;
}

// Pipeline forms_pre_edition_donnee 
function execute_pipeline_forms_pre_edition_donnee($val){
return $val;
}

// Pipeline forms_post_edition_donnee 
function execute_pipeline_forms_post_edition_donnee($val){
return $val;
}

// Pipeline forms_valide_conformite_champ 
function execute_pipeline_forms_valide_conformite_champ($val){
return $val;
}

// Pipeline forms_message_complement_post_saisie 
function execute_pipeline_forms_message_complement_post_saisie($val){
return $val;
}

// Pipeline forms_calcule_valeur_en_clair 
function execute_pipeline_forms_calcule_valeur_en_clair($val){
return $val;
}

// Pipeline definir_session 
function execute_pipeline_definir_session($val){
$val = minipipe('Forms_definir_session', $val);
return $val;
}


?>