<?php

function formulaires_multietapes_charger_dist() {
	$valeurs = array();
	// si auteur signe, on recupere les coordonnees.
	if ($GLOBALS['visiteur_session']['email']){
		$valeurs['email'] = $GLOBALS['visiteur_session']['email'];
		$valeurs['nom'] = $GLOBALS['visiteur_session']['nom'];
		$valeurs['prenom'] = $GLOBALS['visiteur_session']['prenom'];
	}else{
		$valeurs['email'] = '';
		$valeurs['nom'] = '';
		$valeurs['prenom'] = '';
	}
	if (_request('_etape')> 1){
		$valeurs['titre_toto'] = $ENV['titre_toto'];
		$valeurs['prenom'] = 'recharge 2';
	}
	
	$valeurs['_etapes'] = 2;
	
	return $valeurs;
}

function formulaires_multietapes_verifier_1_dist($email) {
	$erreurs = array();

	// verifier que les champs obligatoires sont bien la :
	foreach(array('titre_toto','email') as $obligatoire)
	if (!_request($obligatoire)) $erreurs[$obligatoire] = 'Ce champ est obligatoire';
	 
	// verifier que si un email a ete saisi, il est bien valide :
	include_spip('inc/filtres');
	if (_request('email') AND !email_valide(_request('email')))
		$erreurs['email'] = 'Cet email n\'est pas valide';
	
	if (count($erreurs))
		$erreurs['message_erreur'] = 'Votre saisie contient des erreurs !';
	
	$valeurs['prenom'] = 'recharge';
	// si le controle est Ok, le tableau $erreurs est vide.
	//		sinon le passage a l'etape suivante ne se fait pas !!
	return $erreurs;
}

function formulaires_multietapes_verifier_2_dist($email) {
	$erreurs = array();

	//verifier que les champs obligatoires sont bien la :
	foreach(array('nom') as $obligatoire)
	if (!_request($obligatoire)) $erreurs[$obligatoire] = 'Ce champ est obligatoire';
	
	if (count($erreurs))
		$erreurs['message_erreur'] = 'Votre saisie contient des erreurs !';
	
	return $erreurs;
}

function formulaires_multietapes_traiter_dist($email) {
	
	return array('message_ok'=>'traiter ok','editable'=>true);
}

?>