<?php
	include "../includes/database.php";
	session_start();
	if(isset($_GET["username"]) && isset($_GET["password"])){
		if($_GET["username"] != "" && $_GET["password"] != ""){

			$username = $_GET['username'];
			$password = $_GET['password'];

			$sql = "SELECT id_admin, nom_admin, prenom_admin FROM admins WHERE login_admin = '$username' AND password_admin = '$password'";
			$sel = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
			if($sel){

				$_SESSION['id'] = $sel['id_admin'];
				$_SESSION['nom'] = $sel['nom_admin'];
				$_SESSION['prenom'] = $sel['prenom_admin'];

				header("Location: http://localhost/BackRadioPac/index.php");

			} else {
				header("Location: http://localhost/RadioPac/index.php");
			}

		} else {
			header("Location: http://localhost/RadioPac/index.php");
		}

	} else {
		header("Location: http://localhost/RadioPac/index.php");
	}
?>
