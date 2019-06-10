<!DOCTYPE html>
<html>
	<head>
		<title>ajouter un professeur</title>
	</head>
	<body>
		
		<form class="box" method="POST" action="4_modifier_information_professeur_sql.php">
            <input type="text" name="nom" placeholder ="nom">
            <input type="text" name="prenom" placeholder ="prenom">
			<select name="departement">
    			<option value="GI">Genie Informatique(GI)</option>
    			<option value="SIAD">Sciences Mathematiques et Aide a la Descision(SIAD)</option>
				<option value="STIC">Sciences et Technologies Industrielles et Civiles(STIC)</option>
				<option value="Telecom">(Telecom)Telecom</option>
			</select>
			<input type="text" name="telephone" placeholder ="telephone">
            <input type="text" name="email" placeholder ="email">
            <input type="password" name="password" placeholder ="mot de passe">
            <button type="submit" name="submit" >Modifier</button>
			<button type="reset" name="reset">Reset the information</button>
		</form>
	</body>
</html>