<?php
// Check if form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $row_id = $_POST['id'];
    // Connect to the database

    include("../db_connexion.php");

    // Get form data
    $id = $_POST['id'];
    $type = $_POST['field1'];
    $prix = $_POST['field2'];
    $disponibilite = $_POST['field3'];

    if ($type == 'Piscine') {
        $id_a = 1;
    } elseif ($type == 'Restaurant') {
        $id_a = 2;
    } elseif ($type == 'Spa') {
        $id_a = 3;
    }

    // Update row in the database
    $query = "UPDATE activite SET ID_TYPE_ACTIVITE='$id_a', PRIX='$prix', ETAT='$disponibilite' WHERE ID_ACTIVITE=$id";
    $result = mysqli_query($conn, $query);

    // Close database connection
    mysqli_close($conn);

    // Redirect to the chambre list page
    header("Location: activite.php");
    exit;
}
