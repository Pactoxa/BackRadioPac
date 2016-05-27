<?php
	include "../includes/database.php";
	if(isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['emission'])){

		$titre = $_POST['titre'];
		$contenu = $_POST['contenu'];
		$emission = $_POST['emission'];

		var_dump($_POST);
		var_dump($_FILES);

		if(isset($_FILES['podcast']) && $_FILES['podcast']['size'] > 0){

			$extensions_valides = array('mp3');
			$extension_upload = strtolower(substr(strrchr($_FILES['podcast']['name'], '.'),1));

			if ($_FILES['podcast']['error'] > 0 || $_FILES['podcast']['size'] > 30000000 || !in_array($extension_upload,$extensions_valides)){
				header("Location: ../gestion_emission.php?message=Erreur lors de l'ajout4&id=$emission");
			} else {

				$sql = "INSERT INTO podcasts (emission_podcast, titre_podcast, descri_podcast, date_podcast) VALUES (?,?,?,NOW())";
				$req = $db->prepare($sql);
				$req->execute(array($emission,$titre,$contenu));

				$sql = "SELECT MAX(id_podcast) as max FROM podcasts";
				$req = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
				$id = $req['max'];

				$chemin = "../../RadioPac/podcasts/".$emission."/".$id.".".$extension_upload;
				$chemin_front = "podcasts/".$emission."/".$id.".".$extension_upload;

				move_uploaded_file($_FILES['podcast']['tmp_name'],$chemin);

				$sql = "UPDATE podcasts SET chemin_podcast = '$chemin_front' WHERE id_podcast = $id";
				$req = $db->prepare($sql);
				$req->execute();

				if(isset($_FILES['image']) && $_FILES['image']['size'] > 0){

					$extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
					$extension_upload = strtolower(substr(strrchr($_FILES['image']['name'], '.'),1));

					if ($_FILES['image']['error'] > 0 || $_FILES['image']['size'] > 5000000 || !in_array($extension_upload,$extensions_valides)){
						header("Location: ../gestion_emission.php?message=Erreur lors de l'ajout3&id=$emission");
					} else {

						$chemin = "../../RadioPac/img/podcasts/".$id.".".$extension_upload;
						$chemin_front = "img/podcasts/".$id.".".$extension_upload;

						move_uploaded_file($_FILES['image']['tmp_name'],$chemin);

						$sql = "UPDATE podcasts SET photo_podcast = '$chemin_front' WHERE id_podcast = $id";
						$req = $db->prepare($sql);
						$req->execute();

					}
				}

				if(isset($_POST['tags']) && $_POST['tags'] != null){

					$tags = $_POST['tags'];

					$sql = "INSERT INTO tag_podcast (id_tag, id_podcast) VALUES(?,?)";
					$req = $db->prepare($sql);
					foreach($tags as $tag){
					    $req->execute(array($tag,$id));
					}
				}

				header("Location: ../gestion_emission.php?message=Ajout avec success&id=$emission");

			}

		} else {
			header("Location: ../gestion_emission.php?message=Erreur lors de l'ajout2&id=$emission");
		}

	} else {

		header("Location: ../gestion_emission.php?message=Erreur lors de l'ajout1&id=$emission");
	}

?>
