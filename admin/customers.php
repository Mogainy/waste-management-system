<?php
include "includes/header.php";

$result = mysqli_query($conn,"
SELECT customers.customer_id,
       users.full_name,
       users.email,
       users.phone,
       customers.address,
       customers.estate,
       customers.town,
       customers.county
FROM customers
JOIN users ON customers.user_id = users.user_id
ORDER BY users.full_name ASC
");
?>

<?php include "includes/sidebar.php"; ?>
<?php include "includes/topbar.php"; ?>
<div class="content">

<div class="d-flex justify-content-between mb-4">

<h3>Customers</h3>

<a href="add_customer.php" class="btn btn-success">
    + Add Customer
</a>

</div>

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Estate</th>
<th>Town</th>
<th>County</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['customer_id']; ?></td>
<td><?= htmlspecialchars($row['full_name']); ?></td>
<td><?= htmlspecialchars($row['email']); ?></td>
<td><?= htmlspecialchars($row['phone']); ?></td>
<td><?= htmlspecialchars($row['estate']); ?></td>
<td><?= htmlspecialchars($row['town']); ?></td>
<td><?= htmlspecialchars($row['county']); ?></td>

<td>

<a href="edit_customer.php?id=<?= $row['customer_id']; ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="delete_customer.php?id=<?= $row['customer_id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this customer?')">
Delete
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<?php include "includes/footer.php"; ?>