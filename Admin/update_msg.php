<?php
    $conn = new mysqli("localhost", "root", "", "hotelux");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['ID_MESSAGE'])) {
        $ID_MESSAGE = $_POST['ID_MESSAGE'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $sql = "UPDATE messagerie SET NOM='$nom', PRENOM='$prenom', EMAIL='$email',  MESSAGE='$message' WHERE ID_MESSAGE='$ID_MESSAGE'";
        if ($conn->query($sql) === TRUE) {
            header("Location: MsgAdmin.php");
        } else {
            echo "Erreur lors de la modification : " . $conn->error;
        }
    } else {
        echo "ID_MESSAGE non spécifié.";
    }
    $conn->close();
?>
