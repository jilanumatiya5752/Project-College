<?php
// Include database connection file
include 'db.php';
// print_r($_POST['formData']);
// exit;
// Check if form data has been submitted
if(isset($_POST['formData']))
{
	// Get user ID from session
	$id = $_SESSION['id'];
	// print_r($id);
	// exit;
	$userid = $id;
   // Get form data
	$comment = $_POST['comment'];
	$category = $_POST['cmtid'];
	$cmt = $_POST['cmt'];
	// $status = $_POST['status'];
   // Insert comment into database
	$query = "INSERT INTO cmt(comment, cmtid, userid, cmt) VALUES ('$comment', '$category', '$userid', '$cmt')";
	$result = mysqli_query($db, $query);
// echo $result;
?>
<span class="d-flex flex-row align-items-start">
<?php
$i  = "SELECT * FROM Register WHERE id='$id'";
$result = mysqli_query($db, $i);
if(mysqli_num_rows($result) > 0)
		{
	foreach($result as $res)	
	// print_r($res);
	// exit;		
	{
?>

	<img class="rounded-circle" src="/jilanumatiya/Projecttask/Admin/upload/<?= $res['image']?>" height="25px" width="25px">
	<?php
}
	
}
?>
<?php
$i  = "SELECT * FROM cmt WHERE userid='$id'";
$result = mysqli_query($db, $i);
if(mysqli_num_rows($result) > 0)
		{
	foreach($result as $res)	
    $comment = $res['comment'];
    ?>
	<p><?php echo $comment?></p></span>
    <?php
}
}
?>
