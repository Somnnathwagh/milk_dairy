<?php

include("config.php");

$cust_ac_no   = mysqli_real_escape_string($conn, $_POST['cust_ac_no']);

$cust_name    = mysqli_real_escape_string($conn, $_POST['cust_name']);

$milk_type    = mysqli_real_escape_string($conn, $_POST['milk_type']);

$milk_quantity = mysqli_real_escape_string($conn, $_POST['milk_quantity']);

$milk_rate    = mysqli_real_escape_string($conn, $_POST['milk_rate']);

$total_amount = mysqli_real_escape_string($conn, $_POST['total_amount']);


// Insert Query
$query = "INSERT INTO milk_entry
(
	cust_ac_no,
	cust_name,
	milk_type,
	milk_quantity,
	milk_rate,
	total_amount
)

VALUES

(?,?,?,?,?,?)";

$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param(
	$stmt,
	"ssssss",
	$cust_ac_no,
	$cust_name,
	$milk_type,
	$milk_quantity,
	$milk_rate,
	$total_amount
);

if(mysqli_stmt_execute($stmt))
{
	echo 1;
}
else
{
	echo 0;
}

?>