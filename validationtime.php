<?php 

$con = mysqli_connect('localhost','root','','userstable');
	$vkey = mysqli_real_escape_string($con,$_POST['vkey']);
	$name = mysqli_real_escape_string($con,$_POST['user']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$sql = " SELECT * FROM usertable WHERE username = '$name' AND password = '$password'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

if (isset($_POST['vkey'])) { 
echo "";
	
}
?>