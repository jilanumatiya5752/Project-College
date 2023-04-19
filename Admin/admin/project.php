<?php
include 'db.php';
include 'top.php'; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <link rel="stylesheet" type="text/css" href="image.css"/> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="">
  <form method="post" action="" enctype="multipart/form-data" >
 
  <div class="btn" style="padding-top: 132px;">
<div align="right">
    <button type="button" name="add"  id="add" class="btn btn-danger"><a href="addproject.php">Add Project</a></button>
    </div>
    <div class="row" style="padding-left: 361px;padding-top: 55px;">
    <?php
    $id = $_SESSION['id'];
 
    $query = "SELECT * FROM project where userid = $id";
    
    $query_run  = mysqli_query($db,$query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)

        {
       
    ?>
  
   
  <div class="card-group" style= "width: 25%;">
    <div class="card">
      <div class="card-body">
        
        <h5 class="card-title"><a href="task.php?id=<?= $row["id"]; ?>"><?= $row['Projectname'];?></a></h5>
        <p class="card-text"><?= $row['Projectdescription'];?></p>
        <br>
        <br>
        <br>
        <center>
        <a href="edit.php?id=<?= $row["id"]; ?>">Edit</a> |
        <a href="delete.php?id=<?= $row["id"]; ?>">delete</a>
        </center>
        <div class="card-footer bg-transparent border-success" value="<?php echo $p;?>">
       <?php

          $x = explode(",",$row['createdby']);

       ?>
        <?php foreach($x as $p) { 
				
          $a = "SELECT `image` FROM `Register` WHERE id = '$p'";
          // print_r($a);
          // exit;
          $query_run  = mysqli_query($db,$a);

          if(mysqli_num_rows($query_run) > 0)
        {
        foreach($query_run as $row)
        
        {
          ?>  
          
        <img class="rounded-circle" src="/jilanumatiya/Projecttask/Admin/upload/<?= $row['image'];?>" height='25px' width="25px">
        <?php
             }
           }
          }        
        ?>
        </div>
       </div>
      </div>
     </div>
  <?php
      }
    }
  ?>
  </div>
  </div>
  </form>
</body>
</html>