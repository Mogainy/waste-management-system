<?php
include "includes/header.php";

$id = $_GET['id'];

$result = mysqli_query($conn,"
SELECT
customers.*,
users.full_name,
users.email,
users.phone
FROM customers
JOIN users
ON customers.user_id = users.user_id
WHERE customer_id='$id'
");

$customer = mysqli_fetch_assoc($result);

include "includes/sidebar.php";
include "includes/topbar.php";
?>

<div class="content">

<div class="card shadow">

<div class="card-header bg-warning">
<h3>Edit Customer</h3>
</div>

<div class="card-body">

<form action="update_customer.php" method="POST">

<input type="hidden"
name="customer_id"
value="<?= $customer['customer_id']; ?>">

<input type="hidden"
name="user_id"
value="<?= $customer['user_id']; ?>">

<div class="mb-3">
<label>Full Name</label>
<input
type="text"
name="full_name"
class="form-control"
value="<?= htmlspecialchars($customer['full_name']); ?>"
required>
</div>

<div class="mb-3">
<label>Email</label>
<input
type="email"
name="email"
class="form-control"
value="<?= htmlspecialchars($customer['email']); ?>"
required>
</div>

<div class="mb-3">
<label>Phone</label>
<input
type="text"
name="phone"
class="form-control"
value="<?= htmlspecialchars($customer['phone']); ?>"
required>
</div>

<div class="mb-3">
<label>Address</label>
<textarea
name="address"
class="form-control"
required><?= htmlspecialchars($customer['address']); ?></textarea>
</div>

<button class="btn btn-success">
Update Customer
</button>

<a href="customers.php"
class="btn btn-secondary">
Cancel
</a>

</form>

</div>

</div>

</div>

<?php include "includes/footer.php"; ?>