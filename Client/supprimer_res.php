<?php
// Connect to the database
include("../db_connexion.php");

// Get the ID of the room to delete
$id_res = $_GET['ID_RES'];

// Delete the row from the database
$sql = "DELETE FROM reservation WHERE ID_RES = '$id_res'";

if (mysqli_query($conn, $sql)) {
    // If the query was successful, redirect back to the main page
    header("Location: MesReservation.php");
} else {
    // If there was an error, display the error message
    echo "Erreur de suppression: " . mysqli_error($conn);
}

mysqli_close($conn);