<?php
include 'db.php';
include 'top.php';
session_start();
$id = $_SESSION['id'];
// print_r($id);
// exit;
if(isset($_POST['add'])){

	$userid=$id;

$task =$_POST['task']; 
$createdby = $_POST['createdby'];

$ut=implode(",",$createdby);
$categoryid=$_POST['category'];
$type = $_POST['type'];

$i="insert into tsk(task,userid,createdby,category,type)values('$task','$userid','$ut','$categoryid','$type')";	
// print_r($i);
// exit;
   $result=mysqli_query($db, $i);

  
  }  

  
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="view.js"></script>
    <script src="admin.js"></script>

    <title>Document</title>
    <style>
    table,
    th,
    td {
        border: 1px solid black;
    }

    .modalfade {

        position: fixed;
        top: 35%;
        right: 0;
        transform: translateY(-50%);
        /* Other styles for your popup container */
    }
    </style>
</head>

<body>
    <form method="POST" action="">
        <?php
$id = $_GET['id'];

$a = "SELECT * FROM `project` WHERE id = '$id'";
$createdby_array='';
$query_run  = mysqli_query($db,$a);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $rows)
// print_r($rows);
// exit;
        {
			$createdby_array=$rows['createdby'];
    ?>
        <div align="center" style="padding-top: 100px;">
            <span class="badge bg-light text-dark">
                <h3 class="card-title" <?= $rows["Projectname"]; ?>><?= $rows['Projectname'];?></h3>
                <!--  -->
            </span>
        </div>
        <h3 class="card-title" style="display: none" <?= $rows["id"]; ?>><?= $rows['id'];?></h3>
        <?php
		}
	}
?>

        <div align="center" style="padding-top: 49px;">

        <span class="badge pill bg-info text-dark">
        <input type="text" class="form-control" name="task" placeholder="Please Enter Task" required />
        <br>
        <br>

        <td>
        <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">


 <?php

$query = "SELECT * FROM Register where id IN ($createdby_array)";
	
$result = mysqli_query($db,$query);
		
    ?>
    <td><select id="createdby" name="createdby[]" multiple size="3" value="<?php echo $id;?>>"class="form-control form-control-lg select2"></button>
<?php
    foreach($result as $row)
				{ 
		$x = explode(",",$row['createdby']);				
        if($pid == $row['createdby']){
        $slected="selected";
         }else{
        $slected="";
         }
         ?>
            <option value="<?php echo $row['id'];?>" <?php echo $slected; ?>><?php echo $row['name'];?>
            </option>
            <?php
			}
            ?>
        </select>
        </button>


<?php
$categoryid = $_GET['id'];

// $db = mysqli_connect("localhost:3306","root","Root#123","jilan");
$query = "SELECT * FROM `project` WHERE id='$categoryid'";
// print_r($query);
// exit;
$query_run  = mysqli_query($db,$query);

