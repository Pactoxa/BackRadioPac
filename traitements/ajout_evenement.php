<?php

  include"../includes/database.php";

  $taillemax = 5000000;
  $extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
  $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );

  $dossier = "img/evenements/";
  $nom = md5(uniqid(rand(), true)).".jpg";

  $move = "../../RadioPac/img/evenements/".$nom;

  var_dump($_FILES['image']);

  $titre = $_POST['title'];
  $type = $_POST['type'];
  $site = $_POST['site'];
  $descri = $_POST['descri'];
  $lieu = $_POST['lieu'];
  $debut = $_POST['debut'];
  $fin = $_POST['fin'];
  $detail = $_POST['detail'];
  $image = 0;

  if(!empty($titre) && !empty($type) && !empty($site) && !empty($descri) && !empty($lieu) && !empty($debut) && !empty($fin) && !empty($detail)){

    if(is_file($_FILES['image']['tmp_name'])){
      if($_FILES['image']['error'] > 0){
        echo "Erreur de transfert";
        exit;
      }
      else {
        if($_FILES['image']['size'] > $taillemax){
          echo "Fichier trop volumineux";
          exit;
        }
        else {
          if(!in_array($extension_upload,$extensions_valides)){
            echo "extension interdite";
            exit;
          }
        }
      }
      $image = 1;
      move_uploaded_file($_FILES['image']['tmp_name'],$move);
    }

    if($image == 1){
      $sql = "INSERT INTO evenements (`title`, `start`, `end`, `url`, `contenu_event`, `type_event`, `photo_event`, `description`, `lieu`) VALUES (?,?,?,?,?,?,?,?,?)";
    	$req = $db->prepare($sql);
    	$req->execute(array($titre,$debut,$fin,$site,$detail,$type,$dossier.$nom,$descri,$lieu));
    }
    if($image == 0){
      $sql = "INSERT INTO evenements (`title`, `start`, `end`, `url`, `contenu_event`, `type_event`, `description`, `lieu`) VALUES (?,?,?,?,?,?,?,?)";
    	$req = $db->prepare($sql);
    	$req->execute(array($titre,$debut,$fin,$site,$detail,$type,$descri,$lieu));
    }

    echo $sql;

    //header('location:../ajout_evenement.php');

  } else {
    echo "Formulaire incomplet";
  }




?>
