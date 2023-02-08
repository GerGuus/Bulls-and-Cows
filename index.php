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
			if ($_COOKIE['login'] == ''):
		?>
		<h1 style="font-size: 4vmax; margin-top:10%">Игра Bulls and Cows</h1>
		<div class="register">
			<div class="reg-conteiner">
				<h1>Регистрация</h1>
				<form action="php/check.php" method="post" class="reg-form">
					<input type="text" class=" field" id="reg-login" placeholder="Введите логин" maxlength="50" name="login">
					<input type="password" class=" field" id="reg-password" placeholder="Введите пароль" maxlength="32" name="password">
					<button type="submit" class="btn-submit">
						Зарегистрироваться
					</button>
				</form>
				
			</div>
			<div class="reg-conteiner">
				<h1>Авторизация</h1>
				<form action="php/auth.php" method="post"  class="reg-form">
					<input type="text" class=" field" name="login" placeholder="Введите логин">
					<input type="password" class=" field" name="password" placeholder="Введите пароль">
					<button type="submit" class="btn-submit">
						Авторизироваться
					</button>
				</form>	
			</div>
		</div>	
		<h2 id="error">
			<?php
				switch($_COOKIE['error']){
					case 'login-length':
						echo("Недопустимая длина логина(от 4 до 50)");
						setcookie('error', '', -1, "/");
						break;
					case 'pass-length':
						echo("Недопустимая длина пароля(от 4 до 32)");
						setcookie('error', '', -1, "/");
						break;
					case 'login-exist':
						echo('Такой пользыватель уже существует');
						setcookie('error', '', -1, "/");
						break;
					case 'auth':
						echo('Логин или пароль указан неверно');
						setcookie('error', '', -1, "/");
						break;	
							
				} 
			?>
		</h2>
		<?php else:
		header('Location: game.php'); 
		exit;?>
		
		<?php endif; ?>
	</div>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="script/login.js"></script>	
</body>
</html>