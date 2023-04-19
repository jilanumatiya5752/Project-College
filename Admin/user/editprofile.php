<?php include 'db.php';
require('top.php');
session_start();


$id=$_GET["id"];

$findresult = mysqli_query($db, "SELECT * FROM Register WHERE id='$id'");
// echo "SELECT * FROM Register WHERE id='$id'";
// exit;
if($res = mysqli_fetch_array($findresult))
{
$name=$res['name'];
$email=$res['email'];
$projectname=$res['projectname'];


}
 ?> 
 <!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">  
     <form action="" method="POST" enctype='multipart/form-data'>
  <div class="login_form" style="padding-top: 120px;">
<?php 
if(isset($_POST['update_profile'])){
  $name=$res['name'];
  $email=$res['email'];
  $projectname=$res['projectname'];

$folder='/jilanumatiya/Projecttask/Admin/upload/';
$file = $_FILES['image']['tmp_name'];  
$file_name = $_FILES['image']['name']; 

$sql="SELECT * from Register where id='$id'";
      $res=mysqli_query($db,$sql);
   if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);

if($oldusername!=$username){
  if($username==$row['username'])
     {
        $error[] ='Username alredy Exists. Create Unique username';
    } 
   }
}
    if(!isset($error)){ 
          if($file!= "")
          {
            $stmt = mysqli_query($db,"SELECT image FROM  Register WHERE id='$id'");
            $row = mysqli_fetch_array($stmt); 
            $deleteimage=$row['image'];
            unlink($folder.$deleteimage);
            move_uploaded_file($file, $folder . $file_name); 
            mysqli_query($db,"UPDATE Register SET image='$file_name' WHERE id='$id'");
          }
           $result = mysqli_query($db,"UPDATE Register SET name='$name',email='$email',projectname='$projectname' WHERE id='$id'");
           if($result)
           {
       header("location:profile.php?update_profile=1");
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

	 header("Location: http://localhost/jilanumatiya/Projecttask/Admin/user/profile.php? msg=Edit Succesfull");
   }else{
	 $query = "insert into Register(name,email,projectname,image)values('$name','$email','$projectname','$image')";

	 header("Location: http://localhost/jilanumatiya/Projecttask/Admin/user/profile.php? msg= Edit not succesfull");	 
    }
    $_SESSION['registration'] = true;

   $_SESSION['name'] = $name;
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
           <div class=""> 
            <div align="">
              <h2>Edit Profile</h2>
            </div>
            <br>
            <br>
              <?php
                $id = $_GET['id'];
                $sql ="SELECT * FROM `Register` WHERE `id`='$id'";
                
                $result=mysqli_query($db,$sql);

                $rows = mysqli_num_rows($result);
                foreach($result as $rows){
                  $image = $rows['image'];
                 
                ?>
                <?php
                 if($image==NULL)
            
                {
                 echo '<img src="http://localhost/jilanumatiya/Projecttask/Admin/upload/'.$image.'" style="height:80px;width:auto;border-radius:30%;">';
                } else { echo '<img src="/jilanumatiya/Projecttask/Admin/upload/'.$image.'" style="height:50%;width:auto;border-radius:5%;">';}?> 
              <?php
                }
              ?>
               <div class="">
                <label>Change Image &#8595;</label>
                <input class="form-control" type="file" name="image" style="width:100%;" >
            </div>
                <br>      
  
           </div>
            
          </div>

          <div class="form-group">
          <div class="row"> 
            <div class="col-3">
                <label>Name:-</label>
            </div>
             <div class="col">
                <input type="text" name="name" value="<?php echo $name;?>" class="form-control">
            </div>
          </div>
      </div>
      <div class="form-group">
      <div class="row"> 
      <div class="col-3">
                <label>Email:-</label>
            </div>
             <div class="col">
                <input type="text" name="email" value="<?php echo $email;?>" class="form-control">
            </div>
              </div>
              </div>
      <div class="form-group">
      <div class="row"> 
      <div class="col-3">
                <label>Projectname:-</label>
            </div>
             <div class="col">
                <input type="text" name="projectname" value="<?php echo $projectname;?>" class="form-control">
            </div>
              </div>
              </div>
    
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


