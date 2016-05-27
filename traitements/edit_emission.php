<?php
	include "../includes/database.php";

	if(isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['emission'])){

		$titre = $_POST['titre'];
		$description = $_POST['description'];
		$emission = $_POST['emission'];

		$sql = "UPDATE emissions SET titre_emission = '$titre', descri_emission = '$description' WHERE id_emission = $emission";
		$req = $db->prepare($sql);
		$req->execute();

		if(isset($_FILES['image']) && $_FILES['image']['size'] > 0){
			$extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
			$extension_upload = strtolower(substr(strrchr($_FILES['image']['name'], '.'),1));

			if ($_FILES['image']['error'] > 0 || $_FILES['image']['size'] > 5000000 || !in_array($extension_upload,$extensions_valides)){
				header("Location: ../gestion_emission.php?message=Erreur lors de l'ajout3&id=$emission");
			} else {
				$chemin = "../../RadioPac/img/emission/".$emission.".".$extension_upload;

				move_uploaded_file($_FILES['image']['tmp_name'],$chemin);
				header("Location: ../gestion_emission.php?message=Edité avec succes3&id=$emission");
			}
		}

	} else {
		header("Location: ../gestion_emission.php?message=Erreur lors de l'ajout3&id=$emission");
	}




?>
