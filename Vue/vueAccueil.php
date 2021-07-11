<!doctype html>
<html lang="fr">

	<head>
		<title>Accueil</title>
		<!-- inclusion des head -->
		<?php include'Vue/layout/head.php' ?>
		
	</head>
 
	<body>
		<!-- Container general -->
		<div class="accueil_container_general">
				
			<!-- Inclusion du header -->
			<?php include'Vue/layout/header.php'?>

			<!-- Main -->
			<main class="accueil_main"> 
				<section class="main_welcome">
					<h1>Découvrez nos produits</h1>
					<a href="index.php?page=produits">Acceder à la boutique</a>
				</section>
				<section class="accueil_button">
					
				</section>
			</main>    

			<!--Inclusion du Footer -->
			<?php include'Vue/layout/footer.php'?>

			<!--Inclusion des Scripts -->
			<script src="style/script/boutique.js"></script> 
		</div><!-- FIN CONTAINER GENERAL /////\\\\\\////-->

	</body>

</html>