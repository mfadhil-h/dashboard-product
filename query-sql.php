<?php @session_start();
include("oci-conn.php");

/**
 * @param $query
 * @return false|resource
 */
function execute_query($query) {
    global $conn;
    $result = oci_parse($conn, $query);
    if (!$result) {
        $m = oci_error($conn);
        trigger_error('Could not parse statement: ' . $m['message'], E_USER_ERROR);
    }
    $data = oci_execute($result, OCI_COMMIT_ON_SUCCESS);
    if (!$data) {
        $m = oci_error($result);
        trigger_error('Could not execute statement: ' . $m['message'], E_USER_ERROR);
    }
    return $result;
}

/**
 * @param string $kodeBarang
 * @return false|resource
 */
function select_product($kodeBarang='') {
    $conclusion = "";
    if ($kodeBarang != "") {
        $conclusion = "WHERE KODE_PRODUCT='$kodeBarang'";
    }
    $query = "SELECT * FROM MERCU.PRODUCT " . $conclusion;
    return execute_query($query);
}

/**
 * @param $kodeBarang
 * @param $namaBarang
 * @param $totalBarang
 * @return false|resource
 */
function insert_product($kodeBarang, $namaBarang, $totalBarang) {
    $query = "INSERT INTO MERCU.PRODUCT (KODE_PRODUCT, NAMA_PRODUCT, JUMLAH) VALUES('$kodeBarang', '$namaBarang', '$totalBarang')";
    return execute_query($query);
}

/**
 * @param $kodeBarang
 * @param $namaBarang
 * @param $totalBarang
 * @return false|resource
 */
function update_product($kodeBarang, $totalBarang, $namaBarang="") {
    $set_update = "JUMLAH = '$totalBarang'";
    if ($namaBarang != "") {
        $set_update = $set_update . ", NAMA_PRODUCT = '$namaBarang'";
    }
    $query = "UPDATE MERCU.PRODUCT SET " . $set_update . " WHERE KODE_PRODUCT = '$kodeBarang'";
    return execute_query($query);
}

function delete_product($kodeBarang) {
    $query = "DELETE FROM MERCU.PRODUCT WHERE KODE_PRODUCT = '$kodeBarang'";
    return execute_query($query);
}

/**
 * @param $username
 * @param $password
 * @return false|resource
 */
function select_user($username, $password) {
    $query = "SELECT * FROM MERCU.\"USER\" WHERE USERNAME='$username' and PASSWORD='$password'";
    return execute_query($query);
}
