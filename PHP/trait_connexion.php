

<?php
session_start();

include 'db_connexion.php';

// Récupération des informations de connexion de l'utilisateur
$user = $_POST['username'];
$pass = $_POST['password'];

// Requête SQL pour récupérer les informations de l'utilisateur
$sql = "SELECT * FROM utilisateurs WHERE nom_util='$user' AND mdp='$pass'";
$result = mysqli_query($conn, $sql);

// Vérification si les informations de connexion sont valides
/*if (mysqli_num_rows($result) == 1) {
    // Les informations de connexion sont valides, donc on connecte l'utilisateur
    $_SESSION['loggedin'] = true;
    $_SESSION['login'] = $user;
    header("Location: /pageClient/index.php");
    //echo "Connexion réussie ! Bienvenue, ".$user.".";
} else {
    // Les informations de connexion sont invalides, on affiche un message d'erreur
    
    header("Location: /connexion/index.php");
    echo " <p> Nom d'utilisateur ou mot de passe incorrect. </p>";
}
*/
if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id_util'] = $row['id_util'];
    $_SESSION['nom_util'] = $row['nom_util'];

    if($row['id_profil']==3){header('location:/Client/index.php');}
    else if($row['id_profil']==1){header('location:/Admin/index.php');}
    else if($row['id_profil']==2){header('location:/Agent/index.php');}
    
 }
 
 else
 {

    header('location:/PHP/form_connexion.php');
    $message[] = 'erreur';
    /*echo '<script >';
    echo ' alert("JavaScript Alert Box by PHP")';  //not showing an alert box.
    echo '</script>';*/
    
    
 }

mysqli_close($conn); // Fermer la connexion à la base de données






?>