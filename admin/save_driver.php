<?php
include "../includes/config.php";

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$license = $_POST['license_number'];
$national_id = $_POST['national_id'];

mysqli_query($conn,"
INSERT INTO users(full_name,email,phone,password,role)
VALUES('$full_name','$email','$phone','$password','driver')
");

$user_id = mysqli_insert_id($conn);

mysqli_query($conn,"
INSERT INTO drivers(user_id,license_number,national_id)
VALUES('$user_id','$license','$national_id')
");

header("Location: drivers.php");
exit();