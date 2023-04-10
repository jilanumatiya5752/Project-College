<?php
include 'db.php';
    $id=$_GET['id'];
  
    
    $url = "SELECT * FROM Register WHERE id = '$id'";
    $image = mysqli_query($db, $url);
    
    $sql = "DELETE FROM Register WHERE id='$id'";
    $result = mysqli_query($db, $sql);
   
   
    header ("location: manageuser.php");

?>