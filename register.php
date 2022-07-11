<?php
include('connection.php'); //Связь с БД
$link = mysqli_connect("localhost", "root", "", "bulletinboard");
//Связь с БД
if($link === true) {
	//Проверка
	echo("success");
}
if($link === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}


if (isset($_POST["registerbutton"])) {
	$first_name = mysqli_real_escape_string($conn, $_REQUEST['name']);
	$last_name = mysqli_real_escape_string($conn, $_REQUEST['surname']);
	$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
	$phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
	$password = mysqli_real_escape_string($conn, $_REQUEST['password']); 
	$cpassword = mysqli_real_escape_string($conn, $_REQUEST['cpassword']); 
	//Берем введенные пользователем данные

	if ($password==$cpassword){
			//Если пароли совпадают вводим данные нового пользователя в БД
			
			mysqli_query($conn,"INSERT INTO `users`(`user_id`, `first_name`, `last_name`, `email`, `phone`, `password`) VALUES ('','$first_name', '$last_name', '$email', '$phone', '$password')");
				echo("<script>alert('Welcome, you are registered now! You may login!')</script>");
				echo("<script>window.location = 'login.php';</script>");
			
	}else{
		echo "<script>alert('Passwords do not match!');</script>";
	}
}
 ?>