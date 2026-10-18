<?php
include "../includes/config.php";

$name=$_POST['full_name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);

$estate=$_POST['estate'];
$town=$_POST['town'];
$county=$_POST['county'];

mysqli_query($conn,"
INSERT INTO users(full_name,email,phone,password,role)
VALUES('$name','$email','$phone','$password','customer')
");

$user_id=mysqli_insert_id($conn);

mysqli_query($conn,"
INSERT INTO customers(user_id,estate,town,county)
VALUES('$user_id','$estate','$town','$county')
");

header("Location: customers.php");
exit();