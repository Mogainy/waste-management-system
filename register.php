<?php
session_start();

if(isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Create Account</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{

background:linear-gradient(135deg,#198754,#28a745);

height:100vh;

display:flex;

justify-content:center;

align-items:center;

font-family:Segoe UI,sans-serif;

}

.register-card{

width:520px;

background:white;

padding:35px;

border-radius:20px;

box-shadow:0 15px 40px rgba(0,0,0,.25);

}

.logo{

width:80px;

height:80px;

margin:auto;

background:#198754;

border-radius:50%;

display:flex;

justify-content:center;

align-items:center;

font-size:35px;

color:white;

margin-bottom:15px;

}

.form-control{

height:46px;

}

textarea.form-control{

height:90px;

}

</style>

</head>

<body>

<div class="register-card">

<div class="text-center">

<div class="logo">

<i class="bi bi-recycle"></i>

</div>

<h2 class="text-success">

Create Account

</h2>

<p class="text-muted">

Register as a Customer

</p>

</div>

<form action="authentication/register_process.php" method="POST">

<div class="mb-3">

<label>Full Name</label>

<input
type="text"
name="full_name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Phone Number</label>

<input
type="text"
name="phone"
class="form-control"
required>

</div>
<div class="mb-3">
<label>Address</label>
<input
type="text"
name="address"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Estate</label>
<input
type="text"
name="estate"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Town</label>
<input
type="text"
name="town"
class="form-control"
required>
</div>

<div class="mb-3">
<label>County</label>
<input
type="text"
name="county"
class="form-control"
required>
</div>
<div class="mb-3">

<label>Address</label>

<textarea
name="address"
class="form-control"
required></textarea>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="d-grid">

<button class="btn btn-success">

<i class="bi bi-person-plus-fill"></i>

Register

</button>

</div>

<div class="text-center mt-3">

Already have an account?

<a href="login.php"
class="text-success fw-bold text-decoration-none">

Login

</a>

</div>

</form>

</div>

</body>

</html>