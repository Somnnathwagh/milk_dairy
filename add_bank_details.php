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
						<h6 class="mb-3 text-uppercase">Add Food Entry</h6>
						<form id="bank_detalsForm" method="post" enctype="multipart/form-data">

    <div class="row">

        <div class="col-md-4 mb-3">
            <label class="form-label">Account Number</label>
            <input type="text"
                name="cust_ac_no"
                id="cust_ac_no"
                class="form-control"
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
            <label class="form-label">Bank Account Number</label>
            <input type="text"
                name="bank_ac_no"
                id="bank_ac_no"
                class="form-control">
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">IFSC Code</label>
            <input type="text"
                name="ifsc_code"
                id="ifsc_code"
                class="form-control">
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Bank Name</label>
            <input type="text"
                name="bank_name"
                id="bank_name"
                class="form-control">
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Branch Name</label>
            <input type="text"
                name="branch_name"
                id="branch_name"
                class="form-control">
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Upload QR Code</label>
            <input type="file"
                name="cust_qr_code"
                id="cust_qr_code"
                class="form-control">
        </div>

    </div>

    <button type="submit" class="btn btn-primary">
        Submit
    </button>

</form>
					</div>
				</div>
				<!-- Form End -->
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Show Food Entry</h6><hr/>
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
										<th>Food_name</th>
										<th>Food Price</th>
										<th>Food Unit </th>
										<th>Total Amount</th>
										<!-- <th>Date And Time</th> -->
									</tr>
								</thead>
								<tbody>
									<?php
										include("include/config.php");
										$query = "SELECT * FROM food_entry_master ORDER BY id DESC";
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
											<td><?php echo $row['food_name']; ?></td>
											<td><?php echo $row['food_price']; ?></td>
											<td><?php echo $row['food_unit']; ?></td>
											<td><?php echo $row['total_amount']; ?></td>
											<!-- <td><?php echo $row['created_at']; ?></td> -->

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

<!-- <script>

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

});

</script> -->

<script>


$(document).ready(function(){

    $("#bank_detalsForm").submit(function(e){

        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({ 
			/// aaaaa

            url : "include/insert_bank_details.php",

            type : "POST",

            data : formData,

            processData : false,

            contentType : false,

            success:function(response)
            {

                if($.trim(response) == "1")
                {

                    Swal.fire({

                        icon : "success",

                        title : "Success",

                        text : "Bank Details Inserted Successfully",

                        timer : 2000,

                        showConfirmButton : false

                    });

                    $("#bank_detalsForm")[0].reset();

                }
                else
                {

                    Swal.fire({

                        icon : "error",

                        title : "Error",

                        text : response

                    });

                }

            }

        });

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

	// Insert Milk Entry
	$("#bank_detalsForm").on("submit", function(e)
	{

		e.preventDefault();

		$.ajax({

			url : "include/insert_bank_details.php",

			type : "POST",

			data : $(this).serialize(),

			success:function(response)
			{

				if(response == 1)
				{

					Swal.fire({

						icon: 'success',

						title: 'Success',

						text: 'Bank Details Inserted Successfully',

						timer: 2000,

						showConfirmButton: false

					});
 

					// Get Form Values
					var cust_ac_no    = $("#cust_ac_no").val();

					var cust_name     = $("#cust_name").val();

					var bank_ac_no     = $("#bank_ac_no").val();

					var ifsc_code = $("#ifsc_code").val();

					var bank_name     = $("#bank_name").val();

					var branch_name  = $("#branch_name").val();

					var cust_qr_code  = $("#cust_qr_code").val();




					// Row Count
					var rowCount = table.rows().count() + 1;



					// Add New Row
					table.row.add([

						rowCount,

						cust_ac_no,

						cust_name,

						bank_ac_no,

						ifsc_code,

						bank_name,

						branch_name,

						cust_qr_code

					]).draw(false);




					// Reset Form
					$("#bank_detalsForm")[0].reset();

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