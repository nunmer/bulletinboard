<?php
session_start();
error_reporting(0);

if(isset($_SESSION['id'])){
	header('Location: http://www.localhost/bulletinboard/my-ads.php?userid='.$_SESSION['id']);
}
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
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']); 
//Берем введенные данные	
		if($email == "admin" && $password == "admin"){
			echo("<script>alert('Welcome, Admin!')</script>");
			echo("<script>window.location = 'admin.php';</script>");
			
		}else{
			$sql = "SELECT * FROM users WHERE email='$email'";
			$result = mysqli_query($link,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC); //Массив
			//Проверка пароля введенного пользователя
			if ($row['password']==$password){
				$_SESSION['first_name']=$row['first_name'];
				$_SESSION['id']=$row['user_id'];
				$url = $_SESSION['id'];
				header('Location: http://www.localhost/bulletinboard/my-ads.php?userid='.$url);
			} else {			
				echo("<script>alert('Incorrect password or email!')</script>");
			}
		}
}

 ?>