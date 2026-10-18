<?php
include "includes/header.php";

$request_id = $_GET['id'];

// Get request details
$request = mysqli_query($conn,"
SELECT
cr.request_id,
u.full_name,
cr.waste_type,
cr.quantity,
cr.pickup_address,
cr.collection_date
FROM collection_requests cr
JOIN customers c ON cr.customer_id=c.customer_id
JOIN users u ON c.user_id=u.user_id
WHERE cr.request_id='$request_id'
");

$request = mysqli_fetch_assoc($request);

// Get available drivers
$drivers = mysqli_query($conn,"
SELECT
drivers.driver_id,
users.full_name
FROM drivers
JOIN users
ON drivers.user_id=users.user_id
ORDER BY users.full_name
");

// Get available vehicles
$vehicles = mysqli_query($conn,"
SELECT *
FROM vehicles
WHERE status='Available'
ORDER BY registration_number
");

include "includes/sidebar.php";
include "includes/topbar.php";
?>

<div class="content">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>Assign Collection Request</h3>

</div>

<div class="card-body">

<form action="save_assignment.php" method="POST">

<input type="hidden"
name="request_id"
value="<?= $request['request_id']; ?>">

<div class="mb-3">

<label>Customer</label>

<input
type="text"
class="form-control"
value="<?= htmlspecialchars($request['full_name']); ?>"
readonly>

</div>

<div class="mb-3">

<label>Waste Type</label>

<input
type="text"
class="form-control"
value="<?= htmlspecialchars($request['waste_type']); ?>"
readonly>

</div>

<div class="mb-3">

<label>Quantity</label>

<input
type="text"
class="form-control"
value="<?= htmlspecialchars($request['quantity']); ?>"
readonly>

</div>

<div class="mb-3">

<label>Pickup Address</label>

<textarea
class="form-control"
readonly><?= htmlspecialchars($request['pickup_address']); ?></textarea>

</div>

<div class="mb-3">

<label>Collection Date</label>

<input
type="date"
class="form-control"
value="<?= $request['collection_date']; ?>"
readonly>

</div>

<div class="mb-3">

<label>Select Driver</label>

<select
name="driver_id"
class="form-control"
required>

<option value="">Choose Driver</option>

<?php while($driver=mysqli_fetch_assoc($drivers)){ ?>

<option value="<?= $driver['driver_id']; ?>">
<?= htmlspecialchars($driver['full_name']); ?>
</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Select Vehicle</label>

<select
name="vehicle_id"
class="form-control"
required>

<option value="">Choose Vehicle</option>

<?php while($vehicle=mysqli_fetch_assoc($vehicles)){ ?>

<option value="<?= $vehicle['vehicle_id']; ?>">
<?= $vehicle['registration_number']; ?>
(
<?= $vehicle['vehicle_type']; ?>
)
</option>

<?php } ?>

</select>

</div>

<button class="btn btn-success">

Assign Request

</button>

<a href="collection_requests.php"
class="btn btn-secondary">

Cancel

</a>

</form>

</div>

</div>

</div>

<?php include "includes/footer.php"; ?>