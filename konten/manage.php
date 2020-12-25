<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}
include "query-sql.php";

$field = ["Kode Product", "Nama Product", "Jumlah"];

$kodeProduct = @$_POST['kodeProduct'];
$namaProduct = @$_POST['namaProduct'];
$jumlah = @$_POST['jumlah'];

if (isset($_POST["save"])) {
    $isExist = select_product($kodeProduct);
    $nRows = oci_fetch_all($isExist, $result_array, null, null, OCI_FETCHSTATEMENT_BY_ROW);
    if ($nRows > 0) {
        update_product($kodeProduct, $jumlah, $namaProduct);
        echo "
            <script>
                alert('Data Is Exist, Update Data')
                document.location.href='manage.php'
            </script>
        ";
    } else {
        insert_product($kodeProduct, $namaProduct, $jumlah);
        echo "
            <script>
                alert('Create New Data')
                document.location.href='manage.php'
            </script>
        ";
    }
} elseif (isset($_POST["delete"])) {
    $isExist = select_product($kodeProduct);
    $nRows = oci_fetch_all($isExist, $result_array, null, null, OCI_FETCHSTATEMENT_BY_ROW);
    if ($nRows > 0) {
        delete_product($kodeProduct);
        echo "
            <script>
                alert('Data Delete')
                document.location.href='manage.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Is Not Exist')
                document.location.href='manage.php'
            </script>
        ";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Product</title>
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
        <h1>Manage Product</h1>
        <p>silahkan input data disini</p>
    </div>
</header>
<div class="banner">
    <form method="post" action="">
        <table align="center" class="input">
            <tr>
                <td> <?= $field[0] ?> </td>
                <td> :</td>
                <td>
                    <label>
                        <input type="text" name="kodeProduct" size="5" value="<?= $kodeProduct ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td> <?= $field[1] ?> </td>
                <td> :</td>
                <td>
                    <label>
                        <input type="text" name="namaProduct" value="<?= $namaProduct ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td> <?= $field[2] ?> </td>
                <td> :</td>
                <td>
                    <label>
                        <input type="text" name="jumlah" size="5" value="<?= $jumlah ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="save">Save</button>
                </td>
                <td>
                    <button type="submit" name="delete">Delete</button>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>