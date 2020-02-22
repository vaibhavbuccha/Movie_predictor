<?php

require_once "admin/connection.php";

// echo "<pre>";
// export($_POST);

// echo $fname;

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$cnfpassword = $_POST['cnfpassword'];

$check = "SELECT * FROM tbl_user where email='$email' ";
$run = mysqli_query($con , $check);
// print_r($run);
if($run->num_rows > 0)
{
	echo "user already exist";
}
else
{
	$password = md5($password);
	$insert = "INSERT INTO tbl_user (fname, lname, email, password) VALUES ('$fname','$lname','$email','$password')";
	$run = mysqli_query($con , $insert);
	// session_start();
	// $_SESSION["name"] = ucfirst($fname).' '$lname;
	// $_SESSION["email"] = $email;
	// $_SESSION["favcolor"] = "green";
	// $_SESSION["favcolor"] = "green";
	// header("location : index.php");
}

