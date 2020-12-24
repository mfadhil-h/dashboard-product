<?php

include("query-sql.php");

$product = select_product();

while ($row = oci_fetch_array($product, OCI_RETURN_NULLS+OCI_ASSOC)) {
    echo join(", ", $row);
    echo "<br/>";
}

