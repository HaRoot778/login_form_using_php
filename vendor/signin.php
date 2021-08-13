<?php
	session_start();
	require_once 'connect.php';

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	if($username == ''){
		$_SESSION['message'] = "Wrong username or password";
		header('Location: ../index.php');
	}

	$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$username' AND `password` = '$password' ");

	if(mysqli_num_rows($check_user)){

		$user = mysqli_fetch_assoc($check_user);

		$_SESSION['user'] = [
			'id' => $user['id'],
			'username' => $user['login'],
			'avatar' => $user['avatar'],
			'email' => $user['email']
		];

		header("Location: ../index.php");

	} else {
		$_SESSION['message'] = "Wrong username or password";
		header('Location: ../index.php');
	}


?>