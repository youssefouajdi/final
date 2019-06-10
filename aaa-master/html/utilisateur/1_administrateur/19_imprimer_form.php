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
                <div><a href="18_hitorique_form.php">l’historique demande/reservations</a></div>
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
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="show_cars.css">
    <title>Document</title>
</head>
<body>
<table class="content1">
	<tr>
            <th>login</th>
            <th>intitule</th>
			<th>heure debut</th>
			<th>heure fin</th>
            <th>motif</th>
		</tr>
		<?php
        include_once"connecter_bd.php";
		
		$sql = "SELECT * FROM reservation;";
		$result = $conn->query($sql); 
		if( $result -> num_rows > 0){            
            echo "tous les resevations: <br>";
			while($row = $result -> fetch_assoc()){
                
                
                            
                    echo 
                        "<tr>
                        <td>". $row['login'] ."</td>
                        <td>". $row['intitule'] ."</td>
                        <td>". $row['heuredebut']."</td>
                        <td>". $row['heurefin']."</td>
				        <td>". $row['motif']."</td>
                    ";
                
            }
            echo "</table>";    
		}else{
			echo " 0 result";
		}
		?>
	</table>
    <table class="content1">
	<tr>
            <th>login</th>
            <th>intitule</th>
			<th>heure debut</th>
			<th>heure fin</th>
            <th>motif</th>
		</tr>
		<?php
        
		
		$sql1 = "SELECT * FROM demandereunion;";
		$result1 = $conn->query($sql1); 
		if( $result1 -> num_rows > 0){            
            echo "tous les demande : <br>";
			while($row1 = $result1 -> fetch_assoc()){
                
               
                            
                    echo 
                        "<tr>
                        <td>". $row1['login'] ."</td>
                        <td>". $row1['intutile'] ."</td>
                        <td>". $row1['heuredebut']."</td>
                        <td>". $row1['heurefin']."</td>
				        <td>". $row1['motif']."</td>
                    ";
                
            }
            echo "</table>";    
		}else{
			echo " 0 result";
		}
				$conn->close();
		?>
    
    <td>
			<button type="submit"class="Imprimer" onclick="myFunction()">Imprimer la page</button>
    </td>
	</table>
	
	<script>
		function myFunction(){
  			window.print();
		}
	</script>

</body>
</html>