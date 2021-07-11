<?php

// if(isset($_POST['ville']))
// {
// 	$ville = $_POST['ville'] ;
// 	echo $ville;
// 	die();
// }

require_once('vendor/autoload.php');

require_once('Controleur.php');

class Controleurpaiement extends Controleur
{
	protected $user;
	protected $panier;

	public function route_paiement()
	{

		// if(isset($_POST['nom']))
		// {
		// 	$nom = $_POST['nom'] ;
		// 	echo $nom;
		// }

		// if(isset($_POST['successPaiement']))
		// {
		// 	 echo $_POST['successPaiement'];
		// 	// echo $_POST['nom'];

		// }	

		if(isset($_POST['panier_confirmer']))
		{
			$total = $this->panier->getTotal($_SESSION['user']['id']);
			$total_calcul = $this->panier->calculTotal($total);

			// var_dump($total_calcul);

			\Stripe\Stripe::setApiKey('sk_test_51JAYzQJ9WCFPfyUzetAiC5JP2UmbGFEoT5NwElz4j2WZFLgZhQ02DTnZv6COVS5rtJ6yhccPi7JKrv3pvAjOZOhD00yp3uJLFC');

			$intent = \Stripe\PaymentIntent::create([
			'amount' => $total_calcul*100,
			'currency' => 'eur',
			'payment_method_types' => ['card'],
			]);

		}

		$error = [
			'empty' => '',                                                      
			'nom' => '',
			'prenom' => '',
			'telephone' => '',
			'email' => '',
			'adresse' => '',
			'ville' => '',
			'departement' => '',
			'postcode' => '',
			'pays' => '',
		];
		
		// var_dump($_POST['panier_confirmer']);

		if(isset($_POST['submit']))
		{
			foreach ($_POST as $key => $value) {
				if($value == '')
				{
					echo '<pre>';
					echo 'clé :'.$key.' value : VIDE';
					echo '<pre>';
				}
				else {
					echo '<pre>';
					echo 'clé :'.$key.' value : '.$value;
					echo '<pre>';
				}
				
			}
			
			//créer un uniq ID lorsqu'il clique sur paiement
			//ensuite faire une SELECT de toute la liste_commande 
			//faire une INSERT dans la table client_commande avec le même uniq ID 
		}

		require 'Vue/vuePaiement.php';
	}

}