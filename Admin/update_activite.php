<?php
// Check if form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $row_id = $_POST['id'];
    // Connect to the database

    include("../PHP/db_connexion.php");

    // Get form data
    $id = $_POST['id'];
    $type = $_POST['field1'];
    $prix = $_POST['field2'];
    $disponibilite = $_POST['field3'];



    // Update row in the database
    $query = "UPDATE activite SET TYPE='$type', PRIX='$prix', ETAT='$disponibilite' WHERE ID_ACTIVITE=$id";
    $result = mysqli_query($conn, $query);

    // Close database connection
    mysqli_close($conn);

    // Redirect to the chambre list page
    header("Location: activite.php");
    exit;
}
