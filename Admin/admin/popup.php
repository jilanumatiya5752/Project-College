
<?php
include 'db.php';
session_start();
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
	
	<title>Document</title>
</head>
<body>
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
			// print_r($res);
?>
<?php
$id = $_GET['action'];

$i = "SELECT * FROM cmt where cmtid = $id";
	// print_r($i);
	// exit;
$query = mysqli_query($db,$i);

foreach($query as $row) {
	// print_r($row);
	$userid = $row['userid'];
	// print_r($userid);
	// exit;
	$output="";
	$output='<p>'.$row['comment'].'</p>';	
	// print_r($output);
	// exit;
	if ($row['cmt']==0){
		?>
		<?php
         $query = "SELECT * FROM Register where id IN ($userid)";
			// print_r($query);
			// exit;
		 $query_run  = mysqli_query($db,$query);
            $result = mysqli_num_rows($query_run);                                         
            foreach($query_run as $row)
			// print_r($row);
			// exit;
            {

		?>
			<span class="d-flex flex-row align-items-start">
				<img class="rounded-circle" src="upload/<?= $res['image'];?>" height='25px' width="25px">
			<?= $output?>
		</span>
			<?php
			}
		}
		
	
	elseif ($row['cmt']==1) {
			$query = "SELECT * FROM Register where id IN ($userid)";
			// print_r($query);
			// exit;
			$query_run  = mysqli_query($db,$query);
            $result = mysqli_num_rows($query_run);                                         
            foreach($query_run as $row)
            {
				// print_r($row);
				// exit;
	?>
	<span class="d-flex flex-row align-items-start">
            <img class="rounded-circle" src="upload/<?= $row['image']; ?>" height="25px" width="25px">
            <?= $output ?>
        </span>
<?php
}
}	
}
}
}
?>
</body>
</html>
