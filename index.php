<?php
	session_start();

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
	<form action="vendor/signin.php" method="post">
		<label for="">Login</label>
		<input required type="text" name="username" placeholder="Your username">
		<label for="">Password</label>
		<input type="password" name="password" placeholder="Your password">
		<button type="submit">Login</button>
		<p>
			Still don't have an account? - <a href="register.php">Create account!</a>
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