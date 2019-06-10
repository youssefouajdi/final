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
            echo "vos reservations sont: <br>";
			while($row = $result -> fetch_assoc()){
                
                if($row['login'] === $_SESSION['login']){
                            
                    echo 
                        "<tr>
                        <td>". $row['intutile'] ."</td>
                        <td>". $row['heuredebut']."</td>
                        <td>". $row['heurefin']."</td>
				        <td>". $row['motif']."</td>
                    ";
                }
            }
            echo "</table>";    
		}else{
			echo " 0 result";
		}
		?>
	</table>
    <table class="content1">
	<tr>
            <th>intitule</th>
			<th>heure debut</th>
			<th>heure fin</th>
            <th>motif</th>
		</tr>
		<?php
        
		
		$sql1 = "SELECT * FROM demandereunion;";
		$result1 = $conn->query($sql1); 
		if( $result1 -> num_rows > 0){            
            echo "vos demandes sont: <br>";
			while($row1 = $result1 -> fetch_assoc()){
                
                if($row1['login'] === $_SESSION['login']){
                            
                    echo 
                        "<tr>
                        <td>". $row1['intutile'] ."</td>
                        <td>". $row1['heuredebut']."</td>
                        <td>". $row1['heurefin']."</td>
				        <td>". $row1['motif']."</td>
                    ";
                }
            }
            echo "</table>";    
		}else{
			echo " 0 result";
		}
				$conn->close();
		?>
	</table>
	<button type="submit" name="submit" ><a href="5_annuler_reservation_sql.php">annuler les reservations</a></button>
</body>
</html>

