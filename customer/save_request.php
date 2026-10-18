<?php
include "../authentication/auth.php";
include "../includes/config.php";

if($_SESSION['role'] != "customer"){
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Get customer ID
$customer = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT customer_id
FROM customers
WHERE user_id='$user_id'
"));

if(!$customer){
    die("Customer account not found.");
}

$customer_id = $customer['customer_id'];

$waste = mysqli_real_escape_string($conn,$_POST['waste_type']);
$quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
$address = mysqli_real_escape_string($conn,$_POST['pickup_address']);
$date = mysqli_real_escape_string($conn,$_POST['collection_date']);

$sql = "INSERT INTO collection_requests
(
customer_id,
waste_type,
quantity,
pickup_address,
collection_date,
status
)
VALUES
(
'$customer_id',
'$waste',
'$quantity',
'$address',
'$date',
'Pending'
)";

if(mysqli_query($conn,$sql)){

    header("Location: requests.php");
    exit();

}else{

    die("Database Error: ".mysqli_error($conn));

}
?>