<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: http://localhost/RadioPac/index.php");
	}
?>
