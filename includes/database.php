<?php

	// $db_ip = "hostingmysql332.amen.fr";
	// $db_base = "cm120116";
	// $db_user = "cm120116";
	// $db_pass = "tnJmt4_Q";

	$db_ip = "127.0.0.1";
	$db_base = "radiopac";
	$db_user = "root";
	$db_pass = "";

	try
	{
		$db = new PDO('mysql:host='.$db_ip.';dbname='.$db_base.'', $db_user, $db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}

	catch (PDOException $e)
	{
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}
	session_start();

?>
