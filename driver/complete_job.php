<?php
include "../authentication/auth.php";
include "../includes/config.php";

$request = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Get the driver's ID
$driver = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT driver_id
FROM drivers
WHERE user_id='$user_id'
"));

$driver_id = $driver['driver_id'];

// Get the vehicle assigned to this request
$vehicle = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT vehicle_id
FROM collection_requests
WHERE request_id='$request'
"));

// Mark the request as completed
mysqli_query($conn,"
UPDATE collection_requests
SET status='Completed'
WHERE request_id='$request'
");

// Make the vehicle available again
mysqli_query($conn,"
UPDATE vehicles
SET status='Available'
WHERE vehicle_id='".$vehicle['vehicle_id']."'
");

// Make the driver available again
mysqli_query($conn,"
UPDATE drivers
SET status='Available'
WHERE driver_id='$driver_id'
");

header("Location: jobs.php");
exit();