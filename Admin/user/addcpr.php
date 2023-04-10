<?php
include 'dashboard.php';
include 'top.php';
include 'db.php';
$id = $_SESSION['id'];
session_start();
if(isset($_POST['sub'])){
    $userid=$id;
    $pname=$_POST['projectname'];
	$completed=$_POST['completed'];
    $userid=$_POST['userid'];
    $createdby = $_POST['createdby'];
 
	 $i="insert into cproject(userid,projectname,completed,createdby)values('$userid','$pname','$completed','$createdby')";	

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
            <h1>ADD COMPLETED PROJECT</h1>
            <br>
                <form class="form-card" method="post" action="completepr.php">

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
                <?php
                        // $subcategory = $_GET['subcategory'];
                            $query = "SELECT * FROM project ORDER BY 'Projectname' ASC";
                            $result = $db->query($query);
                        ?>
                        <br>
                        
                        <div><h2>Project:</h2>
                                
                            
                            <td><select id="project" name="projectname" value="<?php echo $project;?>"class="form-control form-control-lg select2">
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
                            <div><h2>Completed:</h2>
                                <select name="completed">
                                    <option>YES</option>
                                    <option>No</option>
                                    
                                </select>
                            </div><br>
                            <br>
                            <?php
         
                        $query = "SELECT * FROM project ORDER BY 'user' ASC";
                        $result = $db->query($query);
                    ?>
                    <br>
                        
                
                                            
                                        
                    <div><h2>Create By:</h2>
                                
                            
                                <select name="createdby">
                                    <option>Adilbhai</option>
                                    <option>Farmanbhai</option>
                                    <option>Saidbhai</option>
                                    <option>Razakbhai</option>
                                    <option>Jilanbhai</option>
                                </select>
                                 </div><br>
                                 
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
</body>
</html>