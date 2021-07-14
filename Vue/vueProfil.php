<!doctype html>
<html lang="fr">

    <head>
        <title>Profil</title>
        <!-- inclusion des head -->
        <?php include'Vue/layout/head.php'?>
    </head>
	<body>
		<!-- Debut container general -->
		<div class="formpage_container_general">
			<!-- Inclusion du header -->
			<?php include'Vue/layout/header.php'?>

			<!-- Main -->
			<main class="formpage_main "> 
				<form class="formpage_main_form" action="" method="POST">	
					<div class="formpage_main_form_img">
						<img class="format_image_profil" src="style/images/bloomgirl.jpeg" alt="jackdaniels">
					</div>
					
					<div class="formpage_form_input">
						<h2 class="connexion_form_title" >Profil</h2>

						<div class="formpage_block_standard margin_between">
							<label>login</label>
							<input type="text" value="<?= $_SESSION['user']['login'] ?>"  name="login">
								<?= $error['login'] ?><br>
						</div>

						<div class="formpage_block_standard margin_between">
							<label>Email</label>
							<input type="email" value="<?= $_SESSION['user']['email'] ?>"  name="email">
								<?= $error['email'] ?><br>
						</div>
					
						<div class="formpage_block_standard margin_between">
							<label>Password</label>
							<input type="password" value="<?= $_SESSION['user']['password'] ?>"  name="password"><br>
						</div>
						
						<div class="formpage_block_standard margin_between">
							<label>Confirm</label>
							<input type="password" value="<?= $_SESSION['user']['password'] ?>"  name="password2">
							<?= $error['password'].$error['empty'] ?><br>
						</div>

						<input class="formpage_boutton" type="submit" name="submit">
					</div>
				</form>
			</main>
				<h1 class="title_historique_top">Historique des commandes</h1>
				<div class="container_historique">
					<?php 
					$coco = count($poposh);

					for($i=0; $i<count($recupListId); $i++)
					{
						echo "<div class='container_each_commande'>";//debut div commande
								echo "<div class='container_titre_each_commande'>";
									echo "<h1>Commande n° : ".$recupListId[$i]['id_commande']."</h1>";
								echo "</div>";

								echo "<div class='container_content_each_commande'>";
							for($y=0; $y<count($poposh[$i]); $y++)
							{
									echo"<div class='container_each_produit'>";
										echo "<p>Produit : ".$poposh[$i][$y]['nom']."</p>";
										echo "<p>Qté : ".$poposh[$i][$y]['quantite']."</p>";
										echo "<p>Prix : ".$poposh[$i][$y]['prix']." €</p>";
									echo"</div>";
							}
								echo "</div>";//Fin div content_each_commande

						echo "</div>";//Fin div commande
					}	
					?>  

				</div> <!-- fin container_historique -->

			</div> <!-- FIN CONTAINER GENERAL //////\\\\\/// -->
			<!--Inclusion du Footer -->
				<?php include'Vue/layout/footer.php' ?>
				<!--Inclusion des Scripts -->
				<script src="style/script/boutique.js"></script> 

		  </body>
</html>

<style>
	.container_each_commande{
		border: 2px solid black;
		margin-bottom: 2em;
		padding: 0.5em ;
		max-width: 900px;
		border-radius: 20px;
		/* margin: auto; */
	}

	.container_content_each_commande{
		display: flex; 
		flex-direction: row;
		flex-wrap: wrap;
	}

	.container_each_produit{
		border: 1px solid black;
		margin-left:0.3em;
		margin-bottom:0.3em;
		padding:0.3em;
		border-radius: 20px;

	}

.container_historique{
	margin-top: 2em;
	display: flex;
	flex-direction:column;
	align-items: center;
}
.title_historique_top {
	text-align:center;
	margin-top:2em;
}
</style>