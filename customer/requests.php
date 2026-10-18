<?php
include "../authentication/auth.php";
include "../includes/config.php";

if($_SESSION['role'] != "customer"){
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Get customer ID
$customer = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT customer_id
FROM customers
WHERE user_id='$user_id'
"));

$customer_id = $customer['customer_id'];

// Get customer's requests
$sql = "
SELECT
cr.request_id,
cr.waste_type,
cr.quantity,
cr.pickup_address,
cr.collection_date,
cr.status,
u.full_name AS driver_name,
v.registration_number

FROM collection_requests cr

LEFT JOIN drivers d
ON cr.driver_id=d.driver_id

LEFT JOIN users u
ON d.user_id=u.user_id

LEFT JOIN vehicles v
ON cr.vehicle_id=v.vehicle_id

WHERE cr.customer_id='$customer_id'

ORDER BY cr.request_id DESC
";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>My Collection Requests</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2>My Collection Requests</h2>

<a href="dashboard.php" class="btn btn-secondary mb-3">
← Dashboard
</a>

<a href="new_request.php" class="btn btn-success mb-3">
+ New Request
</a>

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>

<th>ID</th>
<th>Waste Type</th>
<th>Quantity</th>
<th>Collection Date</th>
<th>Status</th>
<th>Driver</th>
<th>Vehicle</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['request_id']; ?></td>

<td><?= htmlspecialchars($row['waste_type']); ?></td>

<td><?= htmlspecialchars($row['quantity']); ?></td>

<td><?= $row['collection_date']; ?></td>

<td>

<?php
switch($row['status']){
    case "Pending":
        echo "<span class='badge bg-warning'>Pending</span>";
        break;

    case "Assigned":
        echo "<span class='badge bg-primary'>Assigned</span>";
        break;

    case "In Progress":
        echo "<span class='badge bg-info'>In Progress</span>";
        break;

    case "Completed":
        echo "<span class='badge bg-success'>Completed</span>";
        break;

    default:
        echo "<span class='badge bg-danger'>Cancelled</span>";
}
?>

</td>

<td>
<?= $row['driver_name'] ? htmlspecialchars($row['driver_name']) : "Not Assigned"; ?>
</td>

<td>
<?= $row['registration_number'] ?? "Not Assigned"; ?>
</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</body>

</html>