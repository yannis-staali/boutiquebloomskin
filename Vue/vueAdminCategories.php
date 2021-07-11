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

    <h1 class="back_button"><a href="index.php?page=admin">RETOUR</a></h1>

	<!-- Main -->
	<main class="main_categories"> 
        <div class="main_container_categories">
		<h2>Gerer les catégories</h2>
        <?= $success['insert'].$success['update'].$success['delete'].$error['empty']?>
        <?php
        if(isset($categories)):
        ?>
        <table class="form_categories">
        <thead>
        <tr>
        <td>id</td>
        <td>nom</td>
        <td>update</td>
        <td>delete</td>
        </tr>
        </thead>
        <tbody>
        <tr>
        <?php
        for($i=0;isset($categories[$i]);$i++){
            echo"<td>".$categories[$i]['id']."</td>
            <td>".$categories[$i]['nom_categorie']."</td>
            <td><form action='index.php?page=admincategories' method='POST'><button name='updateCategorie' value='".$categories[$i]['id']."'>Changer</button></form></td>
            <td><form action='index.php?page=admincategories' method='POST'><button class='deletedut' name='deleteCategorie' value='".$categories[$i]['id']."'>Supprimer</button></form></td>
            </tr>";
        }
        ?>
        </tbody>        
        </table>

        <form class="categories_form" action="" method="POST">
        <label for="">Créer une Categorie</label>
        <input type="text" name="categorie">
        <input class="button_plus" type="submit" name="insertCategorie">
        </form>
        <?php
        endif;
        ?>
        </div>

       
            <?php
            //AU DESSUS C SI FORMULAIRE ET CATEGORIE LISTER ///// EN DESSOUS C FORMULAIRE SI OPTION UPDATE ADMIN/////////
            if(isset($categori)):?>
             <div class="containe_update">
                <table>
                <thead>
                <tr>
                <th>id</th>
                <th>nom</th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <form action="" method="POST">
                <?php
                    echo"<td><input name='id' value='".$categori['id']."' placeholder='".$categori['id']."'></td>
                        <td><input name='nom' value='".$categori['nom_categorie']."'></td>
                        <td><input type='submit' name='categorieUpdate'></td>
                    </tr>";
                ?>
                </form>
                </tbody>
                </table>
            </div>
            <?php
            endif;
            ?>
     

	</main>    

	<!--Inclusion du Footer -->
	<?php include'Vue/layout/footer.php'?>
	<!--Inclusion des Scripts -->
    <script src="style/script/boutique.js"></script> 


</body>

</html>

