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
    $file = $_FILES['img'];
    if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
        // file upload and processing code goes here
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            echo "Télécharger une image valide.";
        }

        // Store the image in the upload directory
        $upload_dir = '../PHP/uploads/';
        $filename = uniqid("IMG-", true) . '.' . $file_extension;
        $upload_path = $upload_dir . $filename;
        move_uploaded_file($file['tmp_name'], $upload_path);

        // Store the URL in the database
        $url =  $filename;
    } else {
        echo "Veuillez choisir une image à télécharger.";
    }
    //verification

    //end of verification
    // Update user information in the database
    if (!empty($mdp)) {


        $query = "UPDATE utilisateurs SET PRENOM='$prenom', NOM='$nom', E_MAIL='$email', TELE='$tele', MDP='$mdp', CIN='$cin', ADRESSE='$adresse',IMAGE_UTIL='$url' WHERE ID_UTILL=$user_id";
        $result = mysqli_query($conn, $query);
    } else {
        $query = "UPDATE utilisateurs SET PRENOM='$prenom', NOM='$nom', E_MAIL='$email', TELE='$tele',  CIN='$cin', ADRESSE='$adresse',IMAGE_UTIL='$url' WHERE ID_UTILL=$user_id";
        $result = mysqli_query($conn, $query);
    }
    // Close database connection
    mysqli_close($conn);

    // Redirect to user profile page
    header("Location: profil.php?id=$user_id");
    exit;
}
