<?php
require_once'Controleur.php';

class ControleurAdmin extends Controleur
{
    protected $user;
    protected $admin;

	public function route_admin(){

        
        //VERIF ADMIN
        if(parent::notAdmin($_SESSION['user']['droits'])===false){
            parent::Redirect("accueil");
        }
        require'Vue/vueAdmin.php';
	}
}