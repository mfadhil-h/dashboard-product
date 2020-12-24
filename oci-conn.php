<?php
$usernameDB = "mercu";
$passwordDB = "orcl";
$dbName = "localhost:1521/orcl";
$conn = oci_connect($usernameDB, $passwordDB, $dbName);
if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
}
