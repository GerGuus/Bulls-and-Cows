<?php
	$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

	$pass = md5($pass."y13ugii12");

	$mysql = new mysqli('localhost', 'root', '', 'game-bd');

	$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass'");
	$user = $result->fetch_assoc();
	if(count($user) == 0){
		setcookie('error', 'auth', time() + 3600, "/");
		header('Location: /');
		exit();
	}
	

	setcookie('login', $user['login'], time() + 3600, "/");
	setcookie('id', $user['id_user'], time() + 3600, "/");

	
	header('Location: /');
	exit();
?>