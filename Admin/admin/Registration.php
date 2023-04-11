<?php
include 'db.php';
$id = $_GET['id'];
// print_r($id);
// exit;
if(isset($_POST['sub'])){
  // print_r($_POST['sub']);
  // exit;
  $createdid=$id;
  // print_r($createdid);
  // exit;
	$name=$_POST['name'];
  // $userid = $id;
	$email=$_POST['email'];
	$password=$_POST['password'];

	$projectname=$_POST['projectname'];
	$projecttype=$_POST['projecttype'];
  $usertype=$_POST['usertype'];

  // $image=$_GET['image'];
	// header ('location:/admin/top.php');

  $password = md5($password);
// $target_dir = "upload/";
  if($_FILES['image']['name']){
		move_uploaded_file($_FILES['image']['tmp_name'], "upload/".$_FILES['image']['name']);
		 $image=$_FILES['image']['name'];
//      print_r($image);
//      exit;
     
	}
	 $i="insert into Register(name,email,password,projectname,projecttype,usertype,image)values('$name','$email','$password','$projectname','$projecttype','$usertype','$image')";	
	//  print_r($i);
  //  exit;
  $result = mysqli_query($db,$i);
   	// print_r($result);
    //  exit;
  
  }  

?>      


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     </head>
  <body>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="container">
        <h1 class="my-4">Register</h1>
        <p class="lead">Create account by Admin</p>
        <div class="mb-3">
          <label for="name" class="form-label"><b>Name</b></label>
          <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label"><b>Email</b></label>
          <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required>
        </div>
        <div class="mb-3">
          <label for="psw" class="form-label"><b>Password</b></label>
          <input type="password" class="form-control" placeholder="Enter Password" name="password" id="psw" required>
        </div>
        <div class="mb-3">
          <label for="Project name" class="form-label"><b>Project name</b></label>
          <input type="text" class="form-control" placeholder="Enter Project name" name="projectname" id="Project name" required>
        </div>
        <div class="mb-3">
          <label for="Project type" class="form-label"><b>Project type</b></label>
          <select class="form-select" name="projecttype" id="Project type" required>
            <option disabled selected value="">--- Select Project Type ---</option>
            <option>Frontend</option>
            <option>Backend</option>
            <option>Tester</option>
            <option>Digital Marketing</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="User type" class="form-label"><b>User type</b></label>
          <select class="form-select" name="usertype" id="User type" required>
            <option disabled selected value="">--- Select User Type ---</option>
            <option value="0">0</option>
            <option value="1">1</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label"><b>Image</b></label>
          <input type="file" class="form-control" name="image" id="image">
        </div>
        <div align="center">
          
          <button class="btn btn-secondary btn-lg btn-block"  type="submit"  name="sub">Register</button>
        </div>

</form>
      </body>
</html>