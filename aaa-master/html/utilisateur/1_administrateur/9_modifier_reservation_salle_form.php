<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" type="text/css" href="1_administrateur_pag.css">
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
                <div><a href="">les demandes de réservation</a></div>
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
		
		<form  class="box"method="POST" action="9_modifier_reservation_salle_sql.php">
		<h1>
			donne les informations d'une reservation à modifier:
			</h1>
        <input type="text" name="nom" placeholder ="nom de la salle" >
        <select name="motif">
    		<option value="reunion conseil d' etablissement">reunion conseil d' etablissement</option>
    		<option value="reunion commission pédagogique">reunion commission pédagogique</option>
			<option value="reunion commission de recherche scientifique">reunion commission de recherche scientifique</option>
			<option value="reunion commission culturelle">reunion commission culturelle</option>
            <option value="reunion filiere">reunion filiere</option>
            <option value="reunion AG departement">reunion AG departement</option>
            <option value="reunion syndicat et reunion deliberations">réunion syndicat et réunion délibérations</option>
		</select>
        <input type="date" name="datereservation" placeholder ="nom" >
            <button type="submit" name="submit" >modifier la reservation</button>
			<button type="reset" name="reset">Reset informations</button>
		</form>
	</body>
</html>