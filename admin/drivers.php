<?php
include "includes/header.php";

$result = mysqli_query($conn,"
SELECT drivers.driver_id,
       users.full_name,
       users.email,
       users.phone,
       drivers.license_number,
       drivers.national_id,
       drivers.status
FROM drivers
JOIN users ON drivers.user_id = users.user_id
ORDER BY users.full_name ASC
");
?>

<?php include "includes/sidebar.php"; ?>
<?php include "includes/topbar.php"; ?>

<div class="content">

<div class="d-flex justify-content-between mb-4">

<h3>Drivers</h3>

<a href="add_driver.php" class="btn btn-success">
    + Add Driver
</a>

</div>

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>License No.</th>
<th>National ID</th>
<th>Status</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['driver_id']; ?></td>
<td><?= htmlspecialchars($row['full_name']); ?></td>
<td><?= htmlspecialchars($row['email']); ?></td>
<td><?= htmlspecialchars($row['phone']); ?></td>
<td><?= htmlspecialchars($row['license_number']); ?></td>
<td><?= htmlspecialchars($row['national_id']); ?></td>
<td>
<span class="badge bg-success">
<?= htmlspecialchars($row['status']); ?>
</span>
</td>

<td>

<a href="edit_driver.php?id=<?= $row['driver_id']; ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="delete_driver.php?id=<?= $row['driver_id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this driver?')">
Delete
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<?php include "includes/footer.php"; ?>