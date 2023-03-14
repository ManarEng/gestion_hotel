<?php
// Check if form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $row_id = $_POST['id'];
    // Connect to the database

    include("../db_conn.php");

    // Get form data
    $id = $_POST['id'];
    $idu = $_POST['idu'];
    $nbre = $_POST['field1'];
    $type =  $_POST['field2'];
  

    $entree = $_POST['field3'];
    $sortie = $_POST['field4'];



    // Update row in the database
    $query = "UPDATE reservation SET id_util='$idu', nbre_chambre='$nbre', type_ac='$type' ,date_entree=$entree,date_sortie=$sortie WHERE id_rese =$id";
    $result = mysqli_query($conn, $query);

    // Close database connection
    mysqli_close($conn);

    // Redirect to the chambre list page
    header("Location: ResAdmin.php");
    exit;
}