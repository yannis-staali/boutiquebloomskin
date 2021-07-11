<!doctype html>
<html lang="fr">

	<head>
		<title>Paiement</title>
		<!-- inclusion des head -->
		<?php include'Vue/layout/head.php' ?>
		
	</head>
 
	<body>
		<!-- Container general -->
		<div class="accueil_container_general">
				
			<!-- Inclusion du header -->
			<?php include'Vue/layout/header.php'?>

			<!-- Main -->
			<main class="main_checkout"> 
				<h1 class="title_recapitulatif">Récapitulatif</h1><br>
              <div class="panier_container custom_panier_checkout">
				<div class="panier_container_top custom_checkout_inside">
					<?php
					if(isset($Panier))
					{
						for($l=0;isset($Panier[$l]);$l++)
						{
							echo"<div class='panier_each-product custizee'>";
								echo"<p class='panier_each_title'>".$Panier[$l]['nom']."</p>";
								echo"<p class='panier_each_other'><i class=\"fas fa-chevron-right\"></i> ".$Panier[$l]['quantite']. " <i class=\"fas fa-chevron-left\"></i></p>";
								// echo"<p class='panier_each_other'><a href='index.php?page=produits&addOne=".$Panier[$l]['id'].'__'.$Panier[$l]['quantite']."'><i class=\"fas fa-plus\"></i></a></p>";
								// echo"<p class='panier_each_other'><a href='index.php?page=produits&deleteOne=".$Panier[$l]['id'].'__'.$Panier[$l]['quantite']."'><i class=\"fas fa-minus\"></i></a></p>";
								// echo"<p class='panier_each_other'><a href='index.php?page=produits&deletePanier=".$Panier[$l]['id']."'><i class=\"fas fa-trash-alt\"></i></a></p>";
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
					echo "<div class='panier_validate custizee redcust'>";
						echo "<p>TOTAL <i class=\"fas fa-chevron-right\"></i>$total_calcul  €   <i class=\"fas fa-shopping-cart\"></i></p>";
					echo "</div>";
				}
				?>
						
			</div>
				<section class="passage_paiement">
					<form class="form_paiement" action="index.php?page=paiement" method="POST">
						<label>Passer au paiement</label>
							<button name='panier_confirmer' type="submit" value=''>Payer</button>                
					</form>
				</section>
			</main>    

			<!--Inclusion du Footer -->
			<?php include'Vue/layout/footer.php'?>

			<!--Inclusion des Scripts -->
			<script src="style/script/boutique.js"></script> 
		</div><!-- FIN CONTAINER GENERAL /////\\\\\\////-->

	</body>

</html>
<style>
.custom_main_checkout{
	width:50%;
	margin:auto;
}
.custom_checkout_container {

}

.custizee p {
	font-size:1.5rem;
}
.redcust {
	color:red;
}
</style>