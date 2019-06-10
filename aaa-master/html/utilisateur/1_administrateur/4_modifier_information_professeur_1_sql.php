<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "loginsysteme";

$conn = new mysqli($servername, $username, $password, $databasename);

if($conn->connect_error){
	die("connected failed: " . $conn->connect_error);
}



$conn->close();
?>
<a href="1_administrateur_page.php">return to the main</a>