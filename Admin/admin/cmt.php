<?php
include 'db.php';
$categoryid=$_GET['id'];
// print_r($id);
// exit;
if(isset($_POST['post'])){
    // $id=$_SESSION['id'];
    $userid=$id;
    // print_r($userid);
    // exit;
		// print($_GET['post']);
		// exit;			
$comment = $_POST['comment'];
$category = $_POST['cmtid'];

$i="insert into cmt(comment,cmtid,userid)values('$comment','$category','$userid')";

$result = mysqli_query($db,$i);
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
    <title>Document</title>
</head>
<body>

					<h4>Discussion:-</h4>
					<div class="container" style="display:block;border: 1px solid black;">
                   <div class="d-flex justify-content-center row">
                   <div class="col-md-8">
                   <div class="d-flex flex-column comment-section">
                   <div class="bg-white p-2">
					<?php
					$id = $_SESSION['id'];
					$i  ="SELECT * FROM Register Where id = $id";
					$query_run  = mysqli_query($db,$i);
					
						if(mysqli_num_rows($query_run) > 0)
							{
						foreach($query_run as $res)
							
							{
					?>
                    <div class="d-flex flex-row user-info"><img class="rounded-circle" src="upload/<?= $res['image'];?>" height='25px' width="25px">
                        <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"><?php echo $res['name']?></span></div>
                    </div>
                    <div class="mt-2">
					<?php
				$id = $_GET['id'];
			    // print_r($id);
			    // exit;
				$i = "SELECT * FROM `cmt` WHERE cmtid = '$id'";
					// print_r($i);
					// exit;
				$query = mysqli_query($db,$i);

				if(mysqli_num_rows($query) > 0)
					{
						foreach($query as $row)   
				// 		print_r($row);
				// exit;
					{
				?>
                        <p id="comment" class="comment-text"><?php echo $row['comment'] ?></p>
						<?php
					}
					}
					?>
                    </div>
                </div>
				
 
				<div class="bg-light p-2">
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
						foreach($query as $row)   
				// 		print_r($row);
				// exit;
					{
				?>
               <h3 class="card-title" name="cmtid" style=" display:none" <?= $row["category"]; ?>><?= $row['category'];?></h3>
			   <?php
					}

				}
			   ?></div>
			   </td>
				   <br>
				   <input type="hidden" name="cmtid"style=" display:none" value=<?php echo $category; ?>>
				<div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="upload/<?= $res['image'];?>" height='25px' width="25px"><textarea class="form-control ml-1 shadow-none textarea" name="comment"></textarea></div>
                    <div class="mt-2 text-right"><center><button id="cmt"class="btn btn-primary btn-sm shadow-none" type="submit" name="post">Post comment</button></center></div>
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

</body>
</html>


<script>
$(document).ready(function(){
  $("#popupbtn").click(function(){
	//   alert("kjfsydgbsfhgdfdf");    
    $("#myModal").toggle();
  });
});
</script>