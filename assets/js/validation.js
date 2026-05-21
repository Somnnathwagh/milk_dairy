$(document).ready(function () {

	$('#example').DataTable();

	$("#customerForm").validate({

		errorClass: "error",

		rules: {

			cust_ac_no: {
				required: true
			},

			cust_name: {
				required: true
			},

			milk_type: {
				required: true
			},

			address: {
				required: true
			},

			mobile_no: {
				required: true,
				digits: true,
				minlength: 10,
				maxlength: 10
			}
		},

		messages: {

			cust_ac_no: {
				required: "Please Enter Customer Account Number"
			},

			cust_name: {
				required: "Please Enter Customer Name"
			},

			milk_type: {
				required: "Please Select Milk Type"
			},

			address: {
				required: "Please Enter Address"
			},

			mobile_no: {
				required: "Please Enter Mobile Number",
				digits: "Only Numbers Allowed",
				minlength: "Mobile Number Must Be 10 Digits",
				maxlength: "Mobile Number Must Be 10 Digits"
			}
		},

		submitHandler: function(form) {

			$.ajax({

				url : "include/insert_customer.php",
				type : "POST",
				data : $(form).serialize(),

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

		}

	});

});