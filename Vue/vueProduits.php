
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
				
			<!-- ICI AFFICHAGE VEUILLEZ VOUS INSCRIRE -->
			<?php 
			if(!isset($_SESSION['user']))
			{
				echo"<div class='produits_panier_success'>";
            		 echo "<p class='affichage_message' >Veuillez vous inscrire ou vous connecter pour pouvoir passer commande</p>";
				echo"</div>";
			}
			?>

			<!-- /// ICI AFFICHAGE PANIER SUCCES //////////////////////////////////////////////-->
			<?php 
			if(isset($success))
			{
				echo"<div class='produits_panier_success'>";
            		 echo $success;
				echo"</div>";
			}
			?>
			
			
			<!-- /// ICI PANIER SI USER CONNECTE /////////////////////////////////////////////////// -->
			<div class="panier_container">
				<div class="panier_container_top">
					<?php
					if(isset($Panier))
					{
						for($l=0;isset($Panier[$l]);$l++)
						{
							echo"<div class='panier_each-product'>";
								echo"<p class='panier_each_title'>".$Panier[$l]['nom']."</p>";
								echo"<p class='panier_each_other'><i class=\"fas fa-chevron-right\"></i> ".$Panier[$l]['quantite']."</p>";
								echo"<p class='panier_each_other'><a href='index.php?page=produits&addOne=".$Panier[$l]['id'].'__'.$Panier[$l]['quantite']."'><i class=\"fas fa-plus\"></i></a></p>";
								echo"<p class='panier_each_other'><a href='index.php?page=produits&deleteOne=".$Panier[$l]['id'].'__'.$Panier[$l]['quantite']."'><i class=\"fas fa-minus\"></i></a></p>";
								echo"<p class='panier_each_other'><a href='index.php?page=produits&deletePanier=".$Panier[$l]['id']."'><i class=\"fas fa-trash-alt\"></i></a></p>";
								echo"<p class='panier_each_other'>".$Panier[$l]['prix']."€</p>";			
							echo "</div>";
						}
					}
					?>
				</div>
				
				<!-- AFFICHAGE PRIX TOTAL -->
				<?php 
				if(isset($total_calcul))
				{
					echo "<div class='panier_validate'>";
						echo "<a href='index.php?page=checkout'>TOTAL <i class=\"fas fa-chevron-right\"></i>$total_calcul  €   <i class=\"fas fa-shopping-cart\"></i></a>";
					echo "</div>";
				}
				?>
						
			</div>
			<!-- ================================================================= -->

			<!-- /// ICI FILTRES CATEGORIES (type et region) /////////////////////////////////////////////////// -->
			<div class="produits_filtres">
				<!-- ici choix des différents types de spiritueux -->
				<div class="produits_filtres--types">
					<p>Categories</p>
					<div class="produits_filtres_types_dropdown">
						<?php	
						
						for($i=0;isset($allCategories[$i]);$i++)
						{
							// var_dump($allCategories[$i]['id']);
							echo"<a href='index.php?page=produits&categories=".$allCategories[$i]['id']."'>".$allCategories[$i]['nom_categorie']."</a>";
						}
						?>
					</div>
				</div>
				

			
				<!-- Ici bouton pour effacer les filtres -->
				<?php
					if(isset($_GET['categories']) || isset($_GET['regions']) || isset($_GET['both']))
					echo"
					<div class='produits_filtres--supprimer'>
						<a href='index.php?page=produits'><i class='far fa-times-circle'></i></a>
					</div>";	
				?>
			</div>		
						
			<!-- /// ICI AFFICHAGE DES PRODUITS  /////////////////////////////////////////////////// -->
			<div class="produits_liste">
				<?php
					//si aucun filtre liste tout
				if(isset($allProducts))
				{
    					//affichage des produits 
					for($p=0;isset($allProducts[$p]);$p++)
					{
					echo "<div class='produits_article'>";
						echo "<div class='produits_article_image'> ";
							echo "<a href=index.php?page=produits&produit_id_details=".$allProducts[$p]['id']."><img class='produits_image' src='style/images/image_product/".$allProducts[$p]['image_url']."'></a>";
						echo "</div>";

						echo "<div class='produits_article_contenu'> ";
							echo "<div class='produits_article_contenu_top'> ";
								echo"<h4>".$allProducts[$p]['nom']."</h4>";
								echo "<p class='produits_article_cat'>".$allProducts[$p]['nom_categorie']."</p>";
								echo "<p class='produits_article_description'>".$allProducts[$p]['description']."</p>";
							echo "</div> ";
							echo "<div class='produits_article_contenu_bottom'> ";
								echo "<p class='produits_article_prix'>".$allProducts[$p]['prix']."€</p>";
								// echo "<p>stock :".$allProducts[$p]['stock']."</p>";
								echo "<form class='produits_article_form' method='POST' action=''>";
									if(isset($_SESSION['user'])){
									echo "<button 'class='produits_article_button' name='product' value='".$allProducts[$p]['id']."' type='submit'>Ajouter au panier</button>";
									}
									
								echo "</form>";
								// echo "<a href=index.php?page=produits&produit_id_details=".$allProducts[$p]['id'].">Details</a>";
							echo "</div>";
						echo "</div>";	
					echo "</div>";	
					}
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

<style>
.affichage_message {
	font-size: 2rem;
}

</style>