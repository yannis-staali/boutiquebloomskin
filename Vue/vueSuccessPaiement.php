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
        <div class="container_success_paiement">
		    <h1>Merci pour votre achat</h1>
            <a class="retour_success" href="index.php?page=produits">Retour à la boutique</a>

        </div>

	</div> <!-- FIN CONTAINER GENERAL //////\\\\\/// -->
		<!--Inclusion du Footer -->
		<?php include'Vue/layout/footer.php' ?>
		

		<!--Inclusion des Scripts -->
		<script src="style/script/boutique.js"></script> 
	
	</body>

</html>
<style>
    .container_success_paiement {
        height: 100vh;
        display: flex;
        flex-direction: column;
        /* justify-content: center; */
        align-items: center;
    }

    .retour_success {
        font-size: 1.5rem;
        background-color: #ec6db3;
        width: fit-content;
        padding: 0.5em 1em;
        border-radius: 20px;
        box-shadow: 0 8px 6px -6px rgb(94, 94, 94);

    }

    .retour_success:hover{
        background-color: white;

    }
</style>