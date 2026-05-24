<!doctype html>
<html lang="en" class="semi-dark">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>

	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">

	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/semi-dark.css" />

	<title><?php include("include/title.php"); ?></title>
</head>

<body>

<?php
include("include/config.php");

/* Default current date */
$selected_date = date('Y-m-d');

/* If user selects date */
if(isset($_GET['filter_date']) && $_GET['filter_date'] != '')
{
	$selected_date = $_GET['filter_date'];
}
?>

	<!--wrapper-->
	<div class="wrapper">

		<!--sidebar wrapper -->
		<?php include("include/sidebar.php"); ?>
		<!--end sidebar wrapper -->

		<!--start header -->
		<?php include("include/header.php"); ?>
		<!--end header -->

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Show Daily Milk Entry</div>

					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item">
									<a href="javascript:;">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>

								<li class="breadcrumb-item active" aria-current="page">
									Show Daily Milk Entry
								</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

				<h6 class="mb-0 text-uppercase">Show Daily Milk Entry</h6>
				<hr/>

				<div class="card">

					<div class="card-body">

						<!-- Date Filter Form -->
						<form method="GET" class="row mb-4">

							<div class="col-md-3">
								<label class="form-label">Select Date</label>

								<input type="date"
									   name="filter_date"
									   class="form-control"
									   value="<?php echo $selected_date; ?>">
							</div>

							<div class="col-md-2 mt-4">
								<button type="submit" class="btn btn-primary">
									Filter
								</button>

								<a href="show_daily_milk_entry.php" class="btn btn-secondary">
									Reset
								</a>
							</div>

						</form>

						<div class="table-responsive">

							<table id="example" class="table table-striped table-bordered" style="width:100%">

								<thead>
									<tr>
										<th>SR.No.</th>
										<th>Account Number</th>
										<th>Customer Name</th>
										<th>Milk Type</th>
										<th>Milk Quantity</th>
										<th>Milk Rate</th>
										<th>Total Amount</th>
										<th>Date And Time</th>
										<th>Invoice</th>
									</tr>
								</thead>

								<tbody>

									<?php

									$query = "SELECT * FROM milk_entry 
											  WHERE DATE(created_at) = '$selected_date'
											  ORDER BY id DESC";

									$result = mysqli_query($conn, $query);

									$sr = 1;

									while($row = mysqli_fetch_assoc($result))
									{
									?>

									<tr>

										<td><?php echo $sr++; ?></td>

										<td><?php echo $row['cust_ac_no']; ?></td>

										<td><?php echo $row['cust_name']; ?></td>

										<td><?php echo $row['milk_type']; ?></td>

										<td><?php echo $row['milk_quantity']; ?></td>

										<td><?php echo $row['milk_rate']; ?></td>

										<td><?php echo $row['total_amount']; ?></td>

										<td><?php echo $row['created_at']; ?></td>

										<td>
											<a href="milk_invoice.php?id=<?php echo $row['id']; ?>"
											   class="btn btn-primary btn-sm">
												Invoice
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
		<!--end page wrapper -->

		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->

		<!--Start Back To Top Button-->
		<a href="javaScript:;" class="back-to-top">
			<i class='bx bxs-up-arrow-alt'></i>
		</a>
		<!--End Back To Top Button-->

		<?php include("include/footer.php"); ?>

	</div>
	<!--end wrapper-->

	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>

	<!--app JS-->
	<script src="assets/js/app.js"></script>

</body>
</html>