<?php

include("include/config.php");

$cust_ac_no = $_GET['cust_ac_no'];

$start_date = $_GET['start_date'];

$end_date = $_GET['end_date'];

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


/* Daily Records */

$query = "

SELECT * FROM milk_entry

WHERE cust_ac_no = '$cust_ac_no'

AND DATE(created_at)
BETWEEN '$start_date' AND '$end_date'

ORDER BY created_at ASC

";

$result = mysqli_query($conn, $query);


/* Totals */

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

?>

<!doctype html>
<html lang="en">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Milk Invoice</title>

<link href="assets/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
	margin:0;
	padding:20px;
	background:#f1f1f1;
	font-family:Arial, sans-serif;
	color:#000;
}

.invoice-container{
	width:100%;
	max-width:1100px;
	margin:auto;
	background:#fff;
	border:2px solid #000;
}

.invoice-header{
	display:flex;
	justify-content:space-between;
	align-items:flex-start;
	padding:15px;
	border-bottom:2px solid #000;
}

.company-details h2{
	margin:0;
	font-size:30px;
	font-weight:bold;
}

.company-details p{
	margin:3px 0;
	font-size:14px;
}

.invoice-title{
	font-size:48px;
	font-weight:bold;
}

.invoice-info{
	padding:10px 15px;
	border-bottom:2px solid #000;
	font-size:15px;
	line-height:28px;
}

.customer-section{
	display:flex;
	justify-content:space-between;
	padding:15px;
	border-bottom:2px solid #000;
}

.customer-box{
	width:48%;
}

.customer-box h4{
	margin:0 0 10px;
	font-size:24px;
}

.customer-box p{
	margin:3px 0;
	font-size:14px;
}

.table{
	width:100%;
	border-collapse:collapse;
}

.table th,
.table td{
	border:1px solid #000;
	padding:10px;
	font-size:14px;
	text-align:center;
}

.table th{
	background:#e9e9e9;
	font-weight:bold;
}

.total-row td{
	font-weight:bold;
	background:#f3f3f3;
}

.bottom-section{
	display:flex;
	justify-content:space-between;
	padding:20px 15px;
}

.period{
	font-size:15px;
	font-weight:bold;
}

.signature{
	text-align:right;
	font-size:24px;
	font-weight:bold;
	margin-top:80px;
}

.print-btn{
	margin:20px 0;
	text-align:center;
}

.print-btn button{
	padding:10px 30px;
	font-size:16px;
	border:none;
	background:#000;
	color:#fff;
	cursor:pointer;
	border-radius:5px;
}

@media print{

	body{
		background:#fff;
		padding:0;
	}

	.print-btn{
		display:none;
	}

	.invoice-container{
		border:1px solid #000;
		width:100%;
	}

}

</style>

</head>

<body>

<div class="print-btn">

	<button onclick="window.print()">
		Print Invoice
	</button>

</div>



<div class="invoice-container">

	<!-- Header -->

	<div class="invoice-header">

		<div class="company-details">

			<h2>Dairy Milk</h2>

			<p>Rajiv Nagar, Mata Mandir Road</p>

			<p>Nagpur, Maharashtra</p>

			<p>Mobile : 9876543210</p>

		</div>

		<div class="invoice-title">
			INVOICE
		</div>

	</div>



	<!-- Invoice Info -->

	<div class="invoice-info">

		<div>
			<b>Invoice No. :</b>
			<?php echo rand(1000,9999); ?>
		</div>

		<div>
			<b>Invoice Date :</b>
			<?php echo date('d/m/Y'); ?>
		</div>

		<div>
			<b>Payment Period :</b>

			<?php echo date('d/m/Y', strtotime($start_date)); ?>

			To

			<?php echo date('d/m/Y', strtotime($end_date)); ?>
		</div>

	</div>



	<!-- Customer Section -->

	<div class="customer-section">

		<div class="customer-box">

			<h4>Bill To</h4>

			<p>
				<b>
					<?php echo $customer['cust_name']; ?>
				</b>
			</p>

			<p>
				Account No :
				<?php echo $customer['cust_ac_no']; ?>
			</p>

			<p>
				Mobile :
				<?php echo $customer['mobile_no']; ?>
			</p>

			<p>
				Address :
				<?php echo $customer['address']; ?>
			</p>

		</div>



		<div class="customer-box" style="text-align:right;">

			<h4>Payment Summary</h4>

			<p>
				<b>Total Quantity :</b>

				<?php echo $total['total_qty']; ?> Ltr
			</p>

			<p>
				<b>Total Amount :</b>

				₹ <?php echo number_format($total['total_amount'],2); ?>
			</p>

			<p>
				<b>Status :</b>

				Pending
			</p>

		</div>

	</div>



	<!-- Table -->

	<table class="table">

		<thead>

			<tr>

				<th>Sr. No.</th>

				<th>Date</th>

				<th>Description</th>

				<th>Quantity</th>

				<th>Amount</th>

			</tr>

		</thead>

		<tbody>

<?php

$sr = 1;

while($row = mysqli_fetch_assoc($result))
{
?>

			<tr>

				<td>
					<?php echo $sr++; ?>
				</td>

				<td>
					<?php echo date('d/m/Y', strtotime($row['created_at'])); ?>
				</td>

				<td>
					<?php echo $row['milk_type']; ?> Milk
				</td>

				<td>
					<?php echo $row['milk_quantity']; ?> Ltr
				</td>

				<td>
					₹ <?php echo number_format($row['total_amount'],2); ?>
				</td>

			</tr>

<?php
}
?>

			<tr class="total-row">

				<td colspan="3">
					Total
				</td>

				<td>
					<?php echo $total['total_qty']; ?> Ltr
				</td>

				<td>
					₹ <?php echo number_format($total['total_amount'],2); ?>
				</td>

			</tr>

		</tbody>

	</table>



	<!-- Bottom -->

	<div class="bottom-section">

		<div class="period">

			Period :

			<?php echo date('d F Y', strtotime($start_date)); ?>

			To

			<?php echo date('d F Y', strtotime($end_date)); ?>

		</div>

		<div class="signature">

			Dairy Milk

		</div>

	</div>

</div>

</body>
</html>