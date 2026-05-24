<?php

include("config.php");

$food_name = $_POST['food_name'];

$query = "SELECT * FROM food_master WHERE food_name='$food_name'";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
	$row = mysqli_fetch_assoc($result);

	echo json_encode([
		"status" => 1,
		"food_price" => $row['food_price']
	]);
}
else
{
	echo json_encode([
		"status" => 0
	]);
}

?>