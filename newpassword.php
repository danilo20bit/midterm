<?php require_once "controllerUserData.php"; ?>
<?php 
$username = $_SESSION['username'];
if($username == false){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login </title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="newpassword.php" method="POST" autocomplete="off">
                    <h2 class="text-center">New Password</h2>
                  
                        <div class="alert alert-success text-center">
                        
                        </div>
                  
                   
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>