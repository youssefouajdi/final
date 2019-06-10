<?php
include_once"connecter_bd.php";
session_start();

$password = mysqli_real_escape_string($conn, $_POST['nvmotdepasse']);
$confirmation = mysqli_real_escape_string($conn, $_POST['confirmation']);
if($password === $confirmation){
    $sql = "SELECT * FROM utilisateur WHERE id = '$_SESSION[id]'";
    $result=mysqli_query($conn , $sql);
    $resultcheck=mysqli_num_rows($result);
    if($resultcheck > 0){
        $passwordcryptee = password_hash($password, PASSWORD_DEFAULT);
	    $sql ="UPDATE utilisateur SET motdepasse='$passwordcryptee'
	    WHERE id= '$_SESSION[id]'";
	    if($conn->query($sql) === TRUE){
		    header('location: ../../1_login_form.php');
		exit();
	    }else{
		    echo "Error: " . $sql . "<br/>" . $conn->error;
	    }		
    exit();
    }
}else{
    ?>
   <a href="3_modifier_mot_de_passe.php">try again</a>
   <?php
}

?>