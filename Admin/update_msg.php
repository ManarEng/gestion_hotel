<?php
    $conn = new mysqli("localhost", "root", "", "gestion_hotel");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['id_msg'])) {
        $id_msg = $_POST['id_msg'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $tele = $_POST['tele'];
        $message = $_POST['message'];
        $sql = "UPDATE messagerie SET nom='$nom', prenom='$prenom', email='$email', tele='$tele', message='$message' WHERE id_msg='$id_msg'";
        if ($conn->query($sql) === TRUE) {
            header("Location: MsgAdmin.php");
        } else {
            echo "Erreur lors de la modification : " . $conn->error;
        }
    } else {
        echo "Id_msg non spécifié.";
    }
    $conn->close();
?>