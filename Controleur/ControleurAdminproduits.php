<?php
require_once'Controleur.php';

class ControleurAdminProduct extends Controleur
{
    protected $adminproduits;
    protected $admincategories;
    protected $adminregions;
    protected $product;

    public function route_adminProduct(){

            //GERE LES ERREURS & SUCCES ADMIN
            $error = [
                'empty' => '',
                'img' => ''
            ];
            $success = [
                'update' => '',
                'delete' => '',
                'product' => ''
            ];

        
//VERIF ADMIN
if(parent::notAdmin($_SESSION['user']['droits'])===false)
{
    parent::Redirect("accueil");
}
$product = 1;
if(!isset($_POST['updateProduct'])){
$allProducts = $this->adminproduits->selectAllProduct();
$categories = $this->admincategories->selectAllCategories();
// $regions = $this->adminregions->selectAllRegions();
/////////var_dump($categories);//////////AVOIRRRRRR
}

        //SELECT ALL PRODUCT SI IL Y EN A 
    
    if(isset($_POST['updateProduct'])){
        $id_product = intval($_POST['updateProduct']);
        $productUpdates = $this->product->selectProduct($id_product);
    }

    //UPDATE PRODUCT
                    if(isset($_GET['img']))
                    {
                        $_SESSION['product']['url_image'] = $_GET['img'];
                    }
    if(isset($_POST['productUpdate']))
    {
        if(empty($_POST['nom']) || empty($_POST['description']) || empty($_POST['prix']))
        {
            $error['empty'] = "<span>champs vide, minimum nom, description, prix</span>";
        }
        else{

            $nom = htmlspecialchars($_POST['nom']);
            $description = htmlspecialchars($_POST['description']);
            $prix = intval($_POST['prix']);
            $stock = intval($_POST['stock']);
            $id = intval($_POST['id']);
            $categorie = htmlspecialchars($_POST['categorie']);

            $this->adminproduits->updateProduct($id, $nom, $description, $prix, $stock, $categorie);
            $success['product'] = "<span>Le produits a été modifié</span>";
            header("refresh: 2;");
        }

    

        // $file = $_FILES['image'];
        //     $fileName = $_FILES['image']['name'];
        //     $fileTmpName = $_FILES['image']['tmp_name'];
        //     $fileSize = $_FILES['image']['size'];
        //     $fileError = $_FILES['image']['error'];
        //     $fileType = $_FILES['image']['type'];
        //         $nom = htmlspecialchars($_POST['nom']);
        //         $description = htmlspecialchars($_POST['description']);
        //         $prix = intval($_POST['prix']);
        //         $stock = intval($_POST['stock']);
        //         $id = intval($_POST['id']);
        //         $categorie = htmlspecialchars($_POST['categorie']);
        //     if($fileError===0)
        //     {
        //         if($fileSize > 125000)
        //         {
        //             $error['img'] = "<span>Erreur fichier trop volumineux : limite 1MB</span>";
        //         } else {
        //             $img_exe = pathinfo($fileName, PATHINFO_EXTENSION);
        //             $img_exe_str = strtolower($img_exe);

        //             $extension = array("jpg", "jpeg", "png", "svg");
        //             if(in_array($img_exe_str, $extension))
        //             {
        //                 $image_url = uniqid("IMG-", true).'.'.$img_exe_str;
        //                 $img_in_path = 'style/images/image_product/'.$image_url;
        //                 move_uploaded_file($fileTmpName, $img_in_path);
        //                 // $this->adminproduits->updateProduct($id,$nom, $description, $prix,$image_url,$stock,$categorie,$region);
        //                 // $success['product'] = "<span>Le produits a été modifié</span>";
        //                 // header("refresh: 2;");
        //             } else {
        //                 $error['img'] = "<span>L'extension n'est pas supportée elle doit être : jpg, jpeg, png ou svg</span>";
        //             }
        //         }
        //     }
        //     if($fileError===4) {
        //         $image_url = $_SESSION['product']['url_image'];

                
                
        //         $this->adminproduits->updateProduct($id,$nom, $description, $prix, $image_url, $stock, $categorie);

                
        //         $success['update'] = "<span>Le produit a été modifié</span>";
        //         header("refresh: 2;");
        //     } 

        //     echo'<pre>';
        //         var_dump('id : '.$id);
        //         echo'<pre>';
        //         var_dump('nom : '.$nom);
        //         echo'<pre>';
        //         var_dump('description : '.$description);
        //         echo'<pre>';
        //         var_dump('prix : '.$prix);
        //         echo'<pre>';
        //         var_dump('url_image : '.$image_url);
        //         echo'<pre>';
        //         var_dump('stock : '.$stock);
        //         echo'<pre>';
        //         var_dump('categorie : '.$categorie);
        //         echo'<pre>';
        //         echo'<pre>';
        //         print_r('FILES : '.$_FILES['image']['name']);
        //         echo'<pre>';
    }

    //DELETE PRODUCT
    if(isset($_POST['deleteProduct']))
    {
            $accepte = "<span>Etes-vous sûr de vouloir effacer le produit ?</span><br>
            <form action='index.php?page=adminproduits' method='POST'>
            <button type='submit' name='accepte' value='".$_POST['deleteProduct']."'>OUI</button>
            <button type='submit' name='non' value='0'>NON</button>
            </form>";
        }
        //ADMIN ACCEPT DELETE PRODUCT
        if(isset($_POST['accepte'])){
            $this->adminproduits->deleteProduct($_POST['accepte']);
            $context = "style/images/image_product/";
        unlink($context.$_POST['accepte']);
            $success['delete'] = "<span>Le produit a été supprimé</span>";
            header("refresh: 2;");
        }
        if(isset($_POST['non'])){
            echo"calme toi okayyy";
        }
        //INSERT PRODUCT
        if(isset($_POST['submitProduct']))
        {
        if(empty($_POST['nom']) || empty($_POST['description']) || empty($_POST['prix']))
        {
            $error['empty'] = "<span>Champs vide remplir minimum nom, description, prix</span>";
        }
            $file = $_FILES['image'];
            $fileName = $_FILES['image']['name'];
            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileSize = $_FILES['image']['size'];
            $fileError = $_FILES['image']['error'];
            $fileType = $_FILES['image']['type'];
//            var_dump($file);
            if($fileError===0)
            {
                $nom = htmlspecialchars($_POST['nom']);
                $description = htmlspecialchars($_POST['description']);
                $prix = intval($_POST['prix']);
                $stock = intval($_POST['stock']);
                // j'ai changé la taille max du fichier
                if($fileSize > 900000) 
                {
                    $error['img'] = "<span>Erreure le fichier est trop large, limite : 1MB</span>";
                } else {
                    $img_exe = pathinfo($fileName, PATHINFO_EXTENSION);
                    $img_exe_str = strtolower($img_exe);

                    $extension = array("jpg", "jpeg", "png", "svg");
                    if(in_array($img_exe_str, $extension))
                    {
                        $img_name = uniqid("IMG-", true).'.'.$img_exe_str;
                        $img_in_path = 'style/images/image_product/'.$img_name;
                        move_uploaded_file($fileTmpName, $img_in_path);
                        $id_categorie = intval($_POST['categorie']);
                        $this->adminproduits->insertProduct($nom, $description, $prix,$img_name,$stock,$id_categorie);
                        $success['product'] = "<span>Le produit a été inséré</span>";
                        header("refresh: 2;");
                    } else {
                        $error['img'] = "<span>le type de fichier n'est pas supporté, uniquement : jpg jpeg png ou svg</span>";
                    }
                }

            } else {
                $error['img'] = "<span>Erreur image</span>";
            }
        }
        require'Vue/vueAdminProduits.php';
    }
}
