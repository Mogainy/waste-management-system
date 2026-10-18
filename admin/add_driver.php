<?php
include "includes/header.php";
include "includes/sidebar.php";
include "includes/topbar.php";
?>

<div class="content">

<h3>Add Driver</h3>

<form action="save_driver.php" method="POST">

<div class="row">

<div class="col-md-6 mb-3">
<label>Full Name</label>
<input type="text" name="full_name" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>License Number</label>
<input type="text" name="license_number" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>National ID</label>
<input type="text" name="national_id" class="form-control" required>
</div>

<div class="col-md-12">
<button class="btn btn-success">Save Driver</button>
</div>

</div>

</form>

</div>

<?php include "includes/footer.php"; ?>