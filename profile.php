<?php
	session_start();

	if(!isset($_SESSION['user'])){
		header('Location: index.php');
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
	<form>
		<img src="<?= $_SESSION['user']['avatar']; ?>" width='200' alt="">
		<h2 style="margin: 5px 0;"><?= $_SESSION['user']['username']; ?></h2>
		<a href="#"><?= $_SESSION['user']['email']; ?></a>
		<a href="vendor/logout.php" class="logout">Exit</a>
	</form>
</body>
</html>