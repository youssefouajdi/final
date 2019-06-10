<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=loginsysteme','root' ,'');
if(isset($_POST['Envoyer'])){
	if(isset($_POST['id_destinataire'],$_POST['id_message'])){
		if(!empty($_POST['id_destinataire'])and !empty($_POST['id_message']) ){
				$destinataire = htmlspecialchars($_POST['id_destinataire']);
				$message = htmlspecialchars($_POST['id_message']);
				$id_destinataire=$bdd->prepare('SELECT utilisateur_id FROM utilisateur where utilisateur_nom=? ');
				$id_destinataire->execute(aaray($destinataire));
				$id_destinataire=$id_destinataire->fetch();
				var_dump($id_destinataire);
				$id_destinataire = $id_destinataire['utilisateur_id'];
				var_dump($id_destinataire);
		}else{
			$error="veuillez completer tous les champs";
		}
	}
}
$destinataires = $bdd->query ('SELECT utilisateur_nom FROM utilisateur ORDER BY utilisateur_nom ');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Envoie de message</title>
	<meta charset="=utf-8">
</head>
<body>
	<form method ="POST">
		<label>Destinataire:</label>
		<select name="destinataire">
			<?php while($d = $destinataires->fetch()){?>
			<option><?= $d['utilisateur_nom'] ?></option>
		<?php }?>
		</select>
		<br><br>
		<textarea placeholder="Votre message" name="message"></textarea>
		<br><br>
		<input type="submit" value="Envoyer">
		<?php 
		if (isset($error)){
			echo'<span style="color:red">'.$error.'</span>';}

		
		?>
	</form>
</body>
</html>