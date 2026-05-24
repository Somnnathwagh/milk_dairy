<?php
include("include/config.php");

/* Default current month */
$selected_month = date('Y-m');

/* Default slot */
$selected_slot = 'slot1';

/* If user selects month */
if(isset($_GET['filter_month']) && $_GET['filter_month'] != '')
{
	$selected_month = $_GET['filter_month'];
}

/* If user selects slot */
if(isset($_GET['slot']) && $_GET['slot'] != '')
{
	$selected_slot = $_GET['slot'];
}

/* Month Start Date */
$month_start = $selected_month . '-01';

/* Month End Date */
$month_end = date("Y-m-t", strtotime($month_start));

/* Slot Wise Date Range */
if($selected_slot == 'slot1')
{
	/* 1 to 15 */
	$start_date = $selected_month . '-01';
	$end_date   = $selected_month . '-15';
}
else
{
	/* 16 to Month End */
	$start_date = $selected_month . '-16';
	$end_date   = $month_end;
}
?>

<!doctype html>
<html lang="en" class="semi-dark">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />

	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">

	<link rel="stylesheet" href="assets/css/semi-dark.css" />

	<title><?php include("include/title.php"); ?></title>

</head>

<body>

<div class="wrapper">

	<?php include("include/sidebar.php"); ?>

	<?php include("include/header.php"); ?>

	<div class="page-wrapper">
		<div class="page-content">

			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

				<div class="breadcrumb-title pe-3">
					Make Payment
				</div>

			</div>

			<h6 class="mb-0 text-uppercase">
				Make Payment
			</h6>

			<hr/>

			<div class="card">

				<div class="card-body">

					<!-- FILTER FORM -->
					<form method="GET" class="row mb-4">

						<!-- Month -->
						<div class="col-md-3">

							<label class="form-label">
								Select Month
							</label>

							<input type="month"
								   name="filter_month"
								   class="form-control"
								   value="<?php echo $selected_month; ?>">

						</div>

						<!-- Slot -->
						<div class="col-md-3">

							<label class="form-label">
								Select Slot
							</label>

							<select name="slot" class="form-control">

								<option value="slot1"
								<?php if($selected_slot == 'slot1') echo 'selected'; ?>>
									Slot 1 (1 To 15)
								</option>

								<option value="slot2"
								<?php if($selected_slot == 'slot2') echo 'selected'; ?>>
									Slot 2 (16 To End)
								</option>

							</select>

						</div>

						<!-- Button -->
						<div class="col-md-3 mt-4">

							<button type="submit" class="btn btn-primary">
								Filter
							</button>

							<a href="show_daily_milk_entry.php"
							   class="btn btn-secondary">
								Reset
							</a>

						</div>

					</form>

					<!-- DATE SHOW -->
					<div class="alert alert-info">

						<b>
							Showing Data :
						</b>

						<?php echo date('d-m-Y', strtotime($start_date)); ?>

						To

						<?php echo date('d-m-Y', strtotime($end_date)); ?>

					</div>

					<div class="table-responsive">

						<table id="example"
							   class="table table-striped table-bordered"
							   style="width:100%">

							<thead>

								<tr>

									<th>SR.No.</th>
									<th>Account Number</th>
									<th>Customer Name</th>
									<th>Total Milk Quantity</th>
									<th>Total Amount</th>
									<th>View Payment List</th>
								</tr>
							</thead>

							<tbody>

<?php

$query = "
SELECT 
	cust_ac_no,
	cust_name,
	SUM(milk_quantity) AS total_qty,
	SUM(total_amount) AS total_payment

FROM milk_entry

WHERE DATE(created_at) 
BETWEEN '$start_date' AND '$end_date'

GROUP BY cust_ac_no

ORDER BY total_payment DESC
";

$result = mysqli_query($conn, $query);

$sr = 1;

while($row = mysqli_fetch_assoc($result))
{
?>

								<tr>

									<td>
										<?php echo $sr++; ?>
									</td>

									<td>
										<?php echo $row['cust_ac_no']; ?>
									</td>

									<td>
										<?php echo $row['cust_name']; ?>
									</td>
									<td>
										<?php echo $row['total_qty']; ?>
									</td>

									<td>
										₹ <?php echo number_format($row['total_payment'], 2); ?>
									</td>
									<td>

	<a href="payment_invoice.php?
	cust_ac_no=<?php echo $row['cust_ac_no']; ?>
	&start_date=<?php echo $start_date; ?>
	&end_date=<?php echo $end_date; ?>"

	class="btn btn-primary btn-sm">

		View

	</a>

</td>
								</tr>
<?php
}
?>

							</tbody>

						</table>

					</div>

				</div>

			</div>

		</div>
	</div>

	<div class="overlay toggle-icon"></div>

	<a href="javaScript:;" class="back-to-top">
		<i class='bx bxs-up-arrow-alt'></i>
	</a>

	<?php include("include/footer.php"); ?>

</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.min.js"></script>

<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>

<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>

<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>

<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {

	$('#example').DataTable({

		"order": [[4, "desc"]]

	});

});
</script>

<script src="assets/js/app.js"></script>

</body>
</html>