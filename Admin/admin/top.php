<?php

include 'db.php';
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="profile.css">
    
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>


  <div class="sidebar">
    <div class="logo-details">
      <i class='image'>
          <img src="logoq.png" width="250px" height="80px">
      </i>
      
    </div>
    <ul class="nav-links" style="padding-left: 0px;">
        <li>
          <a href="project.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Project</span>
          </a>
        </li>
      
        <li>
          <a href="manageuser.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Manage User</span>
          </a>
        </li>

        <li class="log_out">
     
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out

            </span>
          </a>
        </li>
      </ul>
  </div> 
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
  
 
      <div class="profile">
<div class="profile-image">
    <?php echo $shortName; ?>
   
</div>
<h4><?php echo $fullName; ?></h4>
</div>
      <div class="dropdown">
        <button class="dropbtn">
        <?php
        $s = $_SESSION['id'];
        $r = "SELECT image From Register Where id = '$s'";
        $result = mysqli_query($db,$r);
        foreach($result as $row){
        ?>  
        <img class="rounded-circle" src="upload/<?= $row['image']; ?>" height="55px" width ="50px">
      <?php
    }
    ?>
    </button>
        <div class="dropdown-content">
 
      <a class="dropdown-item" href="profile.php">Profile </a>
  
      <a class="dropdown-item" href="logout.php"> Logout </a>  
        </div>
      </div>
        </div>
      </div>
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
<script>
//    $(function() {
//     $( ".search-box" ).autocomplete({
//     source: 'backend-script.php'  
//     });
// });
</script>
</body>
</html>

