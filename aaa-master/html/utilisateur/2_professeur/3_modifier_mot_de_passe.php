<?php
session_start();
include_once"connecter_bd.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="2_modifier_donnees_personnelles_sql.css">
	<title>Document</title>	
</head>
<body>
<div class="logo">
        <a class="accueil" href="1_professeur_page.php"><img src="images/ensate.png"></a>
    </div>
    <div class="log">
        <a class="button" href="../../1_login_form.php">
            <img src="images/logout.png">
            <div class="logout">LOGOUT</div>
        </a>
    </div><br><br><br><br><br>
    <nav class="principale">
        <div class="navigation1">
			<div class="n1">Modifier</div>
			<div class="n12">
				<div><a href="2_modifier_donnees_personnelles_sql.php">les donnees personnelles</a></div>
				<div><a href="3_modifier_mot_de_passe.php">le mot de passe</a></div>
            <div><a href="5_ajout_salle_reunion_form.php">une reservation</a></div>
         </div>	
		</div>
		<div class="navigation2">
			<div class="n2">Imprimer</div>
			<div class="n22">
				<div><a href="show_reservations.php">les réservations</a></div>
				<div><a href="6_supprimer_salle_reunion_form.php">l'historique</a></div>
            </div>
		</div>
		<div class="navigation3">
            <div class="n3">demander</div>
                <div class="n32">
                    <div><a href="4_demande_reservation_form.php">une réservation</a></div>
                </div>
            </div>
        </div>
		<div class="navigation4">
			<div class="n4">annuler une réservation</div>
      </div>
    </nav>
	<?php
	$sql = "SELECT * FROM utilisateur WHERE login = '$_SESSION[login]'";
	$result2 = mysqli_query($conn,$sql);
	$colonne = mysqli_fetch_assoc($result2);

	$passcry = password_verify($_SESSION['password'], $colonne['motdepasse']);
	$result = $conn->query($sql);
	while($row = $result -> fetch_assoc()){
		
		if( $result -> num_rows > 0){
			echo "
			<p>
			votre actuel mot de passe est:<br/>
			mot de passe: ".$_SESSION['password']."<br/>
			</p>
			";
			$_SESSION['id'] = $row['id'];
			?>
			
			<form class="box" action="3_1_modifier_mot_de_passe.php" method="POST">
				<h1>donne le nouveau mot de passe:</h1>
				<input type="password" name="nvmotdepasse" placeholder ="nouveau mot de passe">
				<input type="password" name="confirmation" placeholder ="confirmer le mot de passe">
				<button type="submit" name="submit" >Modifier </button>
			</form>
			<?php
		}else{
			echo " 0 result";
		}
	}
	$conn->close();
	?>	
</body>
</html>
