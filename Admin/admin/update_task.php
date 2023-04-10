<?php
 include 'db.php';
require('top.php');
session_start();


$id=$_GET["id"];

$findresult = mysqli_query($db, "SELECT * FROM tasks WHERE id='$id'");
// print_r($findresult);
// exit;
if($res = mysqli_fetch_array($findresult))
// print_r($res);
// exit;
{
$task=$res['task'];
$comment=$res['comment'];
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

$task=$_POST['task'];
$comment=$_POST['comment'];

$sql="SELECT * from tasks where id='$id'";
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

  $y="UPDATE tasks SET task='$task',comment='$comment' WHERE id='$id'";
  // print_r($y);
  // exit;
  $result = mysqli_query($db,$y);
//    print_r($result);
//    exit;
   if($result)
   {
header("location:task.php?update_profile=1");
   }
   else 
   {
    $error[]='Something went wrong';
   }
}

    $sql ="SELECT * FROM `tasks` WHERE `id`='$id'";
    $result=mysqli_query($db,$sql);

     $rows = mysqli_num_rows($result);
    
        
      
    if($rows != 0){ 

	 header("Location:http://localhost/jilanumatiya/Project/Admin/admin/task.php?msg=Edit Succesfull");
   }else{
	 $query = "insert into task(task,comment)values('$task','$comment')";
  //  print_r($query);
  //  exit;
	 header("Location: http://localhost/jilanumatiya/Project/Admin/admin/task.php?msg= Edit not succesfull");	 
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
                <label>task</label>
            </div>
             <div class="col">
                <input type="text" name="task" value="<?php echo $task;?>" class="form-control">
            </div>
            <div class="col-3">
                <label>Comment</label>
            </div>
             <div class="col">
                <input type="text" name="comment" value="<?php echo $comment;?>" class="form-control">
            </div>
          </div>
      </div>
        <br>
        <br>

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