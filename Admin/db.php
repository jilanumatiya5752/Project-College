<?php
session_start();

$target_dir = "upload/";
$servername="localhost:3306";
$username="root";
$password="Root#123";
$dbname="Project Management";

$db=mysqli_connect($servername,$username,$password,$dbname);

?>

<?php


// Registration code
if (isset($_POST['reg_user'])) {

	
	// $username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$rpassword = mysqli_real_escape_string($db, $_POST['rpassword']);

	// Ensuring that the user has not left any input field blank
	// error messages will be displayed for every blank input
	// if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password)) { array_push($errors, "Password is required"); }

	if ($password != $rpassword) {
		array_push($errors, "The two passwords do not match");
		// Checking if the passwords match
	}

	// If the form is error free, then register the user
	if (count($errors) == 0) {
		
		// Password encryption to increase data security
		$password = md5($password);
		
		// Inserting data into table
		$query = "INSERT INTO Register (email, password)
				VALUES('$email', '$password')";
		
		mysqli_query($db, $query);

		// Storing username of the logged in user,
		// in the session variable
		$_SESSION['email'] = $email;
		
		// Welcome message
		$_SESSION['success'] = "You have logged in";
		
		// Page on which the user will be
		// redirected after logging in
		header('location: profile.php');
	}
}

// User login
if (isset($_POST['login_user'])) {
	
	// Data sanitization to prevent SQL injection
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	// Error message if the input field is left blank
	if (empty($email)) {
		array_push($errors, "email is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// Checking for the errors
	if (count($errors) == 0) {
		
		// Password matching
		$password = md5($password);
		
		$query = "SELECT * FROM Register WHERE email=
				'$email' AND password='$password'";
		$results = mysqli_query($db, $query);

		// $results = 1 means that one user with the
		// entered username exists
		if (mysqli_num_rows($results) == 1) {
			
			// Storing username in session variable
			$_SESSION['email'] = $email;
			
			// Welcome message
			$_SESSION['success'] = "You have logged in!";
			
			// Page on which the user is sent
			// to after logging in
			// header('location: index.php');
		}
		else {
			
			// If the username and password doesn't match
			array_push($errors, "Username or password incorrect");
		}
	}
}

?>
