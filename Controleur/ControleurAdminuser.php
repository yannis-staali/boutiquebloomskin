<?php
require_once'Controleur.php';

class ControleurAdminUser extends Controleur
{
    protected $adminuser;

	public function route_adminUser(){
        $error = [
            'empty' => ''
        ];
        $success = [
            'update' => '',
            'delete' => ''
        ];
        if(!isset($_POST['update'])){
        $user = $this->adminuser->selectalluser();
        }   
        //si ADMIN appuie SUR UPDATE
        if(isset($_POST['update'])){
            $id_utilisateur = intval($_POST['update']);
            $userUpdate = $this->adminuser->selectViaId($id_utilisateur);
        }

        //ADMIN UPDATE
        if(isset($_POST['updateUser'])){
            if(empty($_POST['id']) || empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['id_droits']))
            {
                $error['empty'] = "<span>Il y a des champs vide</span>";
            }
            else
            {
                $login = htmlspecialchars($_POST['login']);
                $email = htmlspecialchars($_POST['email']);
                $password = $_POST['password'];
                $id_droits = intval($_POST['id_droits']);
                $id = intval($_POST['id']);
                $this->adminuser->updateUser($login,$email,$password,$id_droits, $id);
                $success['update'] = "<span>L'utilisateur va être modifié dans 3 2 1 0</span>";
                header("refresh: 2;");
            }
        }
        //ADMIN DELETE
        if(isset($_POST['delete'])){
            $accept = "<span>ETES VOUS SUR DE VOULOIR EFFACER ID n° ".$_POST['delete']."</span><br>
            <form action='index.php?page=adminuser' method='POST'>
            <button type='submit' name='accept' value='".$_POST['delete']."'>OUI</button>
            <button type='submit' name='non' value='0'>NON</button>
            </form>";
        }
        //ADMIN ACCEPT DELETE
        if(isset($_POST['accept'])){
            $this->adminuser->deleteUser($_POST['accept']);
            $success['delete'] = "<span>L'utilisateur va être supprimé dans 3 2 1 0</span>";
            header("refresh: 2;");
        }
        if(isset($_POST['non'])){
            echo"Ok calme toi";
        }
        //GERER TABLEAU ERROR 1 SUCCESS
        if(array_filter($success))
        {
        }
        if(array_filter($error))
        {
        }
        require'Vue/vueAdminUser.php';
    }
}