<?php
    $conn = new mysqli("localhost", "root", "", "hotelux");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_GET['ID_MESSAGE'])) {
        $ID_MESSAGE = $_GET['ID_MESSAGE'];
        $sql="select * from messagerie where ID_MESSAGE = $ID_MESSAGE";
        $resultat = mysqli_query($conn, $sql);
        if (mysqli_num_rows($resultat) == 1) {
            $row = mysqli_fetch_assoc($resultat);
            $nom = $row['NOM'];
            $prenom = $row['PRENOM'];
            $email = $row['EMAIL'];
            $message = $row['MESSAGE'];
        } else {
            echo "Aucune donnée trouvée pour cet ID_MESSAGE.";
            exit();
        }
    } else {
        echo "ID_MESSAGE non spécifié.";
        exit();
    }
?>
<fieldset>
<form action="update_msg.php" method="post">
    <input type="hidden" name="ID_MESSAGE" value="<?php echo $ID_MESSAGE; ?>">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" value="<?php echo $nom ." ".$prenom; ?>">
    <br>
    
    <label for="email">E-mail :</label>
    <input type="email" name="email" value="<?php echo $email; ?>">
    <br>
   
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