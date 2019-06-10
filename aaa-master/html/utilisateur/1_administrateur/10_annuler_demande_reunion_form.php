
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
    <form class="box" action="10_annuler_demade_reunion_sql.php" method="POST">
        <h1>donner les information de la demande  à supprimer:</h1>
        <select name="login" >
    		<?php
		        include_once "connecter_bd.php";
		        $sql = "SELECT login FROM demandereunion;";
		        $result = $conn->query($sql); 
		        if( $result -> num_rows > 0){
			        while($row = $result -> fetch_assoc()){
				        echo "<option value=".$row['login'].">".$row['login']."</option>";
                    }
	            }
            ?>
            </select>
        <select name="nom" id="departement_erreur">
    		<?php
		        $sql1 = "SELECT intitule FROM sallereunion;";
		        $result1 = $conn->query($sql1); 
		        if( $result1 -> num_rows > 0){
			        while($row1 = $result1 -> fetch_assoc()){
				        echo "<option value=".$row1['intitule'].">".$row1['intitule']."</option>";
                    }
	            }
	            $conn->close();
            ?>
		</select>
        <label for="datedebut">heure debut</label><br>
        <input type="datetime-local" name="datedebut"><br>
        <label for="datefin">heure fin</label><br>
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
        <button type="submit" name="submit" >supprimer</button>
    </form>
</body>
</html>