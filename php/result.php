<?php
	$tries = $_POST['tries'];
	$id = $_COOKIE['id'];


	$mysql = new mysqli('localhost', 'root', '', 'game-bd');
	$mysql->query("INSERT INTO `games` (`id_user`, `tries`) VALUES('$id', '$tries')");
	$mysql->close();


	$mysql->close();

	header('Location: /');
	
?>