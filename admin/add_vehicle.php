<?php
include "includes/header.php";
include "includes/sidebar.php";
include "includes/topbar.php";
?>

<div class="content">

<h3>Add Vehicle</h3>

<form action="save_vehicle.php" method="POST">

<div class="row">

<div class="col-md-6 mb-3">

<label>Registration Number</label>

<input
type="text"
name="registration_number"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Vehicle Type</label>

<select name="vehicle_type" class="form-control">

<option>Garbage Truck</option>
<option>Pickup</option>
<option>Compactor Truck</option>
<option>Skip Loader</option>

</select>

</div>

<div class="col-md-6 mb-3">

<label>Capacity (Tonnes)</label>

<input
type="number"
step="0.01"
name="capacity"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Status</label>

<select name="status" class="form-control">

<option>Available</option>
<option>In Use</option>
<option>Under Maintenance</option>

</select>

</div>

<div class="col-md-12">

<button class="btn btn-success">
Save Vehicle
</button>

</div>

</div>

</form>

</div>

<?php include "includes/footer.php"; ?>