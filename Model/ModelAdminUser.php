<?php 
require_once 'Model/ModelAdmin.php';
class adminUser extends admin
{
	protected $pdo;

//SELECT ALL USER
public function selectalluser(){
    $sql = "SELECT id, login, email, password, id_droits FROM utilisateurs";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    while($user = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        return $user;
    }
}

//SELECT USER VIA ID
public function selectViaId($id){
$sql = "SELECT id, login, email, password, id_droits FROM utilisateurs WHERE id = :id";
$stmt = $this->pdo->prepare($sql);
$stmt->execute([
    'id' => $id
]);
$userid = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$userid)
{
    return false;
}
    else
    {
    return $userid;
    }
}

//DELETE USER VIA ID
public function deleteUser($id){
$sql = "DELETE FROM utilisateurs WHERE id = :id";
    $stmt= $this->pdo->prepare($sql);
    $stmt->execute([
        'id' => $id
                   ]);
}
//UPDATE USER VIA ID
public function updateUser($login, $email, $password, $id_droits, $id){
	$sql = "UPDATE utilisateurs SET login=:login, email=:email, password=:password, id_droits=:id_droits WHERE id=:id";
	$stmt= $this->pdo->prepare($sql);
	$stmt->execute(['login' => $login, 'password' => $password, 'email' => $email, 'id_droits' => $id_droits, 'id' => $id]);
	}

}