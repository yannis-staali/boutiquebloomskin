<?php
require_once 'Model/Model.php';
class user extends Model
{
	protected $pdo;
//INSERT USER inscription
public function exists($login){
	$stmt = $this->pdo->prepare("SELECT login FROM utilisateurs WHERE login = :login");
    $stmt->execute(['login' => $login]);
    if($stmt->rowCount() > 0){
        return -1;
    } else 
        return 1;
 }

public function insertUser($login, $email, $password, $id_droits){
	$query = $this->pdo->prepare('INSERT INTO utilisateurs SET login = :login, email = :email, password = :password, id_droits = :id_droits');
	$query->execute(compact('login', 'email', 'password', 'id_droits'));
}

//SELECT USER connexion
public function userViaLogin($login){
 	$sql = "SELECT id, id_droits, login, email, password FROM utilisateurs WHERE login = :login";
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute(['login' => $login]);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	if(!$user){
		return false;
	}
	else{
		return $user;
		}
	}
//UPDATE USER profil
public function updateUser($login, $email, $password, $id){
	$sql = "UPDATE utilisateurs SET login=:login, email=:email, password=:password WHERE id=:id";
	$stmt= $this->pdo->prepare($sql);
	$stmt->execute(['login' => $login, 'password' => $password, 'email' => $email, 'id' => $id]);
	}



}