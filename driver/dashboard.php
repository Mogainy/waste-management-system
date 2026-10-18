<?php
include "../authentication/auth.php";
include "../includes/config.php";

if($_SESSION['role'] != "driver"){
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$driver = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT driver_id
FROM drivers
WHERE user_id='$user_id'
"));

$driver_id = $driver['driver_id'];

$total = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM collection_requests
WHERE driver_id='$driver_id'
"));

$completed = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM collection_requests
WHERE driver_id='$driver_id'
AND status='Completed'
"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Driver Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2>Welcome <?= $_SESSION['name']; ?></h2>

<div class="row mt-4">

<div class="col-md-6">

<div class="card bg-primary text-white">

<div class="card-body">

<h3><?= $total['total']; ?></h3>

Assigned Jobs

</div>

</div>

</div>

<div class="col-md-6">

<div class="card bg-success text-white">

<div class="card-body">

<h3><?= $completed['total']; ?></h3>

Completed Jobs

</div>

</div>

</div>

</div>

<a href="jobs.php" class="btn btn-success mt-4">

View Assigned Jobs

</a>

<a href="../logout.php" class="btn btn-danger">
    Logout
</a>
</div>

</body>

</html>