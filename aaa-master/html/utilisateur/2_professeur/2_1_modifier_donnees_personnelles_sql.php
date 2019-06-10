<?php
include_once"connecter_bd.php";
session_start();

$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
$login = mysqli_real_escape_string($conn, $_POST['login']);
$departement = mysqli_real_escape_string($conn, $_POST['departement']);
$telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$sql = "SELECT * FROM utilisateur WHERE id = '$_SESSION[id]'";
$result=mysqli_query($conn , $sql);
$resultcheck=mysqli_num_rows($result);
if($resultcheck > 0){
	$sql ="UPDATE utilisateur SET nom='$nom', prenom='$prenom', login='$login',
	departement='$departement', telephone='$telephone', email='$email'
	WHERE id= '$_SESSION[id]'";
	if($conn->query($sql) === TRUE){
		header('location: ../../1_login_form.php');
		exit();
	}else{
		echo "Error: " . $sql . "<br/>" . $conn->error;
	}		
exit();
}
?>