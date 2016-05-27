<?php
	include "../includes/database.php";

	var_dump($_POST);
	var_dump($_FILES);

	if(isset($_POST['titre']) && isset($_POST['description'])){
		$titre = $_POST['titre'];
		$description = $_POST['description'];

		if(isset($_FILES['image']) && $_FILES['image']['size'] > 0){
			$extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
			$extension_upload = strtolower(substr(strrchr($_FILES['image']['name'], '.'),1));

			if ($_FILES['image']['error'] > 0 || $_FILES['image']['size'] > 2000000 || !in_array($extension_upload,$extensions_valides)){
				header("Location: ../ajout_emission.php?message=Erreur lors de l'ajout");
			} else {

				$sql = "INSERT INTO emissions (titre_emission, descri_emission) VALUES (?,?)";
				$req = $db->prepare($sql);
				$req->execute(array($titre,$description));

				$sql = "SELECT MAX(id_emission) as max FROM emissions";
				$req = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
				$id = $req['max'];

				$chemin_front = "img/emission/".$id.".".$extension_upload;
				$chemin = "../../RadioPac/img/emission/".$id.".".$extension_upload;

				move_uploaded_file($_FILES['image']['tmp_name'],$chemin);

				$sql = "UPDATE emissions SET photo_emission = '$chemin_front' WHERE id_emission = $id";
				$req = $db->prepare($sql);
				$req->execute();

				header("Location: ../ajout_emission.php?message=Ajouté avec succes");
			}
		} else {
			header("Location: ../ajout_emission.php?message=Erreur lors de l'ajout");
		}

	}

?>
