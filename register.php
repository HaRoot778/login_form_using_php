<?php
	session_start();
	// error_reporting(E_ERROR | E_PARSE);
	if(isset($_SESSION['user'])){
		header('Location: profile.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>
	<form action="vendor/signup.php" method="post" enctype="multipart/form-data">
		<label>Full name*</label>
		<input required type="text" name="full_name" placeholder="Enter your full name">

		<label>Login*</label>
		<input required type="text" name="username" placeholder="Enter your username">

		<label>Email</label>
		<input type="email" name="email" placeholder="Enter your email">

		<label>Avatar</label>
		<input type="file" name="avatar">

		<label>Password*</label>
		<input required type="password" name="password" placeholder="Your password">

		<label>Confirm password*</label>
		<input required type="password" name="password_confirm" placeholder="confirm">

		<button type="submit">Register</button>

		<p>
			Already have an account? - <a href="index.php">Login!</a>
		</p>

		<?php 
			if(isset($_SESSION['message'])){
				echo '<p class="msg">' . $_SESSION['message'] . '</p>';
			}
			unset($_SESSION['message']); 

		?>

		

	</form>
</body>
</html>