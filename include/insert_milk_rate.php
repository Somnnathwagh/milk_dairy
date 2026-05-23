<?php

include("config.php");

$date = mysqli_real_escape_string($conn, $_POST['date']);
$milk_type = mysqli_real_escape_string($conn, $_POST['milk_type']);
$price = mysqli_real_escape_string($conn, $_POST['price']);


// Duplicate Check
$check_query = "SELECT * FROM rate_card 
WHERE date = ? AND milk_type = ?";

$check_stmt = mysqli_prepare($conn, $check_query);

mysqli_stmt_bind_param(
	$check_stmt,
	"ss",
	$date,
	$milk_type
);

mysqli_stmt_execute($check_stmt);

$check_result = mysqli_stmt_get_result($check_stmt);

if(mysqli_num_rows($check_result) > 0)
{
	echo 2;
	exit();
}


// Insert Query
$query = "INSERT INTO rate_card
(date, milk_type, price)

VALUES

(?,?,?)";

$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param(
	$stmt,
	"sss",
	$date,
	$milk_type,
	$price
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