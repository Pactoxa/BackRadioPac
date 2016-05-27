<?php
	session_start();
	session_destroy();
	header("Location: http://localhost/RadioPac/index.php");
?>
