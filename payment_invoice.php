<?php

//include("include/config.php");

// $cust_ac_no = $_GET['cust_ac_no'];

// $start_date = $_GET['start_date'];

// $end_date = $_GET['end_date'];



include("include/config.php");

$invoice_id = $_GET['invoice_id'];


/* Payment Details */

$payment_query = "

SELECT * FROM payment_status

WHERE invoice_id = '$invoice_id'

";

$payment_result = mysqli_query($conn, $payment_query);

$payment = mysqli_fetch_assoc($payment_result);

$cust_ac_no = $payment['cust_ac_no'];

$start_date = $payment['start_date'];

$end_date = $payment['end_date'];


/* Customer Details */
$customer_query = "

SELECT 
	milk_entry.cust_name,
	milk_entry.milk_type,
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


/* Food Details */

$food_query = "

SELECT 
	food_name,
	food_price,
	food_unit,
	total_amount

FROM food_entry_master

WHERE cust_ac_no = '$cust_ac_no'

";

$food_result = mysqli_query($conn, $food_query);



/* Advance Payment Total */

$advance_query = "

SELECT
SUM(payment) AS total_advance

FROM advance_payment

WHERE cust_ac_no = '$cust_ac_no'

";

$advance_result = mysqli_query($conn, $advance_query);

$advance = mysqli_fetch_assoc($advance_result);

/* Null असल्यास 0 */

$total_advance = $advance['total_advance'];

if($total_advance == '')
{
	$total_advance = 0;
}

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

			<h2>Rajhans Dairy Baramati</h2>

			<p>Opp of Bharat Petrol Pump.</p>

			<p>Baramati, Maharashtra</p>

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
			<?php echo $payment['invoice_id']; ?>
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
		<p>
	Milk Type :
	<?php echo $customer['milk_type']; ?>
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

	<?php echo $payment['payment_status']; ?>

</p>

		</div>

	</div>



	<!-- Table -->
	<table class="table">
		<thead>
			<tr>
				<th>Sr. No.</th>
				<th>Date</th>
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
				<td colspan="2">
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



	<!-- Food Details -->

<h3 style="margin-top:30px; margin-bottom:10px;">

	Food Details

</h3>

<table class="table">

	<thead>

		<tr>

			<th>Sr. No.</th>

			<th>Food Name</th>

			<th>Per Price</th>

			<th>Quantity</th>

			<th>Total Amount</th>

		</tr>

	</thead>

	<tbody>

<?php

$food_sr = 1;

$food_total = 0;

while($food = mysqli_fetch_assoc($food_result))
{

	$food_total += $food['total_amount'];

?>

		<tr>

			<td>
				<?php echo $food_sr++; ?>
			</td>

			<td>
				<?php echo $food['food_name']; ?>
			</td>

			<td>
				₹ <?php echo number_format($food['food_price'],2); ?>
			</td>

			<td>
				<?php echo $food['food_unit']; ?>
			</td>

			<td>
				₹ <?php echo number_format($food['total_amount'],2); ?>
			</td>

		</tr>

<?php
}
?>

		<tr class="total-row">

			<td colspan="4">

				Food Total

			</td>

			<td>

				₹ <?php echo number_format($food_total,2); ?>

			</td>

		</tr>

	</tbody>

</table>


<div style="margin-top:20px; width:420px; margin-left:auto;">

<?php

/* Milk Total */

$milk_total = $total['total_amount'];

/* Food Total */

$food_total_amount = $food_total;

/* Milk - Food */

$remaining_after_food = $milk_total - $food_total_amount;

/* 40% Advance Cut */

$advance_cut = ($remaining_after_food * 40) / 100;

/* Remaining Advance */

$remaining_advance = $total_advance - $advance_cut;

/* Final Payable */

$final_payable = $remaining_after_food - $advance_cut;

?>

	<table class="table">

		<tr>

			<th style="background:#f3f3f3;">
				Total Milk Payment
			</th>

			<td>
				₹ <?php echo number_format($milk_total,2); ?>
			</td>

		</tr>

		<tr>

			<th style="background:#f3f3f3;">
				Food Amount Cut
			</th>

			<td>
				₹ <?php echo number_format($food_total_amount,2); ?>
			</td>

		</tr>

		<tr>

			<th style="background:#f3f3f3;">
				Remaining After Food
			</th>

			<td>
				₹ <?php echo number_format($remaining_after_food,2); ?>
			</td>

		</tr>

		<tr>

			<th style="background:#f3f3f3;">
				Advance Payment
			</th>

			<td>
				₹ <?php echo number_format($total_advance,2); ?>
			</td>

		</tr>

		<tr>

			<th style="background:#f3f3f3;">
				40% Advance Cut
			</th>

			<td>
				₹ <?php echo number_format($advance_cut,2); ?>
			</td>

		</tr>

		<tr>

			<th style="background:#f3f3f3;">
				Remaining Advance
			</th>

			<td>
				₹ <?php echo number_format($remaining_advance,2); ?>
			</td>

		</tr>

		<tr>

			<th style="background:#d9edf7;">
				Final Payable Amount
			</th>

			<td style="background:#d9edf7;">

				<b>
					₹ <?php echo number_format($final_payable,2); ?>
				</b>

			</td>

		</tr>

	</table>

</div>



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