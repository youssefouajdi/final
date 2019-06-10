<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <link rel="stylesheet" href="1_administrateur_pag.css">
</head>
<body>
    <div class="logo">
        <a class="accueil" href="1_administrateur_page.php"><img src="images/ensate.png"></a>
    </div>
    <div class="log">
        <a class="button" href="../../1_login_form.php">
            <img src="images/logout.png">
            <div class="logout">LOGOUT</div>
        </a>
    </div><br><br><br><br><br>
    <nav class="principale">
        <div class="navigation1">
			<div class="n1">Professeur</div>
			<div class="n12">
				<div><a href="2_ajout_professeur_form.php">ajouter</a></div>
				<div><a href="3_supprimer_professeur_form.php">supprimer</a></div>
			</div>	
		</div>
		<div class="navigation2">
			<div class="n2">salle de réunion</div>
			<div class="n22">
				<div><a href="5_ajout_salle_reunion_form.php">ajouter</a></div>
				<div><a href="6_supprimer_salle_reunion_form.php">supprimer</a></div>
                <div><a href="">Mettre en attente</a></div>
            </div>
		</div>
		<div class="navigation3">
			<div class="n3">réservation d'une salle</div>
			<div class="n32">
				<div><a href="7_reserver_salle_reunion_form.php">réserver</a></div>
                <div><a href="8_annuler_reservation_salle_form.php">annuler</a></div>
                <div><a href="9_modifier_reservation_salle_form.php">modifier</a></div>	
                <div><a href="">imprimer</a></div>
                <div><a href="">imprimer l’historique</a></div>
                <div><a href="4_1_verification_reservation_sql.php">les demandes de réservation</a></div>
			</div>
		</div>
		<div class="navigation4">
			<div class="n4">département</div>
			<div class="n42">
				<div><a href="15_ajouter_departement_form.php">ajouter</a></div>
				<div><a href="16_supprimer_departement_form.php">supprimer</a></div>
				<div><a href="17_modifier_proprietes_departement_form.php">modifier les propriétés</a></div>
			</div>
        </div>
        	
    </nav>
	<?php
include_once"connecter_bd.php";

$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
$login = "$nom$prenom";
$departement = mysqli_real_escape_string($conn, $_POST['departement']);
$telephone = mysqli_real_escape_string($conn, $_POST['telephone']);	
$email = "$nom$prenom"."@gmail.com";
$user_type = 'user';
$password = "$nom$prenom";
if(empty($telephone)|| empty($nom)||empty($prenom)){
	$error[] = 'un champ reste vide';
	/*header("Location: 2_ajout_professeur_form.php?champ=vide");
	exit();*/
	print_r($error);
}else{
	if(!preg_match("/^[a-zA-Z]*$/", $nom) || !preg_match("/^[a-zA-Z]*$/", $prenom) ) {
		echo "le nom ou prénom sont incorrect.";
		exit();
	}else{
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: 2_ajout_professeur_form2_ajout_professeur_form.php.php?email=erreur");
			exit();
		}else{
			if(!preg_match("/^[0-9]*$/", $telephone)) {
				echo "le numéro de telephone est incorrect.";
				exit();
			}else{
				$sql="SELECT * FROM utilisateur where login='$login'";
				$result=mysqli_query($conn , $sql);
				$resultcheck=mysqli_num_rows($result);

				if($resultcheck > 0){
					echo "ce login existe déja.";
					//header("Location: 2_ajout_professeur_form.php?login =dejaexiste");
					exit();
				}else{
					$passwordcryptee = password_hash($password, PASSWORD_DEFAULT);
					$sql ="INSERT INTO utilisateur (nom, prenom, login, departement, telephone, email, user_type, `motdepasse`)
					VALUES ('$nom','$prenom','$login','$departement','$telephone','$email','$user_type','$passwordcryptee')";
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
	}
}
?>
</body>
</html>
