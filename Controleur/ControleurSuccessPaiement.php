<?php
require_once'Controleur.php';
class ControleurSuccessPaiement extends Controleur
{
	protected $user;

	public function route_succesPaiement()
	{


        require 'Vue/vueSuccessPaiement.php';
    }

}