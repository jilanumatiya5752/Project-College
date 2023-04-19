<?php
include 'dashboard.php';
include 'top.php';
include 'db.php';
$id = $_SESSION['id'];
session_start();
if(isset($_POST['sub'])){
    $userid=$id;
	$cname=$_POST['Clientname'];
	$pname=$_POST['Projectname'];
    $createdby=$_POST['createdby'];
    $j = implode(",",$createdby);
   $client_cat = $_POST['Clientcategory'];
  //  echo $client_cat=explode(",", $_POST['Clientcategory']);
  $xyz= implode(",",$client_cat);

  if($_FILES['image']['name']){
    move_uploaded_file($_FILES['image']['tmp_name'], "/jilanumatiya/Projecttask/Admin/upload/".$_FILES['image']['name']);
     $image=$_FILES['image']['name'];
 
    // print_r($image);
    // exit;
}

//   print_r($xyz);
//   exit;
  
  //  exit;
    
    // $client_cat = $_POST['Clientcategory'];
    $pdesc=$_POST['Projectdescription'];
	 $i="insert into project(userid,Clientname,Projectname,createdby,Clientcategory,image,Projectdescription)values('$userid','$cname','$pname','$j','$xyz','$image','$pdesc')";	
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
<form class="form-card" method="post" action="" enctype="multipart/form-data">
    <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h1>ADD PROJECT</h1>
            <br>
              
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
                            <div><h2>Client Name:</h2>
                                <input type="text" id="cname" name="Clientname" required>
                            </div>
                            <br>
                            <div><h2>Project Name:</h2>
                                <input type="text" id="pname" name="Projectname" required>
                            </div><br>
                            <div><h2>Created By</h2>
                                <select name="createdby[]" multiple size="2">
                                    <option>Saidbhai</option>
                                    <option>Razakbhai</option>
                                    <option>Adilbhai</option>
                                    <option>Farmanbhai</option>
                                    <option>Jilanbhai</option>
                                </select>
                            </div><br>
                            <div><h2>Cleint Category:</h2>
                                <input type="checkbox" name="Clientcategory[]" id="Frontend Devop" value="Frontend Devop">Frontend Devop<br>
                                
                                <input type="checkbox" name="Clientcategory[]" id="..." value="Backend Devop">Backend Devop<br>
                                <input type="checkbox" name="Clientcategory[]" id="Tester" value="Tester">Tester<br>
                                <!-- <label for="Tester"> </label><br> -->
                            
                            </div><br>
                            <div><h2>Image:</h2>
                                <input type="file" name="image">
                        </div>
                            <div><h2>Project Description:</h2>
                                <input type="text" id="pdesc" name="Projectdescription" required>
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