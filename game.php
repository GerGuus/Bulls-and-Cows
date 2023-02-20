
<?php
$config = require_once 'php/database.php';
$viewParams = [];
if (!empty($_SESSION['login'])) {
	$viewParams['loginName'] = $_SESSION['login'];
	
	$result = $db->get("SELECT CAST(AVG(`games`.`tries`) as decimal(5, 1)) AS avg, COUNT(`games`.`tries`) AS count FROM `games`, `users` WHERE `users`.`id_user` = `games`.`id_user` AND `users`.`login` = :login", ['login'=>$_SESSION['login']]);

	$viewParams['avgResults'] = $result[0]['avg'];
	$viewParams['gameCount'] = $result[0]['count'];

}	else {
		header('location: index.php');
}

// $login = $_SESSION['login'];

// $result = $mysql->query("SELECT CAST(AVG(`games`.`tries`) as decimal(5, 1)) AS avg, COUNT(`games`.`tries`) AS count FROM `games`, `users` WHERE `users`.`id_user` = `games`.`id_user` AND `users`.`login` = '$login'");
// $user = $result->fetch_assoc();
// setcookie('avg', $user['avg'], time() + 3600, "/");
// setcookie('count', $user['count'], time() + 3600, "/");


include 'php/view/game.php';
?>
