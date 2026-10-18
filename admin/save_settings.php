<?php
include "includes/header.php";

$company=$_POST['company_name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];

mysqli_query($conn,"
UPDATE settings
SET
company_name='$company',
email='$email',
phone='$phone',
address='$address'
");

header("Location: settings.php");
exit();