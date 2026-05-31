<?php

include("config.php");

if(isset($_POST['cust_ac_no']))
{

    $cust_ac_no  = $_POST['cust_ac_no'];
    $cust_name   = $_POST['cust_name'];
    $bank_ac_no  = $_POST['bank_ac_no'];
    $ifsc_code   = $_POST['ifsc_code'];
    $bank_name   = $_POST['bank_name'];
    $branch_name = $_POST['branch_name'];

    $cust_qr_code = "";

    if(isset($_FILES['cust_qr_code']) && $_FILES['cust_qr_code']['name'] != "")
    {

        $cust_qr_code = time()."_".$_FILES['cust_qr_code']['name'];

        move_uploaded_file(
            $_FILES['cust_qr_code']['tmp_name'],
            "../image/".$cust_qr_code
        );

    }

    $query = "INSERT INTO bank_details
    (
        cust_ac_no,
        cust_name,
        bank_ac_no,
        ifsc_code,
        bank_name,
        branch_name,
        cust_qr_code
    )
    VALUES
    (
        ?,?,?,?,?,?,?
    )";

    $stmt = mysqli_prepare($conn,$query);

    if(!$stmt)
    {
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param(

        $stmt,

        "sssssss",

        $cust_ac_no,

        $cust_name,

        $bank_ac_no,

        $ifsc_code,

        $bank_name,

        $branch_name,

        $cust_qr_code

    );

    if(mysqli_stmt_execute($stmt))
    {
        echo 1;
    }
    else
    {
        echo mysqli_error($conn);
    }

}

?>