<?php
// Check if user ID is provided in the query string
if (isset($_GET['id_util'])) {
    $user_id = $_GET['id_util'];


    // Connect to the database
    include("../db_conn.php");

    // Retrieve user information from the database
    $query = "SELECT * FROM utilisateurs WHERE id_util = $user_id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Close database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Modifier le profil</title>
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
</head>

<body>
    <!--<h1 style="text-align: center;">Modifier votre profil</h1>-->
    <br>
    <?php if (isset($user)) : ?>
        <fieldset>
            <legend>Modifier votre profil</legend>

            <form method="post" action="update_user.php">
                <input type="hidden" name="id" value="<?php echo $user['id_util']; ?>" />

                <label for="prenom">Prénom:</label>
                <input type="text" name="prenom" id="prenom" value="<?php echo $user['prenom']; ?>" />

                <label for="nom">Nom:</label>
                <input type="text" name="nom" id="nom" value="<?php echo $user['nom']; ?>" />

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>" />

                <label for="tele">Téléphone:</label>
                <input type="tel" name="tele" id="tele" value="<?php echo $user['tele']; ?>" />

                <label for="nom_util">Login:</label>
                <input type="text" name="nom_util" id="nom_util" value="<?php echo $user['nom_util']; ?>" />

                <label for="mdp">Mot de Passe:</label>
                <input type="password" name="mdp" id="mdp" value="<?php echo $user['mdp']; ?>" />

                <label for="cin">CIN:</label>
                <input type="text" name="cin" id="cin" value="<?php echo $user['cin']; ?>" />

                <label for="adresse">Addresse:</label>
                <textarea name="adresse" id="adresse"><?php echo $user['adresse']; ?></textarea>

                <input type="submit" value="Enregistrer" />
            </form>
        </fieldset>
    <?php else : ?>
        <p>Utilisateur n'existe pas.</p>
    <?php endif; ?>
</body>

</html>