<?php
include 'dashboard.php';
include 'top.php';
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main class="main main-content">
            <div class="xyz">
                   
            </div>
            
            <div class="overview-cards" style="padding-left: 236px;">
                <div class="card product-card">
                    <div class="title">
                        <h2>Project</h2>
                    </div>
                    <?php
                   $i = "SELECT COUNT(*) as count_project FROM project";
                   //  print_r($i);
                   //  exit;
                    $query_run  = mysqli_query($db,$i);
                   //  print_r($query_run);
                   //  exit;
                   if(mysqli_num_rows($query_run) > 0)
                   {
                       foreach($query_run as $row)
                       {
                        // print_r($row);
                        //  exit;
                    ?>
                    <span class="content product-content">
                        <svg>
                            <use xlink:href='./icons.svg#icon-package'></use>
                        </svg>
                        <div class="number">
                            <h4><?= $row['count_project']; ?></h4>
                        </div>
                    </span>
                    <?php
                       }
                    }
                    
                    ?>
                </div>
                <?php
                   $i = "SELECT COUNT(*) as count_project FROM task";
                   //  print_r($i);
                   //  exit;
                    $query_run  = mysqli_query($db,$i);
                   //  print_r($query_run);
                   //  exit;
                   if(mysqli_num_rows($query_run) > 0)
                   {
                       foreach($query_run as $row)
                       {
                        // print_r($row);
                        //  exit;
                    ?>
               
                <div class="card user-card">
                    <div class="title">
                        <h2>Task</h2>
                    </div>
                    <span class="content user-content">
                        <svg>
                            <use xlink:href='./icons.svg#icon-user'></use>
                        </svg>
                        <div class="number">
                            <h4><?= $row['count_project']; ?></h4>
                        </div>
                    </span>
                    <?php
                       }
                    }
                    
                    ?>
                </div>

                <?php
                   $i = "SELECT COUNT(*) as count_project FROM cproject";
                   //  print_r($i);
                   //  exit;
                    $query_run  = mysqli_query($db,$i);
                   //  print_r($query_run);
                   //  exit;
                   if(mysqli_num_rows($query_run) > 0)
                   {
                       foreach($query_run as $row)
                       {
                        // print_r($row);
                        //  exit;
                    ?>
                <div class="card order-card">
                    <div class="title">
                        <h2>Complete Project</h2>
                    </div>
                    <span class="content order-content">
                        <svg>
                            <use xlink:href='./icons.svg#icon-briefcase'></use>
                        </svg>
                        <div class="number">
                            <h4><?= $row['count_project']; ?></h4>
                        </div>
                    </span>
                    <?php
                       }
                    }
                    
                    ?>
                </div>
            </div>
        </main>
</body>
</html>