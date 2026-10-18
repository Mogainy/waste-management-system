<?php
include "../authentication/auth.php";
include "../includes/config.php";
if($_SESSION['role'] != "driver"){
    header("Location: ../login.php");
    exit();
}
$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn,"
SELECT driver_id
FROM drivers
WHERE user_id='$user_id'
");

if(!$result){
    die(mysqli_error($conn));
}

$driver = mysqli_fetch_assoc($result);

if(!$driver){
    die("Driver record not found.");
}


$driver_id = $driver['driver_id'];

$sql = "
SELECT
cr.request_id,
u.full_name,
u.phone,
cr.pickup_address,
cr.waste_type,
cr.quantity,
cr.collection_date,
cr.status,
v.registration_number

FROM collection_requests cr

JOIN customers c
ON cr.customer_id = c.customer_id

JOIN users u
ON c.user_id = u.user_id

LEFT JOIN vehicles v
ON cr.vehicle_id = v.vehicle_id

WHERE cr.driver_id='$driver_id'

ORDER BY cr.collection_date ASC
";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>Assigned Jobs</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Assigned Collection Jobs</h2>

    <a href="dashboard.php" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back to Dashboard
    </a>

</div>

<table class="table table-bordered">

<thead class="table-dark">
<tr>
    <th>ID</th>
    <th>Customer</th>
    <th>Phone</th>
    <th>Pickup Address</th>
    <th>Waste Type</th>
    <th>Quantity</th>
    <th>Vehicle</th>
    <th>Collection Date</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['request_id']; ?></td>

<td><?= htmlspecialchars($row['full_name']); ?></td>

<td><?= htmlspecialchars($row['phone']); ?></td>

<td><?= htmlspecialchars($row['pickup_address']); ?></td>

<td><?= htmlspecialchars($row['waste_type']); ?></td>

<td><?= htmlspecialchars($row['quantity']); ?></td>

<td><?= htmlspecialchars($row['registration_number']); ?></td>

<td><?= $row['collection_date']; ?></td>

<td>
<?php
if($row['status']=="Assigned"){
    echo "<span class='badge bg-primary'>Assigned</span>";
}
elseif($row['status']=="In Progress"){
    echo "<span class='badge bg-warning text-dark'>In Progress</span>";
}
elseif($row['status']=="Completed"){
    echo "<span class='badge bg-success'>Completed</span>";
}
else{
    echo "<span class='badge bg-secondary'>{$row['status']}</span>";
}
?>
</td>

<td>

<?php
if($row['status']=="Assigned"){
?>
<a href="start_job.php?id=<?= $row['request_id']; ?>" class="btn btn-primary btn-sm">
    Start Collection
</a>
<?php
}
elseif($row['status']=="In Progress"){
?>
<a href="complete_job.php?id=<?= $row['request_id']; ?>" class="btn btn-success btn-sm">
    Complete
</a>
<?php
}
else{
    echo "-";
}
?>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</body>

</html>