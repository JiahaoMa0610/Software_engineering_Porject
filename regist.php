<?php
session_start();
$con = mysqli_connect("18.218.133.244:3306","t3new","jiahao","myDB");
//header('location: database.php');
$uname = mysqli_real_escape_string($con, $_REQUEST['uname']);
$psw = mysqli_real_escape_string($con, $_REQUEST['psw']);

$query = "select * from info where uname = '$uname'";

$result = mysqli_query($con, $query);

$num = mysqli_num_rows($result);

if ($num >= 1)
{
	
	$message = "User Name already taken, Try it again!";
	echo "<script type='text/javascript'>alert('$message');</script>";
	//$_SESSION['username'] = $message;
	header('location: index.html');
	
}else{
	$reg = "INSERT INTO info (uname, psw) VALUES ('$uname', '$psw')";
	mysqli_query($con, $reg);
	$_SESSION['username'] = $uname; 
	header('location: index.php');
	echo "Regist success!";
}
//
?>