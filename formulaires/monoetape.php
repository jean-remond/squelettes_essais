<?php

function formulaires_monoetape_charger_dist() {
	$valeurs = array();
	
	echo "<br />DEBUG esox JR : monoetape.php - formulaires_monoetape_charger_dist - Pt02 - <br />";
	echo "valeurs= <br />"; var_dump($valeurs); echo ".<br />";
	echo "<br />FIN DEBUG esox JR : monoetape.php - formulaires_monoetape_charger_dist - Pt02 - <br />";
	
	return $valeurs;
}

function formulaires_monoetape_verifier_dist() {
	$erreurs = array();

	echo "<br />DEBUG esox JR : monoetape.php - formulaires_monoetape_verifier_dist - Pt02 - <br />";
	echo "camembert= "; _request('camembert'); echo ".<br />";
	echo "request_1= "; _request(1); echo ".<br />";
	echo "request_2= "; _request(2); echo ".<br />";
	echo "request_3= "; _request(3); echo ".<br />";
	echo "erreurs= <br />"; var_dump($erreurs); echo ".<br />";
	echo "<br />FIN DEBUG esox JR : monoetape.php - formulaires_monoetape_verifier_dist - Pt02 - <br />";
	
	return $erreurs;
}


function formulaires_monoetape_traiter_dist() {

	$retour=array();
	
	// retour classique sur meme ecran :
	$retour['camembert']=_request(camembert);
	$retour['message_ok']='traiter ok';
	$retour['editable']=true;

	echo "<br />DEBUG esox JR : monoetape.php - formulaires_monoetape_traiter_dist - Pt80 - <br />";
	echo "retour= <br />"; var_dump($retour); echo ".<br />";
	echo "<br />FIN DEBUG esox JR : monoetape.php - formulaires_monoetape_traiter_dist - Pt80 - <br />";
	
	// redirection vers => spip.php?page=evenement_part&var1=d1&var2=d2 :
	// voir http://code.spip.net/@generer_url_public
	$parametre_url=array( 'var_mode' => 'debug', 'camembert' => _request(camembert) );
	$url = generer_url_public('essais/multietapes_appel',$parametre_url);

	echo "<br />DEBUG esox JR : monoetape.php - formulaires_monoetape_traiter_dist - Pt82 - <br />";
	echo "url= <br />"; var_dump($url); echo ".<br />";
	echo "<br />FIN DEBUG esox JR : monoetape.php - formulaires_monoetape_traiter_dist - Pt82 - <br />";
        
	$retour[redirect]=$url;

	echo "<br />DEBUG esox JR : monoetape.php - formulaires_monoetape_traiter_dist - Pt99 - <br />";
	echo "retour= <br />"; var_dump($retour); echo ".<br />";
	echo "<br />FIN DEBUG esox JR : monoetape.php - formulaires_monoetape_traiter_dist - Pt99 - <br />";
	
	return $retour;
}

?>