<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "gestionsalles";

$conn = new mysqli($servername, $username, $password, $databasename);

if($conn->connect_error){
	die("connected failed: " . $conn->connect_error);
}

?>