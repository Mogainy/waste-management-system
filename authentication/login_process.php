<?php
session_start();
include "../includes/config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];

$sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($sql)==1){

    $user = mysqli_fetch_assoc($sql);

    if(password_verify($password,$user['password'])){

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['name'] = $user['full_name'];
        $_SESSION['role'] = $user['role'];

        if($user['role']=="admin"){
            header("Location: ../admin/dashboard.php");
        }elseif($user['role']=="driver"){
            header("Location: ../driver/dashboard.php");
        }else{
            header("Location: ../customer/dashboard.php");
        }

        exit();

    }else{
        echo "Wrong Password.";
    }

}else{
    echo "Account does not exist.";
}
?>