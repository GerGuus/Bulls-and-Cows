<?php
require_once 'database.php';

$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

$pass = md5($pass.$config['hash']);

$user = $db->get("SELECT * FROM `users` WHERE `login` = :login AND `password` = :password", ['login'=>$login, 'password'=>$pass]);

if (empty($user[0])) {
	setcookie('error', 'auth', time() + 3600, "/");
	header('Location: /');
	exit();
}

$_SESSION['login'] = $user[0]['login'];
$_SESSION['id'] = $user[0]['id'];


header('Location: /');
exit();
