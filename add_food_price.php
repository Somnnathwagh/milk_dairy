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
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Form Start -->
<div class="card mb-4">
	<div class="card-body">
		<h6 class="mb-3 text-uppercase">Customer Form</h6>

<form id="customerForm" method="post">			
	<div class="row">
				<div class="col-md-4 mb-3">
					<label class="form-label">Customer Account Number</label>
					<input type="text" name="cust_ac_no" id="cust_ac_no" class="form-control" placeholder="Enter Customer Account Number" required>
				</div>
				<div class="col-md-4 mb-3">
					<label class="form-label">Customer Name</label>
					<input type="text" name="cust_name" id="cust_name" class="form-control" placeholder="Enter Customer Name" required>
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
					<label class="form-label">Address</label>
					<input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" required>
				</div>

				<div class="col-md-4 mb-3">
					<label class="form-label">Customer Mobile Number</label>
					<input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Enter Customer Mobile Number" required>
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
				<h6 class="mb-0 text-uppercase">Show Customer</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>SR.No.</th>
										<th>Customer Account No</th>
										<th>Customer Name</th>
										<th>Milk Type</th>
										<th>Address</th>
										<th>Mobile Number</th>
									</tr>
								</thead>
								<tbody>
									<?php
										include("include/config.php");
										$query = "SELECT * FROM customer_master ORDER BY id DESC";
										$result = mysqli_query($conn, $query);

										$sr = 1;


										while($row = mysqli_fetch_assoc($result))
										{
										?>
										<tr>
											<td><?php echo $sr++; ?></td>
											<td><?php echo $row['cust_ac_no']; ?></td>
											<td><?php echo $row['cust_name']; ?></td>
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
											<td><?php echo $row['address']; ?></td>
											<td><?php echo $row['mobile_no']; ?></td>
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

	$("#customerForm").on("submit", function(e){

		e.preventDefault();
		$.ajax({
			url : "include/insert_customer.php",
			type : "POST",
			data : $(this).serialize(),

	success:function(response)
	{
	if(response == 1)
	{
		Swal.fire({
			icon: 'success',
			title: 'Success',
			text: 'Customer Inserted Successfully',
			timer: 2000,
			showConfirmButton: false
		});

		var cust_ac_no = $("#cust_ac_no").val();
		var cust_name  = $("#cust_name").val();
		var milk_type  = $("#milk_type option:selected").text();
		var address    = $("#address").val();
		var mobile_no  = $("#mobile_no").val();

		var newRow = `
			<tr>
				<td>${cust_ac_no}</td>
				<td>${cust_name}</td>
				<td>${milk_type}</td>
				<td>${address}</td>
				<td>${mobile_no}</td>
			</tr>
		`;

		$('#example').DataTable().row.add($(newRow)).draw(false);

		$("#customerForm")[0].reset();
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