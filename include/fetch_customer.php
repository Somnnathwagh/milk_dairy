<?php

include("config.php");

$cust_ac_no = $_POST['cust_ac_no'];

$query = "SELECT * FROM customer_master
WHERE cust_ac_no = '$cust_ac_no'";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
	$row = mysqli_fetch_assoc($result);

	$milk_type = "";

	if($row['milk_type'] == 1)
	{
		$milk_type = "Cow";
	}
	else
	{
		$milk_type = "Buffalo";
	}


	// Fetch Milk Rate
	$rate_query = "SELECT * FROM rate_card
	WHERE milk_type = '".$row['milk_type']."'
	ORDER BY id DESC LIMIT 1";

	$rate_result = mysqli_query($conn, $rate_query);

	$milk_rate = "";

	if(mysqli_num_rows($rate_result) > 0)
	{
		$rate_row = mysqli_fetch_assoc($rate_result);

		$milk_rate = $rate_row['price'];
	}

	echo json_encode([

		"status" => 1,

		"cust_name" => $row['cust_name'],

		"milk_type" => $milk_type,

		"milk_rate" => $milk_rate

	]);
}
else
{
	echo json_encode([
		"status" => 0
	]);
}

?>