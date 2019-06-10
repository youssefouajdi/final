<?php
include_once"connecter_bd.php";

$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$motif = mysqli_real_escape_string($conn, $_POST['motif']);
$date = mysqli_real_escape_string($conn, $_POST['datereservation']);	

if(empty($motif)|| empty($date)){
	echo "champ vide";
	exit();
}else{
	$sql="SELECT intitule FROM sallereunion where intitule='$nom'";
	$result=mysqli_query($conn , $sql);
	$resultcheck=mysqli_num_rows($result);
	if($resultcheck == 0){
		echo "cette salle n'existe pas.";
		//header("Location: 2_ajout_professeur_form.php?login =dejaexiste");
		exit();
	}else{
		$sql="SELECT datereservation FROM reservation where datereservation='$date'";
		$result=mysqli_query($conn , $sql);
		$resultcheck=mysqli_num_rows($result);
		if($resultcheck > 0){
			echo "cette reservation est déja existé.";
			//header("Location: 2_ajout_professeur_form.php?login =dejaexiste");
			exit();
		}else{
			$sql ="INSERT INTO reservation (intitule,motif, datereservation)
			VALUES ('$nom','$motif','$date')";
			if($conn->query($sql) === TRUE){
				echo "informations inserer avec succes";
				//header("Location: 2_ajout_professeur_form.php");
			}else{
				echo "Error: " . $sql . "<br/>" . $conn->error;
			}		
        	exit();
    	}    
	}
}
?>