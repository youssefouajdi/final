<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="1_login_for.css">
</head>
<body>
	<div class="bienvenue">
		<p>bienvenue dans la platforme de gestion des salles de reunion l'ENSATé</p>
		<hr>
    </div>
	<form class="box" action="1_login_sql.php" method="POST">
		<h1>Authetification</h1>
        <input type="text" name="login" placeholder="login">
        <input type="password" name="password" placeholder="mot de passe">
        <button type="submit" name="submit">Login</button>
    </form>
	</div>
</body>
</html>