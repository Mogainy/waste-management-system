<?php
include "includes/header.php";

$id=$_POST['request_id'];

$customer=$_POST['customer_id'];
$waste=$_POST['waste_type'];
$quantity=$_POST['quantity'];
$address=$_POST['pickup_address'];
$date=$_POST['collection_date'];

mysqli_query($conn,"
UPDATE collection_requests
SET
customer_id='$customer',
waste_type='$waste',
quantity='$quantity',
pickup_address='$address',
collection_date='$date'
WHERE request_id='$id'
");

header("Location: collection_requests.php");
exit();