<?php

include "../includes/config.php";

$registration = $_POST['registration_number'];
$type = $_POST['vehicle_type'];
$capacity = $_POST['capacity'];
$status = $_POST['status'];

mysqli_query($conn,"
INSERT INTO vehicles
(registration_number, vehicle_type, capacity, status)
VALUES
('$registration', '$type', '$capacity', '$status')
");

header("Location: vehicles.php");
exit();