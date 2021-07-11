<?php

//Ce script s'occupe de traiter les informations une fois que la commande à été validé par l'API STRIPE

if(isset($_POST['paiement']))
{
	//on recupère l'id client pour récupérer son apnier
	$idClient = htmlspecialchars($_POST['idUser']) ;

	//on établie la connexion
    $connexion = new PDO('mysql:host=localhost;dbname=boutique;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	//On récupère les données de facturation/livraison 
	$nom = htmlspecialchars($_POST['nom']) ;
	$prenom = htmlspecialchars($_POST['prenom']) ;
	$telephone = htmlspecialchars($_POST['telephone']) ;
	$email = htmlspecialchars($_POST['email']) ;
	$addresse = htmlspecialchars($_POST['adresse']) ;
	$ville = htmlspecialchars($_POST['ville']) ;
	$departement = htmlspecialchars($_POST['departement']) ;
	$codepostal = htmlspecialchars($_POST['codepostal']) ;
	$pays = htmlspecialchars($_POST['pays']) ;

	$idCommande = $_POST['idCommande'] ;

	//On insère les informations dans la table client commande (qui liste les commandes confirmées)
	$query = $connexion->prepare("INSERT INTO client_commande (nom, prenom, telephone, email, addresse, ville, departement, code_postal, pays, id_utilisateur, id_commande) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute(array($nom, $prenom, $telephone, $email, $addresse, $ville, $departement, $codepostal, $pays, $idClient, $idCommande));

	/////////////
	$sql ="UPDATE liste_commande 
	SET id_commande = '$idCommande'
	WHERE id_utilisateur= {$idClient}
	AND id_commande IS NULL";
	
	$stmt = $connexion->prepare($sql);
	$stmt->execute();
		

	
}
?>