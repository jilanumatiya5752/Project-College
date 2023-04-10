<?php
include 'db.php';
include 'top.php';
?>

    
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.hu {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 250px;
  /* max-height:1000000px; */
  margin: auto;
  text-align: center;
  font-family: arial;
}
.hu{
    padding-top:150px;
}
.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>
<?php

    $id = $_SESSION['id'];
    $a = "SELECT * FROM Register Where id='$id'";
    $result = mysqli_query($db,$a);
    foreach($result as $row){
      $name = $row['name'];
      $email = $row['email'];
      $pname=  $row['projectname'];
      $image = $row['image'];
      // print_r($image);
      // exit;
      ?>
<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="hu mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              
             <img src="upload/<?= $row['image']; ?>" alt="Avatar" class="img-fluid my-5" style="width: 80%;"/>
              
              <h3><?=$row['name'] ?></h3>
            
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="hu-body p-4">
               
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h3>Email</h3>
                    <p class="text-muted"><?= $row['email'] ?></p>
                  </div>
                 
                </div>
                <h3>Projects</h3>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                   
                    <p class="text-muted"><?= $row['projectname'] ?></p>
                  </div>
                 
                </div>
                <div class="d-flex justify-content-start">
                  <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <?php  
    }
    ?>

</body>
</html>
