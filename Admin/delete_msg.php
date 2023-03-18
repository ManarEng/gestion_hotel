<?php
    $conn = new mysqli("localhost", "root", "", "hotelux");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Vérifier si le paramètre ID_MESSAGE a été fourni dans l'URL
    if (isset($_GET["ID_MESSAGE"])) {
        $ID_MESSAGE = $_GET["ID_MESSAGE"];
        
        // Supprimer la ligne correspondant à l'ID_MESSAGE dans la base de données
        $sql = "DELETE FROM messagerie WHERE ID_MESSAGE=$ID_MESSAGE";
        $result = mysqli_query($conn, $sql);
        
        // Rediriger vers la page du tableau de messagerie
        header("Location: MsgAdmin.php");
    } else {
        echo "L'ID_MESSAGE n'a pas été fourni.";
    }

    // Fermer la connexion
    mysqli_close($conn);
?>
