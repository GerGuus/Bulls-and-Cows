<?php
	$login = $_COOKIE['login'];

	$mysql = new mysqli('localhost', 'e666246l_game', '14020908VIv', 'e666246l_game');

	$result = $mysql->query("SELECT CAST(AVG(`games`.`tries`) as decimal(5, 1)) AS avg, COUNT(`games`.`tries`) AS count FROM `games`, `users` WHERE `users`.`id_user` = `games`.`id_user` AND `users`.`login` = '$login'");
	$user = $result->fetch_assoc();
	setcookie('avg', $user['avg'], time() + 3600, "/");
	setcookie('count', $user['count'], time() + 3600, "/");
	$mysql->close();
?>