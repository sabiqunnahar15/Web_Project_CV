<?php
session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'registration_login');
$name = $_POST['user'];
$pass = $_POST['pass'];



$s = " select * from user where name='$name' && password='$pass'";

$result = mysqli_query($con, $s); 

$num = mysqli_num_rows($result);

if($num == 1){
	$_SESSION['username']=$name;
	header('location:home.php');
}
else{
	$_SESSION['msg']="Login UnSuccessful";
	header('location:index.php');
	
}


?>