<?php
session_start();
require_once'Controleur/ControleurInscription.php';
require_once'Controleur/ControleurConnexion.php';
require_once'Controleur/ControleurAccueil.php';
require_once'Controleur/ControleurProfil.php';
require_once'Controleur/ControleurAdmin.php';
require_once'Controleur/ControleurAdminuser.php';
require_once'Controleur/ControleurAdminproduits.php';
require_once'Controleur/ControleurAdmincategories.php';
require_once'Controleur/ControleurAdminCommandes.php';
require_once'Controleur/ControleurProduct.php';
require_once'Controleur/ControleurCheckout.php';
require_once'Controleur/ControleurPaiement.php';
require_once'Controleur/ControleurSuccessPaiement.php';



class Routeur
{
	public function routerRequete()
	{
		if(isset($_GET['page']))
		{
			if($_GET['page'] == 'accueil'){
				$accueil = new ControleurAccueil();
				$accueil->route_accueil();
			}
			if($_GET['page'] == 'inscription')
			{
				$inscription = new ControleurInscription();
				$inscription->route_inscription();
			}
			if($_GET['page'] == 'connexion')
			{
				 $connexion = new ControleurConnexion();
                 $connexion->route_connexion();
			}
			if($_GET['page'] == 'profil')
			{
				$profil = new ControleurProfil();
				$profil->route_profil();
			}
			if ($_GET['page'] == 'deconnexion')
                {
                    require_once'Controleur/ControleurDeconnexion.php';
				}
			if ($_GET['page'] == 'admin')
                {
                    $admin = new ControleurAdmin();
					$admin->route_admin();
                }
			if($_GET['page'] == 'adminuser')
				{
					$adminuser = new ControleurAdminUser();
					$adminuser->route_adminUser();
				}
			if($_GET['page'] == 'adminproduits')
				{
					$adminproduct = new ControleurAdminProduct();
					$adminproduct->route_adminProduct();
				}
			if($_GET['page'] == 'admincategories')
				{
					$admincategories = new ControleurAdminCategories();
					$admincategories->route_adminCategories();
				}

			if($_GET['page'] == 'adminregions')
				{
					$adminregions = new ControleurAdminRegions();
					$adminregions->route_adminRegions();
				}
			if($_GET['page'] == 'admincommandes')
				{
					$adminregions = new ControleurAdminCommandes();
					$adminregions->route_adminCommandes();
				}
			if($_GET['page'] == 'produits')
				{
					$produits = new ControleurProduct();
					$produits->route_produits();
				}
			if($_GET['page'] == 'checkout')
			{
				$checkout = new ControleurCheckout();
				$checkout->route_checkout();
			}
			if($_GET['page'] == 'thanks')
			{
				$checkout = new ControleurSuccessPaiement();
				$checkout->route_succesPaiement();
			}
			if($_GET['page'] == 'faq')
			{
				require 'Vue/vueFaq.php';
			}
			if($_GET['page'] == 'contact')
			{
				require 'Vue/vueContact.php';
			}
			if($_GET['page'] == 'paiement')
			{
				$checkout = new ControleurPaiement();
				$checkout->route_paiement();
			}
		}
		else{
				$accueil = new ControleurAccueil();
                $accueil->route_accueil();
		}
	}
}