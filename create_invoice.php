<?php

include("include/config.php");




$cust_ac_no = $_POST['cust_ac_no'];

$start_date = $_POST['start_date'];

$end_date = $_POST['end_date'];

/* Customer Details */

$customer_query = "

SELECT 
	milk_entry.cust_name,
	customer_master.mobile_no,
	customer_master.address,
	customer_master.cust_ac_no

FROM milk_entry

LEFT JOIN customer_master
ON milk_entry.cust_ac_no = customer_master.cust_ac_no

WHERE milk_entry.cust_ac_no = '$cust_ac_no'

LIMIT 1

";

$customer_result = mysqli_query($conn, $customer_query);

$customer = mysqli_fetch_assoc($customer_result);


/* Total */

$total_query = "

SELECT
SUM(milk_quantity) AS total_qty,
SUM(total_amount) AS total_amount

FROM milk_entry

WHERE cust_ac_no = '$cust_ac_no'

AND DATE(created_at)
BETWEEN '$start_date' AND '$end_date'

";

$total_result = mysqli_query($conn, $total_query);

$total = mysqli_fetch_assoc($total_result);


/* Invoice ID */
date_default_timezone_set("Asia/Kolkata");


/* Customer Name मधील पहिले 3 अक्षरे */

$name_prefix = substr($customer['cust_name'], 0, 3);


/* CAPITAL letters */

$name_prefix = strtoupper($name_prefix);


/* Current India Time */

$time_part = date("His");


/* Final Invoice ID */

$invoice_id = $name_prefix . $time_part;


/* Check Existing */

$check_query = "

SELECT * FROM payment_status

WHERE cust_ac_no = '$cust_ac_no'

AND start_date = '$start_date'

AND end_date = '$end_date'

";

$check_result = mysqli_query($conn, $check_query);

if(mysqli_num_rows($check_result) == 0)
{

	$insert_query = "

	INSERT INTO payment_status (

		invoice_id,
		cust_ac_no,
		cust_name,
		mobile_no,
		address,
		start_date,
		end_date,
		total_qty,
		total_amount

	)

	VALUES (

		'$invoice_id',
		'".$customer['cust_ac_no']."',
		'".$customer['cust_name']."',
		'".$customer['mobile_no']."',
		'".$customer['address']."',
		'$start_date',
		'$end_date',
		'".$total['total_qty']."',
		'".$total['total_amount']."'

	)

	";

	mysqli_query($conn, $insert_query);

}
else
{
	$existing = mysqli_fetch_assoc($check_result);

	$invoice_id = $existing['invoice_id'];
}


/* Redirect */

header("location:payment_invoice.php?invoice_id=$invoice_id");



?>