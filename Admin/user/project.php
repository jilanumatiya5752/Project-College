<?php
// include 'dashboard.php';
include 'top.php';

include 'db.php';
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <link rel="stylesheet" href="style3.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>

    
</head>
<body>
    <div class="btn" style="padding-top: 132px;">
<div align="right">
    <!-- <button type="button" name="add"  id="add" class="btn btn-success"><a href="addproject.php">Add Project</a></button> -->
    </div>
    <br> 
    <div align="right">
    <!-- <button type="submit" id="stud_delete_id" name="delete" class="btn btn-danger">Delete</button>                   </div> -->
</div>
</div>
<?php

$a = $_GET['msg'];
echo $a;
?>
 <div class="row" style="padding-top: 55px;padding-left: 319px;font-size: initial;">
 <?php
   $db = mysqli_connect("localhost:3306","root","Root#123","Project Management");
   $id = $_SESSION['id'];
//    print_r($id);
//    exit;
    $query = "SELECT * FROM project where createdby like '%$id%'";
    $createdby_array='';
    // print_r($query);
    // exit;
    $query_run  = mysqli_query($db,$query);
    
    $result = mysqli_num_rows($query_run);                                         
     
        foreach($query_run as $row)
        
        {
            $createdby_array=$row['createdby'];
            // print_r($createdby_array);
            // exit;
            $x = explode(",",$row['createdby']);
            ?> 
       
   
    <!-- <div align="center"style="padding-top: 45px;border-block: initial;table-layout: fixed;padding-left: 198px;"> -->
    <div class="card-group" style= "width: 25%;">
    <div class="card">
      <div class="card-body">
      
      <h5 style="color: #0d6efd;text-decoration: underline;font-size: 20px;" class="card-title"><a href="task.php?id=<?= $row["id"]; ?>"><?= $row['Projectname'];?></a></h5>
       
        <p class="card-text"><?= $row['Projectdescription'];?></p>
        <br>
        <br>
        <br>
        
        <div class="card-footer bg-transparent border-success" value="<?php echo $p;?>">
        <?php
         foreach($x as $p) { 
        $query = "SELECT * FROM Register where id IN ($p)";
                                                    
        $result = mysqli_query($db,$query);
                                                   
        foreach($result as $res)
        {   
        ?> 
          
        <img class="rounded-circle" src="/jilanumatiya/Projecttask/Admin/upload/<?= $res['image'];?>" height='25px' width="25px">
        <?php
             }
           }
                  
        ?>
        </div>
       </div>
      </div>
     </div>
        
     <?php
        }
    
     ?>
     </div>
    <script>
    function delete_confirm(){
    if($('.checkbox:checked').length > 0){
        var result = confirm("Are you sure to delete selected users?");
        if(result){
            return true;
        }else{
            return false;
        }
    }else{
        alert('Select at least 1 record to delete.');
        return false;
    }
}
</script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
        $('#select_all').on('click',function(){

            if(this.checked){
            
                $('.checkbox').each(function(){
                    this.checked = true;
                });
            }else{
                $('.checkbox').each(function(){
                this.checked = false;
                });
            }
        });
        $('#stud_delete_id').on('click',function(){
            $('#bulk_action_form').submit();
        });
     
});
</script>
</body> 
</html>