<?php
session_set_cookie_params(0);
session_start();
include("../db_connexion.php");

// Récupération des informations de connexion de l'utilisateur
$user = $_POST['username'];
$pass = $_POST['password'];

// Requête SQL pour récupérer les informations de l'utilisateur
$sql = "SELECT * FROM utilisateurs WHERE LOGIN ='$user'";
$result = mysqli_query($conn, $sql);

// Vérification si les informations de connexion sont valides
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $hashed_pass = $row['MDP'];
    if (password_verify($pass, $hashed_pass)) {
        // Les informations de connexion sont valides, donc on connecte l'utilisateur
    $_SESSION['ID_UTILL'] = $row['ID_UTILL'];
    $_SESSION['LOGIN'] = $row['LOGIN'];

    if ($row['ID_PROFIL'] == 3) {
        header('location:/Client/index.php');
    } else if ($row['ID_PROFIL'] == 1) {
        header('location:/Admin/index.php');
    } else if ($row['ID_PROFIL'] == 2) {
        header('location:/Agent/index.php');
    }
       
    } /*else {
        // Les informations de connexion sont invalides, on affiche un message d'erreur
        header("Location: /PHP/form_connexion.php");
        echo " <p> Nom d'utilisateur ou mot de passe incorrect. </p>";
    }*/
} else {
    header('location:/PHP/form_connexion.php');
    $message[] = 'erreur';
}

mysqli_close($conn); // Fermer la connexion à la base de données
?>
