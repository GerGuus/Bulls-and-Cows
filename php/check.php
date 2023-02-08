<?php
	$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
	if(mb_strlen($login) < 4) {
		setcookie('error', 'login-length', time() + 3600, "/");
		header('Location: /');
		exit();
	} else if(mb_strlen($pass) < 4){
		setcookie('error', 'pass-length', time() + 3600, "/");
		header('Location: /');
		exit();
	}
	$mysql = new mysqli('localhost', 'root', '', 'game-bd');

	$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
	$user = $result->num_rows;
	if($user > 0){
		setcookie('error', 'login-exist', time() + 3600, "/");
		header('Location: /');
		exit();
	}

	$pass = md5($pass."y13ugii12");

	
	$mysql->query("INSERT INTO `users` (`login`, `password`) VALUES('$login', '$pass')");
	$mysql->close();

	header('Location: /');
	exit();
?>