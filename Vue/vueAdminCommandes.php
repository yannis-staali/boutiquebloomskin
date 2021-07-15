<!doctype html>
<html lang="fr">
 
<head>
	<title>Administration</title>
	<!-- inclusion des head -->
	<?php include'Vue/layout/head.php' ?>
	
</head>
<body>
	<!-- Inclusion du header -->
	<?php include'Vue/layout/header.php'?>

    <h1 class="back_button"><a href="index.php?page=admin">RETOUR</a></h1>

	<!-- Main -->
    <h1 class="titre_admin_commande">HISTORIQUES DES COMMANDES</h1>
	<main class="main_commandes_admin"> 
        
    <div class="container_historique">


					<?php 

					$coco = count($poposh);

					for($i=0; $i<count($recupListId); $i++)
					{
						echo "<div class='container_each_commande'>";//debut div commande
								echo "<div class='container_titre_each_commande'>";
									echo "<h1>Commande n° : ".$recupListId[$i]['id_commande']."</h1>";
                                    echo "<p>Commandé par : ".$poposh[$i][0]['login']."</p>";
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

	</main>    

	<!--Inclusion du Footer -->
	<?php include'Vue/layout/footer.php'?>
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
	overflow-x:auto;
}
.title_historique_top {
	text-align:center;
	margin-top:2em;
}

.titre_admin_commande {
    text-align: center;
}
</style>