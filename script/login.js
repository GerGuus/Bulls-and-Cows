function register(){
	var login = document.querySelector('#reg-login').value;
	var password = document.querySelector('#reg-password').value;
	var error = document.getElementById('error');

	if(login.length < 4){
		error.innerHTML = "Недопустимая длина логина(от 4 до 50)";
		return;
	}
	if(password.length < 4){
		error.innerHTML = "Недопустимая длина пароля(от 4 до 32)";
		return;
	}
	$.ajax({
			url:'php/check.php',
			type: 'POST',
			dataType: 'json',
			data:{
				login: login,
				password: password
			}
		})
	window.location.href = "index.php";
}