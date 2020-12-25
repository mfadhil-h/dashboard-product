<?php
session_start();
if (isset($_SESSION['login'])) {
    header("Location:index.php");
    exit;
}
include 'query-sql.php';
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $pass = $_POST["password"];

    $result = select_user($username, $pass);
    if ($result) {
        $nRows = oci_fetch_all($result, $result_array, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        if ($nRows>0) {
            $_SESSION['login'] = true;
            header("Location:index.php");
            exit();
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>halaman login</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<div class="login">
    <img src="../image/guru2.png" class="user" alt="">
    <h2>Login Here</h2>
    <br>
    <form method="post" action="">
        <ul>
            <li><label>username : </label></li>
            <li><label>
                    <input type="text" placeholder="Masukan username" name="username">
                </label></li>
            <li><label>Password: </label></li>
            <li><label>
                    <input type="password" placeholder="Masukan password" name="password">
                </label></li>
            <br>
            <li>
                <button name="login">Login</button>
            </li>
            <br>
            <?php if (isset($error)) : ?>
                <p style="color: red;font-style:italic; ">USERNAME / PASSWORD SALAH!</p>
            <?php endif; ?>
        </ul>
    </form>
</div>
</body>
</html>