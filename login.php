<!DOCTYPE html>
<html>
<head>
	<title>Вход</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>



<?php
require "db.php";
$data = $_POST;



if(isset($data['do_login']))
{	
	$errors = array();
	$user = R::findOne('users', 'login = ?', array($data['login']));
	

	if($user)
	{
		if(password_verify($data['password'], $user->password))
		{
			$_SESSION['logged_user'] = $user;
			echo '<div class="echo">Вы успешно авторизованы, можете перейти на <a href = "index.php">главную страницу</div></a>';

		}
		else
		{
			$errors[] = "Неправильный пароль!";
		}
	}
	else{
		$errors[] = "Пользователь с таким логином не найден!";
	}
	if(!empty($errors))
	{
		echo '<div class = "echo" >' .array_shift($errors). '</div>';
	}

}


?>
	<div class="mainDiv">	

		<h1>Авторизация</h1>


		<form action="login.php" method="POST">

			<p>
				<label>Логин</label>
				<input type="text" name = "login" class = "TextClass"  autofocus="1" placeholder="Ваш логин" value="<?php echo @$data['login'];?>">
			</p>
			<p>
				<label>Пароль</label>
				<input type="password" name = "password" class = "TextClass" placeholder="Ваш пароль" value="<?php echo @$data['password'];?>">
				</p>


			<p>
				<button type = "submit" name = "do_login">Войти</button>
			</p>
	
		</form>
	</div>
</body>
</html>