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
			<section class="container_historique">
				<div class="historique_commandes">
					<?php 
					// echo"<section class='each_commande'>";//on demarre une commande
					// for($i=0; $i<count($commandesPasse); $i++)
					// {
					// 	// if($commandesPasse[$i+1] < count($commandesPasse))
					// 	if(isset($commandesPasse[$i+1]))
					// 	{

					// 		if($commandesPasse[$i+1]['id_commande'] == $commandesPasse[$i]['id_commande'])
					// 		{
					// 			echo"<div class='each_produit'>";
					// 				echo"<h1> Nom :".$commandesPasse[$i]['nom']."</h1>";
					// 				echo"<p> Qte :".$commandesPasse[$i]['quantite']."</p>";
					// 				echo"<p> Prix :".$commandesPasse[$i]['id_produit']."</p>";
					// 				echo"<p>Id commande : ".$commandesPasse[$i]['id_commande']."</p>";
					// 				echo"<p>Login :".$commandesPasse[$i]['login']."</p>";
					// 			echo"</div>";
					// 		}
					// 		else
					// 		{
					// 			echo"</section>"; // fin de each_commande
								
					// 			echo"<section class='each_commande'>";//on redemare une autre commande
					// 					echo"<div class='each_produit'>";
					// 						echo"<h1> Nom :".$commandesPasse[$i]['nom']."</h1>";
					// 						echo"<p> Qte :".$commandesPasse[$i]['quantite']."</p>";
					// 						echo"<p> Prix :".$commandesPasse[$i]['id_produit']."</p>";
					// 						echo"<p>Id commande : ".$commandesPasse[$i]['id_commande']."</p>";
					// 						echo"<p>Login :".$commandesPasse[$i]['login']."</p>";
					// 					echo"</div>";
					// 		}
					// 	}
					// 	else
					// 	{
					// 		$y= $i - 1;

					// 		if($commandesPasse[$i]['id_commande'] == $commandesPasse[$y]['id_commande'])
					// 		{
					// 			echo"<div class='each_produit'>";
					// 				echo"<h1> Nom :".$commandesPasse[$i]['nom']."</h1>";
					// 				echo"<p> Qte :".$commandesPasse[$i]['quantite']."</p>";
					// 				echo"<p> Prix :".$commandesPasse[$i]['id_produit']."</p>";
					// 				echo"<p>Id commande : ".$commandesPasse[$i]['id_commande']."</p>";
					// 				echo"<p>Login :".$commandesPasse[$i]['login']."</p>";
					// 			echo"</div>";
					// 		}
					// 		else
					// 		{
					// 			echo"</section>"; // fin de each_commande
								
					// 			echo"<section class='each_commande'>";//on redemare une autre commande
					// 					echo"<div class='each_produit'>";
					// 						echo"<h1> Nom :".$commandesPasse[$i]['nom']."</h1>";
					// 						echo"<p> Qte :".$commandesPasse[$i]['quantite']."</p>";
					// 						echo"<p> Prix :".$commandesPasse[$i]['id_produit']."</p>";
					// 						echo"<p>Id commande : ".$commandesPasse[$i]['id_commande']."</p>";
					// 						echo"<p>Login :".$commandesPasse[$i]['login']."</p>";
					// 					echo"</div>";
					// 		}
					// 	}
					// }

					// echo"</section>";//on termine la dernière commande
					
					$coco = count($poposh);
					// echo $coco;

					for($i=0; $i<count($recupListId); $i++)
					{
							echo "<h1>".$recupListId[$i]['id_commande']."</1>";

							for($y=0; $y<count($poposh[$i]); $y++)
							{
								// echo "<h1>".$recupListId[$y]['id_commande']."</1>";
							
								// echo"<section class='each_commande'>";//on demarre une commande
								// 	echo "<h2>Commande numéro : ".$poposh[$i][$y]['id_commande']."</h2>";
								// 	echo "<h3>".$poposh[$i][$y]['nom']."</h3>";
								// 	echo "<h3>".$poposh[$i][$y]['quantite']."</h3>";
								// 	echo "<h3>".$poposh[$i][$y]['prix']."</h3>";
								// echo"</section>";

								echo'<pre>';
								echo'ok';
								echo'<pre>';
								
							// 	echo'<pre>';
							// 	echo('ok');
							// 	echo'<pre>';
	
							}
					}	

					// for($x=0; $x<5; $x++)
					// {
						
					// 		echo"<section class='each_commande'>";//on demarre une commande
					// 			echo "<h2>Commande numéro : ".$recupComm[$i][$y]['id_commande']."</h2>";
					// 			echo "<h3>".$recupComm[$i][$y]['nom']."</h3>";
					// 			echo "<h3>".$recupComm[$i][$y]['quantite']."</h3>";
					// 			echo "<h3>".$recupComm[$i][$y]['prix']."</h3>";
					// 		echo"</section>";
					// }
					
					// for($h=0; $h<count($recupComm[0]); $h++)
					// {
					// 	echo'<pre>';
					// 	echo'yo';
					// 	echo'<pre>';
					// }


					?>
				</div>
			</section>    
			</div> <!-- FIN CONTAINER GENERAL //////\\\\\/// -->
			<!--Inclusion du Footer -->
				<?php include'Vue/layout/footer.php' ?>
				<!--Inclusion des Scripts -->
				<script src="style/script/boutique.js"></script> 

		  </body>
</html>

<style>
	.each_commande{
		border: 1px solid black;
	}
</style>