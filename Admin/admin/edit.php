<?php
 include 'db.php';
include 'top.php';
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
	<title>Update Project</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
</head>
<body>
<div class="container"style="padding-top: 80px;padding-left: 130px;">
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<h1 class="mb-5">Update Project</h1>
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

	 header("Location:http://localhost/jilanumatiya/Projecttask/Admin/admin/project.php?msg=Edit Succesfull");
   }else{
	 $query = "insert into project(Clientname,Projectname,createdby,Clientcategory,Projectdescription)values('$cname','$pname','$u','$xyz','$pdesc')";
//    print_r($query);
//    exit;
	 header("Location: http://localhost/jilanumatiya/Projecttask/Admin/admin/project.php?msg= Edit not succesfull");	 
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
   
        <form method="post" enctype="multipart/form-data" action="">
          <div class="mb-3">
            <label for="project-name" class="form-label"><b>Project Name:-</b></label>
            <input type="text" name="Projectname" value="<?php echo $pname;?>" class="form-control" id="project-name">
            <input type="hidden" name="Clientname" value="<?php echo $cname;?>" class="form-control">
          </div>

				<div class="mb-3">
					<label for="created-by" class="form-label"><b>Created By:-</b></label>
					<select name="createdby[]" multiple size="5" class="form-control form-control-lg select2" id="created-by">
						<?php
						// Get the ID of the project to be edited from the URL
						$id = $_GET['id'];

						// Query the project table to get the current created by values
						$query = "SELECT createdby FROM project WHERE id = $id";
						$result = mysqli_query($db, $query);
						$data = mysqli_fetch_assoc($result);
						$selected_values = explode(',', $data['createdby']);

						// Query the Register table to get the list of all users
						$query = "SELECT * FROM Register";
						$result = mysqli_query($db, $query);
						$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
						// Loop through the list of users and create the select options
						foreach ($users as $user): ?>
							<option value="<?php echo $user['id']; ?>" <?php echo in_array($user['id'], $selected_values) ? 'selected' : ''; ?>><?php echo $user['name']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="mb-3">
					<label for="project-desc" class="form-label"><b>Project Description:-</b></label>
					<input type="text" name="Projectdescription" value="<?php echo $pdesc;?>" class="form-control" id="project-desc">
				</div>

        
        <div class="mb-3">
          <label for="project-desc" class="form-label"><b>ClientCategory:-</b></label>
          <br>
          <input type="checkbox" name="Clientcategory[]" <?php if (in_array("Frontend Devop", $b)) {echo "checked";}?> id="Frontend Devop" value="Frontend Devop">Frontend Devop<br>
          <input type="checkbox" name="Clientcategory[]" <?php if (in_array("Backend Devop", $b)) {echo "checked";}?> id="Backend Devop" value="Backend Devop">Backend Devop<br>
          <input type="checkbox" name="Clientcategory[]" <?php if (in_array("Tester", $b)) {echo "checked";}?> id="Tester" value="Tester">Tester<br>
            </div>
          <div class="d-grid gap-2 mt-5">
            <button class="btn btn-primary" type="submit" name="update_profile">Save Profile</button>
          </div>
        </form>
		</div>
	</div>
</div>

</body>
</html>



