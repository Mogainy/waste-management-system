<?php
include "includes/header.php";

$id = $_GET['id'];

// Get user_id before deleting
$result = mysqli_query($conn,"
SELECT user_id
FROM customers
WHERE customer_id='$id'
");

$customer = mysqli_fetch_assoc($result);

$user_id = $customer['user_id'];

// Delete customer
mysqli_query($conn,"
DELETE FROM customers
WHERE customer_id='$id'
");

// Delete user account
mysqli_query($conn,"
DELETE FROM users
WHERE user_id='$user_id'
");

header("Location: customers.php");
exit();