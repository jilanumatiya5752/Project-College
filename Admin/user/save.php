<?php
// Include database connection file
include 'db.php';
// print_r($_POST['formData']);
// exit;
// Check if form data has been submitted
if(isset($_POST['save']))
{
    $status = $_POST['status'];
    $userid = $_POST['userid'];
    $query = "INSERT INTO save(status,userid) VALUES ('$status','$userid')";
	$result = mysqli_query($db, $query);
// echo $result;
// print_r($result);
// exit;
}
return $result;
?>