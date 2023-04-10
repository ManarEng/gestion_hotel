<?php
// Vérifier si un ID de réservation a été passé en paramètre dans l'URL
if (!isset($_GET['ID_RES'])) {
    // Si non, afficher un message d'erreur et rediriger vers la page de liste des réservations
    echo "ID de réservation non spécifié.";
    header("Location: ResAdmin.php");
    exit();
}

include("../db_connexion.php");

// Get the ID of the room to delete
$id_res = $_GET['ID_RES'];

// Delete the row from the database
$sql = "DELETE FROM reservation WHERE ID_RES = $id_res";

if (mysqli_query($conn, $sql)) {
    // If the query was successful, redirect back to the main page
    header("Location: ResAdmin.php");
} else {
    // If there was an error, display the error message
    echo "Erreur de suppression: " . mysqli_error($conn);
}

mysqli_close($conn);