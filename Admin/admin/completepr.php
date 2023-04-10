<?php
include 'dashboard.php';
include 'top.php';
// include 'bottom.php';
include 'db.php';

$id = $_GET['id'];
if(isset($_GET['checkbox'])){

      $url = "SELECT * FROM cproject WHERE id = '$id'";
      
      $image = mysqli_query($db, $url);

      $ids=implode(',',$_GET['checkbox']);

      $query = "DELETE FROM cproject WHERE id IN($ids)";
     
      $query_run = mysqli_query($db, $query);
    
      if($query_run != 0)
      {
          $_SESSION['status'] = "Multiple Data Deleted Successfully";
      }
      else
      {
          $_SESSION['status'] = "Multiple Data Not Deleted";
      }
  }
     
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style3.css">
    <title>Document</title>
    <style>
table, th, td {
  border: 1px solid black;
}
</style>
    
</head>
<body>
    <div class="btn" style="padding-top: 132px;">
<div align="right">
    <button type="button" name="add"  id="add" class="btn btn-success"><a href="addcpr.php">Add Project</a></button>
    </div>
    <br> 
    <div align="right">
    <button type="submit" id="stud_delete_id" name="delete" class="btn btn-danger">Delete</button>                   </div>
</div>
</div>
<?php

$a = $_GET['msg'];
echo $a;
?>
    <div align="center"style="padding-top: 45px;border-block: initial;table-layout: fixed;padding-left: 198px;">
<div class="card mt-4">
                    <div class="card-body">
                    <form name="bulk_action_form" action=""  id="bulk_action_form" method="get" onSubmit="return delete_confirm()";>
                            <table  class="table table-bordered table-striped" width="1000px" >
                                <tbody>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="select_all"   value="<?= $row['id'];?>">
                                        </th>
                                        <th>Id</th>
				                        <th>Projectname</th>
				                        <th>Completed</th>
                                        <th>Created By</th>
                                    
                                        <th>Edit</th>
                                        <th>Delete</th>
				                        
                                    </tr>
                                </tbody>
                                <tbody>
                                </div>
                                <?php
                                        $db = mysqli_connect("localhost:3306","root","Root#123","Project Management");

                                        $id = $_SESSION['id'];
                                        $query = "SELECT * FROM cproject where userid = $id";
                                        $query_run  = mysqli_query($db,$query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                    <tr>
                                                        <td style="width:10px; text-align: center;">
                                                            <input type="checkbox" class="checkbox"  name="checkbox[]" value="<?= $row['id']; ?>">
                                                        </td>
                                                        <td><?= $row['id']; ?></td>
                                                        
                                                        <td><?= $row['projectname'];?></td>
                                                        <td><?= $row['completed'];?></td>
                                                        <td><?= $row['createdby'];?></td>
                                                      
                                                       
                                                    <td> <a href="editcrp.php?id=<?= $row["id"]; ?>">Edit</a> </td> 
                                                    <td><a href="deletectp.php?id=<?= $row["id"]; ?>">delete</a></td>
                                                    </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                             <tr>
                                                    <td colspan="7">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
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