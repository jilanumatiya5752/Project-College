<?php 
include 'db.php';
require('top.php');
session_start();

$id=$_GET["id"];
$x= "SELECT * FROM task WHERE id='$id'";
// print_r($x);
// exit;
$findresult = mysqli_query($db,$x);
// print_r($findresult);
// exit;
if($res = mysqli_fetch_array($findresult))
// print_r($res);
// exit;
{

$title=$res['title'];
$project=$res['project'];
$createdby = $res['createdby'];
$asignedto=$res['asignedto'];
$b=explode(",", "$asignedto");
$status=$res['status'];
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
    $title=$_POST['title'];
	  $project=$_POST['project'];
    $createdby = $_POST['createdby'];
    $abc=implode(",",$createdby);
    $asignedto=$_POST['asignedto'];
    $xyz=implode(",",$asignedto);
    $status=$_POST['status'];

$sql="SELECT * FROM task where id='$id'";
// print_r($sql);
// exit;
      $res=mysqli_query($db,$sql);
      // print_r($res);
      // exit;
   if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);
// print_r($row);
//       exit;
if($oldusername!=$username){
  if($username==$row['username'])
     {
        $error[] ='Username alredy Exists. Create Unique username';
    } 
   }
}
if(!isset($error)){ 

  $y="UPDATE task SET title='$title',project='$project',createdby='$abc',asignedto='$xyz',status='$status' WHERE id='$id'";
  // print_r($y);
  // exit;
  $result = mysqli_query($db,$y);
  //  print_r($result);
  //  exit;
   if($result)
   {
header("location:task.php?update_profile=1");
   }
   else 
   {
    $error[]='Something went wrong';
   }
}
    
    $sql ="SELECT * FROM `task` WHERE `id`='$id'";

    $result=mysqli_query($db,$sql);

     $rows = mysqli_num_rows($result);

    if($rows != 0){ 

      header("Location: http://localhost/jilanumatiya/Project/Admin/user/task.php?msg=Edit not Succesfull");
	 
   }else{
   
    $query = "insert into task(title,project,createdby,asignedto,status)values('$title','$project','$abc','$xyz','$status')";
    // $data = mysqli_query($db,$query);
    header("Location: http://localhost/jilanumatiya/Project/Admin/user/task.php?msg= Edit succesfull");	
    }
    $_SESSION['registration'] = true;

   $_SESSION['title'] = $title;
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
            <div><h2>Title:</h2>
            </div>
             <div class="col">
                <input type="text" name="title" value="<?php echo $title;?>" class="form-control">
            </div>
          </div>
      </div>
        <br>
        <br>
      <div class="form-group">
      <div class="row"> 
      <div class="col-3">
      <?php
   // $subcategory = $_GET['subcategory'];
      $query = "SELECT * FROM project ORDER BY 'Projectname' ASC";
      $result = $db->query($query);
   ?>
  <br>
   <tr>
   <div><h2>Project:</h2>
    <td><select name="project"value="<?php echo $project;?>"class="form-control form-control-lg select2">
    <?php
          
    foreach($result as $row)
      { 
       if($pname == $row['Projectname']){
          $slected="selected";
          }else{
              $slected="";
          }
          
          ?>
          <option value="<?php echo $row['Projectname'];?>" <?php echo $slected; ?>><?php echo $row['Projectname'];?></option>';
      <?php }
          ?>
      </select>
          </td> 
          </tr>
              <br>
        <br>
       
        <?php
         // $subcategory = $_GET['subcategory'];
             $query = "SELECT * FROM project ORDER BY 'user' ASC";
            $result = $db->query($query);
        ?>
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
        <br>
        <tr>
        <div><h2>Asigned TO:</h2>
        <input type="checkbox" name="asignedto[]" <?php if (in_array("Frontend Devop", $b)) {echo "checked";}?> id="Frontend Devop" value="Frontend Devop">Frontend Devop<br>
        <input type="checkbox" name="asignedto[]" <?php if (in_array("Backend Devop", $b)) {echo "checked";}?> id="Backend Devop" value="Backend Devop">Backend Devop<br>
        <input type="checkbox" name="asignedto[]" <?php if (in_array("Tester", $b)) {echo "checked";}?> id="Tester" value="Tester">Tester<br>
                                <!-- <label for="Tester"> </label><br> -->
                                  
    </div><br>
            <br>
        <br>
        <tr>
        <div><h2>Status:</h2>
           <td><select name="status" value="<?php echo $status;?>"class="form-control form-control-lg select2">
            
            <option>Not Started</option>
            <option>Started</option>
            <option>Completed</option>
          </select>
          
            </td> 
            </tr>
            <br>
        <br>
     
           <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
<button  class="btn btn-success" name="update_profile">Save Profile</button>
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


