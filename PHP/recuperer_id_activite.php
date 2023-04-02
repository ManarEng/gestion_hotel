
<?php
include("../db_connexion.php");

// Récupération de la valeur envoyée par la requête AJAX
$activite = $_POST["activite"];

// Requête SQL pour récupérer l'ID de l'activité correspondant à la valeur sélectionnée dans la liste déroulante
$sql = "SELECT activite.ID_ACTIVITE FROM activite JOIN type_activite ON activite.ID_TYPE_ACTIVITE = type_activite.ID_TYPE_ACTIVITE WHERE type_activite.TYPE_ACTIVITE = '$activite'";
/*$sql = "SELECT ID_TYPE_ACTIVITE FROM type_activite WHERE TYPE_ACTIVITE = '$activite'";*/
// Exécution de la requête
$resultat = mysqli_query($conn, $sql);

// Vérification du résultat de la requête
if (mysqli_num_rows($resultat) > 0) {
    // Récupération de l'ID de l'activité correspondant à la valeur sélectionnée dans la liste déroulante
    $row = mysqli_fetch_assoc($resultat);
    $id_activite = $row["ID_TYPE_ACTIVITE"];
    
    // Envoi de la réponse au format JSON
    echo json_encode($id_activite);
} else {
    echo "Aucun résultat trouvé.";
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>