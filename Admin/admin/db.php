<?php
session_start();

$target_dir = "upload/";
$servername="localhost:3306";
$username="root";
$password="Root#123";
$dbname="Project Management";

$db=mysqli_connect($servername,$username,$password,$dbname);

?>