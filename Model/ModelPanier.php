<?php 
require_once 'Model/Model.php';
class panier extends Model
{
	protected $pdo;

        //INSERT Article Panier(liste_commande)
public function insertPanier($id_produit,$id_utilisateur,$quantite,$prix){
    $sql ="INSERT INTO liste_commande 
    SET id_produit=:id_produit, id_utilisateur=:id_utilisateur,quantite=:quantite,prix=:prix";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(compact('id_produit','id_utilisateur','quantite','prix'));
    }
   
    //Update quantite
public function updateQuantite($quantite, $id_produit, $id_utilisateur, $update_price){
    $sql = "UPDATE liste_commande SET quantite=:quantite, prix=:prix  WHERE id_produit=:id_produit AND id_utilisateur=:id_utilisateur";
    $stmt= $this->pdo->prepare($sql);
	$stmt->execute([
        'id_produit' => $id_produit,   
        'quantite' => $quantite,
        'id_utilisateur' => $id_utilisateur,
        'prix' => $update_price
    ]);

}
//SI UTILISATEUR A DEJA UN PANIER
public function panierExist($id_utilisateur){
    $stmt = $this->pdo->prepare("SELECT id_utilisateur, id_produit, quantite, prix FROM liste_commande WHERE id_utilisateur=:id_utilisateur");
    $stmt->execute(['id_utilisateur' => $id_utilisateur]);
    if($stmt->rowCount() > 0){
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else 
        return false ;
    }

//SELECT ALL PANIER UTILISATEUR
public function getPanier($id_utilisateur){
    $sql ="SELECT produits.id, produits.nom,liste_commande.prix,produits.image_url,liste_commande.quantite 
        FROM produits 
        INNER JOIN liste_commande ON produits.id = liste_commande.id_produit
        WHERE id_utilisateur=:id_utilisateur";  
    $stmt= $this->pdo->prepare($sql);
    $stmt->execute([
        'id_utilisateur' => $id_utilisateur
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//DELETE LIGNE PANIER SUR ligne_commande ou est id_utilisateur egale a id_produits
public function deletePanier($id_utilisateur, $id_produit){
$sql = "DELETE FROM liste_commande WHERE id_utilisateur =:id_utilisateur AND id_produit=:id_produit";
$stmt= $this->pdo->prepare($sql);
	$stmt->execute([
        'id_utilisateur' => $id_utilisateur,
        'id_produit' => $id_produit
    ]);
}


    public function produitExistInPanier($panier,$id_produit)
    {
        for($x=0;isset($panier[$x]);$x++)
        {
            //SI IL Y A DEJA LE PRODUITS
            if($panier[$x]['id_produit']==$id_produit)
            {
                return $panier[$x]['quantite'];
            }
            
        }
        return false;
    }

    public function getActualPrice($panier, $id_produit)
    {
        for($x=0;isset($panier[$x]);$x++)
        {
            //SI IL Y A DEJA LE PRODUITS
            if($panier[$x]['id_produit']==$id_produit)
            {
                return (int)$panier[$x]['prix'];
            }
            
        }
        return false;
    }

    public function totalPanier($id_utilisateur)
    {
        $sql ="SELECT  FROM produits 
        INNER JOIN liste_commande ON produits.id = liste_commande.id_produit
        WHERE id_utilisateur=:id_utilisateur";  
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([
            'id_utilisateur' => $id_utilisateur
        ]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function getPrice($id_produit)
    {
        $sql ="SELECT prix 
            FROM produits 
        WHERE id = ?" ;
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute(array($id_produit));
        $result = $stmt->fetch();

            return (int)$result['prix'];
        
    }
    public function getTotal($id_utilisateur)
    {
        $stmt = $this->pdo->prepare("SELECT prix FROM liste_commande WHERE id_utilisateur=:id_utilisateur");
        $stmt->execute(['id_utilisateur' => $id_utilisateur]);

        $result = $stmt->fetchAll(PDO::FETCH_NUM);
        return $result;
         
    }

    public function calculTotal($panier)
    {
        $y =0;
        $x =0;
        $result =0;
        for($x=0;isset($panier[$x][$y]);$x++)
        {
           $result += (int)$panier[$x][$y];
            
        }
        return $result;
    }

    //PAIEMENT SUCCESS
    public function paiementSucces($id_produit,$id_utilisateur,$quantite,$prix){
    $sql ="INSERT INTO liste_commande 
    SET id_produit=:id_produit, id_utilisateur=:id_utilisateur,quantite=:quantite,prix=:prix";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(compact('id_produit','id_utilisateur','quantite','prix'));
    }
}