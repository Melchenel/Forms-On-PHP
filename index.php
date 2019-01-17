<!DOCTYPE html>
<html>
<head>
	<title>Главная страница</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
	<body>

		<?php
			require "db.php";
		?>

		<?php if(isset($_SESSION['logged_user'])) : ?>
			<div class="mainDiv">
			<h1>Анкета пользователя:</h1>
			Логин:<?php echo $_SESSION['logged_user']->login; ?> <br>
			Имя:<?php echo $_SESSION['logged_user']->name; ?> <br>
			Фамилия:<?php echo $_SESSION['logged_user']->rename; ?> <br>
			Email:<?php echo $_SESSION['logged_user']->email; ?> <br>
			Пол:<?php echo $_SESSION['logged_user']->sex; ?> <br>
			<br>
			<a href="logout.php" class="YN">Выйти</a>

		</div>
		<?php else : ?>


			<div class="mainDiv">
				<h1>Здравствуйте, у Вас есть регистрация на нашем сайте?</h1><br>


				<a href = "login.php"  title="Войти" class="YN">Да</a>


				<a href = "signup.php" title="Зарегестрироваться" class="YN">Нет</a>

			</div>


		<?php endif; ?>
	</body>
</html>
