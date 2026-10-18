<?php
include "../authentication/auth.php";
include "../includes/config.php";

if($_SESSION['role'] != "customer"){
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Get customer details
$customer = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT customer_id
FROM customers
WHERE user_id='$user_id'
"));

if(!$customer){
    die("Customer profile not found.");
}

$customer_id = $customer['customer_id'];

// Dashboard statistics
$total = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM collection_requests
WHERE customer_id='$customer_id'
"));

$pending = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM collection_requests
WHERE customer_id='$customer_id'
AND status='Pending'
"));

$assigned = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM collection_requests
WHERE customer_id='$customer_id'
AND status='Assigned'
"));

$completed = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM collection_requests
WHERE customer_id='$customer_id'
AND status='Completed'
"));
?>

<!DOCTYPE html>
<html>
<head>

<title>Customer Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2>Welcome, <?= htmlspecialchars($_SESSION['name']); ?></h2>

<p class="text-muted">
Manage your waste collection requests here.
</p>

<div class="row mt-4">

<div class="col-md-3">
<div class="card text-bg-primary">
<div class="card-body">
<h3><?= $total['total']; ?></h3>
Total Requests
</div>
</div>
</div>

<div class="col-md-3">
<div class="card text-bg-warning">
<div class="card-body">
<h3><?= $pending['total']; ?></h3>
Pending
</div>
</div>
</div>

<div class="col-md-3">
<div class="card text-bg-info">
<div class="card-body">
<h3><?= $assigned['total']; ?></h3>
Assigned
</div>
</div>
</div>

<div class="col-md-3">
<div class="card text-bg-success">
<div class="card-body">
<h3><?= $completed['total']; ?></h3>
Completed
</div>
</div>
</div>

</div>

<div class="mt-4">

<a href="new_request.php" class="btn btn-success">
    New Collection Request
</a>

<a href="requests.php" class="btn btn-primary">
My Requests
</a>

<a href="../logout.php" class="btn btn-danger">
Logout
</a>

</div>

</div>

</body>
</html><?php
include "../authentication/auth.php";

if($_SESSION['role'] != "customer"){
    header("Location: ../login.php");
    exit();
}
?>