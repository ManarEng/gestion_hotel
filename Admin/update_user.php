<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user ID from the form
    $user_id = $_POST['id'];

    // Connect to the database
    include("../db_connexion.php");
    // Get updated user information from the form
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $tele = $_POST['tele'];

    $mdp = $_POST['mdp'];
    $cin = $_POST['cin'];
    $adresse = $_POST['adresse'];
    //verification

    //end of verification
    // Update user information in the database
    if (!empty($mdp)) {


        $query = "UPDATE utilisateurs SET PRENOM='$prenom', NOM='$nom', E_MAIL='$email', TELE='$tele', MDP='$mdp', CIN='$cin', ADRESSE='$adresse' WHERE ID_UTILL=$user_id";
        $result = mysqli_query($conn, $query);
    } else {
        $query = "UPDATE utilisateurs SET PRENOM='$prenom', NOM='$nom', E_MAIL='$email', TELE='$tele',  CIN='$cin', ADRESSE='$adresse' WHERE ID_UTILL=$user_id";
        $result = mysqli_query($conn, $query);
    }
    // Close database connection
    mysqli_close($conn);

    // Redirect to user profile page
    header("Location: profil.php?id=$user_id");
    exit;
}
