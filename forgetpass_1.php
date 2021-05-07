
<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgetten Password </title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="forgetpass_1.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login</h2>
                    
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="Enter username" required value="">
                    </div>
                    	<button type="submit" class="btn btn-primary" name="next"  >Proceed</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>




























</body>
</html>