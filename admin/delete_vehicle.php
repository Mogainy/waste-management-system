<?php
include "includes/header.php";

$id = $_GET['id'];

mysqli_query($conn,"
DELETE FROM vehicles
WHERE vehicle_id='$id'
");

header("Location: vehicles.php");
exit();