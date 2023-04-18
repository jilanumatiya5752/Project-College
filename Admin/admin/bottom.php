<?php
$p_id = $_REQUEST['id'];
// print_r($p_id);
// exit;
include 'db.php';
// print_r($_GET);
// exit;
$id = $_GET['id'];
 $i  = "UPDATE `tsk` SET `type`='1' WHERE id='$id'";
//  print_r($i );
//     exit;	
 $query = mysqli_query($db,$i);
 
 header("Location:http://localhost/jilanumatiya/Projecttask/Admin/admin/completepr.php");
?>

