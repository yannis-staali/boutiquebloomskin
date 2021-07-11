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
			</div> <!-- FIN CONTAINER GENERAL //////\\\\\/// -->
			<!--Inclusion du Footer -->
				<?php include'Vue/layout/footer.php' ?>
				<!--Inclusion des Scripts -->
				<script src="style/script/boutique.js"></script> 

		  </body>
</html>