<?php
// Connect to the database
include("../PHP/db_connexion.php");

// Get the ID of the room to delete
$id_chambre = $_GET['id_chambre'];

// Delete the row from the database
$sql = "DELETE FROM chambre WHERE ID_CHAMBRE = $id_chambre";

if (mysqli_query($conn, $sql)) {
    // If the query was successful, redirect back to the main page
    header("Location: chambre.php");
} else {
    // If there was an error, display the error message
    echo "Erreur de suppression: " . mysqli_error($conn);
}

mysqli_close($conn);
