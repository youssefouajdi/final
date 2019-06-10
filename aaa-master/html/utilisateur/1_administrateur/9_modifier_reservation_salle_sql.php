<?php
include_once"connecter_bd.php";

$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$motif = mysqli_real_escape_string($conn, $_POST['motif']);
$date = mysqli_real_escape_string($conn, $_POST['datereservation']);	

if(empty($motif)|| empty($date)){
	echo "champ vide";
	exit();
}else{
	$sql="SELECT intitule FROM sallereunion where intitule='$nom'";
	$result=mysqli_query($conn , $sql);
	$resultcheck=mysqli_num_rows($result);
	if($resultcheck == 0){
		echo "cette salle n'existe pas.";
		//header("Location: 2_ajout_professeur_form.php?login =dejaexiste");
		exit();
	}else{
		$sql="SELECT datereservation FROM reservation where datereservation='$date'";
		$result=mysqli_query($conn , $sql);
		$resultcheck=mysqli_num_rows($result);
		if($resultcheck > 0){
            $sql ="DELETE FROM reservation 
            WHERE intitule = '$nom' and motif = '$motif' and datereservation = '$date'";
			if($conn->query($sql) === TRUE){
                ?>
                <h2>donne les vouveau informations :</h2>
                <form class="signup-form" action="9_1_modifier_reservation_salle_sql.php" method="POST">
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
                    <button type="submit" name="submit" >reserver</button>
                </form>
                <?php
			}else{
				echo "Error: " . $sql . "<br/>" . $conn->error;
			}		
        	exit();
            
		}else{
			echo "cette reservation n'existe pas.";
			//header("Location: 2_ajout_professeur_form.php?login =dejaexiste");
			exit();
        }
            
	}
}
?>