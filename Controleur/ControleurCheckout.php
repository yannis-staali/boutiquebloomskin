<?php
require_once'Controleur.php';

class ControleurCheckout extends Controleur
{
	protected $user;
	protected $adminproduits;
    protected $panier;

	public function route_checkout()
    {
        $error = [
			'update' => ''                                                   
		];

        if(isset($_SESSION['user']['id'])) 
        {
            // On regarde s'il a deja un panier
            $checkPanier = $this->panier->panierExist($_SESSION['user']['id']);

            // echo'<pre>';
            // var_dump($checkPanier);
            // echo'<pre>';

            // si un panier existe 
            if($checkPanier !== false) 
            {

                    for($i=0; $i<count($checkPanier); $i++)
                    {
                        (int)$checkStock = $this->panier->checkQuantite($checkPanier[$i]['id_produit']);
        
                        // echo'<pre>';
                        // var_dump($checkStock);
                        // echo'<pre>';
        
                        if($checkStock < $checkPanier[$i]['quantite'])
                        {
                            (int)$getPrice = $this->panier->getPrice($checkPanier[$i]['id_produit']);
                            $newPrice = $getPrice * $checkStock;
        
                            // var_dump($getPrice);
                            // echo 'prix : '.$getPrice;
                            // echo'stock insuffisant';
        
                            $update = $this->panier->updateQuantite($checkStock, $checkPanier[$i]['id_produit'], $_SESSION['user']['id'], $newPrice);
        
                            $error['update'] = "<p>Qunatités en stock insuffisantes, quantités mises à jour</p>";
        
                        }
        
                    
                        
                    }

                    $checkPanier = $this->panier->panierExist($_SESSION['user']['id']);

                    //La variable $Panier (qui recupere les données) est utilisé dans la vueProduit pour afficher le contenu du panier
                    $Panier = $this->panier->getPanier($_SESSION['user']['id']);

                    //on recupère le prix total
                    $total = $this->panier->getTotal($_SESSION['user']['id']);

                    $total_calcul = $this->panier->calculTotal($total);

                
            }
            else {
                header("Location: index.php?page=accueil");
            }

           
        

        }
        else {
            header("Location: index.php?page=accueil");
        }

        
		require 'Vue/vueCheckout.php';
	}
}