<?php
include 'db.php';
include 'top.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div align="center">
        <div style="background-color:#eae5f0; height : 20%; width:50%;">
            <table align="left" border="1" width="100%" style="font-size: large; color: black; margin-top: 120px;">
                <thead>
                    <tr>
                        <th><b>id</b></th>
                        <th><b>Task</b></th>
                        <th><b>Project</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT tsk.id, tsk.task, project.projectname FROM tsk JOIN project ON tsk.category = project.id WHERE tsk.type = 1";
                    $result = mysqli_query($db, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        // print_r($row);
                        // exit;
                    ?>
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['task']?></td>
                        <td><?php echo $row['projectname']?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
