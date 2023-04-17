<?php	
include 'db.php';
if(isset($_POST['formData'])){
$id=$_SESSION['id'];	
$userid   = $id;	
$comment = $_POST['comment'];
$category = $_POST['cmtid'];
$cmt = $_POST['cmt'];
$i="insert into cmt(comment,cmtid,userid,cmt)values('$comment','$category','$userid','$cmt')";
$result = mysqli_query($db, $i);
?>
<span class="d-flex flex-row align-items-start">
<?php
$i  = "SELECT * FROM Register WHERE id='$id'";
$result = mysqli_query($db, $i);
// print_r($result);
// exit;
if(mysqli_num_rows($result) > 0)
		{
	foreach($result as $res)	
	// print_r($res);
	// exit;		
	{
?>

	<img class="rounded-circle" src="upload/<?= $res['image']?>" height="25px" width="25px">
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
    ?>
	<p><?= $res['comment']?></p></span>
    <?php
}
}
?>
