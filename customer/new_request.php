<?php
include "../authentication/auth.php";
include "../includes/config.php";

if($_SESSION['role'] != "customer"){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>New Collection Request</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>New Waste Collection Request</h3>

</div>

<div class="card-body">

<form action="save_request.php" method="POST">

<div class="mb-3">

<label>Waste Type</label>

<select name="waste_type" class="form-control" required>

<option value="">Select Waste Type</option>
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
rows="4"
required></textarea>

</div>

<div class="mb-3">

<label>Preferred Collection Date</label>

<input
type="date"
name="collection_date"
class="form-control"
required>

</div>

<button type="submit" class="btn btn-success">

Submit Request

</button>

<a href="dashboard.php" class="btn btn-secondary">

Cancel

</a>

</form>

</div>

</div>

</div>

</body>

</html>