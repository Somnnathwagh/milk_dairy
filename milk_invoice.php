<?php

include("include/config.php");

$id = $_GET['id'];

$query = "SELECT * FROM milk_entry WHERE id = ?";

$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>

	<title>Milk Invoice</title>

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

	<div class="card">

		<div class="card-body">

			<h2 class="text-center mb-4">Milk Invoice</h2>

			<table class="table table-bordered">

				<tr>
					<th>Account Number</th>
					<td><?php echo $row['cust_ac_no']; ?></td>
				</tr>

				<tr>
					<th>Customer Name</th>
					<td><?php echo $row['cust_name']; ?></td>
				</tr>

				<tr>
					<th>Milk Type</th>
					<td><?php echo $row['milk_type']; ?></td>
				</tr>

				<tr>
					<th>Milk Quantity</th>
					<td><?php echo $row['milk_quantity']; ?></td>
				</tr>

				<tr>
					<th>Milk Rate</th>
					<td><?php echo $row['milk_rate']; ?></td>
				</tr>

				<tr>
					<th>Total Amount</th>
					<td><?php echo $row['total_amount']; ?></td>
				</tr>

			</table>

			<div class="text-center">

				<button onclick="window.print()" class="btn btn-success">

					Print Invoice

				</button>

			</div>

		</div>

	</div>

</div>

</body>
</html>