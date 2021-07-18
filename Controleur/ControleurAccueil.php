<?php
require_once'Controleur.php';

class ControleurAccueil extends Controleur
{
	protected $user;
	protected $adminproduits;

	public function route_accueil()
	{


		require 'Vue/vueAccueil.php';
	}
	
}