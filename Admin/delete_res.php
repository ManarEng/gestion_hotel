<?php
// Vérifier si un ID de réservation a été passé en paramètre dans l'URL
if (!isset($_GET['id_rese'])) {
    // Si non, afficher un message d'erreur et rediriger vers la page de liste des réservations
    echo "ID de réservation non spécifié.";
    header("Location: ResAdmin.php");
    exit();
}

// Se connecter à la base de données
$conn = new mysqli("localhost", "root", "", "gestion_hotel");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Get the ID of the room to delete
$id_rese = $_GET['id_rese'];

// Delete the row from the database
$sql = "DELETE FROM reservation WHERE id_rese = $id_rese";

if (mysqli_query($conn, $sql)) {
    // If the query was successful, redirect back to the main page
    header("Location: ResAdmin.php");
} else {
    // If there was an error, display the error message
    echo "Erreur de suppression: " . mysqli_error($conn);
}

mysqli_close($conn);