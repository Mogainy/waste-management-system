<?php
include "../includes/config.php";

$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$address = mysqli_real_escape_string($conn, $_POST['address']);
$estate = mysqli_real_escape_string($conn, $_POST['estate']);
$town = mysqli_real_escape_string($conn, $_POST['town']);
$county = mysqli_real_escape_string($conn, $_POST['county']);

// Check if email already exists
$check = mysqli_query($conn, "
SELECT *
FROM users
WHERE email='$email'
");

if(mysqli_num_rows($check) > 0){
    echo "<script>
    alert('Email already exists.');
    window.location='../register.php';
    </script>";
    exit();
}

// Insert into users
mysqli_query($conn,"
INSERT INTO users
(
full_name,
email,
phone,
password,
role,
status
)
VALUES
(
'$full_name',
'$email',
'$phone',
'$password',
'customer',
'Active'
)
");

$user_id = mysqli_insert_id($conn);

// Insert into customers
mysqli_query($conn,"
INSERT INTO customers
(
user_id,
address,
estate,
town,
county
)
VALUES
(
'$user_id',
'$address',
'$estate',
'$town',
'$county'
)
");

echo "<script>
alert('Registration Successful!');
window.location='../login.php';
</script>";