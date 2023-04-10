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
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="rcss.css">
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
  <div class="container">
    <h1>Register</h1>
    <p>Create account by Admin </p>
    
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" required>

    
<br>
<br>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>


    <label for="Project name"><b>Project name</b></label>
    <input type="text" placeholder="Enter Project name" name="projectname" id="Project name" required>


    <label for="Project type"><b>Project type</b></label>
    <select id="select" name="projecttype" required>
        <!-- <option>---select---</option> -->
        <option>Frontend</option>
        <option>Backend</option>
        <option>Tester</option>
        <option>Digital Marketing</option>
    </select>
    <br>
    <br>
    <label for="User type"><b>User type</b></label>
    <select id="select" name="usertype" required>
        <!-- <option>---select---</option> -->
        <option>0</option>
        <option>1</option>
        
    </select>
    <br>
    <br>
    
    <hr>
    Image:
    <input type="file" name="image">

    <button  type="submit" class="registerbtn" name="sub">Register</button>
  </div>
  
 
</form>

</body>
</html>
