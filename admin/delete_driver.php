<?php
include "includes/header.php";

$id = $_GET['id'];

// Check if driver has assigned jobs
$check = mysqli_query($conn,"
SELECT request_id
FROM collection_requests
WHERE driver_id='$id'
AND status IN ('Assigned','In Progress')
");

if(mysqli_num_rows($check) > 0){

    echo "<script>
    alert('This driver has active collection jobs and cannot be deleted.');
    window.location='drivers.php';
    </script>";
    exit();
}

// Get linked user
$result = mysqli_query($conn,"
SELECT user_id
FROM drivers
WHERE driver_id='$id'
");

$driver = mysqli_fetch_assoc($result);

// Delete driver
mysqli_query($conn,"
DELETE FROM drivers
WHERE driver_id='$id'
");

// Delete login account
mysqli_query($conn,"
DELETE FROM users
WHERE user_id='".$driver['user_id']."'
");

header("Location: drivers.php");
exit();