<?php
include 'db.php';
    $id=$_GET['id'];
  
    
    $url = "SELECT * FROM cproject WHERE id = '$id'";
    $image = mysqli_query($db, $url);
    
    $sql = "DELETE FROM cproject WHERE id='$id'";
    $result = mysqli_query($db, $sql);
   
   
    header ("location: completepr.php");

?>