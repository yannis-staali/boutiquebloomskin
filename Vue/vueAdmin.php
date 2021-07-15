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
		<div class="container_admin">
			<div class="panel_first">
				<h1>PANEL ADMIN</h1>
				<a href="index.php?page=adminuser">Gerer les utilisateurs</a><br>
				<a href="index.php?page=adminproduits">Gerer les Produits</a><br>
				<a href="index.php?page=admincategories">Gerer les categories</a><br>
				<a href="index.php?page=admincommandes">Historique des commandes</a><br>
			</div>
		</div>
	</main>    

	<!--Inclusion du Footer -->
	<?php include'Vue/layout/footer.php'?>
	<!--Inclusion des Scripts -->
    <script src="style/script/boutique.js"></script> 


</body>

</html>
