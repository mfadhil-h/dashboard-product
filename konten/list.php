<?php 	
	session_start();
	if (!isset($_SESSION["login"])){
		header("Location:login.php");
		exit;
	}
include "query-sql.php";
$result = select_product();
//$result_array = oci_fetch_array($result, OCI_RETURN_NULLS+OCI_ASSOC);
$nRows = oci_fetch_all($result, $result_array,null,null,OCI_FETCHSTATEMENT_BY_ROW);
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>	Daftar Nilai </title>
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
			<h1>Daftar Product</h1>
		</div>	
	</header>
<br>
<br>
	<div class="banner">
	<table border="1" cellpadding="	10 " cellspacing="0" align="center">	
		<tr>
			<th>Kode</th>
			<th>Nama</th>
			<th>Jumlah</th>
		</tr>
		<?php foreach ($result_array as $product) :?>
		<tr>
			<td><?=$product['KODE_PRODUCT'] ?></td>
			<td><?=$product['NAMA_PRODUCT'] ?></td>
			<td><?=$product['JUMLAH'] ?></td>
		</tr>
		<?php endforeach; ?>	
	</table>
	</div>
</body>
</html>