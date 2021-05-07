<?php 
session_start();
$con = mysqli_connect('localhost','root','','userstable');
$email = "";
$username = "";
$errors = array();

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
    ?>