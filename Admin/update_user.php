<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user ID from the form
    $user_id = $_POST['id'];

    // Connect to the database
    include("../db_conn.php");
    // Get updated user information from the form
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $tele = $_POST['tele'];
    $nom_util = $_POST['nom_util'];
    $mdp = $_POST['mdp'];
    $cin = $_POST['cin'];
    $adresse = $_POST['adresse'];

    // Update user information in the database
    $query = "UPDATE utilisateurs SET prenom='$prenom', nom='$nom', email='$email', tele='$tele', nom_util='$nom_util', mdp='$mdp', cin='$cin', adresse='$adresse' WHERE id_util=$user_id";
    $result = mysqli_query($conn, $query);

    // Close database connection
    mysqli_close($conn);

    // Redirect to user profile page
    header("Location: index_admin.php?id=$user_id");
    exit;
}
