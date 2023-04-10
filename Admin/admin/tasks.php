<?php
$p_id = $_REQUEST['id'];
// print_r($p_id);
// exit;
	require_once 'db.php';
	if(ISSET($_POST['add'])){
        // print_r($_POST['add']);
        // exit;
		if($_POST['task'] != ""){
			$task = $_POST['task'];
            $pid = $_POST['pid'];
            //   print_r($task);

            //   exit;
           $i =  "INSERT INTO `tasks`(`pid`,`task`) VALUES ('$pid','$task')";
        //    print_r($i);
        //    exit;
			$query = mysqli_query($db,$i);
        //     print_r($query);
        //    exit;
			header('location:task.php?id=$p_id');
		}
	}
?>



