<?php
include "includes/header.php";

$id = $_GET['id'];

$result = mysqli_query($conn,"
SELECT
drivers.*,
users.full_name,
users.email,
users.phone
FROM drivers
JOIN users
ON drivers.user_id = users.user_id
WHERE driver_id='$id'
");

$driver = mysqli_fetch_assoc($result);

include "includes/sidebar.php";
include "includes/topbar.php";
?>

<div class="content">

<div class="card shadow">

<div class="card-header bg-warning">
<h3>Edit Driver</h3>
</div>

<div class="card-body">

<form action="update_driver.php" method="POST">

<input type="hidden"
name="driver_id"
value="<?= $driver['driver_id']; ?>">

<input type="hidden"
name="user_id"
value="<?= $driver['user_id']; ?>">

<div class="mb-3">
<label>Full Name</label>
<input
type="text"
name="full_name"
class="form-control"
value="<?= htmlspecialchars($driver['full_name']); ?>"
required>
</div>

<div class="mb-3">
<label>Email</label>
<input
type="email"
name="email"
class="form-control"
value="<?= htmlspecialchars($driver['email']); ?>"
required>
</div>

<div class="mb-3">
<label>Phone</label>
<input
type="text"
name="phone"
class="form-control"
value="<?= htmlspecialchars($driver['phone']); ?>"
required>
</div>

<div class="mb-3">
<label>License Number</label>
<input
type="text"
name="license_number"
class="form-control"
value="<?= htmlspecialchars($driver['license_number']); ?>"
required>
</div>

<div class="mb-3">
<label>National ID</label>
<input
type="text"
name="national_id"
class="form-control"
value="<?= htmlspecialchars($driver['national_id']); ?>"
required>
</div>

<div class="mb-3">
<label>Status</label>

<select name="status" class="form-control">

<option <?= $driver['status']=="Available"?"selected":"" ?>>
Available
</option>

<option <?= $driver['status']=="Busy"?"selected":"" ?>>
Busy
</option>

</select>

</div>

<button class="btn btn-success">
Update Driver
</button>

<a href="drivers.php"
class="btn btn-secondary">
Cancel
</a>

</form>

</div>

</div>

</div>

<?php include "includes/footer.php"; ?>