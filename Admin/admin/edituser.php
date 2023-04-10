<?php
include 'db.php';
include 'top.php';
session_start();

$id = $_GET["id"];

$findresult = mysqli_query($db, "SELECT * FROM Register WHERE id='$id'");
if ($res = mysqli_fetch_array($findresult)) {
  $name = $res['name'];
  $projectname = $res['projectname'];
  $role = $res['role'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <!-- <title>Edit Profile</title> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container"style="padding-top: 150px;padding-left:150px ;">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- <h2>Edit Profile</h2> -->
        <br>
        <br>
        <?php
          if (isset($_POST['update_profile'])) {
            $name = $_POST['name'];
            $projectname = $_POST['projectname'];
            // $role = $_POST['role'];

            $sql = "UPDATE Register SET name='$name', projectname='$projectname' WHERE id='$id'";
            
           $a = mysqli_query($db,$sql);
          //  print_r($a);
          //  exit;
           if ($a == 1) {
            header('Location:/jilanumatiya/Projecttask/Admin/admin/manageuser.php');
            exit;
           }else{
             echo"just";
           }
          
           
          }
          ?>
          <form method="post" enctype="multipart/form-data" action="">

          <div class="form-group">
            <h3 for="name">Name:</h3>
            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
          </div>

          <div class="form-group">
            <h3 for="projectname">Project Name:</h3>
            <input type="text" name="projectname" class="form-control" value="<?php echo $projectname; ?>">
          </div>

      

          <button class="btn btn-primary" name="update_profile">Save Profile</button>
        </form>
      </div>
    </div>
  </div>


</body>
</html>

<?php

?>