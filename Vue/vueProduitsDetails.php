<!doctype html>
<html lang="fr">

	<head>
		<title>Accueil</title>
		<!-- inclusion des head -->
		<?php include'Vue/layout/head.php' ?>
		
	</head>
 
	<body>
		<!-- Container general -->
		<div class="produits_container_general">

			<!-- Inclusion du header -->
			<?php include'Vue/layout/header.php'?>


			<div class="produits_container_main">
				<div class="produits_liste">		
				<?php
						if(isset($result))
						{
								//affichage des produits 
							
							echo "<div class='produits_article'>";
								echo "<div class='produits_article_image'> ";
									echo "<img class='produits_image' src='style/images/image_product/".$result['image_url']."'>";
								echo "</div>";
		
								echo "<div class='produits_article_contenu'> ";
									echo "<div class='produits_article_contenu_top'> ";
										echo"<h4>".$result['nom']."</h4>";
										echo "<p class='produits_article_cat'>".$result['nom_categorie']."</p>";
										echo "<p class='produits_article_description'>".$result['description']."</p>";
									echo "</div> ";
									echo "<div class='produits_article_contenu_bottom'> ";
										echo "<p class='produits_article_prix'>".$result['prix']."€</p>";
										// echo "<p>stock :".$allProducts[$p]['stock']."</p>";
										echo "<form class='produits_article_form' method='POST' action=''>";
											if(isset($_SESSION['user'])){
											echo "<button 'class='produits_article_button' name='product' value='".$result['id']."' type='submit'>Ajouter au panier</button>";
											}
											
										echo "</form>";
									echo "</div>";
								echo "</div>";	
							echo "</div>";	
							
						}    
						?>
				</div> <!-- /// FIN d'affichage des produits  /////////////////////////////////////////////////// -->
			</div> <!-- FIN CONTAINER MAIN /////\\\\\\//// -->

		</div> <!-- FIN CONTAINER GENERAL /////\\\\\\//// -->

		<!--Inclusion du Footer -->
		<?php include'Vue/layout/footer.php'?>
		<!--Inclusion des Scripts -->
		<script src="style/script/boutique.js"></script> 
	</body>
</html>