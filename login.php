<?php
session_start();

if(isset($_SESSION['user_id'])){
    if($_SESSION['role']=="admin"){
        header("Location: admin/dashboard.php");
    }elseif($_SESSION['role']=="driver"){
        header("Location: driver/dashboard.php");
    }else{
        header("Location: customer/dashboard.php");
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Waste Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{

background:linear-gradient(135deg,#198754,#28a745);

height:100vh;

display:flex;

justify-content:center;

align-items:center;

font-family:Segoe UI,Tahoma,Geneva,Verdana,sans-serif;

}

.login-card{

width:420px;

background:#fff;

border-radius:20px;

padding:40px;

box-shadow:0 15px 35px rgba(0,0,0,.25);

animation:fadeIn .8s;

}

.logo{

width:90px;

height:90px;

background:#198754;

color:#fff;

font-size:40px;

border-radius:50%;

display:flex;

justify-content:center;

align-items:center;

margin:auto;

margin-bottom:20px;

}

.form-control{

height:48px;

}

.btn-success{

height:48px;

font-size:17px;

}

.footer{

text-align:center;

margin-top:20px;

font-size:14px;

color:#777;

}

@keyframes fadeIn{

from{

opacity:0;

transform:translateY(-20px);

}

to{

opacity:1;

transform:translateY(0);

}

}

</style>

</head>

<body>

<div class="login-card">

<div class="text-center">

<div class="logo">

<i class="bi bi-recycle"></i>

</div>

<h2 class="fw-bold text-success">

Waste Management

</h2>

<p class="text-muted">

Login to Continue

</p>

</div>

<form action="authentication/login_process.php" method="POST">

<div class="mb-3">

<label>Email Address</label>

<div class="input-group">

<span class="input-group-text">

<i class="bi bi-envelope-fill"></i>

</span>

<input
type="email"
name="email"
class="form-control"
placeholder="Enter Email"
required>

</div>

</div>

<div class="mb-3">

<label>Password</label>

<div class="input-group">

<span class="input-group-text">

<i class="bi bi-lock-fill"></i>

</span>

<input
type="password"
name="password"
id="password"
class="form-control"
placeholder="Enter Password"
required>

<button
type="button"
class="btn btn-outline-secondary"
onclick="togglePassword()">

<i class="bi bi-eye"></i>

</button>

</div>

</div>

<div class="d-grid">

<button class="btn btn-success">

<i class="bi bi-box-arrow-in-right"></i>

Login

</button>

</div>
<div class="text-center mt-3">

<p class="mb-0">
Don't have an account?

<a href="register.php"
class="text-success fw-bold text-decoration-none">

Register Here

</a>

</p>

</div>
</form>

<div class="footer">

© <?= date("Y"); ?> Waste Management System

</div>

</div>

<script>

function togglePassword(){

let password=document.getElementById("password");

if(password.type==="password"){

password.type="text";

}else{

password.type="password";

}

}

</script>

</body>

</html>