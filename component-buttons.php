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
					<div class="breadcrumb-title pe-3">Components</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Buttons</li>
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
				<!--end breadcrumb-->
				<div class="row">
					<div class="col col-lg-9 mx-auto">
						<div class="card radius-10">
							<div class="card-body">
								<div>
									<h5 class="card-title">Basic Examples</h5>
								</div>
								<hr/>
								<div class="row row-cols-auto g-3">
									<div class="col">
										<button type="button" class="btn btn-primary px-5">Primary</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-danger px-5">Danger</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-success px-5">Success</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-info px-5">Info</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-warning px-5">Warning</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-dark px-5">Dark</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-secondary px-5">Secondary</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-light px-5">Light</button>
									</div>
								</div>
								<!--end row-->
							</div>
							<div class="card-body">
								<div>
									<h5 class="card-title">Outline Examples</h5>
								</div>
								<hr/>
								<div class="row row-cols-auto g-3">
									<div class="col">
										<button type="button" class="btn btn-outline-primary px-5">Primary</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-outline-danger px-5">Danger</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-outline-success px-5">Success</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-outline-info px-5">Info</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-outline-warning px-5">Warning</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-outline-dark px-5">Dark</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-outline-secondary px-5">Secondary</button>
									</div>
								</div>
								<!--end row-->
							</div>
						</div>
						<div class="card radius-10">
							<div class="card-body">
								<div>
									<h5 class="card-title">Round Buttons</h5>
								</div>
								<hr/>
								<div class="row row-cols-auto g-3">
									<div class="col">
										<button type="button" class="btn btn-primary px-5 radius-30">Primary</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-danger px-5 radius-30">Danger</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-success px-5 radius-30">Success</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-info px-5 radius-30">Info</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-warning px-5 radius-30">Warning</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-dark px-5 radius-30">Dark</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-secondary px-5 radius-30">Secondary</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-light px-5 radius-30">Light</button>
									</div>
								</div>
								<!--end row-->
							</div>
							<div class="card-body">
								<div>
									<h5 class="card-title">Round Outline Buttons</h5>
								</div>
								<hr/>
								<div class="row row-cols-auto g-3">
									<div class="col">
										<button type="button" class="btn btn-outline-primary px-5 radius-30">Primary</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-outline-danger px-5 radius-30">Danger</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-outline-success px-5 radius-30">Success</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-outline-info px-5 radius-30">Info</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-outline-warning px-5 radius-30">Warning</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-outline-dark px-5 radius-30">Dark</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-outline-secondary px-5 radius-30">Secondary</button>
									</div>
									<div class="col">
										<button type="button" class="btn btn-outline-light px-5 radius-30">Light</button>
									</div>
								</div>
								<!--end row-->
							</div>
						</div>

					</div>
				</div>
				<!--end row-->
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
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>