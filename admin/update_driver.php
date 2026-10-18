<?php
include "includes/header.php";

$driver_id = $_POST['driver_id'];
$user_id = $_POST['user_id'];

$name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$license = $_POST['license_number'];
$national = $_POST['national_id'];
$status = $_POST['status'];

mysqli_query($conn,"
UPDATE users
SET
full_name='$name',
email='$email',
phone='$phone'
WHERE user_id='$user_id'
");

mysqli_query($conn,"
UPDATE drivers
SET
license_number='$license',
national_id='$national',
status='$status'
WHERE driver_id='$driver_id'
");

header("Location: drivers.php");
exit();