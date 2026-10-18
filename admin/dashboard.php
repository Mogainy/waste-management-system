<?php
include "../authentication/auth.php";
include "../includes/config.php";

if($_SESSION['role'] != "admin"){
    header("Location: ../login.php");
    exit();
}

// Dashboard statistics
$totalCustomers = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM customers"));
$totalDrivers = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM drivers"));
$totalVehicles = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM vehicles"));
$totalRequests = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM collection_requests"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f7fb;
        }

        .sidebar{
            width:250px;
            height:100vh;
            position:fixed;
            background:#198754;
            color:white;
            padding-top:20px;
        }

        .sidebar a{
            color:white;
            text-decoration:none;
            display:block;
            padding:15px;
        }

        .sidebar a:hover{
            background:#157347;
        }

        .content{
            margin-left:260px;
            padding:30px;
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 0 10px rgba(0,0,0,.1);
        }
    </style>

</head>

<body>

<div class="sidebar">

<h3 class="text-center">Waste Admin</h3>

<hr>

<a href="dashboard.php">Dashboard</a>

<a href="customers.php">Customers</a>

<a href="drivers.php">Drivers</a>

<a href="vehicles.php">Vehicles</a>

<a href="collection_requests.php">Collection Requests</a>

<a href="tracking.php">Live Tracking</a>

<a href="reports.php">Reports</a>

<a href="../authentication/logout.php">Logout</a>

</div>

<div class="content">

<h2>Welcome <?php echo $_SESSION['name']; ?></h2>

<br>

<div class="row">

<div class="col-md-3">

<div class="card bg-primary text-white">
<div class="card-body">
<h4><?php echo $totalCustomers; ?></h4>
Customers
</div>
</div>

</div>

<div class="col-md-3">

<div class="card bg-success text-white">
<div class="card-body">
<h4><?php echo $totalDrivers; ?></h4>
Drivers
</div>
</div>

</div>

<div class="col-md-3">

<div class="card bg-warning text-dark">
<div class="card-body">
<h4><?php echo $totalVehicles; ?></h4>
Vehicles
</div>
</div>

</div>

<div class="col-md-3">

<div class="card bg-danger text-white">
<div class="card-body">
<h4><?php echo $totalRequests; ?></h4>
Requests
</div>
</div>

</div>

</div>

</div>

</body>
</html>