<?php
/*
// Nom de la base de données
$dbName="loginsysteme";

// DSN
$dbServername ="mysql:host=localhost;dbname=".$dbName;

// Database user
$dbUsername ="root";
// Database password 
$dbPassword ="";


try
{
    // Params @dsn , @username, @password
    $conn =new PDO($dbServername,$dbUsername,$dbPassword);
    // echo "Base de données connectée avec succès !";
}
catch(Exception $b)
{
    die('Erreur: '.$b->getMessage());
}*/
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "loginsysteme";

$conn = new mysqli($servername, $username, $password, $databasename);

if($conn->connect_error){
	die("connected failed: " . $conn->connect_error);
}

?>