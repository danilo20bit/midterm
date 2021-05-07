<?php
	
	$con = mysqli_connect('localhost','root','','userstable');
	
	$name = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$sql = " SELECT * FROM usertable WHERE username = '$name' AND password = '$password'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);


if($row['username'] == $name && $row['password'] == $password) {
// header('location:home.php');




// if ($row['username'] == $name && $row['password'] == $password) {

	header('location:user-otp.php');




	// $vkey = md5(time().$name);


	// $insert = $mysqli->query("INSERT INTO usertable (user,password,email,code,status) VALUES ('$name' , '$password' , '$email' , '$code', '$status')");

}

 else {
	echo "<script> alert('Please Enter Your Correct UserName and Password') </script>";
	echo "<script> location.replace('login.php')</script>";

}

?>
