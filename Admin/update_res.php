<?php

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user ID from the form
    $id_res = $_POST['ID_RES'];

    // Connect to the database
    include("../db_connexion.php");

  
   
    // Get updated user information from the form
    $chambre = $_POST['type_chambre'];
    $arrivee = $_POST['arrivee'];
    $activite = $_POST['activite'];
    $nbre = $_POST['nbre'];
    $depart = $_POST['depart'];

    if ($activite == 'Piscine') {
        $type_ac = 1;
    } elseif ($activite == 'Restaurant') {
        $type_ac = 2;
    } elseif ($activite == 'Spa') {
        $type_ac = 3;
    }elseif($activite == 'Aucune activité'){
        $type_ac = 0;
    }
    if ($chambre == 'individuelle') {
        $type_ch = 1;
    } elseif ($chambre == 'double') {
        $type_ch = 2;
    } elseif ($chambre == 'triple') {
        $type_ch = 3;
    }
   
    
$chambre_query = "SELECT ID_CHAMBRE FROM chambre WHERE ID_TYPE_CHAMBRE = $type_ch";
$chambre_result = mysqli_query($conn, $chambre_query);
$chambre_row = mysqli_fetch_assoc($chambre_result);
$id_chambre = $chambre_row['ID_CHAMBRE'];

// Update row in the database
$query = "UPDATE reservation SET ID_CHAMBRE='$id_chambre', ID_TYPE_ACTIVITE='$type_ac', DATE_D_ENTREE='$arrivee', DATE_SORTIE='$depart', NBRE_CHAMBRE='$nbre' WHERE ID_RES='$id_res'";
    



   $result = mysqli_query($conn, $query);


    // Check if query was successful
    if ($result) {
        // Redirect to the reservation page
        header("Location: ResAdmin.php");
        exit;
    } else {
        // If there was an error, display the error message
        echo "Erreur de mise à jour: " . mysqli_error($conn);
    }
    

}
?>
