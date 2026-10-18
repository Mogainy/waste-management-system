<?php
include "includes/header.php";

$id = $_GET['id'];

$result = mysqli_query($conn,"
SELECT * FROM collection_requests
WHERE request_id='$id'
");

$request = mysqli_fetch_assoc($result);

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

<div class="card-header bg-warning">
<h3>Edit Collection Request</h3>
</div>

<div class="card-body">

<form action="update_request.php" method="POST">

<input type="hidden"
name="request_id"
value="<?= $request['request_id']; ?>">

<div class="mb-3">

<label>Customer</label>

<select name="customer_id" class="form-control">

<?php while($customer=mysqli_fetch_assoc($customers)){ ?>

<option
value="<?= $customer['customer_id']; ?>"
<?= $customer['customer_id']==$request['customer_id'] ? "selected":""; ?>>

<?= htmlspecialchars($customer['full_name']); ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Waste Type</label>

<select name="waste_type" class="form-control">

<?php
$types=[
"General Waste",
"Plastic",
"Paper",
"Glass",
"Metal",
"Organic"
];

foreach($types as $type){
?>

<option
<?= $request['waste_type']==$type ? "selected":""; ?>>

<?= $type; ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Quantity</label>

<input
type="text"
name="quantity"
class="form-control"
value="<?= htmlspecialchars($request['quantity']); ?>">

</div>

<div class="mb-3">

<label>Pickup Address</label>

<textarea
name="pickup_address"
class="form-control"><?= htmlspecialchars($request['pickup_address']); ?></textarea>

</div>

<div class="mb-3">

<label>Collection Date</label>

<input
type="date"
name="collection_date"
class="form-control"
value="<?= $request['collection_date']; ?>">

</div>

<button class="btn btn-success">
Update Request
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