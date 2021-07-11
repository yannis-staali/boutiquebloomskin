<!doctype html>
<html lang="fr">

<head>
	<title>Inscription</title>

	<!-- inclusion des head -->
	<?php include'Vue/layout/head.php'?>
</head>
<body>

	<!-- Debut container general -->
	<div class="formpage_container_general">
		<!-- Inclusion du header -->
		<?php include'Vue/layout/header.php'?>

		<!-- Main -->
		<main class="formpage_main"> 
			<form class="formpage_main_form" action="" method="POST">	
				<div class="formpage_main_form_img">
					<img src="style/images/bloomgirl.jpeg" alt="jackdaniels">
				</div>

				<div class="formpage_form_input">
					<h2 class="connexion_form_title" >Connexion</h2>

					<div class="formpage_block_standard">
						<label>login</label>
						<input type="text"  name="login"><br>
						<?= $error['login'] ?>
					</div>

					<div class="formpage_block_standard">
						<label>Password</label>
						<input type="password" name="password"><br>
						<?= $error['password'].$error['empty'] ?>
					</div>

					<input class="formpage_boutton" type="submit" name="submit">
				</div>
			</form>
		</main>    
	</div> <!-- FIN CONTAINER GENERAL //////\\\\\/// -->
		<!--Inclusion du Footer -->
		<?php include'Vue/layout/footer.php' ?>
		

		<!--Inclusion des Scripts -->
		<script src="style/script/boutique.js"></script> 
	
	</body>

</html>