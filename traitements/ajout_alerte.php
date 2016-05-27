<?php

  include"../includes/database.php";

  $titre = $_POST['titre'];
  $type = $_POST['type'];
  $contenu = $_POST['contenu'];
  $dateDebut = date('Y-m-d');
  $dateFin = strtotime("+1 day", time());
  $dateFin = date('Y-m-d', $dateFin);

  $sql = "INSERT INTO alertes (type_alerte, contenu_alerte, titre_alerte, date_debut_alerte, date_fin_alerte) VALUES (?,?,?,?,?)";
	$req = $db->prepare($sql);
	$req->execute(array($type,$contenu,$titre,$dateDebut,$dateFin));

  header('location:../ajout_alerte.php');

?>
