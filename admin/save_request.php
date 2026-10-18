<?php
include "../includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $customer = mysqli_real_escape_string($conn, $_POST['customer_id']);
    $waste = mysqli_real_escape_string($conn, $_POST['waste_type']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $address = mysqli_real_escape_string($conn, $_POST['pickup_address']);
    $date = mysqli_real_escape_string($conn, $_POST['collection_date']);

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
        '$customer',
        '$waste',
        '$quantity',
        '$address',
        '$date',
        'Pending'
    )";

    if (mysqli_query($conn, $sql)) {

        header("Location: collection_requests.php");
        exit();

    } else {

        die("Database Error: " . mysqli_error($conn));

    }

} else {

    die("Invalid Request.");

}
?>