<?php
include "includes/header.php";
include "includes/sidebar.php";
include "includes/topbar.php";
?>

<div class="content">

<h3>Add Customer</h3>

<form action="save_customer.php" method="POST">

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
<label>Estate</label>
<input type="text" name="estate" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Town</label>
<input type="text" name="town" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>County</label>
<input type="text" name="county" class="form-control">
</div>

<div class="col-md-12">

<button class="btn btn-success">
Save Customer
</button>

</div>

</div>

</form>

</div>

<?php include "includes/footer.php"; ?>