<?php
	$config = require_once 'config.php';
	$tries = $_POST['tries'];
	$id = $_COOKIE['id'];


	$mysql = new mysqli($config['host'], $config['user'], $config['db_password'], $config['db_name']);
	$mysql->query("INSERT INTO `games` (`id_user`, `tries`) VALUES('$id', '$tries')");
	$mysql->close();


	$mysql->close();

	header('Location: /');
	
?>