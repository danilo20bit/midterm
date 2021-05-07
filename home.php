<?php
require_once "controllerUserData.php";

?>

<html>
<head>


    <title> Home Page</title>


        <link rel="stylesheet" type="text/css" href="styles.css">


    <link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <form action="home.php" method="post">
            <div class="bg-modal">
                        <div class="modal-content">

<?php 
// Create connection
$conn = new mysqli($servername, $username, $password,$db);
$servername = "localhost";
$username = "root";
$password = "";
$db = "userstable";




//fetch

$sql = "select * from usertable";
$result = mysqli_query($conn,$sql)or die (mysql_error());
$row = mysqli_fetch_array($result);

$username;
$email;
$status;

$id = $row[3];
$username = $row[1];
$email = $row[2];
$status = $row[5];
$datetime = $row[6];



?>

<tr>
    <th colspan="5"><h3 align="center">My Account</h3></th>
    </tr>
    <t>  
     <b>User ID </b> <?php echo $id;?>  <br>
<th><b>Username:&nbsp;</b><?php echo $username;?></th><br>
<th><b>Email Address:&nbsp;</b><?php echo $email;?></th><br>
<th><b>Status:&nbsp;</b><?php echo $status;?></th><br>
<th><b>Last Activity:&nbsp;</b><?php echo $datetime;?></th>
 </t>






</tr>
</div>

 <input style="text-align: right;" type="submit" name="logout" value="logout">


</form>


</body>
</html>