<?php

session_start();?>

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
    <nav>
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
    
    <form class="box" action="2_ajout_professeur_sql" method="POST" onsubmit ="return Validate()" name="vform">
        <h1>donne les informations du professeur:</h1>
        <input type="text" name="nom" placeholder ="nom" id="nom_erreur">
        <input type="text" name="prenom" placeholder ="prenom " id="prenom_erreur">
        <select name="departement" id="departement_erreur">
    		<option value="GI">Genie Informatique(GI)</option>
    		<option value="SIAD">Sciences Mathematiques et Aide a la Descision(SIAD)</option>
			<option value="STIC">Sciences et Technologies Industrielles et Civiles(STIC)</option>
			<option value="Telecom">(Telecom)Telecom</option>
		</select>
		<input type="text" name="telephone" placeholder ="telephone: ex: 0651456566" id="telephone_erreur" minlength="10" maxlength="10" > 
        <button type="submit" name="submit" >Ajouter </button>
    </form>
</body>
</html>

<script>
	var nom =document.forms["vform"]["nom"];
    var prenom =document.forms['vform']["prenom"];
    var dapartement =document.forms['vform']["departement"];
    var telephone =document.forms['vform']["telephone"];

    var nom_erreur =document.getElementById["vform"]["nom_erreur"];
    var prenom_erreur =document.getElementById['vform']["prenom_erreur"];
    var dapartement_erreur =document.getElementById['vform']["departement_erreur"];
    var telephone_erreur =document.getElementById['vform']["telephone_erreur"];

    nom.addEventListener("blur", nomVerification, true);
    prenom.addEventListener("blur", prenomVerification, true);
    departement.addEventListener("blur", departementVerification, true);
    telephone.addEventListener("blur", telephoneVerification, true);

    function Validate(){
        if(nom.value == ""){
            nom.style.border = "1px solid red";
            nom_erreur.textContent = "Username is required";
            nom.focus();
            return false;
        }
        if(prenom.value == ""){
            prenom.style.border = "1px solid red";
            prenom_erreur.textContent = "Username is required";
            prenom.focus();
            return false;
        }
        if(departement.value == ""){
            departement.style.border = "1px solid red";
            departement_erreur.textContent = "Username is required";
            departement.focus();
            return false;
        }
        if(departement.value == ""){
            departement.style.border = "1px solid red";
            departement_erreur.textContent = "Username is required";
            departement.focus();
            return false;
        }
        if(telephone.value == ""){
            telephone.style.border = "1px solid red";
            telephone_erreur.textContent = "Username is required";
            telephone.focus();
            return false;
        }
    }
</script>