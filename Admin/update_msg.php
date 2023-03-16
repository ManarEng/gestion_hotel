<?php
    $conn = new mysqli("localhost", "root", "", "gestion_hotel");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['ID_MESSAGE'])) {
        $ID_MESSAGE = $_POST['ID_MESSAGE'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $tele = $_POST['tele'];
        $message = $_POST['message'];
        $sql = "UPDATE messagerie SET nom='$nom', prenom='$prenom', email='$email', tele='$tele', message='$message' WHERE id_msg='$ID_MESSAGE'";
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