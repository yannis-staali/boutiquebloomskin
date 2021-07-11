<?php
require_once'Controleur.php';

class ControleurCheckout extends Controleur
{
	protected $user;
	protected $adminproduits;
    protected $panier;

	public function route_checkout(){


        if(isset($_SESSION['user']['id'])) 
        {
            // On regarde s'il a deja un panier
            $checkPanier = $this->panier->panierExist($_SESSION['user']['id']);

            // si un panier existe 
            if($checkPanier !== false) 
            {
                //La variable $Panier (qui recupere les données) est utilisé dans la vueProduit pour afficher le contenu du panier
                $Panier = $this->panier->getPanier($_SESSION['user']['id']);

                //on recupère le prix total
                $total = $this->panier->getTotal($_SESSION['user']['id']);

                $total_calcul = $this->panier->calculTotal($total);

                
            }
        }

        
		require 'Vue/vueCheckout.php';
	}
}