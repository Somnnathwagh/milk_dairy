<?php

include("config.php");

if(isset($_POST['cust_ac_no']))
{
	$cust_ac_no = mysqli_real_escape_string($conn, $_POST['cust_ac_no']);
	$cust_name  = mysqli_real_escape_string($conn, $_POST['cust_name']);
	$milk_type  = mysqli_real_escape_string($conn, $_POST['milk_type']);
	$address    = mysqli_real_escape_string($conn, $_POST['address']);
	$mobile_no  = mysqli_real_escape_string($conn, $_POST['mobile_no']);


    $check_query = "SELECT * FROM customer_master 
WHERE cust_ac_no = ?";

$check_stmt = mysqli_prepare($conn, $check_query);

mysqli_stmt_bind_param(
	$check_stmt,
	"s",
	$cust_ac_no
);

mysqli_stmt_execute($check_stmt);

$check_result = mysqli_stmt_get_result($check_stmt);

if(mysqli_num_rows($check_result) > 0)
{
	echo 2;
	exit();
}

	$query = "INSERT INTO customer_master
	(cust_ac_no, cust_name, milk_type, address, mobile_no)

	VALUES

	(?,?,?,?,?)";

	$stmt = mysqli_prepare($conn, $query);

	mysqli_stmt_bind_param(
		$stmt,
		"sssss",
		$cust_ac_no,
		$cust_name,
		$milk_type,
		$address,
		$mobile_no
	);

	if(mysqli_stmt_execute($stmt))
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
}

?>