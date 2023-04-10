<?php include 'db.php';
require('top.php');
session_start();


$id=$_GET["id"];

$findresult = mysqli_query($db,"SELECT * FROM cproject WHERE id='$id'");

if($res = mysqli_fetch_array($findresult))
{

$pname=$res['projectname'];
$completed=$res['completed'];
$createdby = $res['createdby'];

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
    // print_r($_POST['update_profile']);
    // exit;
    $pname=$_POST['projectname'];
	$completed=$_POST['completed'];
    $createdby = $_POST['createdby'];
$sql="SELECT * from cproject where id='$id'";
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

  $y="UPDATE cproject SET projectname='$pname',completed='$completed',createdby='$createdby'WHERE id='$id'";
  // print_r($y);
  // exit;
  $result = mysqli_query($db,$y);
  //  print_r($result);
  //  exit;
   if($result)
   {
header("location:project.php?update_profile=1");
   }
   else 
   {
    $error[]='Something went wrong';
   }
}
    if(!isset($error)){}
    $sql ="SELECT * FROM `cproject` WHERE `id`='$id'";
    $result=mysqli_query($db,$sql);

     $rows = mysqli_num_rows($result);

    if($rows != 0){ 

	 header("Location:http://localhost/jilanumatiya/Project/Admin/admin/completepr.php?msg=Edit Succesfull");
   }else{
	 $query = "insert into cproject(projectname,completed,createdby)values('$pname','$completed','$createdby')";

	 header("Location: http://localhost/jilanumatiya/Project/Admin/admin/completepr.php?msg= Edit not succesfull");	 
    }
    $_SESSION['registration'] = true;


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
          <?php
                        // $subcategory = $_GET['subcategory'];
                            $query = "SELECT * FROM project ORDER BY 'Projectname' ASC";
                            $result = $db->query($query);
                        ?>
                        <br>
                        
                        <div><h2>Project:</h2>
                                
                            
                            <td><select id="project" name="projectname" value="<?php echo $project;?>"class="form-control form-control-lg select2">
                                <?php
                                
                                foreach($result as $row)
                                // print_r($row);
                                // exit;
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
                            </div><br>
        <br>
        <br>
      
       
        <tr>
        <div><h2>Create By:</h2>
           <td><select name="completed" value="<?php echo $completed;?>"class="form-control form-control-lg select2">
            
           <option>YES</option>
            <option>NO</option>
  
          </select>
          
            </td> 
            </tr>
            <br>
        <br>
    
      <div class="form-group">
      <div class="row"> 
      <?php
         // $subcategory = $_GET['subcategory'];
             $query = "SELECT * FROM project ORDER BY 'user' ASC";
            $result = $db->query($query);
        ?>
         <br>
              
        <div><h2>Create By:</h2>
                                
                            
            <td><select id="project" name="createdby" value="<?php echo $createdby;?>"class="form-control form-control-lg select2">
                 <?php
                                
                foreach($result as $row)
                // print_r($row);
                // exit;
                { 
                if($user == $row['user']){
                    $slected="selected";
                }else{
                    $slected="";
                }
                
                ?>
                <option value="<?php echo $row['user'];?>" <?php echo $slected; ?>><?php echo $row['user'];?></option>';
            <?php }
                ?>
            </select>
            </div><br>
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


