<?php
session_start();
include("config.php");

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$query = mysqli_query($conn,"
    SELECT *
    FROM users
    WHERE username='$username'
    AND password='$password'
");

if(mysqli_num_rows($query) > 0)
{
    $row = mysqli_fetch_assoc($query);

    $_SESSION['admin_id']   = $row['id'];
    $_SESSION['admin_name'] = $row['name'];
    $_SESSION['username']   = $row['username'];

    echo 1;
}
else
{
    echo 0;
}
?>