<?php
session_start();
require_once "config.php";
$username = $_POST['username'];
$password = $_POST['password'];
$sql="SELECT * FROM member WHERE member_name ='$username' AND member_password ='$password'";
$query = mysqli_query($connect,$sql);
if(mysqli_num_rows($query)>0)
{
	$row = mysqli_fetch_assoc($query);
	$username = $row['member_name'];
	$password = $row['member_password'];
	$level = $row['member_level'];
	$member_id = $row['member_id'];
	
    $_SESSION['member_level']=$level;
	$_SESSION['member_name']=$username;
	$_SESSION['member_id']=$member_id;
	header("Location:index.php");
}
else
{
	echo "<script>alert('Username and Password Incorrect!');</script>";
	header("Location:login.php");
}
mysqli_close($connect);
?>