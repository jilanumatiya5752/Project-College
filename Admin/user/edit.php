<?php include 'db.php';
require('top.php');
session_start();


$id=$_GET["id"];

$findresult = mysqli_query($db, "SELECT * FROM project WHERE id='$id'");
// print_r($findresult);
// exit;
if($res = mysqli_fetch_array($findresult))
// print_r($res);
// exit;
{
$cname=$res['Clientname'];
$pname=$res['Projectname'];
$client_cat=$res['Clientcategory'];
$b=explode(",", "$client_cat");

$createdby =$res['createdby'];
// print_r($createdby);
// exit;
$s = explode(",","$createdby");
// print_r($s);
// exit;
$pdesc=$res['Projectdescription'];

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
$cname=$_POST['Clientname'];
$pname=$_POST['Projectname'];
$client_cat=$_POST['Clientcategory'];

$xyz=implode(",",$client_cat);


$createdby =$_POST['createdby'];
// print_r($createdby);
// exit;
$u=implode(",",$createdby);
// $u = implode(",","$createdby");
// print_r($u);
// exit;
$pdesc=$_POST['Projectdescription'];

$sql="SELECT * from project where id='$id'";
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

  $y="UPDATE project SET Clientname='$cname',Projectname='$pname',Clientcategory='$xyz',createdby='$u',Projectdescription='$pdesc' WHERE id='$id'";
  // print_r($y);
  // exit;
  $result = mysqli_query($db,$y);
//    print_r($result);
//    exit;
   if($result)
   {
header("location:project.php?update_profile=1");
   }
   else 
   {
    $error[]='Something went wrong';
   }
}

    $sql ="SELECT * FROM `project` WHERE `id`='$id'";
    $result=mysqli_query($db,$sql);

     $rows = mysqli_num_rows($result);
    
        
      
    if($rows != 0){ 

	 header("Location:http://localhost/jilanumatiya/Project/Admin/admin/project.php?msg=Edit Succesfull");
   }else{
	 $query = "insert into project(Clientname,Projectname,createdby,Clientcategory,Projectdescription)values('$cname','$pname','$u','$xyz','$pdesc')";
  //  print_r($query);
  //  exit;
	 header("Location: http://localhost/jilanumatiya/Project/Admin/admin/project.php?msg= Edit not succesfull");	 
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
                <label>Clientname</label>
            </div>
             <div class="col">
                <input type="text" name="Clientname" value="<?php echo $cname;?>" class="form-control">
            </div>
          </div>
      </div>
        <br>
        <br>
      <div class="form-group">
      <div class="row"> 
      <div class="col-3">
                <label>Projectname</label>
            </div>
             <div class="col">
                <input type="text" name="Projectname" value="<?php echo $pname;?>" class="form-control">
            </div>
              </div>
              </div>
              <br>
        <br>
        <div><h2>Created By</h2>
                                <select name="createdby[]" multiple size="2">
                                    <option>Saidbhai</option>
                                    <option>Razakbhai</option>
                                    <option>Adilbhai</option>
                                    <option>Farmanbhai</option>
                                    <option>Jilanbhai</option>
                                </select>
                            </div><br>
            </div><br>
                            
            <br>
       
        <div><h2>Cleint Category:</h2>
        <input type="checkbox" name="Clientcategory[]" <?php if (in_array("Frontend Devop", $b)) {echo "checked";}?> id="Frontend Devop" value="Frontend Devop">Frontend Devop<br>
        <input type="checkbox" name="Clientcategory[]" <?php if (in_array("Backend Devop", $b)) {echo "checked";}?> id="Backend Devop" value="Backend Devop">Backend Devop<br>
        <input type="checkbox" name="Clientcategory[]" <?php if (in_array("Tester", $b)) {echo "checked";}?> id="Tester" value="Tester">Tester<br>
                                <!-- <label for="Tester"> </label><br> -->
                                  
    </div><br>
            <br>
        <br>
       
      <div class="form-group">
      <div class="row"> 
            <div class="col-3">
                <label>Projectdescription</label>
            </div>
             <div class="col">
                <input type="text" name="Projectdescription" value="<?php echo $pdesc;?>" class="form-control">
            </div>
          </div>
      </div>
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


