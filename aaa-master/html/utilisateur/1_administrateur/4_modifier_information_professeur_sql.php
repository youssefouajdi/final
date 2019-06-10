<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "loginsysteme";

$conn = new mysqli($servername, $username, $password, $databasename);

if($conn->connect_error){
	die("connected failed: " . $conn->connect_error);
}

$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
$departement = mysqli_real_escape_string($conn, $_POST['departement']);
$telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$sql= "UPDATE professeur
	   SET nom = '$nom', prenom = '$prenom', departement = '$departement', telephone = '$telephone', email = '$email', consommation = '$carConsommation', etat = '$carState';";

if($conn->query($sql) === TRUE){
	echo "informations updated successfully.";
}else{
	echo "Error: " . $sql . "<br/>" . $conn->error;
}

$conn->close();
?>
