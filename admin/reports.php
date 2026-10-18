<?php
include "includes/header.php";
include "includes/sidebar.php";
include "includes/topbar.php";

// Summary Statistics
$totalRequests = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM collection_requests"));

$completed = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM collection_requests WHERE status='Completed'"));

$pending = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM collection_requests WHERE status='Pending'"));

$assigned = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM collection_requests WHERE status='Assigned'"));

$sql = "
SELECT
cr.request_id,
u.full_name,
cr.waste_type,
cr.quantity,
cr.collection_date,
cr.status

FROM collection_requests cr

JOIN customers c
ON cr.customer_id = c.customer_id

JOIN users u
ON c.user_id = u.user_id

ORDER BY cr.collection_date DESC
";

$result = mysqli_query($conn,$sql);
?>

<div class="content">

<div class="container-fluid">

<h3 class="mb-4">
<i class="bi bi-bar-chart"></i>
Collection Reports
</h3>

<div class="row mb-4">

<div class="col-md-3">
<div class="card bg-primary text-white">
<div class="card-body">
<h2><?= $totalRequests['total']; ?></h2>
<p>Total Requests</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-warning text-dark">
<div class="card-body">
<h2><?= $pending['total']; ?></h2>
<p>Pending</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-info text-white">
<div class="card-body">
<h2><?= $assigned['total']; ?></h2>
<p>Assigned</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-success text-white">
<div class="card-body">
<h2><?= $completed['total']; ?></h2>
<p>Completed</p>
</div>
</div>
</div>

</div>

<div class="card shadow">

<div class="card-header bg-success text-white">
Collection Report
</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>
<th>ID</th>
<th>Customer</th>
<th>Waste Type</th>
<th>Quantity</th>
<th>Date</th>
<th>Status</th>
</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['request_id']; ?></td>
<td><?= htmlspecialchars($row['full_name']); ?></td>
<td><?= htmlspecialchars($row['waste_type']); ?></td>
<td><?= htmlspecialchars($row['quantity']); ?></td>
<td><?= $row['collection_date']; ?></td>
<td><?= $row['status']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</div>

<?php include "includes/footer.php"; ?>