<?php
include "includes/header.php";

$sql = "
SELECT
cr.request_id,
u.full_name,
cr.waste_type,
cr.quantity,
cr.pickup_address,
cr.collection_date,
cr.status
FROM collection_requests cr

JOIN customers c
ON cr.customer_id = c.customer_id

JOIN users u
ON c.user_id = u.user_id

ORDER BY cr.request_id DESC
";

$result = mysqli_query($conn, $sql);
if(!$result){
    die(mysqli_error($conn));
}

echo "Rows found: " . mysqli_num_rows($result);
include "includes/sidebar.php";
include "includes/topbar.php";
?>

<div class="content">

<div class="d-flex justify-content-between align-items-center mb-4">

<h3>Collection Requests</h3>

<a href="add_request.php" class="btn btn-success">
+ New Request
</a>

</div>

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>

<th>ID</th>
<th>Customer</th>
<th>Waste Type</th>
<th>Quantity</th>
<th>Pickup Address</th>
<th>Preferred Date</th>
<th>Status</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['request_id']; ?></td>

<td><?= htmlspecialchars($row['full_name']); ?></td>

<td><?= htmlspecialchars($row['waste_type']); ?></td>

<td><?= htmlspecialchars($row['quantity']); ?></td>

<td><?= htmlspecialchars($row['pickup_address']); ?></td>

<td><?= $row['collection_date']; ?></td>

<td>

<a href="assign_request.php?id=<?= $row['request_id']; ?>"
class="btn btn-primary btn-sm">
Assign
</a>

<a href="edit_request.php?id=<?= $row['request_id']; ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="delete_request.php?id=<?= $row['request_id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this request?')">
Delete
</a>

</td>

<td>

<a href="assign_request.php?id=<?= $row['request_id']; ?>" class="btn btn-primary btn-sm">

Assign

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<?php include "includes/footer.php"; ?>