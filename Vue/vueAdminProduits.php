<!doctype html>
<html lang="fr">
 
<head>
	<title>Administration</title>
	<!-- inclusion des head -->
	<?php include'Vue/layout/head.php' ?>
	
</head>
<body>
	<!-- Inclusion du header -->
	<?php include'Vue/layout/header.php'?>

	<!-- Main -->
	<main> 
		<h1 class="title_admin_produit">Administrer vos produits</h1>
        <?= $success['update'].$success['delete'].$success['product'].$error['empty'].$error['img'] ?><br>
		<section>
        <?php
    //AFFICHAGE DE TOUT LES PRODUITS 
    if(isset($allProducts)):?>
    <h1 class="back_button"><a href="index.php?page=admin">RETOUR</a></h1>

    <div style="overflow-x:auto">
        <table class="table_adminProduit">
        <thead>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>description</th>
                <th>prix</th>
                <th>image</th>
                <th>stock</th>
                <th>id_categorie</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <tr>
        <?php
                for($i=0;isset($allProducts[$i]);$i++){
        echo "<td>".$allProducts[$i]['id']."</td>
            <td>".$allProducts[$i]['nom']."</td>
            <td>".$allProducts[$i]['description']."</td>
            <td>".$allProducts[$i]['prix']."</td>
            <td><img width='50' height='75' src='style/images/image_product/".$allProducts[$i]['image_url']."'></td>
            <td>".$allProducts[$i]['stock']."</td>
            <td>".$allProducts[$i]['id_categorie']."</td>
            <td><form action='index.php?page=adminproduits&img=".$allProducts[$i]['image_url']."' method='POST'><button name='updateProduct' value='".$allProducts[$i]['id']."'>Update</button></form></td>
            <td><form action='index.php?page=adminproduits' method='POST'><button class='button2' name='deleteProduct' value='".$allProducts[$i]['image_url']."'>Delete</button></form></td>
            </tr>";
                }
        // }
        
        echo"</tbody></table>";
    endif; 

   ?> </div> <?php

                //FORMULAIRE UPDATE PRODUCT SI ADMIN APPUIS SUR UPDATE*
        if(isset($productUpdates)):?>
            
            <table>
            <thead>
                <tr>
                <td>id</td>
                <td>nom</td>
                <td>description</td>
                <td>prix</td>
                <td>image</td>
                <td>stock</td>
                <td>id_categorie</td>
                </tr>
            </thead>
            <tbody>
        <tr>
            <form action="index.php?page=adminproduits" method="POST" enctype="multipart/form-data">
            <?php
                    echo "<td><input type='text' name='id' value='".$productUpdates['id']."'></td>
                <td><input type='text' name='nom' value='".$productUpdates['nom']."'></td>
                <td><input type='text' name='description' value='".$productUpdates['description']."'></td>
                <td><input type='text' name='prix' value='".$productUpdates['prix']."'></td>
                <td><img  src='style/images/image_product/".$productUpdates['image_url']."'><input type='file' name='image'></td>
                <td><input type='text' name='stock' value='".$productUpdates['stock']."'></td>
                <td><input type='text' name='categorie' value='".$productUpdates['id_categorie']."'></td>
                <td><input type='submit' name='productUpdate'</td>
                </tr>";
            ?>
            </tbody>
        </table>
   
    <?php
    endif;
    if(isset($_POST['deleteProduct'])){
        echo $accepte;
    }
    //FORMULAIRE DE PRODUITS S'AFFICHE SI ADMIN AAPUUIE SUR UPDATE
    if(isset($product) && isset($allProducts)):?>

        <h1 class="title_admin_produit">Ajouter un produit</h1>

        <div class="container_add_product">
        <form class="form_add_product" action="index.php?page=adminproduits" method="POST" enctype="multipart/form-data">
        <input type="text" name="nom" placeholder="Nom du produit">
        <textarea name="description">
            description
        </textarea>
        <input type="number" name="prix" placeholder="prix"> 
        <input class="button_plus" type="file" name="image">
        <input type="number" name="stock" placeholder="stock">
        <label for="">Categorie</label>
        <select name="categorie" id="">
            <?php
            foreach($categories as $key => $categorie){
    
                echo'<option value="'.$categorie['id'].'">'.$categorie['nom_categorie'].'</option>';
            }
            ?>
        </select>
        <button type="submit" name="submitProduct">INSERT</button>
        </form>
        </div>

        <?php
        endif;
       ?>
        </tbody>
        </table>
        </section>
	</main>    

	<!--Inclusion du Footer -->
	<?php include'Vue/layout/footer.php'?>
	<!--Inclusion des Scripts -->
    <script src="style/script/boutique.js"></script> 


</body>

</html>
