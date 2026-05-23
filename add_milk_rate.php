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
					<div class="breadcrumb-title pe-3">Tables</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Table</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- Form Start -->
				<div class="card mb-4">
					<div class="card-body">
						<h6 class="mb-3 text-uppercase">Add Milk Rate</h6>
						<form id="milk_rateForm" method="post">			
							<div class="row">
								<div class="col-md-4 mb-3">
									<label class="form-label">Date</label>
									<input type="date" name="date" id="date" class="form-control" placeholder="Enter Date" required>
								</div>
								<div class="col-md-4 mb-3">
									<label class="form-label">Milk Type</label>
									<select name="milk_type" id="milk_type" class="form-select" required>
										<option value="">Select Milk Type</option>
										<option value="1">Cow</option>
										<option value="2">Buffalo</option>
									</select>
								</div>
								<div class="col-md-4 mb-3">
									<label class="form-label">Milk Price</label>
									<input type="text" name="price" id="price" class="form-control" placeholder="Enter Price" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 mb-3 d-flex align-items-end">
									<button type="submit" name="submit" id="submit" class="btn btn-primary px-4">
										Submit
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- Form End -->
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Show Milk Rate</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>SR.No.</th>
										<th>Date</th>
										<th>Milk Type</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody>
									<?php
										include("include/config.php");
										$query = "SELECT * FROM rate_card ORDER BY id DESC";
										$result = mysqli_query($conn, $query);
										$sr = 1;
										while($row = mysqli_fetch_assoc($result))
										{
										?>
										<tr>
											<td><?php echo $sr++; ?></td>
											<td><?php echo $row['date']; ?></td>
											<td>
												<?php
													if($row['milk_type'] == 1)
													{
														echo "Cow";
													}
													else
													{
														echo "Buffalo";
													}
												?>
											</td>
											<td><?php echo $row['price']; ?></td>

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
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	

	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>

	<script>

	$(document).ready(function () {

	$('#example').DataTable();

	$("#milk_rateForm").on("submit", function(e){

		e.preventDefault();
		$.ajax({
			url : "include/insert_milk_rate.php",
			type : "POST",
			data : $(this).serialize(),

	success:function(response)
	{
	if(response == 1)
	{
		Swal.fire({
			icon: 'success',
			title: 'Success',
			text: 'Milk Rate Inserted Successfully',
			timer: 2000,
			showConfirmButton: false
		});

		var date = $("#date").val();
		var milk_type  = $("#milk_type option:selected").text();
		var price    = $("#price").val();
		var newRow = `
			<tr>
				<td>${date}</td>
				<td>${milk_type}</td>
				<td>${price}</td>
			</tr>
		`;

		$('#example').DataTable().row.add($(newRow)).draw(false);

		$("#milk_rateForm")[0].reset();
	}
	else if(response == 2)
	{
		Swal.fire({
			icon: 'warning',
			title: 'Duplicate Entry',
			text: 'Customer Account Number Already Exists',
			timer: 2000,
			showConfirmButton: false
		});
	}
	else
	{
		Swal.fire({
			icon: 'error',
			title: 'Error',
			text: 'Data Not Inserted',
			timer: 2000,
			showConfirmButton: false
		});
	}
	}
		});

	});

	});

</script>

	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>
</html>