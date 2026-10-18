<?php
include "../authentication/auth.php";
include "../includes/config.php";

$request = $_GET['id'];

mysqli_query($conn,"
UPDATE collection_requests
SET status='In Progress'
WHERE request_id='$request'
");

header("Location: jobs.php");
exit();