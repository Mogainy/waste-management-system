<?php
include "includes/header.php";

$customer_id = $_POST['customer_id'];
$user_id = $_POST['user_id'];

$name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

mysqli_query($conn,"
UPDATE users
SET
full_name='$name',
email='$email',
phone='$phone'
WHERE user_id='$user_id'
");

mysqli_query($conn,"
UPDATE customers
SET
address='$address'
WHERE customer_id='$customer_id'
");

header("Location: customers.php");
exit();