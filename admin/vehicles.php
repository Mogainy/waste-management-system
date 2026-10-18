<?php
include "includes/header.php";

$result = mysqli_query($conn, "SELECT * FROM vehicles ORDER BY vehicle_id DESC");
?>

<?php include "includes/sidebar.php"; ?>
<?php include "includes/topbar.php"; ?>

<div class="content">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Vehicle Management</h3>

    <a href="add_vehicle.php" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Add Vehicle
    </a>
</div>

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>
    <th>ID</th>
    <th>Registration No.</th>
    <th>Vehicle Type</th>
    <th>Capacity (Tonnes)</th>
    <th>Status</th>
    <th>Action</th>
</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['vehicle_id']; ?></td>

<td><?= htmlspecialchars($row['registration_number']); ?></td>

<td><?= htmlspecialchars($row['vehicle_type']); ?></td>

<td><?= htmlspecialchars($row['capacity']); ?></td>

<td>

<?php
$status = $row['status'];

if($status=="Available"){
    echo "<span class='badge bg-success'>$status</span>";
}elseif($status=="In Use"){
    echo "<span class='badge bg-primary'>$status</span>";
}else{
    echo "<span class='badge bg-danger'>$status</span>";
}
?>

</td>

<td>

<a href="edit_vehicle.php?id=<?= $row['vehicle_id']; ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="delete_vehicle.php?id=<?= $row['vehicle_id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this vehicle?')">

Delete

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<?php include "includes/footer.php"; ?>