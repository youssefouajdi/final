<?php

if (isset($_POST['submit'])){

	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn , $_POST['first']);
	$last = mysqli_real_escape_string($conn , $_POST['last']);
	$email = mysqli_real_escape_string($conn , $_POST['email']);
	$uid = mysqli_real_escape_string($conn , $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn , $_POST['pwd']);

	if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)){
		header("Location: ../hedear.php");
		exit();
	}else{
		if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) ) {
			header("Location: ../hedear.php?nom=vide&ampprenom=vide ");
			exit();
		}else{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: ../hedear.php?email=erreur");
				exit();
			}else{
				$sql="SELECT * FROM utilisateur where utilisateur_id='$uid'";
				$result=mysqli_query($conn , $sql);
				$resultcheck=mysqli_num_rows($result);

				if($resultcheck > 0){
					header("Location: ../hedear.php?uid=error");
					exit();
				}else{
					$hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);
					$sql ="INSERT INTO utilisateur(utilisateur_nom, utilisateur_prenom,utilisateur_email,utilisateur_uid,utilisateur_mdp) VALUES ('$first','$last','$email','$uid','$hashedPWD')";
					if($conn->query($sql) === TRUE){
						echo "informations inserer avec succes";
						header("Location: ../hedear.php");
					}else{
						echo "Error: " . $sql . "<br/>" . $conn->error;
					}
					
					exit();
				}
			}	
		}
	}	
}
?>