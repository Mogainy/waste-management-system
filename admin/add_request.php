<?php
include "includes/header.php";

$customers = mysqli_query($conn,"
SELECT
customers.customer_id,
users.full_name
FROM customers
JOIN users
ON customers.user_id = users.user_id
ORDER BY users.full_name
");

include "includes/sidebar.php";
include "includes/topbar.php";
?>

<div class="content">

<div class="card shadow">

<div class="card-header bg-success text-white">
<h3>New Collection Request</h3>
</div>

<div class="card-body">

<form action="save_request.php" method="POST">

<div class="mb-3">
<label class="form-label">Customer</label>

<select name="customer_id" class="form-control" required>

<option value="">Select Customer</option>

<?php while($customer=mysqli_fetch_assoc($customers)){ ?>

<option value="<?= $customer['customer_id']; ?>">
<?= htmlspecialchars($customer['full_name']); ?>
</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label class="form-label">Waste Type</label>

<select name="waste_type" class="form-control" required>

<option>General Waste</option>
<option>Plastic</option>
<option>Paper</option>
<option>Glass</option>
<option>Metal</option>
<option>Organic</option>

</select>

</div>

<div class="mb-3">

<label>Quantity</label>

<input
type="text"
name="quantity"
class="form-control"
placeholder="Example: 5 Bags"
required>

</div>

<div class="mb-3">

<label>Pickup Address</label>

<textarea
name="pickup_address"
class="form-control"
required></textarea>

</div>

<div class="mb-3">

<label>Collection Date</label>

<input
type="date"
name="collection_date"
class="form-control"
required>

</div>

<button type="submit" class="btn btn-success">
    Save Request
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