<?php

include("include/config.php");

$invoice_id = $_POST['invoice_id'];

$query = "

UPDATE payment_status

SET payment_status = 'Paid'

WHERE invoice_id = '$invoice_id'

";

mysqli_query($conn, $query);

header("location:payment_invoice.php?invoice_id=$invoice_id");

?>