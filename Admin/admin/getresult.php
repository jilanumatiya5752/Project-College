<?php
include("db.php");
// $search = strtolower($_GET["q"]);
// if (!$search) return;
// $sql = "select DISTINCT Projectname as Projectname from project where Projectname LIKE '%$search%' limit 5";
// print_r($sql);
// exit;
// $query = mysql_query($db,$sql);
// while($row = mysql_fetch_array($query)) {
// 	$name = $row['Projectname'];
// 	echo "$name\n";
// }

if(isset($_GET['post'])){

echo $comment = $_GET['comment'];
//  echo"$comment";
 exit;
$i="insert into tsk(comment)values('$comment')";
print_r($i);
exit;	

}
?>
