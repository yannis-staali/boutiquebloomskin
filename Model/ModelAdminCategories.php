<?php 
require_once 'Model/ModelAdmin.php';
class admincategories extends admin
{
	protected $pdo;

//INSERT
public function insertCategorie($nom_categorie){
    $query = $this->pdo->prepare('INSERT INTO categories SET nom_categorie=:nom_categorie');
	$query->execute(compact('nom_categorie'));
}
//SELECTALL
public function selectAllCategories(){
    $sql = "SELECT * FROM categories";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    while($categories = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        return $categories;
    }
}

//SELECT SOLO CATEGORIE VIA ID
public function selectCategorie($id){
    $sql = "SELECT id, nom_categorie FROM categories WHERE id=:id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
		'id' => $id
	]);
	$categori = $stmt->fetch(PDO::FETCH_ASSOC);
	if(!$categori)
	{
		return false;
	}
	else
	{
		return $categori;
	}

}

//UPDATE CATEGORIE
public function updateCategorie($id_categorie,$nom_categorie){
    $sql = "UPDATE categories SET nom_categorie =:nom_categorie WHERE id=:id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        'id' => $id_categorie,
        'nom_categorie' => $nom_categorie
    ]);
}
//DELETE CATEGORIE
public function deleteCategorie($id){
    $sql = "DELETE FROM categories WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);
}

	
}