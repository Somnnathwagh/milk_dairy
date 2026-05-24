<?php

include("config.php");

$cust_ac_no  = $_POST['cust_ac_no'];
$cust_name   = $_POST['cust_name'];
$milk_type   = $_POST['milk_type'];
$payment     = $_POST['payment'];
$total_amount = $_POST['total_amount'];

$query = "INSERT INTO advance_payment
(
    cust_ac_no,
    cust_name,
    milk_type,
    payment,
    total_amount
)
VALUES
(
    '$cust_ac_no',
    '$cust_name',
    '$milk_type',
    '$payment',
    '$total_amount'
)";

if(mysqli_query($conn, $query))
{
    echo 1;
}
else
{
    echo 0;
}

?>