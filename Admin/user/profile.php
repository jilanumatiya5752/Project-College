<?php
include 'db.php';
include 'top.php';
?>

    
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><style>
.gradient-custom {
/* fallback for old browsers */
background: #f6d365;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
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
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="upload/<?= $row['image']; ?>"
                alt="Avatar" class="rounded-circle my-5" style="width: 80px;" />
                <h4 style="color:black"><?=$row['name'] ?></h4>
                <br>
                <br>
                <h5 style="color:black"><?=$row['projecttype'] ?></h5>
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-10 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted"><?= $row['email'] ?></p>
                  </div>
                  <!-- <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted">123 456 789</p>
                  </div> -->
                </div>
                <h6>Projects</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Recent</h6>
                    <p class="text-muted"><?= $row['projectname'] ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Most Viewed</h6>
                    <p class="text-muted"><?= $row['projectname'] ?></p>
                  </div>
                </div>
                <div class="d-flex justify-content-start">
                  <a href="editprofile.php?id=<?= $row["id"]; ?>">Edit</a>
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
