<?php

include("config.php");

if(isset($_POST['food_name']))
{
	$food_name = mysqli_real_escape_string($conn, $_POST['food_name']);
	$food_price  = mysqli_real_escape_string($conn, $_POST['food_price']);


    $check_query = "SELECT * FROM food_master 
WHERE food_name = ?";

$check_stmt = mysqli_prepare($conn, $check_query);

mysqli_stmt_bind_param(
	$check_stmt,
	"s",
	$food_name
);

mysqli_stmt_execute($check_stmt);

$check_result = mysqli_stmt_get_result($check_stmt);

if(mysqli_num_rows($check_result) > 0)
{
	echo 2;
	exit();
}

	$query = "INSERT INTO food_master
	(food_name, food_price)

	VALUES

	(?,?)";

	$stmt = mysqli_prepare($conn, $query);

	mysqli_stmt_bind_param(
		$stmt,
		"ss",
		$food_name,
		$food_price,
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