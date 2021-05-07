
<?php

session_start();
$errors = array();
	$con = mysqli_connect('localhost','root','','userstable');
	

if(isset($_POST['signup'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
    $cpassword = $_POST['cpassword'];
    if($password !== $cpassword){
         echo "<script> alert('Your Password not Match') </script>";
        echo "<script> location.replace('login.php')</script>";
    } 
    
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
    echo "<script> alert('mail that you have entered is already exist!') </script>"; 
     echo "<script> location.replace('signup-user.php')</script>";
    }
    else 

	if (count($errors) == 0) {
        $code = rand(999999, 111111);
        $status = "notverified";

		$reg = "INSERT INTO usertable (username , password , email,  status) VALUES ('$username' , '$password' , '$email' , '$status')";

			mysqli_query($con, $reg);
		
			echo "<script> alert('Registration Succesful') </script>";
	echo "<script> location.replace('login-user.php')</script>";

		
	}
			


}
?>


