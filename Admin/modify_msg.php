<?php
    $conn = new mysqli("localhost", "root", "", "gestion_hotel");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_GET['id_msg'])) {
        $id_msg = $_GET['id_msg'];
        $sql="select * from messagerie where id_msg = $id_msg";
        $resultat = mysqli_query($conn, $sql);
        if (mysqli_num_rows($resultat) == 1) {
            $row = mysqli_fetch_assoc($resultat);
            $nom = $row['nom'];
            $prenom = $row['prenom'];
            $email = $row['email'];
            $tele = $row['tele'];
            $message = $row['message'];
        } else {
            echo "Aucune donnée trouvée pour cet id_msg.";
            exit();
        }
    } else {
        echo "Id_msg non spécifié.";
        exit();
    }
?>
<fieldset>
<form action="update_msg.php" method="post">
    <input type="hidden" name="id_msg" value="<?php echo $id_msg; ?>">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" value="<?php echo $nom; ?>">
    <br>
    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" value="<?php echo $prenom; ?>">
    <br>
    <label for="email">E-mail :</label>
    <input type="email" name="email" value="<?php echo $email; ?>">
    <br>
    <label for="tele">N° de Téléphone :</label>
    <input type="text" name="tele" value="<?php echo $tele; ?>">
    <br>
    <label for="message">Message :</label>
    <textarea name="message"><?php echo $message; ?></textarea>
    <br>
    <input type="submit" value="Modifier">
</form>
</fieldset>

<style>
        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            width: 80%;
            margin: auto;
        }

        label {
            flex-basis: 30%;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"],
        textarea {
            flex-basis: 65%;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: orange;
        }

        fieldset {
            border: 2px solid #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333;
        }

        legend {
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 10px;
        }
    </style>