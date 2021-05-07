<?php 
session_start();
$con = mysqli_connect('localhost','root','','userstable');
$email = "";
$username = "";
$errors = array();


if(isset($_POST['login'])){

    $lastactivity = mysqli_real_escape_string($con, $_POST['lastactivity']);
   $datetime = mysqli_real_escape_string($con, $_POST['datetime']);

 

  	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$sql = " SELECT * FROM usertable WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $time_check = "UPDATE usertable SET datetime = CURRENT_TIMESTAMP() WHERE username = '$username'";
    $result_time = mysqli_query($con, $time_check);

    $code = rand(999999, 111111);
			$status = 'verified';
            $update_pass = "UPDATE usertable  SET code = $code WHERE username = '$username'";
            $run_query = mysqli_query($con, $update_pass);



if($row['username'] == $username && $row['password'] == $password) {
    

	header('location:user-otp.php');
    $sql = "update id set lastactivity = now() where id =".$_SESSION['id'];
    $rs = mysqli_query($conn,$sql);


}

 else {
	echo "<script> alert('Please Enter Your Correct UserName and Password') </script>";
	echo "<script> location.replace('login-user.php')</script>";
}
}


if(isset($_POST['next'])){
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $check_email = "SELECT * FROM usertable WHERE username='$username'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE username = '$username'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
               
                    $_SESSION['info'] = $info;
                    $_SESSION['username'] = $username;
                    header('location: forgetpass_2.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Your email is not register";
            }
        }else{
            $errors['username'] = "Type Your Username";
        }

  

    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code ";
        $code_res =     mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $username = $fetch_data['username'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
    
           


     if($update_res){
                   $username= $_SESSION['username'];
                   header('location: home.php?username==$username');
                   echo "<script> alert('awit')";

                exit();
            }else{
                $errors = "<script> alert('Please Enter Your Correct UserName and Password') </script>";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }    
    

    if(isset($_POST['check-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $username = $fetch_data['username'];
            $_SESSION['username'] = $username;
            $info = "Don't use the old password.";
            $_SESSION['info'] = $info;
            header('location: newpassword.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

 if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $username = $_SESSION['username']; //getting this username using session
            $update_pass = "UPDATE usertable SET code = $code, password = '$password' WHERE username = '$username'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                echo "<script> alert('Do you Agree') </script>";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');

            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }

 if(isset($_POST['login-now'])){
     
        header('Location: login-user.php');
    }
if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code ";
        $code_res =     mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $username = $fetch_data['username'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
    
            if($update_res){
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                   header('location: home.php?');
                   echo "<script> alert('awit')</script>";

                exit();
            }else{
                $errors = "<script> alert('Please Enter Your Correct UserName and Password') </script>";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }
  if(isset($_POST['logout'])){

        header('location: login-user.php');
    
    }
    
    if(isset($_POST['signup'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $cpassword = $_POST['cpassword'];
    if($password !== $cpassword){
         echo "<script> alert('Your Password not Match') </script>";
        echo "<script> location.replace('signup-user.php')</script>";
    } 
    
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
    echo "<script> alert('mail that you have entered is already exist!') </script>"; 
    echo "<script> location.replace('login-user.php')</script>";
    }
    else 

    if (count($errors) == 0) {
        $code = rand(999999, 111111);
        $status = "notverified";

        $reg = "INSERT INTO usertable (username , password , email,  status) VALUES ('$username' , '$password' , '$email' , '$status')";

            mysqli_query($con, $reg);
        
            echo "<script> alert('Registration Succesful') </script>";
            echo "<script> location.replace('login-user.php')</script>";
            header('location: login-user.php');

        
    }
            


}

$servername = "localhost";
$username = "root";
$password = "";
$db = "userstable";
$conn = new mysqli($servername, $username, $password,$db) or die ("Connection failed: %s\n". $conn -> error);
 return $conn;

if($db){
    echo "db is connected";
}else{
    echo "not conected";
}
  if(isset($_POST['logout'])){

        header('location: login-user.php');
    
    }


?>




?>