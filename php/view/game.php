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
		<div class="header">
			<div style="display: flex; flex-direction: row; align-items: center;">
				<p style="margin-right: 10px;">Попыток затрачено в среднем: <?php echo $viewParams['avgResults'];?></p>
				<p> Игр сыграно: <?php echo $viewParams['gameCount'];?></p>
			</div>
			<div style="display: flex; flex-direction: row; align-items: center;align-self: flex-end;">
				<p><?=$_SESSION['login']?></p>
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

	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="script/game.js"></script>	
</body>
</html>