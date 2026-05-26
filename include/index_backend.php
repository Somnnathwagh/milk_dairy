<?php

    include("config.php");

    // Start Total Customers Count
    $count_query = "SELECT COUNT(*) AS total_customers FROM customer_master where status='1' ";
    $count_result = mysqli_query($conn, $count_query);
    $count_row = mysqli_fetch_assoc($count_result);

    $total_customers = $count_row['total_customers'];
    // End Total Customers Count


    // Total Milk Quantity
$milk_quentity_query = "SELECT SUM(milk_quantity) AS total_milk 
FROM milk_entry 
WHERE DATE(created_at) = CURDATE()";

$result_total = mysqli_query($conn, $milk_quentity_query);

$row_total = mysqli_fetch_assoc($result_total);



// Cow Milk Quantity
$milk_quentity_query_cow = "SELECT SUM(milk_quantity) AS cow_total_milk 
FROM milk_entry 
WHERE DATE(created_at) = CURDATE() 
AND milk_type='1'";

$result_cow = mysqli_query($conn, $milk_quentity_query_cow);

$row_cow = mysqli_fetch_assoc($result_cow);

// beffelo Milk Quantity
$milk_quentity_query_buffelo = "SELECT SUM(milk_quantity) AS buffelo_total_milk 
FROM milk_entry 
WHERE DATE(created_at) = CURDATE() 
AND milk_type='2'";

$result_buffelo = mysqli_query($conn, $milk_quentity_query_buffelo);

$row_buffelo = mysqli_fetch_assoc($result_buffelo);

// Total Advance Amount
$total_advance_query = "SELECT SUM(payment) AS total_advance 
FROM advance_payment";

$result_advance = mysqli_query($conn, $total_advance_query);

$row_advance = mysqli_fetch_assoc($result_advance);



?>