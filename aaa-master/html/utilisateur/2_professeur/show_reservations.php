<!DOCTYPE html>
<html>
<head>
	<title>Show Cars</title>
	<link rel="stylesheet" type="text/css" href="show_cars.css">
	<link rel="stylesheet" type="text/css" href="2_modifier_donnees_personnelles_sql.css">
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
	<h1 class="print">la table de réservation</h1>
	<table id='content'>
	<tr>
			<th>intitule</th>
			<th>heure debut</th>
			<th>heure fin</th>
			<th>motif</th>
			<th>login</th>
		</tr>
		<?php
		include_once"connecter_bd.php";
		
		$sql = "SELECT intitule, heuredebut, heurefin, motif, login FROM reservation;";
		$result = $conn->query($sql); 
		if( $result -> num_rows > 0){
			while($row = $result -> fetch_assoc()){
				echo 
                "<tr>
                <td>". $row['intitule'] ."</td>
                <td>". $row['heuredebut']."</td>
				<td>". $row['heurefin']."</td>
				<td>". $row['motif']."</td>
				<td>". $row['login']."</td>
                ";
			}?>
			<tr>
			<td><button class="Imprimer" onclick="myFunction()">Imprimer la page </button></td>
		</tr>
			<?php
			echo "</table>";	
		}else{
			echo " 0 result";
		}
		$conn->close();
		?>
	</table>
	
	<script>
		function myFunction(){
  			window.print();
		}
	</script>
</body>
</html>