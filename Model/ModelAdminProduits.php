<?php
require_once 'Model/ModelAdmin.php';
class adminProduits extends admin
{
	protected $pdo;

//INSERT
public function insertProduct($nom,$description,$prix,$image_name, $stock, $id_categorie){
	$sql = "INSERT INTO produits SET nom=:nom, description=:description, prix = :prix, image_url=:image_url, stock = :stock, id_categorie=:id_categorie";
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute([
		'nom' => $nom,
		'description' => $description,
		'prix' => $prix,
		'image_url' => $image_name,
		'stock' => $stock,
		'id_categorie' => $id_categorie
	]);
}
//SELECT ALL
public function selectAllProduct(){
	$sql = "SELECT * FROM produits";
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute();
	while($products = $stmt->fetchAll(PDO::FETCH_ASSOC)){
		return $products;
	}
}
//UPDATE PRODUCT
public function updateProduct($id, $nom, $description, $prix, $stock, $id_categorie){
	$sql = "UPDATE produits 
			SET nom=:nom, description=:description, prix=:prix, stock=:stock,id_categorie=:id_categorie
			WHERE id = '$id' ";
	$stmt= $this->pdo->prepare($sql);
	$stmt->execute(array('nom' => $nom,
	'description' => $description,
	'prix' => $prix,
	'stock' => $stock,
	'id_categorie' => $id_categorie));
}
//DELETE PRODUCT
public function deleteProduct($image_url){
	$sql = "DELETE FROM produits WHERE image_url = :image_url";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([
            'image_url' => $image_url
                       ]);
	}
}