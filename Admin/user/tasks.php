<?php
include 'dashboard.php';
include 'top.php';
include 'db.php';
session_start();
$id = $_SESSION['id'];
// print_r($id);
// exit;
if(isset($_POST['sub'])){
   
    // exit;
    $userid=$id;
	$title=$_POST['title'];
	$project=$_POST['project'];
    $createdby = $_POST['createdby'];
    $abc=implode(",",$createdby);
    $asignedto=$_POST['asignedto'];
    $xyz=implode(",",$asignedto);
    // print_r($xyz);
    // exit;
    $status=$_POST['status'];

	 $i="insert into task(userid,title,project,createdby,asignedto,status)values('$userid','$title','$project','$abc','$xyz','$status')";	
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
    <link rel="stylesheet" href="style2.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" id="form">
    <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h1>ADD TASK</h1>
            <br>
                <form class="form-card" method="post" action="project.php">
                <?php
               $id = $_SESSION['id'];
               $query = "SELECT * FROM Register where id = $id";
                $result = $db->query($query);
                ?>
                <div><h2>userid:</h2>
                                
                            
                                <td><select id="userid" name="userid" value="<?php echo $project;?>"class="form-control form-control-lg select2">
                                    <?php
                                    
                                    foreach($result as $row)
                                    // print_r($row);
                                    // exit;
                                    { 
                                    if($pname == $row['id']){
                                        $slected="selected";
                                    }else{
                                        $slected="";
                                    }
                                    
                                    ?>
                                    <option value="<?php echo $row['id'];?>" <?php echo $slected; ?>><?php echo $row['id'];?></option>';
                                <?php }
                                    ?>
                                </select>
                    <div class="row justify-content-between text-left">
                            <div><h2>Title:</h2>
                                <input type="text" id="title" name="title" required>
                            </div>
                            <br>
                            <?php
                        // $subcategory = $_GET['subcategory'];
                            $query = "SELECT * FROM project ORDER BY 'user' ASC";
                            $result = $db->query($query);
                        ?>
                        <br>
                        
                        <div><h2>Create By:</h2>
                                
                            
                           <select name="createdby[]" multiple size="2">
                               <option>Adilbhai</option>
                               <option>Farmanbhai</option>
                               <option>Saidbhai</option>
                               <option>Razakbhai</option>
                               <option>Jilanbhai</option>
                           </select>
                            </div><br>
                            
                            <?php
                        // $subcategory = $_GET['subcategory'];
                            $query = "SELECT * FROM project ORDER BY 'Projectname' ASC";
                            $result = $db->query($query);
                        ?>
                        <br>
                        
                        <div><h2>Project:</h2>
                                
                            
                            <td><select id="project" name="project" value="<?php echo $project;?>"class="form-control form-control-lg select2">
                                <?php
                                
                                foreach($result as $row)
                                // print_r($row);
                                // exit;
                                { 
                                if($pname == $row['Projectname']){
                                    $slected="selected";
                                }else{
                                    $slected="";
                                }
                                
                                ?>
                                <option value="<?php echo $row['Projectname'];?>" <?php echo $slected; ?>><?php echo $row['Projectname'];?></option>';
                            <?php }
                                ?>
                            </select>
                            </div><br>
                            <div><h2>Assigned to:</h2>
                                <input type="checkbox" name="asignedto[]" value="Frontend Devop">Frontend Devop;<br>
                                <input type="checkbox" name="asignedto[]" value="Backend Devop">Backend Devop;<br>
                                <input type="checkbox" name="asignedto[]" value="Tester">Tester;<br>
                            </div><br>
                            <div><h2>Status:</h2>
                                <select name="status">
                                    <option>Not Started</option>
                                    <option>Started</option>
                                    <option>Completed</option>
                                </select>
                            </div><br>
                           
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit" name="sub">SUBMIT</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</form>
<?php
// header("location:task.php");
?>
</body>
</html>