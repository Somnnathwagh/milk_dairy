


<?php
include("include/index_backend.php");
?>
<!doctype html>
<html lang="en" class="semi-dark">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
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
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
					<div class="col">
						<div class="card radius-10 border-primary border-start border-0 border-4">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Total Customers</p>
										<h4 class="my-1 text-primary"><?php echo $total_customers; ?></h4>
									</div>
									<div class="text-primary ms-auto font-35"><i class="bx bx-cart-alt"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 border-success border-start border-0 border-4">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Today Milk</p>
										<h4 class="my-1 text-success">
											<?php echo $row_total['total_milk'] ? $row_total['total_milk'] : 0; ?>
										</h4>
									</div>
									<div class="text-success ms-auto font-35">
										<i class="bx bx-cart-alt"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10  border-warning border-start border-0 border-4">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Today Cow Milk</p>
										<h4 class="text-warning my-1">						
											<?php echo $row_cow['cow_total_milk'] ? $row_cow['cow_total_milk'] : 0; ?>
										</h4>
									</div>
									<div class="text-warning ms-auto font-35"><i class="bx bx-user-pin"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 border-danger border-start border-0 border-4">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Today Buffello Milk</p>
										<h4 class="my-1 text-danger"><?php echo $row_buffelo['buffelo_total_milk'] ? $row_buffelo['buffelo_total_milk'] : 0; ?></h4>
									</div>
									<div class="text-danger ms-auto font-35"><i class="bx bx-comment-detail"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!--end row-->
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
					<div class="col">
						<div class="card radius-10 border-primary border-start border-0 border-4">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Total Advance</p>
										<h4 class="my-1 text-primary"><?php echo $row_advance['total_advance'] ? $row_advance['total_advance'] : 0; ?>
										</h4>
									</div>
									<div class="text-primary ms-auto font-35"><i class="bx bx-cart-alt"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 border-success border-start border-0 border-4">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Total Pending Advance</p>
										<h4 class="my-1 text-success">$89,245</h4>
									</div>
									<div class="text-success ms-auto font-35"><i class="bx bx-dollar"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10  border-warning border-start border-0 border-4">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Today Milk Rate(Cow)</p>
										<h4 class="text-warning my-1">24.5K</h4>
									</div>
									<div class="text-warning ms-auto font-35"><i class="bx bx-user-pin"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 border-danger border-start border-0 border-4">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Today Milk Rate(Buffello)</p>
										<h4 class="my-1 text-danger">8569</h4>
									</div>
									<div class="text-danger ms-auto font-35"><i class="bx bx-comment-detail"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!--end row-->

				<div class="row">
                   	<div class="col-12 col-lg-12">
                      	<div class="card radius-10">
							<div class="card-header">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Sales Overview</h6>
									</div>
									<div class="dropdown ms-auto">
										<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
										</a>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="javascript:;">Action</a>
											</li>
											<li><a class="dropdown-item" href="javascript:;">Another action</a>
											</li>
											<li>
												<hr class="dropdown-divider">
											</li>
											<li><a class="dropdown-item" href="javascript:;">Something else here</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						  	<div class="card-body">
								<div class="chart-container-0">
									<canvas id="chart1"></canvas>
							  	</div>
						  	</div>
					  	</div>
				   	</div>
				</div><!--end row-->
				<div class="card radius-10">
                	<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h6 class="mb-0">Recent Orders</h6>
							</div>
							<div class="dropdown ms-auto">
								<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="javascript:;">Action</a>
									</li>
									<li><a class="dropdown-item" href="javascript:;">Another action</a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="javascript:;">Something else here</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table align-middle mb-0">
								<thead class="table-light">
							 		<tr>
										<th>Product</th>
										<th>Photo</th>
										<th>Product ID</th>
										<th>Status</th>
										<th>Amount</th>
										<th>Date</th>
							 		</tr>
							 	</thead>
							 	<tbody>
									<tr>
							  			<td>Iphone 5</td>
							  			<td><img src="assets/images/products/01.png" class="product-img-2" alt="product img"></td>
							  			<td>#9405822</td>
							  			<td><span class="badge bg-success text-white shadow-sm">Paid</span></td>
							  			<td>$1250.00</td>
							  			<td>03 Feb 2020</td>
							 		</tr>
							 		<tr>
							  			<td>Earphone GL</td>
							  			<td><img src="assets/images/products/02.png" class="product-img-2" alt="product img"></td>
							  			<td>#8304620</td>
							  			<td><span class="badge bg-info text-white shadow-sm">Pending</span></td>
							  			<td>$1500.00</td>
							  			<td>05 Feb 2020</td>
							 		</tr>
							 		<tr>
										<td>HD Hand Camera</td>
										<td><img src="assets/images/products/03.png" class="product-img-2" alt="product img"></td>
										<td>#4736890</td>
										<td><span class="badge bg-danger text-white shadow-sm">Failed</span></td>
										<td>$1400.00</td>
										<td>06 Feb 2020</td>
							 		</tr>
							 		<tr>
							  			<td>Clasic Shoes</td>
							  			<td><img src="assets/images/products/04.png" class="product-img-2" alt="product img"></td>
							  			<td>#8543765</td>
							  			<td><span class="badge bg-success text-white shadow-sm">Paid</span></td>
							  			<td>$1200.00</td>
							  			<td>14 Feb 2020</td>
							 		</tr>
									<tr>
									<td>Sitting Chair</td>
									<td><img src="assets/images/products/06.png" class="product-img-2" alt="product img"></td>
									<td>#9629240</td>
									<td><span class="badge bg-info text-white shadow-sm">Pending</span></td>
									<td>$1500.00</td>
									<td>18 Feb 2020</td>
									</tr>
									<tr>
									<td>Hand Watch</td>
									<td><img src="assets/images/products/05.png" class="product-img-2" alt="product img"></td>
									<td>#8506790</td>
									<td><span class="badge bg-danger text-white shadow-sm">Failed</span></td>
									<td>$1800.00</td>
									<td>21 Feb 2020</td>
									</tr>
						    	</tbody>
						  	</table>
						</div>
					</div>
				</div>
				<!-- <div class="card radius-10 w-100">
					<div class="card-header bg-transparent">
						<div class="d-flex align-items-center">
							<div>
								<h6 class="mb-0">World Map</h6>
							</div>
							<div class="dropdown ms-auto">
								<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="javascript:;">Action</a>
									</li>
									<li><a class="dropdown-item" href="javascript:;">Another action</a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="javascript:;">Something else here</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div id="geographic-map-2"></div>
				</div> -->
			</div>
		</div>
	</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
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
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="assets/js/index.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>