<?php
include "includes/header.php";

$id = $_POST['vehicle_id'];
$registration = $_POST['registration_number'];
$type = $_POST['vehicle_type'];
$capacity = $_POST['capacity'];
$status = $_POST['status'];

mysqli_query($conn,"
UPDATE vehicles
SET
registration_number='$registration',
vehicle_type='$type',
capacity='$capacity',
status='$status'
WHERE vehicle_id='$id'
");

header("Location: vehicles.php");
exit();