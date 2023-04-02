<?php
// Connect to the database
include("../db_connexion.php");

// Get the ID of the room to delete
$id_ac = $_GET['id_activite'];

// Delete the row from the database
$sql = "DELETE FROM activite WHERE ID_ACTIVITE = $id_ac";

if (mysqli_query($conn, $sql)) {
    // If the query was successful, redirect back to the main page
    header("Location: activite.php");
} else {
    // If there was an error, display the error message
    echo "Erreur de suppression: " . mysqli_error($conn);
}

mysqli_close($conn);
