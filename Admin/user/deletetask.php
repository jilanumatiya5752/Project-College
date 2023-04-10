<?php
include 'db.php';
    $id = $_GET['id'];
    // print_r($id);
    // exit;
    $url = "SELECT * FROM tasks WHERE id = '$id'";
    $image = mysqli_query($db, $url);
    $sql = "DELETE FROM tasks WHERE id='$id'";
    $result = mysqli_query($db, $sql);
?>