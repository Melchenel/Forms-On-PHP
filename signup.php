<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>



<?php
require "db.php";
$data = $_POST;
if(isset($data['do_signup']))
{
	$errors = array();
	if(trim($data['login']) == ''){
		$errors[] = "Введите логин!";
	}

	if(trim($data['name']) == ''){
		$errors[] = "Введите имя!";
	}

	if(trim($data['rename']) == ''){
		$errors[] = "Введите фамилию!";
	}
	
	if(trim($data['email']) == ''){
		$errors[] = "Введите Email!";
	}
	
	if(!isset($data['sex'])){
		$errors[] = "Выберите пол!";
	}
	
	if($data['password'] == ''){
		$errors[] = "Введите пароль!";
	}

	
	if($data['password_2'] != $data['password']){
		$errors[] = "Повторный пароль введен неверно!";
	}

	if(R::count('users', "login = ?", array($data['login']))>0){
		$errors[] = "Пользователь c таким логином уже существует!";
	}

	if(R::count('users', "email = ?", array($data['email']))>0){
		$errors[] = "Пользователь c таким email уже существует!";
	}




}

if(empty($errors) && isset($data["do_signup"]))
{
	$user = R::dispense('users');
	$user->login = $data['login'];
	$user->name = $data['name'];
	$user->name = $data['rename'];
	$user->email = $data['email'];
	$user->sex = $data['sex'];
	$user->password =  password_hash($data['password'], PASSWORD_DEFAULT);
	R::store($user);


	echo '<div class = "echo" >Вы успешно зарегистрированы, можете перейти на <a href = "index.php">главную страницу</a> </div>';


}
else if(!empty($errors)){
	echo '<div class = "echo" >' .array_shift($errors).'</div>' ;
}




?>
<div class="secondDiv">	

		<h1>Регистрация</h1>
<form action="signup.php" method="POST">
	
	<p>
		<label>Логин</label>
		<input type="text" name = "login" class = "TextClassReg"  value="<?php echo @$data['login'];?>">
	</p>


	<p>
		<label>Email</label>
		<input type="email" name = "email" class = "TextClassReg" value="<?php echo @$data['email'];?>">
	</p>


	<p>
		<label>Имя</label>
		<input type="text" name = "name" class = "TextClassReg"  value="<?php echo @$data['name'];?>">
	</p>

	<p>
		<label>Фамилия</label>
		<input type="text" name = "rename" class = "TextClassReg"  value="<?php echo @$data['rename'];?>">
	</p>


	<p>

		<label> Пол </label>
		
		<label>
			<input class="radio" type="radio" name="sex" value="М">
			<span class="radio-custom"></span>
			<span class="label">M</span>
		</label>


		<label>
			<input class="radio" type="radio" name="sex" value="Ж">
			<span class="radio-custom"></span>
			<span class="label">Ж</span>
		</label>
	
	</p>



	<p>
		<label>Придумайте пароль</label>
		<input type="password" name = "password" class = "TextClassReg" value="<?php echo @$data['password'];?>">
	</p>

		<p>
		<label>Повторите пароль</label>
		<input type="password" name = "password_2" class = "TextClassReg" value="<?php echo @$data['password_2'];?>">
	</p>

	<p>
		<button type = "submit" name = "do_signup">Зарегистрироваться</button>
	</p>
	
</form>
</div>
</body>
</html>