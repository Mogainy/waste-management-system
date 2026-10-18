<?php
include "includes/header.php";

$id = $_GET['id'];

$result = mysqli_query($conn,"
SELECT * FROM vehicles
WHERE vehicle_id='$id'
");

$vehicle = mysqli_fetch_assoc($result);

include "includes/sidebar.php";
include "includes/topbar.php";
?>

<div class="content">

<div class="card shadow">

<div class="card-header bg-warning text-dark">
<h3>Edit Vehicle</h3>
</div>

<div class="card-body">

<form action="update_vehicle.php" method="POST">

<input type="hidden"
name="vehicle_id"
value="<?= $vehicle['vehicle_id']; ?>">

<div class="mb-3">
<label>Registration Number</label>
<input
type="text"
name="registration_number"
class="form-control"
value="<?= htmlspecialchars($vehicle['registration_number']); ?>"
required>
</div>

<div class="mb-3">
<label>Vehicle Type</label>
<input
type="text"
name="vehicle_type"
class="form-control"
value="<?= htmlspecialchars($vehicle['vehicle_type']); ?>"
required>
</div>

<div class="mb-3">
<label>Capacity</label>
<input
type="number"
name="capacity"
class="form-control"
value="<?= $vehicle['capacity']; ?>"
required>
</div>

<div class="mb-3">
<label>Status</label>

<select name="status" class="form-control">

<option <?= $vehicle['status']=="Available"?"selected":"" ?>>
Available
</option>

<option <?= $vehicle['status']=="Busy"?"selected":"" ?>>
Busy
</option>

<option <?= $vehicle['status']=="Maintenance"?"selected":"" ?>>
Maintenance
</option>

</select>

</div>

<button class="btn btn-success">
Update Vehicle
</button>

<a href="vehicles.php"
class="btn btn-secondary">
Cancel
</a>

</form>

</div>

</div>

</div>

<?php include "includes/footer.php"; ?>