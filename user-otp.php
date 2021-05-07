<?php
require_once "controllerUserData.php";
 ?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User_Otp</title>
   
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="user-otp.php" method="POST" autocomplete="off">
                  
                    <h2 class="text-center">Verifying</h2>
                 
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Enter Otp code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Submit">
                    </div>
             </div>
        </div>
    </div>
    
</body>
</html>