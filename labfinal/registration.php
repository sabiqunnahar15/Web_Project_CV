<?php
session_start();
//header('location:index.php');
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'registration_login');
$name = $_POST['user'];
$pass = $_POST['pass'];
$email = $_POST['email'];
$religion = $_POST['religion'];
$gender = $_POST['gender'];
$code = $_POST['code'];
$query1 = mysqli_query($con, "select * from user");
$num = mysqli_num_rows($query1);
$num++;
if($code ==null){
	$code = "U-".$num;
}

$s = " select * from user where name='$name'";

$result = mysqli_query($con, $s); 

$num = mysqli_num_rows($result);

if($num == 1){
	echo "username already taken";
}
else{
	$reg = " insert into user (name, password, email, religion, gender, code) values('$name', '$pass', '$email', '$religion', '$gender', '$code')";

	mysqli_query($con, $reg);
	echo "Registration Successful";
	$_SESSION['msg'] = '<div class="message">Registration Successful</div>';
	header('location: index.php');
}


?>