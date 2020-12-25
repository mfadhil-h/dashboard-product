<?php

include("konten/query-sql.php");

$user = select_user('fadhil','12345678');

while ($row = oci_fetch_array($user, OCI_RETURN_NULLS+OCI_ASSOC)) {
    echo join(", ", $row);
    echo "<br/>";
}
