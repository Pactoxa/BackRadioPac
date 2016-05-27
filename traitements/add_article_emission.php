<?php
	include "../includes/database.php";
	if(isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['emission'])){

		$titre = $_POST['titre'];
		$contenu = $_POST['contenu'];
		$emission = $_POST['emission'];

		if($titre != "" && $contenu != "" && $emission != ""){

			if(isset($_FILES['image']) && $_FILES['image']['size'] > 0){
				$extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
				$extension_upload = strtolower(substr(strrchr($_FILES['image']['name'], '.'),1));

				if ($_FILES['image']['error'] > 0 || $_FILES['image']['size'] > 2000000 || !in_array($extension_upload,$extensions_valides)){
					header("Location: ../gestion_emission.php?message=Erreur lors de l'ajout&id=$emission");
				} else {
					$sql = "INSERT INTO articles (date_article, titre_article, contenu_article,id_emission) VALUES (NOW(),?,?,?)";
				    $req = $db->prepare($sql);
				    $req->execute(array($titre,$contenu,$emission));
				}
			} else {
				$sql = "INSERT INTO articles (date_article, titre_article, contenu_article, id_emission) VALUES (NOW(),?,?,?)";
			    $req = $db->prepare($sql);
			    $req->execute(array($titre,$contenu,$emission));
			}

			if(isset($_FILES['image']) && $_FILES['image']['size'] > 0){
				$extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
				$extension_upload = strtolower(substr(strrchr($_FILES['image']['name'], '.'),1));

				if ($_FILES['image']['error'] > 0 || $_FILES['image']['size'] > 2000000 || !in_array($extension_upload,$extensions_valides)){
					header("Location: ../gestion_emission.php?message=Erreur lors de l'ajout&id=$emission");
				} else {

					$sql = "SELECT MAX(id_article) as max FROM articles";
					$req = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
					$id = $req['max'];

					$chemin_front = "img/article/".$id.".".$extension_upload;
					$chemin = "../../RadioPac/img/article/".$id.".".$extension_upload;

					move_uploaded_file($_FILES['image']['tmp_name'],$chemin);

					$sql = "UPDATE articles SET photo_article = '$chemin_front' WHERE id_article = $id";
					$req = $db->prepare($sql);
					$req->execute();
				}
			}
			if(isset($_POST['tags']) && $_POST['tags'] != null){

				$tags = $_POST['tags'];

				$sql = "SELECT MAX(id_article) as max FROM articles";
				$req = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
				$id = $req['max'];

				$sql = "INSERT INTO tag_article (id_tag, id_article) VALUES(?,?)";
				$req = $db->prepare($sql);
				foreach($tags as $tag){
				    $req->execute(array($tag,$id));
				}
			}
			header("Location: ../gestion_emission.php?message=Ajout avec success&id=$emission");
		}

	} else {
		echo "Erreur lors de l'ajout";
	}
?>
