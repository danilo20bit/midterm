<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "userstable";


// Create connection
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