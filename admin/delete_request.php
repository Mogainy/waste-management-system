<?php
include "includes/header.php";

$id=$_GET['id'];

$result=mysqli_query($conn,"
SELECT status
FROM collection_requests
WHERE request_id='$id'
");

$request=mysqli_fetch_assoc($result);

if(
$request['status']=="Assigned" ||
$request['status']=="In Progress" ||
$request['status']=="Completed"
){

echo "<script>
alert('This request cannot be deleted because it has already been processed.');
window.location='collection_requests.php';
</script>";

exit();

}

mysqli_query($conn,"
DELETE FROM collection_requests
WHERE request_id='$id'
");

header("Location: collection_requests.php");
exit();