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
		<h6 class="mb-3 text-uppercase">Add Food Price</h6>

<form id="customerForm" method="post">			
	<div class="row">
				<div class="col-md-4 mb-3">
					<label class="form-label">Food Name</label>
					<input type="text" name="food_name" id="food_name" class="form-control" placeholder="Enter Food Name" required>
				</div>
				<div class="col-md-4 mb-3">
					<label class="form-label">Food Price</label>
					<input type="text" name="food_price" id="food_price" class="form-control" placeholder="Enter Food Price" required>
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
				<h6 class="mb-0 text-uppercase">Show Availabe Food</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>SR.No.</th>
										<th>Food Name</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody>
									<?php
										include("include/config.php");
										$query = "SELECT * FROM food_master ORDER BY id DESC";
										$result = mysqli_query($conn, $query);

										$sr = 1;


										while($row = mysqli_fetch_assoc($result))
										{
										?>
										<tr>
											<td><?php echo $sr++; ?></td>
											<td><?php echo $row['food_name']; ?></td>
											<td><?php echo $row['food_price']; ?></td>
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

$(document).ready(function () {

	// DataTable Initialize
	var table = $('#example').DataTable();

	// Form Submit
	$("#customerForm").on("submit", function(e)
	{
		e.preventDefault();

		$.ajax({

			url : "include/insert_food_price.php",

			type : "POST",

			data : $(this).serialize(),

			success:function(response)
			{

				if(response == 1)
				{

					// Form Values
					var food_name  = $("#food_name").val();

					var food_price = $("#food_price").val();

					// Row Count
					var rowCount = table.rows().count() + 1;

					// Add Row Instantly Without Refresh
					table.row.add([

						rowCount,

						food_name,

						food_price

					]).draw(false);

					// Sweet Alert
					Swal.fire({

						icon: 'success',

						title: 'Success',

						text: 'Food Price Inserted Successfully',

						timer: 2000,

						showConfirmButton: false

					});

					// Reset Form
					$("#customerForm")[0].reset();

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