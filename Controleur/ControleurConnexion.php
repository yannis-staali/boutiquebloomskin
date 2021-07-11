<?php
require_once'Controleur.php';
class ControleurConnexion extends Controleur
{
	protected $user;

	public function route_connexion()
	{

		$error = [
			'empty' => '',                                                      
			'login' => '',
			'password' => ''
		];

		if(isset($_POST['submit']))
		{
			if(empty($_POST['login']) || empty($_POST['password']))
			{
				$error['empty'] = "<span>Champs vide</span>";
			}
			$login = htmlspecialchars($_POST['login']);

			//select en bdd du login si il existe

			$user = $this->user->userViaLogin($login);

			if($user===false)
			{
				$error['login'] = "<span>Login invalid</span>";
			}
			$password = htmlspecialchars($_POST['password']);

			//verifie password rentrer avec passsword_hash du select au dessus
			if($user!=false)
			{
				if(parent::Verifypass($password, $user['password'])===false)
				{
					$error['password'] = "<span>Password invalid</span>";
				}	
			}
			if(array_filter($error))
			{
			}
			else
			{
				$_SESSION['user']['id'] = $user['id'];
				$_SESSION['user']['login'] = $user['login'];
				$_SESSION['user']['email'] = $user['email'];
				$_SESSION['user']['password'] = $password;
				$_SESSION['user']['droits'] = $user['id_droits'];
				parent::Redirect("accueil");
			}
		}
		require 'Vue/vueConnexion.php';
	}

}