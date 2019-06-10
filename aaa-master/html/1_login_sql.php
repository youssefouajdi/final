<?php
session_start();
include_once"connecter_bd.php";

$login = mysqli_real_escape_string($conn, $_POST['login']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$_SESSION['login'] = $login;
$_SESSION['password'] = $password;

$sql1 = "SELECT * FROM utilisateur WHERE login = '$login' and motdepasse = '$password' and user_type = 'admin'";
$result1 = mysqli_query($conn,$sql1);

$count1 = mysqli_num_rows($result1);
$sql2 = "SELECT * FROM utilisateur WHERE login = '$login' and user_type = 'user'";
$result2 = mysqli_query($conn,$sql2);

$count2 = mysqli_num_rows($result2);
if($count1 == 1) {
   //session_register("nom");
   //$_SESSION['login_user'] = $nom;
   
   header("location: utilisateur/1_administrateur/1_administrateur_page.php");
}else if($count2 == 1){
   if($colonne = mysqli_fetch_assoc($result2)){
      $passcry = password_verify($password, $colonne['motdepasse']);
      if($passcry == true){
         header("Location: utilisateur/2_professeur/1_professeur_page.php");
      }
      if($passcry == false){
         $error = "Your Login Name or Password is invalid";
         echo "" .$error; 
      }
   }
}else{
   ?>
   <a href="1_login_form.php">Try again</a>
   <?php
}
?>
