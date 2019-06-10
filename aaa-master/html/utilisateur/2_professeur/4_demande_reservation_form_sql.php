<?php
session_start();

include_once"connecter_bd.php";

$login = $_SESSION['login'];
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
    $sql ="INSERT INTO demandereunion (intutile, heuredebut, heurefin, motif, login)
	VALUES ('$intutile','$datedebut','$datefin','$motif','$login')";
	if($conn->query($sql) === TRUE){
		echo "la demande est envoyé avec succée,";
	}else{
	    echo "Error: " . $sql . "<br/>" . $conn->error;
	}		
	
}
?>
<?php



$login = $_SESSION['login'];
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
    $sql1="INSERT INTO historique_demande1(login,intitule, heuredebut, heurefin, motif, etat)
	VALUES ('$login','$intutile','$datedebut','$datefin','$motif','en cours d execution ')";
	if($conn->query($sql1) === TRUE){
		echo "la demande est envoyé avec succée,";
	}else{
	    echo "Error: " . $sql1 . "<br/>" . $conn->error;
	}		
	exit();
}
?>
