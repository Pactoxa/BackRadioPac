<?php

  include"../includes/database.php";

  $taillemax = 5000000;
  $extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
  $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );

  $dossier = "img/type_event/";
  $nom = md5(uniqid(rand(), true)).".jpg";

  $move = "../../RadioPac/img/type_event/".$nom;

  $titre = $_POST['titre'];
  $color = $_POST['color'];

  if($_FILES['image']['error'] > 0){
    echo "Erreur de transfert";
    exit;
  } else {
    if($_FILES['image']['size'] > $taillemax){
      echo "Fichier trop volumineux";
      exit;
    } else {
      if(!in_array($extension_upload,$extensions_valides)){
        echo "extension interdite";
        exit;
      }
    }
  }

  move_uploaded_file($_FILES['image']['tmp_name'],$move);

  $sql = "INSERT INTO type_event (lib_type_event, color_type_event, photo_type_event) VALUES (?,?,?)";
	$req = $db->prepare($sql);
	$req->execute(array($titre,$color,$dossier.$nom));

  header('location:../gestion_type_evenement.php');


?>
