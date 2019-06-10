<?php

session_start();

if(isset($_POST['submit'])){
	include 'dbh.inc.php';

	$uid=mysqli_real_escape_string($conn,$_POST['uid']);
	$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
	

	if( empty($uid) || empty ($pwd) ){
		header("Location: ../hedear.php?login=vide");
		exit();

	}else{
		$sql="SELECT * FROM utilisateur WHERE utilisateur_uid='$uid' or utilisateur_email='$uid' ";
		$resultat =mysqli_query ($conn , $sql);
		$verifresultat=mysqli_num_rows($resultat);
		if($verifresultat < 1){
			header("Location: ../hedear.php?login=erreur");
			exit();
		}else{
			if($colone=mysqli_fetch_assoc($resultat)){
				$hashedmdp=password_verify($pwd,$colone['utilisateur_mdp']);
				if($hashedmdp == false){
					header("Location: ../hedear.php?login=erreur");
					exit();
				}
				if($hashedmdp == true){
					$_SESSION['u_id']=$colone['utilisateur_id'];
					$_SESSION['u_nom']=$colone['utilisateur_nom'];
					$_SESSION['u_prenom']=$colone['utilisateur_prenom'];
					$_SESSION['u_email']=$colone['utilisateur_email'];
					$_SESSION['u_uid']=$colone['utilisateur_uid'];
					header("Location: ../hedear.php?login=valide");
					exit();
				}

			}
		}

	}
} else{
	header("Location: ../index.hp?login=error");
	exit();
}