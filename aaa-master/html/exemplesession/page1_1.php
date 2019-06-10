<?php
session_start();
include_once"connecter_bd.php";
$login = mysqli_real_escape_string($conn, $_POST['login']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


// Set session variables
$_SESSION["login"] = $login;
$_SESSION["password"] = $password;
echo "Session variables are set.";
?>