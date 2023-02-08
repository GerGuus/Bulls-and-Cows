<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="main">
		<?php
			if ($_COOKIE['login'] != ''):
		?>
		<?php
			$login = $_COOKIE['login'];

			$mysql = new mysqli('localhost', 'root', '', 'game-bd');

			$result = $mysql->query("SELECT CAST(AVG(`games`.`tries`) as decimal(5, 1)) AS avg, COUNT(`games`.`tries`) AS count FROM `games`, `users` WHERE `users`.`id_user` = `games`.`id_user` AND `users`.`login` = '$login'");
			$user = $result->fetch_assoc();
			setcookie('avg', $user['avg'], time() + 3600, "/");
			setcookie('count', $user['count'], time() + 3600, "/");

			$mysql->close();
		?>
		<div class="header">
			<div style="display: flex; flex-direction: row; align-items: center;">
				<p style="margin-right: 10px;">Попыток затрачено в среднем: <?=$_COOKIE['avg']?></p>
				<p> Игр сыграно: <?=$_COOKIE['count']?></p>
			</div>
			<div style="display: flex; flex-direction: row; align-items: center;align-self: flex-end;">
				<p><?=$_COOKIE['login']?></p>
				<a href='php/exit.php' class="btn-a" style="margin-left: 30px;">Выход</a>
			</div>
			
		</div>
		<div class="game">
			<h1>Откройте скрытый код!</h1>
			<h1>Быки = правильный код, правильная позиция. Коровы = правильный код, неправильная позиция.</h1>
			<a href="game.php" class = "btn-a">Новая игра</a>
			<h2 id="info" class="info"></h2>
			<h2 id="win"></h2>
			<div class="tools">
				<p>Введите число</p>
				<input type="text" id="4digits" maxlength="4">
				<button id="go" onclick="gues()">Go</button>
			</div>
			<div class="tips">
				<p>#</p>
				<p>Попытка</p>
				<p>Быки</p>
				<p>Коровы</p>
			</div>
			<div id="gues-list" class="gues-list">
			</div>
			<button id="giveUp" onclick="giveUp()">Сдаться</button>
		</div>	
		<?php else: 
			header('location: index.php');
			exit;
		?>
		<?php endif;
		?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="script/game.js"></script>	
</body>
</html>