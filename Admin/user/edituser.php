<?php include 'db.php';
require('top.php');
session_start();


$id=$_GET["id"];

$findresult = mysqli_query($db, "SELECT * FROM Register WHERE id='$id'");
// print_r($findresult);
// exit;
if($res = mysqli_fetch_array($findresult))
// print_r($res);
// exit;
{
$name=$res['name'];
$projectname=$res['projectname'];
$projecttype=$res['projecttype'];
$role=$res['role'];

}
 ?> 
 <!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>
<body>
<div class="container"style="padding-top: 160px;padding-left: 330px;">
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">  
     <form action="" method="POST" enctype='multipart/form-data'>
  <div class="login_form">
<?php 
if(isset($_POST['update_profile'])){
  // echo"hjdfshdfs";
  // exit;
//   print_r($_POST['update_profile']);
//   exit;
$name=$_POST['name'];
$projectname=$_POST['projectname'];
$projecttype=$_POST['projecttype'];
$role=$_POST['role'];

$sql="SELECT * from Register where id='$id'";
      $res=mysqli_query($db,$sql);
   if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);
// print_r($row);
// exit; 
$a=$row ['Clientcategory'];    
// print_r($a);
// exit;  
$b=explode(",", "$a");
// print_r($b);
// exit;  
if($oldusername!=$username){
  if($username==$row['username'])
     {
        $error[] ='Username alredy Exists. Create Unique username';
    } 
   }
}
if(!isset($error)){ 

  $y="UPDATE Register SET name='$name',projectname='$projectname',projecttype='$projecttype',role='$role' WHERE id='$id'";
//   print_r($y);
//   exit;
  $result = mysqli_query($db,$y);
//    print_r($result);
//    exit;
   if($result)
   {
header("location:manageuser.php?update_profile=1");
   }
   else 
   {
    $error[]='Something went wrong';
   }
}

    $sql ="SELECT * FROM `Register` WHERE `id`='$id'";
    $result=mysqli_query($db,$sql);

     $rows = mysqli_num_rows($result);
    
        
      
    if($rows != 0){ 

	 header("Location:http://localhost/jilanumatiya/Project/Admin/user/manageuser.php?msg=Edit Succesfull");
   }else{
	 $query = "insert into project(name,projectname,projecttype,role)values('$name','$projectname','$projecttype','$role')";
  //  print_r($query);
  //  exit;
	 header("Location: http://localhost/jilanumatiya/Project/Admin/user/manageuser.php?msg= Edit not succesfull");	 
    }
    $_SESSION['registration'] = true;

   $_SESSION['Clientname'] = $cname;
        }    
        if(isset($error)){ 

foreach($error as $error){ 
  echo '<p class="errmsg">'.$error.'</p>'; 
}
}
        ?> 
     <form method="post" enctype='multipart/form-data' action="">
          <div class="row">
            <div class="col"></div>
           

          <div class="form-group">
          <div class="row"> 
            <div class="col-3">
                <label>Name</label>
            </div>
             <div class="col">
                <input type="text" name="name" value="<?php echo $name;?>" class="form-control">
            </div>
          </div>
      </div>
        <br>
        <br>
        <div class="form-group">
          <div class="row"> 
            <div class="col-3">
                <label>Project Name</label>
            </div>
             <div class="col">
                <input type="text" name="projectname" value="<?php echo $projectname;?>" class="form-control">
            </div>
          </div>
      </div>
        <br>
        <br>
      <div class="form-group">
      <div class="row"> 
      <div class="col-3">
      <label for="Project type"><b>Project type</b></label>
    <select id="select" name="projecttype" value="<?php echo $projectname;?>">
        <!-- <option>---select---</option> -->
        <option>Frontend</option>
        <option>Backend</option>
        <option>Tester</option>
        <option>Digital Marketing</option>
    </select>
    <br>
    <br>
              </div>
              </div>
              <br>
        <br>
       
        <label for="role"><b>Role</b></label>
    <select id="select" name="role" value="<?php echo $role;?>">
        <!-- <option>---select---</option> -->
        <option>0</option>
        <option>1</option>
        
    </select>
            <br>
        <br>
       
     
           <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
<button  class="btn btn-success" name="update_profile"  >Save Profile</button>
            </div>
           </div>
           <br>
       </form>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div> 

</body>
</html>


