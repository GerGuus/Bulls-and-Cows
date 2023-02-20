<?php
$config = require_once 'php/database.php';
$viewParams = [];
if (!empty($_SESSION['login'])) {
	header('location: game.php');
}
switch ($_COOKIE['error']) {
	case 'login-length':
		$viewParams['error'] = "Недопустимая длина логина(от 4 до 50)";
		setcookie('error', '', -1, "/");
		break;
	case 'pass-length':
		$viewParams['error'] = "Недопустимая длина пароля(от 4 до 32)";
		setcookie('error', '', -1, "/");
		break;
	case 'login-exist':
		$viewParams['error'] = "Такой пользыватель уже существует";
		setcookie('error', '', -1, "/");
		break;
	case 'auth':
		$viewParams['error'] = "Логин или пароль указан неверно";
		setcookie('error', '', -1, "/");
		break;				
} 

include 'php/view/index.php';
