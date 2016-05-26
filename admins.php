<?php
include 'testidentification.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../Includes/css/bootstrap.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
		<script src="../Includes/js/bootstrap.js"></script>
		<script src="../Includes/js/prefixfree.min.js"></script>
		<title>Administration PAC</title>
		<script src="../Includes/js/togglearticle.js"></script>
	</head>
	
	<body>
		<?php
		include '../Includes/navigation/navbarback.html';
		include '../Includes/scripts/database.php';
		$admins = $db->query("SELECT * FROM admins");
		$admins -> execute();
		?>
		<br><br><br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover">
						<th>#</th>
						<th>Username</th>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Email</th>
						<th>Supprimer</th>
						<th>Editer</th>
						<?php 
						while ($donnee = $admins->fetch())
						{ ?>
							<tr>
							<td><?=$donnee['id_pers'];?></td>
							<td><?=$donnee['Identifiant'];?></td>
							<td><?=$donnee['Nom'];?></td>
							<td><?=$donnee['Prenom'];?></td>
							<td><?=$donnee['Email'];?></td>
							<td><a href="scripts/supressionadmin.php?ID=<?=$donnee['id_pers'];?>">Supprimer</a></td>
							<td><a href="scripts/editionadmin.php?ID=<?=$donnee['id_pers'];?>">Editer</a></td>
							</tr>
						<?php }
						?>
					</table>
				</div>
			</div>
		</div>
	</body>