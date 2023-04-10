<?php
include 'db.php';
    $id=$_GET['id'];
  
    
    $url = "SELECT * FROM project WHERE id = '$id'";
    $image = mysqli_query($db, $url);
    
    $sql = "DELETE FROM project WHERE id='$id'";
    $result = mysqli_query($db, $sql);
   
   
    header ("location: project.php");

?>