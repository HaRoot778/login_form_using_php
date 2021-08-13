<?php
	session_start();
	require_once 'connect.php';

	$full_name = trim($_POST['full_name']);
	$username = trim($_POST['username']);
	$email = trim($_POST['email']);
	$password = $_POST['password'];
	$password_confirm = $_POST['password_confirm'];

	//tarberak 1 bazayi het hamematelu hamar
	$query = "SELECT * FROM `users` WHERE `login` = '$username'";
	$result = mysqli_query($connect, $query);

	if(mysqli_num_rows($result) > 0){
		$_SESSION['message'] = "This username is already used!";
		header('Location: ../register.php');
	}


	//tarberak 2 bazayi het hamematelu hamar
	// $query = "SELECT `login` FROM `users`";

	// $result = mysqli_query($connect, $query);

	// while($row=mysqli_fetch_assoc($result)){
	// 	if($username == $row['login']){
	// 		$_SESSION['message'] = "This username is already used apo!";
	// 		header('Location: ../register.php');
	// 	}

	// }

	if($full_name==''){
		$_SESSION['message'] = "Please enter your full name!";
		header('Location: ../register.php');
	}

	if($username == ''){
		$_SESSION['message'] = "Please enter your username!";
		header('Location: ../register.php');
	}

	if($password != $password_confirm) {
		$_SESSION['message'] = "Passwords arent thebsame!";
		header('Location: ../register.php');
	}

	//for uploading files
	$path = 'uploads/'. time() . $_FILES['avatar']['name'];
	if(!move_uploaded_file($_FILES['avatar']['tmp_name'], "../" . $path)) {
		$path = 'uploads/default.png';
	}


	if(!isset($_SESSION['message'])){
		$password = md5($password);
		mysqli_query($connect, "INSERT INTO `users` (`full_name`, `login`, `email`, `password`, `avatar`) VALUES ('$full_name', '$username', '$email', '$password', '$path')");

		$_SESSION['message'] = "You registered successfully!";
		header('Location: ../index.php');
	}

	
?>