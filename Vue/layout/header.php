<header>
	<div class="header_container">
		<div class="header_title">
			<!-- <p class="logo">SPIRIT</p> -->
			<a href="index.php?page=accueil"><img class="header_logo" alt="logo" src="style/images/logobloom.png"></a>
		</div>

		<nav class="header_nav">
			<div class="header_link">
				<!-- <a href="index.php?page=accueil">Accueil</a> -->
				<a href="index.php?page=accueil"><i class="fas fa-home"></i></a>
				<!-- <a href="index.php?page=produits">Produits</a> -->
				<a href="index.php?page=produits"><i class="fas fa-store"></i></a>
				<?php if(!isset($_SESSION['user'])): ?>
				<!-- <a href="index.php?page=inscription">Inscription</a> -->
				<a href="index.php?page=inscription"><i class="fas fa-edit"></i></a>
				<!-- <a href="index.php?page=connexion">Connexion</a> -->
				<a href="index.php?page=connexion"><i class="fas fa-user-alt"></i></a>
				<?php endif; if(isset($_SESSION['user'])): ?>
					<!-- <a href="index.php?page=profil">Profil</a> -->
					<a href="index.php?page=profil"><i class="fas fa-user-alt"></i></a>
					
					<!-- <a href="index.php?page=deconnexion">Déconnexion</a> -->
					<a href="index.php?page=deconnexion"><i class="fas fa-times-circle"></i></a>
				<?php endif; ?>
			
				<?php
				if(isset($_SESSION['user'])){
					if($_SESSION['user']['droits']==909){
						echo "<a href='index.php?page=admin'>Admin</a>";
					}
				}
				?>
			</div>
		</nav>

		<div class="menu-btn">
			<div class="menu-btn_burger">  
			</div>
		</div>
		
	</div>
</header>