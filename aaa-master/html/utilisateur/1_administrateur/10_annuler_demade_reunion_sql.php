<?php
session_start();

include_once"connecter_bd.php";

$login = mysqli_real_escape_string($conn, $_POST['login']);
$intutile = mysqli_real_escape_string($conn, $_POST['nom']);
$datedebut = mysqli_real_escape_string($conn, $_POST['datedebut']);
$datefin = mysqli_real_escape_string($conn, $_POST['datefin']);
$motif = mysqli_real_escape_string($conn, $_POST['motif']);	

if(empty($datedebut)|| empty($datefin)){
	$error[] = 'un champ reste vide';
	/*header("Location: 2_ajout_professeur_form.php?champ=vide");
	exit();*/
	print_r($error);
}else{	
    $sql ="DELETE FROM demandereunion WHERE (intutile = $intutile , heuredebut = $datedebut , heurefin = $datefin , motif = $motif , login = $login)";
	if($conn->query($sql) === TRUE){
		echo "les demandes ont été supprimer avec succée,";
	}else{
	    echo "Error: " . $sql . "<br/>" . $conn->error;
	}		
	exit();
}
?>
