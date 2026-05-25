<?php

include("include/config.php");

$invoice_id = $_POST['invoice_id'];

$status = $_POST['status'];

$query = "

UPDATE payment_status

SET payment_status = '$status'

WHERE invoice_id = '$invoice_id'

";

mysqli_query($conn, $query);

echo "success";

?>