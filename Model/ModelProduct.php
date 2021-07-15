<?php
require_once 'Model/Model.php';
class product extends Model
{
        protected $pdo;
    //INNER JOIN ALL produits avec categorie et region
public function selectAllProducts(){
	$sql = "SELECT produits.id,produits.nom,produits.description,produits.prix,produits.image_url,produits.stock,categories.nom_categorie
			FROM produits 
			INNER JOIN categories ON produits.id_categorie = categories.id
			ORDER BY id DESC
			";
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute();
	while($allproducts = $stmt->fetchAll(PDO::FETCH_ASSOC)){
		return $allproducts;
	    }
    }

//SELECT ALL FOR COOKIE
	public function selectPanierCookie($id){
			$sql = "SELECT produits.nom,produits.description,produits.prix,
						   produits.image_url,produits.stock,categories.nom_categorie,
						   regions.nom_region 
					FROM produits,categories,regions 
					WHERE produits.id=:id
					AND produits.id_categorie = categories.id 
					
					";
			$stmt = $this->pdo->prepare($sql);
			//le BINDPARAM: peut etre moddifié
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			$item = $stmt->fetch(PDO::FETCH_ASSOC);
			if(!$item)
			{
				return false;
			}
			else
			{
				return $item;
			}
		}

/////SELECT PRODUCT VIA ID FOR UPDATE
public function selectProduct($id){
	$sql = "SELECT produits.id_categorie, produits.id, produits.nom, produits.description, produits.prix, produits.image_url, produits.stock, categories.nom_categorie
	FROM produits
	INNER JOIN categories ON produits.id_categorie = categories.id
	WHERE produits.id = $id
	";
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute();
	$userid = $stmt->fetch(PDO::FETCH_ASSOC);
	if(!$userid)
	{
		return false;
	}
	else
	{
		return $userid;
	}
}

/////SELECT PRODUCT ET CATEGORIE ET REGION VIA ID POUR PRODUIT DETAIL
public function selectProductDetailsId($id){
	$sql = "SELECT produits.id,produits.nom,produits.description,produits.prix,produits.image_url,produits.stock,categories.nom_categorie
	FROM produits
	INNER JOIN categories ON produits.id_categorie = categories.id
	WHERE produits.id = ?
	";	
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute(array($id));
	$userid = $stmt->fetch(PDO::FETCH_ASSOC);
	if(!$userid)
	{
		return false;
	}
	else
	{
		return $userid;
	}
}
//SELECT PRODUCT WHERE CATEGORIE
public function selectProductWhereCategories($id_categorie){
	$sql="SELECT produits.id,produits.nom,produits.description,produits.prix,produits.image_url,produits.stock,categories.nom_categorie
		  FROM produits
		  INNER JOIN categories ON produits.id_categorie = categories.id
		  WHERE produits.id_categorie = :id_categorie
		--   WHERE produits.id_categorie = categories.id";
		$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':id_categorie', $id_categorie, PDO::PARAM_INT);
			$stmt->execute();
			$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $products;
			}
public function selectProductWhereRegions($id_region){
	$sql="SELECT produits.id,produits.nom,produits.description,produits.prix,produits.image_url,produits.stock,categories.nom_categorie,regions.nom_region 
	FROM produits,categories,regions 
	WHERE produits.id_region = :id_region 
	AND produits.id_region = regions.id 
	AND produits.id_categorie = categories.id";
		$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':id_region', $id_region, PDO::PARAM_INT);
			$stmt->execute();
			$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $products;
			}

	public function selectProductBoth($categorie, $id_region)
	{
		$sql="SELECT *
			FROM produits
			INNER JOIN categories ON produits.id_categorie = categories.id
			INNER JOIN regions ON produits.id_region = regions.id
			
			WHERE categories.id = $categorie;
			AND regions.id = $id_region";
			

		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $products;
	}

	public function getBoth($region, $categorie)
	{
		$pdo = new PDO('mysql:host=localhost;dbname=boutique;charset=utf8', 'root', '',[
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		
					]);
					
		$sql="SELECT produits.image_url, produits.nom, produits.description, produits.prix, produits.id, regions.nom_region, categories.nom_categorie
			FROM produits
			INNER JOIN regions ON produits.id_region = regions.id
			INNER JOIN categories ON produits.id_categorie = categories.id
			WHERE produits.id_region = $region
			AND produits.id_categorie = $categorie";
			

		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $products;
	}

	public function searchProduct($search)
	{
		$sql = "SELECT produits.id,produits.nom,produits.description,produits.prix,produits.image_url,produits.stock,categories.nom_categorie
		FROM produits 
		INNER JOIN categories ON produits.id_categorie = categories.id
		WHERE produits.nom LIKE '{$search}%'";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		while($allproducts = $stmt->fetchAll(PDO::FETCH_ASSOC)){
			return $allproducts;
			}
		}
}