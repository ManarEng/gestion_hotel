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
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    // Store the image in the upload directory
    $upload_dir = '../PHP/uploads/';
    $filename = uniqid("IMG-", true) . '.' . $file_extension;
    $upload_path = $upload_dir . $filename;
    // Check if file is an image
    if (!empty($file)) {

        if (!in_array($file_extension, $allowed_extensions)) {
            $message[] = "Télécharger une image valide.";
        } else {
            // Store the URL in the database
            $url =  $filename;
            $image_update_query = mysqli_query($conn, "UPDATE `utilisateurs` SET IMAGE_UTIL = '$url' WHERE ID_UTILL = '$user_id'") or die('query failed');

            if ($image_update_query) {
                move_uploaded_file($file['tmp_name'], $upload_path);
            }
        }
    }

    //verification

    //end of verification
    // Update user information in the database
    if (!empty($mdp)) {
        $query = "UPDATE utilisateurs SET PRENOM='$prenom', NOM='$nom', E_MAIL='$email', TELE='$tele',MDP='$mdp', CIN='$cin', ADRESSE='$adresse',IMAGE_UTIL='$url' WHERE ID_UTILL=$user_id";
        $result = mysqli_query($conn, $query);
    } else {
        $query = "UPDATE utilisateurs SET PRENOM='$prenom', NOM='$nom', E_MAIL='$email', TELE='$tele', CIN='$cin', ADRESSE='$adresse' WHERE ID_UTILL=$user_id";
        $result = mysqli_query($conn, $query);
    }
    // Close database connection
    mysqli_close($conn);

    // Redirect to user profile page
    header("Location: ../Admin/utilisateurs.php?id=$user_id");
    exit;
}
