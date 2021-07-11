<!doctype html>
<html lang="fr">

	<head>
		<title>Administrer Utilisateurs</title>
		<!-- inclusion des head -->
		<?php include'Vue/layout/head.php' ?>
		
	</head>

	<body>

			<!-- Inclusion du header -->
			<?php include'Vue/layout/header.php'?>

			<!-- Main -->
			<main> 
                <div class="container_admin_user">
                    <div class="admin_user_inside_update">
                        <?= $success['update'].$success['delete'].$error['empty']?><br>

                            <?php
                        //GERER LES UTILISATEURS//
                    if(isset($user)):
                        ?>
                        
                    <h1 class="back_button"><a href="index.php?page=admin">RETOUR</a></h1>
                    <div style="overflow-x:auto">
                    <table class="table_adminUser">
                    <thead>
                        <tr>
                        <th>id</th>
                        <th>login</th>
                        <th>email</th>
                        <!-- <th>password</th> -->
                        <th>droits</th>
                        <th>update</th>
                        <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        foreach($user as $users){
                            if($users['id']!=0){
                            echo "<td>".$users['id']."</td>
                                <td>".$users['login']."</td>
                                <td>".$users['email']."</td>
                              
                                <td>".$users['id_droits']."</td>
                                <td>
                                <form action='index.php?page=adminuser' method='POST'><button name='update' value='".$users['id']."'>Update</button></form>
                                </td>
                                <td>
                                <form action='index.php?page=adminuser' method='POST'><button name='delete' value='".$users['id']."'>Delete</button></form>
                                </td>
                            </tr>";
                        }
                    }
                endif;
                ?>
                </table>
                </div>

                <section class="container_user_update">
                    <?php
                    if(isset($userUpdate)):?>
                    <table>
                        <thead>
                            <tr>
                            <th>id</th>
                            <th>login</th>
                            <th>email</th>
                        
                            <th>id droits</th>
                            </tr>
                        </thead>
                        <tbody>
                    <tr>
                    <form action="index.php?page=adminuser" method="POST">
                    <?php
                            echo "<td><input type='text' name='id' value='".$userUpdate['id']."'></td>
                        <td><input type='text' name='login' value='".$userUpdate['login']."'></td>
                        <td><input type='text' name='email' value='".$userUpdate['email']."'></td>
                        <td><input type='text' name='id_droits' value='".$userUpdate['id_droits']."'></td></tr>";
                    ?>
                            </tbody>
                    </table>
                    <button type="submit" name="updateUser">Update user</button>
                    </form>
                    <?php
                    endif;
                    ?>
                    </tbody>
                    </table>
                </section>

                    <?php
                    //accepete delete user
                    if(isset($_POST['delete'])){
                        echo $accept;
                    }
                    ?>
                </div>
            </div>
		</main>    

			<!--Inclusion du Footer -->
			<?php include'Vue/layout/footer.php'?>

			<!--Inclusion des Scripts -->
			<script src="style/script/boutique.js"></script> 
           
	</body>

</html>
