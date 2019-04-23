<?php
session_start();
$username = $_POST['uname'];
$password = $_POST['psw'];
$con=mysqli_connect("18.218.133.244:3306","t3new","jiahao","myDB");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//$uname = mysqli_real_escape_string($con, $_REQUEST['uname']);
//$psw = mysqli_real_escape_string($con, $_REQUEST['psw']);
$sql = "select * from info where uname = '$username'";
$result = mysqli_query($con, $sql);
$rows = mysqli_fetch_array($result);
if ($rows) {
	if($rows['psw'] == $password)
	{
		$_SESSION['username'] = $username; 
		header('location: index.php');
	}
	else
	{
		echo "Invalid username or password";
		echo "<br><br><td><a href='index.html'>Click Here to Log in again!</a></td>";
	}
} else {
    echo "User does not exit";
	echo "<br><br><td><a href='index.html'>Click Here to Sign up!</a></td>";
}

//mysqli_close($conn);
mysqli_close($con);


?>