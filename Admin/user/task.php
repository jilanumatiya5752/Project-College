<?php
include 'db.php';
include 'top.php';	
?>
<?php	
if(isset($_POST['post'])){
	
$id=$_SESSION['id'];
$userid =  $id;
		
$comment = $_POST['comment'];
$category = $_POST['cmtid'];
$cmt = $_POST['cmt'];
// if(user = 0){
$i="insert into cmt(comment,cmtid,userid,cmt)values('$comment','$category','$userid','$cmt')";
// print_r($i);
// exit;	
$result = mysqli_query($db,$i);
// }
}
// header('Location: task.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="jilan.js"></script>
	<title>Document</title>
	<style>
table, th, td {
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
<form action="" method="post" id="form">
	 <?php
	 $id = $_GET['id'];
	 $query = "SELECT * FROM project where id = $id";

	 $result = mysqli_query($db,$query);
  
	
	 foreach($result as $row)
		// print_r($row);
		// exit;
	 { 
		 ?>
		 <div style="padding-top: 100px;font-size: 20px;font-weight: lighter;color: black;" align="center">
	  <h2 style="color: darkred;font-size:3rem;" class=""><?php echo $row['Projectname'] ?></h2>
	  </div>
 <?php } ?>
 <br>
 <br>
 <br>
 <br>
 <div align="center">
<div style="background-color:#eae5f0; height : 20%; width:50%;">
 <table align="left" border="1" width="100%" style="font-size: large; color: black;">
	 <tbody >
	        <tr>
			<th><b>id</b></th>
			<th><b>Task</b></th>
			<th><b>Completed</b></th>
			<th><b>View</b></th>
			</tr>
			</tbody>
			<?php

?>
			<?php
			$id = $_GET['id'];
			$i  = "SELECT createdby FROM tsk WHERE category = '$id'";
			// print_r($i);
			// exit;
			$query = mysqli_query($db,$i);
			
			foreach($query as $les)   
				// print_r($les);
				// exit;
			{
				$x = explode(",",$les['createdby']);
					// print_r($x);
					// exit;
				?>
			<?php
			}
			
		?>
				 <?php foreach($x as $p) { 
					 $a = "SELECT * FROM tsk where createdby IN ($p) AND type=0";
					//  print_r($a);
					//  exit;
					 $query = mysqli_query($db,$a);
					
						 foreach($query as $row)   
						
					 {
						// print_r($row);
						// exit;
			?>
			<tr>
				<td><?php echo $row['id']?></td>
				<td name="task"  value="<?php echo $row['id'] ?>"><?php echo $row['task']?></td>
				<td><button id="btn" class="Completed" name="cmt"><a href="bottom.php?id=<?= $row["id"]; ?>">Completed</a></button></td>
                <td><button style="font-size: 1.5rem;" type="button" id="popupbtn" class="btn btn-danger popup-buton" data-toggle="modal" data-id ="<?php echo $row['id']?>" data-target="#myModal<?php echo $row['id']?>">View</button></td>
			</tr>

			<div class="fixeds-left" >
            <div id="myModal<?php echo $row['id'] ?>" class="modal fade" role="dialog">
			<div class="modal-dialog" >
			    <div class="modal-content">
					<div class="modal-header">
					<h4 class="modal-title"style="color:blue"><?php echo $row['task']; ?></h4>
						 <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
						    
				    </div>
				  
					<?php
					$id = $_GET['id'];
					$a = "SELECT * FROM `project` WHERE id = '$id'";
					$query_run  = mysqli_query($db,$a);

						if(mysqli_num_rows($query_run) > 0)
						{
							foreach($query_run as $row)

							{
						
                            ?>
						
					<div align="left">
					<h5 style="font-size: 2.25rem;" class="card-title"<?= $row["Projectname"]; ?>>Project:<?= $row['Projectname'];?></h5>
					<?php
							}
						}
						?>
						<span>
						<h5 style="font-size: 2.25rem;">Member: 
						<?php foreach($x as $p) { 
				
						$a = "SELECT * FROM `Register` WHERE id = '$p'";
								
						$query_run  = mysqli_query($db,$a);
					
						if(mysqli_num_rows($query_run) > 0)
							{
						foreach($query_run as $res)
						// print_r($res);
						// exit;
							
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
						
					<h4 style="font-size: 2.25rem;">Discussion:-</h4>
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
                    <div class="d-flex flex-row user-info"><img class="rounded-circle" src="upload/<?= $res['image'];?>" height='25px' width="25px">
                        <div class="d-flex flex-column justify-content-start ml-2"><span style="font-size: 17px;"class="d-block font-weight-bold name"><?php echo $res['name']?></span></div>
                    </div>

				<div class="bg-light p-2">
					<div class="popup-data-loadin" style="font-size: larger; font-style:bolde;"></div>

               <form method="post" action="">
			   <?php
				$category = $_GET['id'];
		
				$i = "SELECT * FROM `tsk` WHERE category = '$category'";
				
				$query = mysqli_query($db,$i);
				
				if(mysqli_num_rows($query) > 0)
					{
						while($row = mysqli_fetch_array($query))  
						// print_r($row);
						// exit;
					{
				?>
               <h3 class="card-title" style="display:none"><?= $row['category'];?></h3>
			   <?php
					}

				}
			   ?></div>
			   </td>
				   <br>
				   <input type="hidden" name="cmtid" class="popup" value=<?php echo $category; ?>>
				
				<div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="upload/<?= $res['image'];?>" height='25px' width="25px"><textarea class="form-control ml-1 shadow-none textarea" name="comment" required></textarea></div>
				<input type="hidden" value="1" name="cmt">
				<div class="mt-2 text-right"><center><button style="font-size: 1.875rem;"id="cmt"class="btn btn-primary btn-sm shadow-none popup" type="submit" name="post">Post comment</button></center></div>
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
		
	 </table>
	</div>
	</div>
	</form>
	</body>
</html>
<script>
$(document).ready(function(){
  $("#popupbtn").click(function(){
	//   alert("kjfsydgbsfhgdfdf");    
    $("#myModal").toggle();
  });
  });

</scrip>