if(mysqli_num_rows($query_run) > 0)
{
    foreach($query_run as $row)
	// print_r($row);
	// exit;
    {
	
?>
    <h3 class="card-title" name="category" style="display:none" <?= $row["id"]; ?>><?= $row['id'];?></h3>
<?php
	}
}
?>
        </div>
        </td>
        <br>
        <input type="hidden" name="category" style="display:none" value=<?php echo $categoryid; ?>>
        <div style="display:none">
            <p name="type">0</p>
        </div>
        <?php
        $id = $_SESSION['id'];
        $i = "SELECT image FROM Register id='$id'";
        $query_run  = mysqli_query($db,$i);

        if(mysqli_num_rows($query_run) > 0)
      {
      foreach($query_run as $row)
	
     {
        ?>
        <div style="display:none">
        <img src="upload/<?= $row['image'];?>" height='25px' width="25px">
        </div>
        <?php
     }
    }
        ?>
       <button class="btn btn-danger" id="btn" name="add">Add Task</button>
        </div>
        </div>
        </span>
    </form>
    <br>
    <br>
    <div align="center">
        <div style="background-color:#eae5f0; height : 20%; width:50%;">

            <table align="left" border="1" width="100%">
                <tbody>
                    <tr>
                        <th>Id</th>
                        <th>Task</th>
                        <th>createdby</th> 
                        <th>status</th>
                        <th>completed</th>
                        <th>view</th>
                    </tr>
                </tbody>

                <?php
            $id = $_GET['id'];
            $i = "SELECT * FROM `tsk` WHERE category = '$id'";
            // print_r($i);
            // exit;
            $query = mysqli_query($db,$i);

            if(mysqli_num_rows($query) > 0)
                {
                    foreach($query as $les)   
            		// print_r($les);
            // exit;
                {
                    ?>
                    <?php
                    if ($les['type']==0){
                        ?>
                        <tbody>
                        <tr>
                        <td><?= $les['id']; ?></td>
                        <td>
                        <?php echo $les['task'] ?>
                        </td>
    
                        <td>
                    <?php
    
              $x = explode(",",$les['createdby']);
    
           ?>
            <?php foreach($x as $p) { 
                    
              $a = "SELECT * FROM `Register` WHERE id = '$p'";
              // print_r($a);
              // exit;
              $query_run  = mysqli_query($db,$a);
    
              if(mysqli_num_rows($query_run) > 0)
            {
            foreach($query_run as $res)
            
            {
              ?>
    
            <img class="rounded-circle" src="upload/<?= $res['image'];?>" height='25px' width="25px">
            <?php
            }
        }
    }
    ?>
    <td>
	<select name="status[]" class="form-control form-control-lg select2" id="created-by">
	<?php
	$id = $les['id'];
	$f = "SELECT * From save WHERE userid = '$id'";
    // print_r($f);
    // exit;
	$query = mysqli_query($db,$f);
	foreach ($query as $user): ?>
	<option value="<?php echo $user['id']; ?>" <?php echo in_array($user['id'], $selected_values) ? 'selected' : ''; ?>><?php echo $user['status']; ?></option>
	<?php  endforeach; ?>
	</select>
	</div>
	</td>
    <?php
    if($user['status'] == review){
        ?>
        <td><button id="btn" class="Completed" name="cmt"><a href="bottom.php?id=<?= $les["id"]; ?>">Completed</a></button></td>
        <?php
    }else{
        ?>
        <td></td>
        <?php
    }
    ?>
    
    
    </td>
        <td><button type="button" id="popupbtn" class="btn btn-danger popup-buton" data-toggle="modal"data-id="<?php echo $les['id']?>"data-target="#myModal<?php echo $les['id']?>">View</button></td>
      <?php            
      }
        elseif ($les['type']==1) {
                                 
        }
        ?>
                


    <div class="fixeds-left">
    <div id="myModal<?php echo $les['id'] ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title" style="color:blue"><?php echo $les['task']; ?></h4>
    </div>

    <?php
	$id = $_GET['id'];
	$a = "SELECT * FROM `project` WHERE id = '$id'";
	$query_run  = mysqli_query($db,$a);

	if(mysqli_num_rows($query_run) > 0)
		{
		foreach($query_run as $row){
		?>

    <div align="left">
    <h5 class="card-title" <?= $row["Projectname"]; ?>>
    Project:<?= $row['Projectname'];?></h5>
    <?php
	}
	}
	?>
    <span>
    <h5>Member:
    <?php foreach($x as $p) { 
				
						$a = "SELECT * FROM `Register` WHERE id = '$p'";
								
						$query_run  = mysqli_query($db,$a);
					
						if(mysqli_num_rows($query_run) > 0)
							{
						foreach($query_run as $res)
							
							{
						?>


    <img class="rounded-circle" src="upload/<?= $res['image'];?>" height='25px' width="25px">
                   <?php
							}
						}
					}
					?>
    </h5>

</span>

<h4>Discussion:-</h4>
<div class="container" style="display:block;border: 1px solid black;">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="d-flex flex-column comment-section">
                    <div class="bg-white p-2">
                      <?php
					$id = $_SESSION['id'];
					$i  ="SELECT * FROM Register Where id = $id";
					// print_r($i);
					// exit;
					$query_run  = mysqli_query($db,$i);
					
						if(mysqli_num_rows($query_run) > 0)
							{
						foreach($query_run as $res)
							
							{
					?>
        <div class="d-flex flex-row user-info"><img class="rounded-circle"src="upload/<?= $res['image'];?>" height='25px'width="25px">
            <div class="d-flex flex-column justify-content-start ml-2">
                <span class="d-block font-weight-bold name"><?php echo $res['name']?></span>
            </div>
        </div>
        <div class="mt-2">
                     

    <div class="bg-light p-2">
        <div class="popup-data-loadin"></div>

        <form method="post" action="">
                <?php
				$category = $_GET['id'];
			// print_r($id);
			// exit;
				$i = "SELECT * FROM `tsk` WHERE category = '$category'";
					// print_r($i);
					// exit;
				$query = mysqli_query($db,$i);

				if(mysqli_num_rows($query) > 0)
					{
						while($row = mysqli_fetch_array($query))  
				// 		print_r($row);
				// exit;
					{
				?>
                    <h3 class="card-title" style="display:none">
                        <?= $row['category'];?></h3>
                    <?php
					}

				}
			   ?>
       
        <div style="display:none">
        <img class="rounded-circle" src="upload/<?= $res['image'];?>" height='25px' width="25px">
        </div>
        
             </div>
             </td>
                 <br>
                 <input type="hidden" name="cmtid" class="cmtid" value=<?= $les['id']; ?>>            
                 <div class="d-flex flex-row align-items-start image"><img class="rounded-circle" src="upload/<?= $res['image'];?>" height='25px' width="25px">
				<textarea class="form-control ml-1 shadow-none textarea" id="msg" name="comment" required></textarea></div>
				<input type="hidden" value="0" class="cmt" name="cmt">
				<div class="mt-2 text-right"><center><button id="btn"class="btn btn-primary btn-sm shadow-none post" name="post" data-toggle="modal" formData ="<?php echo $les['id']?>" data-target="#post<?php echo $les['id']?>">Post comment</button></center></div>
                </div>
         </form>
     </div>

     <?php 
		}
}
?>

 </div>
</div>
 </div>
</div>
</div>
</div>
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
</tr>
</tbody>
</table>
</body>

</html>