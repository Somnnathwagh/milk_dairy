<?php

include("config.php");

if(isset($_POST['cust_ac_no']))
{

	$cust_ac_no   = $_POST['cust_ac_no'];

	$cust_name    = $_POST['cust_name'];

	$milk_type    = $_POST['milk_type'];

	$food_name    = $_POST['food_name'];

	$food_price   = $_POST['food_price'];

	$food_unit    = $_POST['food_unit'];

	$total_amount = $_POST['total_amount'];


	$query = "INSERT INTO food_entry_master
	(
		cust_ac_no,
		cust_name,
		milk_type,
		food_name,
		food_price,
		food_unit,
		total_amount
	)

	VALUES

	(?,?,?,?,?,?,?)";


	$stmt = mysqli_prepare($conn, $query);

	mysqli_stmt_bind_param(

		$stmt,

		"sssssss",

		$cust_ac_no,

		$cust_name,

		$milk_type,

		$food_name,

		$food_price,

		$food_unit,

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

}

?>