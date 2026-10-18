<?php
include "includes/header.php";

$request = $_POST['request_id'];
$driver = $_POST['driver_id'];
$vehicle = $_POST['vehicle_id'];

// Update request
mysqli_query($conn,"
UPDATE collection_requests
SET
driver_id='$driver',
vehicle_id='$vehicle',
status='Assigned'
WHERE request_id='$request'
");

// Mark vehicle as busy
mysqli_query($conn,"
UPDATE vehicles
SET status='Busy'
WHERE vehicle_id='$vehicle'
");
mysqli_query($conn,"
UPDATE drivers
SET status='Busy'
WHERE driver_id='$driver'
");

header("Location: collection_requests.php");
exit();