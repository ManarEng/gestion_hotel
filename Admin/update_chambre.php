<?php
// Check if form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $row_id = $_POST['id'];
    // Connect to the database

    include("../PHP/db_connexion.php");

    // Get form data
    $id = $_POST['id'];
    $type = $_POST['field1'];
    $description = mysqli_real_escape_string($conn, $_POST['field2']);
    //$description = $_POST['field2'];

    $prix = $_POST['field3'];



    // Update row in the database
    $query = "UPDATE chambre SET TYPE='$type', DESCRIPTION='$description', PRIX='$prix' WHERE ID_CHAMBRE=$id";
    $result = mysqli_query($conn, $query);

    // Close database connection
    mysqli_close($conn);

    // Redirect to the chambre list page
    header("Location: chambre.php");
    exit;
}
