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
						<h6 class="mb-3 text-uppercase">Add Milk Entry</h6>
						<form id="milk_entryForm" method="post">

			<div class="row">

				<div class="col-md-4 mb-3">
					<label class="form-label">Account Number</label>

					<input type="text"
					name="cust_ac_no"
					id="cust_ac_no"
					class="form-control"
					placeholder="Enter Account Number"
					required>
				</div>


				<div class="col-md-4 mb-3">
					<label class="form-label">Customer Name</label>

					<input type="text"
					name="cust_name"
					id="cust_name"
					class="form-control"
					readonly>
				</div>


				<div class="col-md-4 mb-3">
					<label class="form-label">Milk Type</label>

					<input type="text"
					name="milk_type"
					id="milk_type"
					class="form-control"
					readonly>
				</div>


				<div class="col-md-4 mb-3">
					<label class="form-label">Milk Quantity</label>

					<input type="text"
					name="milk_quantity"
					id="milk_quantity"
					class="form-control"
					placeholder="Enter Milk Quantity"
					required>
				</div>


				<div class="col-md-4 mb-3">
					<label class="form-label">Milk Rate</label>

					<input type="text"
					name="milk_rate"
					id="milk_rate"
					class="form-control"
					readonly>
				</div>


				<div class="col-md-4 mb-3">
					<label class="form-label">Total Amount</label>

					<input type="text"
					name="total_amount"
					id="total_amount"
					class="form-control"
					readonly>
				</div>

			</div>


			<div class="row">
				<div class="col-md-4 mb-3 d-flex align-items-end">

					<button type="submit"
					class="btn btn-primary px-4">
						Submit
					</button>

				</div>
			</div>

		</form>

					</div>
				</div>
				<!-- Form End -->
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Show Milk Entry</h6><hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>SR.No.</th>
										<th>Account Number</th>
										<th>Customer Name</th>
										<th>Milk Type</th>
										<th>Milk Quentity</th>
										<th>Milk Rate</th>
										<th>Milk </th>
									</tr>
								</thead>
								<tbody>
									<?php
										include("include/config.php");
										$query = "SELECT * FROM milk_entry ORDER BY id DESC";
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

$(document).ready(function(){

	// Fetch Customer Details
	$("#cust_ac_no").on("keyup", function(){

		var cust_ac_no = $(this).val();

		if(cust_ac_no != "")
		{
			$.ajax({

				url : "include/fetch_customer.php",
				type : "POST",

				data : {
					cust_ac_no : cust_ac_no
				},

				success:function(response)
				{
					var data = JSON.parse(response);

					if(data.status == 1)
					{
						$("#cust_name").val(data.cust_name);

						$("#milk_type").val(data.milk_type);

						$("#milk_rate").val(data.milk_rate);
					}
					else
					{
						$("#cust_name").val("");

						$("#milk_type").val("");

						$("#milk_rate").val("");

						$("#total_amount").val("");
					}
				}
			});
		}

	});


	// Total Amount Calculation
	$("#milk_quantity").on("keyup", function(){

		var quantity = $("#milk_quantity").val();

		var rate = $("#milk_rate").val();

		var total = quantity * rate;

		$("#total_amount").val(total);

	});

});

</script>

<script>

$(document).ready(function () {

	// DataTable Initialize
	var table = $('#example').DataTable();



	// Fetch Customer Details
	$("#cust_ac_no").on("keyup", function(){

		var cust_ac_no = $(this).val();

		if(cust_ac_no != "")
		{
			$.ajax({

				url : "include/fetch_customer.php",

				type : "POST",

				data : {
					cust_ac_no : cust_ac_no
				},

				success:function(response)
				{
					var data = JSON.parse(response);

					if(data.status == 1)
					{
						$("#cust_name").val(data.cust_name);

						$("#milk_type").val(data.milk_type);

						$("#milk_rate").val(data.milk_rate);
					}
					else
					{
						$("#cust_name").val("");

						$("#milk_type").val("");

						$("#milk_rate").val("");

						$("#total_amount").val("");
					}
				}

			});
		}

	});



	// Total Amount Calculation
	$("#milk_quantity").on("keyup", function(){

		var quantity = $("#milk_quantity").val();

		var rate = $("#milk_rate").val();

		var total = quantity * rate;

		$("#total_amount").val(total);

	});




	// Insert Milk Entry
	$("#milk_entryForm").on("submit", function(e){

		e.preventDefault();

		$.ajax({

			url : "include/insert_milk_entry.php",

			type : "POST",

			data : $(this).serialize(),

			success:function(response)
			{

				if(response == 1)
				{

					Swal.fire({

						icon: 'success',

						title: 'Success',

						text: 'Milk Entry Inserted Successfully',

						timer: 2000,

						showConfirmButton: false

					});


					// Get Form Values
					var cust_ac_no    = $("#cust_ac_no").val();

					var cust_name     = $("#cust_name").val();

					var milk_type     = $("#milk_type").val();

					var milk_quantity = $("#milk_quantity").val();

					var milk_rate     = $("#milk_rate").val();

					var total_amount  = $("#total_amount").val();



					// Row Count
					var rowCount = table.rows().count() + 1;



					// Add New Row
					table.row.add([

						rowCount,

						cust_ac_no,

						cust_name,

						milk_type,

						milk_quantity,

						milk_rate,

						total_amount

					]).draw(false);




					// Reset Form
					$("#milk_entryForm")[0].reset();

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