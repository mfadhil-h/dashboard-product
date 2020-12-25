<?php 
	session_start();
	if (!isset($_SESSION["login"])){
		header("Location:login.php");
		exit;
	}
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<title>Halaman utama</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="manage.php">Input Product</a></li>
			<li><a href="list.php">Daftar Product</a></li>
			<li><a href="about.php">About</a></li>
			<li class="logout"><a href="logout.php">Logout</a></li>
		</ul>
	</nav>
	<header>
        <div>
            <h1>MANAGER</h1>
            <p>Dashboard Product</p>
		</div>
	</header>
	<div class="banner">
		<div class="teks">
			<h1>Selamat Datang!<br> </h1>
			<p> Silahkan Pilih Menu di Atas<br>
                <br> #managemenProduct </p>
		</div>
			<img src="../image/logo1.png" class="logo" alt="">
		</div>
</body>
</html>