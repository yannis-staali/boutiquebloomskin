<?php

if(isset($_POST['successPaiement']))
{
	header('Location: index.php');
}

?>

<!doctype html>
<html lang="fr">

	<head>
		<title>Paiement</title>
		<!-- inclusion des head -->
		<?php include'Vue/layout/head.php' ?>
		
	</head>
 
	<body>
	<!-- Debut container general -->
	<div class="formpage_container_general">
			<!-- Inclusion du header -->
			<?php include'Vue/layout/header.php'?>

			<!-- Main -->
			<main class="formpage_main"> 
				<section class="formpage_main_form paiement_custom_form" action="" method="POST">	
					
					<div class="formpage_main_form_img">
						<img src="style/images/bloomgirl.jpeg" alt="jackdaniels">
					</div>
					
					<div class="formpage_form_input">
						<h2 class="connexion_form_title" >Informations de Paiement</h2>

						<div class="formpage_block_standard margin_between">
							<label>Nom</label>
							<input id="nom" type="text"  name="nom">
							<?= $error['nom'] ?>
						</div>

						<div class="formpage_block_standard margin_between">
							<label>Prénom</label>
							<input id="prenom" type="text"  name="prenom">
							<?= $error['prenom'] ?>
						</div>
						
						<div class="formpage_block_standard margin_between">
							<label>Téléphone</label>
							<input id="telephone" type="text" name="telephone">
							<?= $error['telephone'] ?>	
						</div>

						<div class="formpage_block_standard margin_between">
							<label>Email</label>
							<input id="email" type="text" name="email">
							<?= $error['email'] ?>	
						</div>

						<div class="formpage_block_standard margin_between">
							<label>Adresse</label>
							<input id="adresse" type="text" name="adresse">
							<?= $error['adresse'] ?>	
						</div>

						<div class="formpage_block_standard margin_between">
							<label>Ville</label>
							<input id="ville" type="text" name="ville">
							<?= $error['ville'] ?>	
						</div>

						<div class="formpage_block_standard margin_between">
							<label>Département</label>
							<input id="departement" type="text" name="departement">
							<?= $error['departement'] ?>	
						</div>

						<div class="formpage_block_standard margin_between">
							<label>Code Postal</label>
							<input id="codepostal" type="text" name="postcode">
							<?= $error['postcode'] ?>	
						</div>

						<div class="formpage_block_standard margin_between">
							<label>Pays</label>
							<input id="pays" type="text" name="pays">
							<?= $error['pays'] ?>	
						</div>

						<!-- <input class="formpage_boutton" type="submit" name="submit"> -->
						<div class="card_paiement_container">
						<h3>Informations carte</h3>

						<form id="payment-form" data-secret="<?= $intent->client_secret ?>">
							<input id="prodId" name="prodId" type="hidden" value="<?= $_SESSION['user']['id']?>">

							<input type="text" id="cardholder-name" placeholder="Titulaire de la carte">
							<div id="card-element">
								<!-- Elements will create input elements here -->
							</div>

							<!-- We'll put the error messages in this element -->
							<div id="card-errors" role="alert"></div>

							<button id="card-button">Payer</button>
						</form>

						</div>

					</div>
				</section>
			</main>    
		</div> <!-- FIN CONTAINER GENERAL //////\\\\\/// -->   

			<!--Inclusion du Footer -->
			<?php include'Vue/layout/footer.php'?>

			<!--Inclusion des Scripts -->
			<script src="https://js.stripe.com/v3/"></script>
			<script src="style/script/boutique.js"></script> 
			<script src="style/script/paiement.js"></script> 
		</div><!-- FIN CONTAINER GENERAL /////\\\\\\////-->

	</body>

</html>