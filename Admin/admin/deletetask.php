<?php
require('db.php');
$id=$_REQUEST['id'];
// print_r($id);
// exit;
$query = "DELETE FROM tasks WHERE id=$id"; 
$result = mysqli_query($db,$query) or die ( mysqli_error());
// header("Location: task.php"); 
          
    header ("location:http://localhost/jilanumatiya/Project/Admin/admin/task.php");
?>