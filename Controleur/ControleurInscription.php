<?php
require_once'Controleur.php';

class ControleurInscription extends Controleur
{
	protected $user;

	public function route_inscription()
	{
		$error = [
			'empty' => '', 
			'email' => '',                                                     
			'login' => '',
			'password' => ''
		];
		if(isset($_POST['submit']))
		{
			//si vide      
			if(empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2']))
			{
				$error['empty'] = "<span>Champs vide</span>";
			}
			//pregmatch pour login
			$pattern = "/^\S*[a-z,A-Z,0-9]{4,}\S*/";
			if(!preg_match($pattern, $_POST['login'])){
				$error['login'] = "<span>commence bien au début, 4 caractéres minimum, majuscule,minuscules,chiffres autorisées</span>";
			}
			//si il existe en bdd
			if($this->user->exists($_POST['login'])===-1)
			{
				$error['login'] = "<span>Login deja pris</span>";
			}
			
			//si email non valide
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			{
				$error['email'] = "<span>Saisissez un email valide</span>";
			}

			
			$password = htmlspecialchars($_POST['password2']);
			//pregmatch pour password
			if(!preg_match($pattern, $password)){
				$error['password'] = "<span>commence bien au début, 4 caractéres minimum, majuscule,minuscules,chiffres autorisées</span>";
			}
			//on définit les variables rentrée 
			$login = htmlspecialchars($_POST['login']);
			$email = htmlspecialchars($_POST['email']);
			$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
			//Si les mdp ne corresponde pas
			if(parent::Verifypass($password, $password_hash)===false)
			{
				$error['password'] = "<span>Mot de passe non identique</span>";
			}
			if(array_filter($error))
			{
			}
			else
			{
				$droits = 1;
				$this->user->insertUser($login, $email, $password_hash, $droits);
				parent::Redirect("connexion");
			}
		}
		require 'Vue/vueInscription.php';
	}


}