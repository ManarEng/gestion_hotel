<?php
    $conn = new mysqli("localhost", "root", "", "gestion_hotel");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Vérifier si le paramètre id_msg a été fourni dans l'URL
    if (isset($_GET["id_msg"])) {
        $id_msg = $_GET["id_msg"];
        
        // Supprimer la ligne correspondant à l'id_msg dans la base de données
        $sql = "DELETE FROM messagerie WHERE id_msg=$id_msg";
        $result = mysqli_query($conn, $sql);
        
        // Rediriger vers la page du tableau de messagerie
        header("Location: MsgAdmin.php");
    } else {
        echo "L'id_msg n'a pas été fourni.";
    }

    // Fermer la connexion
    mysqli_close($conn);
?>
