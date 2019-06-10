<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <link rel="stylesheet" href="2_modifier_donnees_personnelles_sql.css">
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
    <form class="box" action="4_demande_reservation_form_sql.php" method="POST">
        <h1>donner les information de la réunion:</h1>
        <select name="nom" id="departement_erreur">
    		<?php
		        include_once"connecter_bd.php";
		        $sql = "SELECT intitule FROM sallereunion;";
		        $result = $conn->query($sql); 
		        if( $result -> num_rows > 0){
			        while($row = $result -> fetch_assoc()){
				        echo "<option value=".$row['intitule'].">".$row['intitule']."</option>";
                    }
	            }
	            $conn->close();
            ?>
		</select>
        <label for="datedebut">heure debut</label><br>
        <input type="datetime-local" name="datedebut">
        <label for="datedebut">heure fin</label><br>
        <input type="datetime-local" name="datefin">
        <select name="motif">
    		<option value="reunion conseil d' etablissement">reunion conseil d' etablissement</option>
    		<option value="reunion commission pédagogique">reunion commission pédagogique</option>
			<option value="reunion commission de recherche scientifique">reunion commission de recherche scientifique</option>
			<option value="reunion commission culturelle">reunion commission culturelle</option>
            <option value="reunion filiere">reunion filiere</option>
            <option value="reunion AG departement">reunion AG departement</option>
            <option value="reunion syndicat et reunion deliberations">réunion syndicat et réunion délibérations</option>
		</select>
        <button type="submit" name="submit" >Envoyer la demande </button>
    </form>
</body>
</html>





