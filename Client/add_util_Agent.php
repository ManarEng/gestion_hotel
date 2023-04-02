<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    include("../db_conn.php");

    // Retrieve form data
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $E_MAIL = $_POST['E_MAIL'];
    $tele = $_POST['tele'];
    $nom_util = $_POST['nom_util'];
    $mdp = $_POST['mdp'];
    $cin = $_POST['cin'];
    $adresse = $_POST['adresse'];

    // Check if file is an image
    $file = $_FILES['img'];
    if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
        // file upload and processing code goes here
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            echo "Télécharger une image valide.";
        }

        // Store the image in the upload directory
        $upload_dir = 'agents/';
        $filename = uniqid("IMG-", true) . '.' . $file_extension;
        $upload_path = $upload_dir . $filename;
        move_uploaded_file($file['tmp_name'], $upload_path);

        // Store the URL in the database
        $url =  $filename;
    } else {
        echo "Veuillez choisir une image à télécharger.";
    }



    // Insert new row into the database
    $query = "INSERT INTO utilisateurs  VALUES ('','2', '$nom','$prenom' ,'$nom_util','$mdp','$cin','$adresse','$E_MAIL','$tele','$url')";
    mysqli_query($conn, $query);

    // Close database connection
    mysqli_close($conn);
    header("Location: utilisateurs.php");
    exit;
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Ajouter utilisateur</title>
    <style>
        /*style of admin index*/
        body {
            margin: 0;
            /*background: #ddd;*/
        }

        table {
            font-size: 22px;
        }

        td {
            text-align: center;
        }

        #td1 {
            text-align: left;
            background-color: lightseagreen;
            color: white;
            border: 10px;
            margin-top: -10px;
            padding: 10px;
        }

        .basic_box {
            border: 1px solid #ccc;
            border-radius: 15px;
            margin: auto;
            width: 600px;
            padding: 50px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19);
        }

        th {
            font-weight: bold;
            padding-left: 15px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 15%;
            font-size: 24px;
            background-color: lightseagreen;
            text-decoration: none;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        li {
            color: white;
        }

        li a {
            display: block;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
        }

        li a.active {
            background-color: #e6b800;
            color: white;
        }

        li a:hover:not(.active) {
            background-color: #ffa500;
            color: white;
            text-decoration: underline;
        }






        /* Style the outer menu */
        .outer-menu {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .outer-menu li {
            margin-bottom: 10px;
        }



        /*header*/

        header {
            position: fixed;
            height: 90px;
            width: 100%;
            background-color: lightskyblue;
            /*filter: blur(20px);
        backdrop-filter: blur(20px);
        /*background: transparent;*/

            height: 50px;
            width: 100%;
            clip: rect(top, offset of right clip from left side, offset of bottom from top, left);

            filter: blur(20px);
            filter: url(blur.svg#blur);

        }

        #e1 {
            float: center;
            margin-top: 32px;

        }

        header h1 {
            float: right;
            margin-top: 32px;
        }

        .divider {
            width: 100px;
            height: 2px;
            background: #ffa500;

            margin-left: 680px;
            margin-right: auto;


        }

        .heading {
            text-align: center;

            margin-left: 115px;
            margin-top: 10px;
        }

        h2 {
            text-transform: uppercase;
            font-weight: bold;
            color: black;
        }

        /*end of style index  */

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            width: 90%;
            /* reduce form width */

        }

        fieldset {
            border: 2px solid #333;
            border-radius: 10px;


            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333;
            max-width: 600px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        legend {
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 10px;
        }

        label {
            flex-basis: 30%;
            font-weight: bold;

        }

        input[type="text"],
        input[type="E_MAIL"],
        input[type="tel"],
        input[type="password"],
        input[type="file"],
        textarea {
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            width: 50%;
            /* reduce input width */
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            margin-top: 10px;
            /* add margin on top of submit button */
            width: 30%;
            /* reduce submit button width */
        }

        input[type="submit"]:hover {
            background-color: orange;
        }
    </style>
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td id="td1" style="padding: 10px; font-size: 48px;"><a href="index_admin.php" style="text-decoration: none; color:inherit"><b> HoteLUX</b></a><span style="color: #ffa500;">.</span></td>
        </tr>
    </table>


    <ul class="outer-menu" style="position: fixed;">

        <li><a href="../Admin/profil.php">Profil</a></li>
        <li><a href="../Admin/utilisateurs.php"> Utilisateurs</a>

        </li>
        <li><a href="../Admin/chambre.php"> Chambres</a>

        </li>
        <li><a href="../Admin/activite.php"> Activités</a>

        </li>
        <li><a href="res_admin.php">Résérvations</a></li>
        <li><a href="messagerie.php">Messagerie</a></li>
        <li><a href="deconnexion.php">Déconnexion</a></li>
    </ul>

    <fieldset>
        <legend>Ajouter un agent: </legend>

        <form method="post" action="" onsubmit="return validateForm()" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $user['id_util']; ?>" />

            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" />

            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" />
            <label for="cin">CIN :</label>
            <input type="text" name="cin" id="cin" />



            <label for="E_MAIL">E_MAIL :</label>
            <input type="text" name="E_MAIL" id="E_MAIL" />

            <label for="tele">Téléphone :</label>
            <input type="tel" name="tele" id="tele" />
            <label for="adresse">Addresse :</label>
            <textarea name="adresse" id="adresse"></textarea>

            <label for="nom_util">Login :</label>
            <input type="text" name="nom_util" id="nom_util" />

            <label for="mdp">Mot de Passe :</label>
            <input type="password" name="mdp" id="mdp" />
            <label for="mdpp">Confirmer votre mot de passe :</label>
            <input type="password" name="mdpp" id="mdpp" />
            <label for="img">Photo :</label>
            <input type="file" id="img" name="img">



            <input type="submit" value="Enregistrer" />
        </form>
    </fieldset>

    <script>
        function validateForm() {
            var prenom = document.getElementById("prenom").value;
            var nom = document.getElementById("nom").value;
            var E_MAIL = document.getElementById("E_MAIL").value;
            var tele = document.getElementById("tele").value;
            var mdp = document.getElementById("mdp").value;
            var mdpp = document.getElementById("mdpp").value;
            let lettersRegex = /^[A-Za-z]+$/;
            let teleRegex = /^[+]?[1-9][0-9]{9,14}$/;
            let regexPassword = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/;

            var E_MAILRegex = /\S+@\S+\.\S+/;
            const formInputs = document.querySelectorAll('input[type="text"], input[type="tel"], input[type="password"], textarea');

            for (let input of formInputs) {
                if (input.value.trim() === '') {
                    alert("Veuillez remplir tous les champs");
                    return false;
                }
            }

            if ((!lettersRegex.test(prenom))) {
                alert("Le prénom doit contenir seulement des lettres.");
                return false;
            }

            if (!lettersRegex.test(nom)) {
                alert("Le nom doit contenir seulement des lettres.");
                return false;
            }

            if (!E_MAILRegex.test(E_MAIL)) {
                alert("L'E_MAIL n'est pas valide.");
                return false;
            }

            if (!teleRegex.test(tele)) {
                alert("Le téléphone doit être au format international.");
                return false;
            }

            if (!regexPassword.test(mdp)) {
                alert("Le mot de passe doit contenir au moins 8 caractères, une majuscule, une miniscule et un chiffre.");
                return false;
            }

            if (mdp != mdpp) {
                alert("Les mots de passe ne sont pas identiques.");
                return false;
            }
            alert("Ajout avec succes!"); // Display a validation message
            return true;
        }
    </script>

</body>

</html>