<?php
// Connect to the database
include("../db_connexion.php");

// Get the ID of the room to delete
$id_util = $_GET['id_util'];

// Delete the row from the database
$sql = "DELETE FROM utilisateurs WHERE ID_UTILL = $id_util";

if (mysqli_query($conn, $sql)) {
    // If the query was successful, redirect back to the main page
    header("Location:/Agent/utilisateurs.php");
} else {
    // If there was an error, display the error message
    echo "Erreur de suppression: " . mysqli_error($conn);
}

mysqli_close($conn);
