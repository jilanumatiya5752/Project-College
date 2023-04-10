<?php
$id = $_GET['id'];
 $query = "SELECT * FROM project where id = $id";
     
  $result = $db->query($query);
   ?>
    <td><select id="createdby" name="createdby" value="<?php echo $createdby;?>"class="form-control form-control-lg select2">
        <?php
       foreach($result as $row)

       { 
       if($pid == $row['createdby']){
            $slected="selected";
       }else{
           $slected="";
       }
                     
       ?>
       <option value="<?php echo $row['createdby'];?>" <?php echo $slected; ?>><?php echo $row['createdby'];?></option>';
  <?php }
      ?>
                </select>