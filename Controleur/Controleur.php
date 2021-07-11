<?php
require_once'Model/ModelUser.php';
require_once'Model/ModelAdmin.php';
require_once'Model/ModelAdminUser.php';
require_once'Model/ModelAdminProduits.php';
require_once'Model/ModelAdminCategories.php';
require_once'Model/ModelProduct.php';
require_once'Model/ModelPanier.php';
class Controleur
{

	protected $user;
	protected $admin;
	protected $adminuser;
	protected $adminproduits;
	protected $admincategories;
	protected $adminregions;
	protected $product;
	protected $panier;

	public function __construct()
	{
		$this->admincategories = new admincategories();
		$this->adminproduits = new adminProduits();
		$this->adminuser =new adminUser();
		$this->user = new user(); 
		$this->admin = new admin();
		$this->product = new product();
		$this->panier = new panier();
	}

	public static function Redirect(string $url)
	{
		header("Location: index.php?page=".$url."");
		exit();
	}

	public function Verifypass($password, $password_hash){
		if(password_verify($password, $password_hash) === false)
		{
			return false;
		}
		else
			return true;
	}
	public function notAdmin($droits){
		if($droits!=909)
		{
			return false;
		}
		else
		return true;
	}
	

	public function produitExistInCookie($id_produit,$items){
		ksort($items);
		$reindexe = array();
		$index = 0;
		//var_dump($items);
		foreach($items as $cle => $value){
			$reindexe[$index] = $items[$cle];
			$index++;
			for($v=0;isset($reindexe[$v]);$v++){
			$item = explode("__",$reindexe[$v]);
				for($x=0;isset($item[$x]);$x++){
					if($x%4==0){
						if($id_produit==$item[$x]){
							$p = $x +2;
					 			return $item = [$cle,$item[$x],$item[$p]];
					}
				}
			}
		}
	}
								return false;
}

//recupere tout les items du panier dans les cookie fait une requete au produits via l'id
	public function recupPanierInCookie($itemsPanier){
		
		ksort($itemsPanier);
		$reindexe = array();
		$index = 0;
		foreach($itemsPanier as $cle => $value){
			$reindexe[$index] = $itemsPanier[$cle];
			$index++;
			$viewPanierCookie = "<h1>PANIER COOKIE</h1><br>";
		//TOUT DOIT PASSER PAR ICI
		for($z=0;isset($reindexe[$z]);$z++)
		{
			$item = explode("__",$reindexe[$z]);
				for($a=0;isset($item[$a]);$a++)
				{
					if($a%4==0)
					{
						$id_produit = $item[$a];
						//REQUETE VIA ID DES PRODUITS nom image ect AJOUTER IMAGE PAR ICI///////
						$request = $this->product->selectPanierCookie($item[$a]);
						$viewPanierCookie.= "<p>
											".$request['nom']."<br>
											prix:".$request['prix']."<br>
											";
					}
					if($a%4==1)
					{
					$id_utilisateurCookie = $item[$a];
					}
					if($a%4==2)
					{
					$id_quantiteCookie = $item[$a];
					$viewPanierCookie.= "
										quantite:".$id_quantiteCookie."
										<a href='index.php?page=produits&update=".$id_produit.'__'.$id_utilisateurCookie.'__'.$id_quantiteCookie."'>+1</a><br>
										<a href='index.php?page=produits&delete=".$id_produit."'>DELETE</a>
										</p>";
					}
					if($a%4==3)
					{
					$id_statutcookie = $item[$a];
					}
					
			}	
    	}
	}
		$viewPanierCookie.="
							<form action='index.php?page=checkout' method='POST'>
							<button name='id_user' value='".$id_utilisateurCookie."'>Passer votre commande</button>
							</form>
							<br><br><br>";
		return $viewPanierCookie;
	}
}