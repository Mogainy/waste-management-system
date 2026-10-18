<?php
include "includes/header.php";
include "includes/sidebar.php";
include "includes/topbar.php";

$sql = "
SELECT
    cr.request_id,
    u.full_name AS customer,
    du.full_name AS driver,
    v.registration_number,
    cr.pickup_address,
    cr.collection_date,
    cr.status

FROM collection_requests cr

LEFT JOIN customers c
ON cr.customer_id = c.customer_id

LEFT JOIN users u
ON c.user_id = u.user_id

LEFT JOIN drivers d
ON cr.driver_id = d.driver_id

LEFT JOIN users du
ON d.user_id = du.user_id

LEFT JOIN vehicles v
ON cr.vehicle_id = v.vehicle_id

ORDER BY cr.request_id DESC
";

$result = mysqli_query($conn,$sql);
?>

<div class="content">

<div class="container-fluid">

<h3 class="mb-4">
<i class="bi bi-geo-alt"></i>
Live Tracking
</h3>

<div class="card shadow">

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>

<th>Request ID</th>
<th>Customer</th>
<th>Driver</th>
<th>Vehicle</th>
<th>Pickup Address</th>
<th>Collection Date</th>
<th>Status</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['request_id']; ?></td>

<td><?= htmlspecialchars($row['customer'] ?? 'N/A'); ?></td>

<td><?= htmlspecialchars($row['driver'] ?? 'Not Assigned'); ?></td>

<td><?= htmlspecialchars($row['registration_number'] ?? 'Not Assigned'); ?></td>

<td><?= htmlspecialchars($row['pickup_address']); ?></td>

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
echo "<span class='badge bg-info text-dark'>In Progress</span>";
break;

case "Completed":
echo "<span class='badge bg-success'>Completed</span>";
break;

default:
echo "<span class='badge bg-danger'>Cancelled</span>";

}

?>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</div>

<?php include "includes/footer.php"; ?>