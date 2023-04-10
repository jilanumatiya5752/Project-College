<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
	margin: 0px;
	padding: 0px;
}
body {
	font-size: 120%;
	background: #F8F8FF;
}

.header {
	width: 30%;
	margin: 50px auto 0px;
	color: white;
	background: #5F9EA0;
	text-align: center;
	border: 1px solid #B0C4DE;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
}
form, .content {
	width: 30%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background: white;
	border-radius: 0px 0px 10px 20px;
}
.input-group {
	margin: 10px 10px 10px 10px;
}

.input-group label {
	display: block;
	text-align: left;
	margin: 5px;
	font-size: 20px;
}
.input-group input {
	height: 32px;
	width: 95%;
	padding: 5px 10px;
	font-size: 15px;
	border-radius: 10px;
	border: 1px solid gray;
}
.btn {
	cursor: pointer;
	padding: 12px;
	font-size: 16px;
	color: white;
	background: #23585a;
	border: none;
	border-radius: 10px;
}
.button{
    cursor: pointer;
	padding: 12px;
	font-size: 16px;
	color: white;
	background: #23585a;
	border: none;
	border-radius: 10px;
}
.error {
	width: 92%;
	margin: 0px auto;
	padding: 10px;
	border: 1px solid #a94442;
	color: #a94442;
	background: #f2dede;
	border-radius: 5px;
	text-align: left;
}
.success {
	color: #3c763d;
	background: #dff0d8;
	border: 1px solid #3c763d;
	margin-bottom: 20px;
}


</style>
</head>


<?php
session_start();

    if(isset($_POST['submit'])) {

// print_r($_POST);
// exit;
		$db=mysqli_connect('localhost:3306','root','Root#123','Project Management');

		
        $email = strip_tags($_POST['email']);
		
        $password = strip_tags($_POST['password']);
		
        $email = stripcslashes($email);
		
        $password = stripcslashes($password);
		$password = md5($password);

        $sql = "SELECT * FROM Register WHERE email = '$email' and password = '$password'  LIMIT 1";		
        $query = mysqli_query($db, $sql);
		
        $row = mysqli_fetch_array($query);
		
        $id = $row['id'];
		
        $db_password = $row['password'];
		// print_r($db_password);
        // exit;
        if($password == $db_password){
			
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $id;
			if ($count=1){
		

				if ($row['usertype']==0){
					header("location:admin/project.php");
				}
					elseif ($row['usertype']==1) {
					header("location:user/project.php");
					// echo ("you logged in as cashier");
			}
		
			}

        } else {
            echo "Error: the information is not correct.";
        }


    }
?>

	<body>
		<form method="POST" enctype="multipart/form-data" id="home_id">

		<center><h2> Login Form</h2>
		<br>
		<br>	
		<table>
				<tr>
					<td>
						Email:
						<input type="text" name="email" placeholder="Enter Your Email" required>
					</td>
				</tr>
				<tr>
					<td>
				password:
						 <input type="password" name="password" placeholder="Enter Your password" required>
					</td>
				</tr>
				<tr>
					<td>
						<center><input type="submit" name="submit" value="submit">
					</center>
					</td>
				</tr>
				</center>
			</table>
	
		</form>
		</body>

    

</html>




