<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    include("../db_connexion.php");

    // Retrieve form data
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
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
        $upload_dir = '../PHP/uploads/';
        $filename = uniqid("IMG-", true) . '.' . $file_extension;
        $upload_path = $upload_dir . $filename;
        move_uploaded_file($file['tmp_name'], $upload_path);

        // Store the URL in the database
        $url =  $filename;
    } else {
        echo "Veuillez choisir une image à télécharger.";
    }



    // Insert new row into the database
    $query = "INSERT INTO utilisateurs  VALUES ('','3', '$nom','$prenom' ,'$nom_util','$mdp','$cin','$adresse','$email','$tele','$url')";
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
            max-width: 620px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        legend {
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 10px;
        }

        label {
            flex-basis: 40%;
            font-weight: bold;

        }

        input[type="text"],
        input[type="email"],
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
<?php
include("../PHP/header_ag.php")
?>

<fieldset>
    <legend>Ajouter un client: </legend>

    <form method="post" action="" onsubmit="return validateForm()" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $user['ID_UTILL']; ?>" />

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" />

        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" />
        <label for="cin">CIN :</label>
        <input type="text" name="cin" id="cin" />



        <label for="email">Email :</label>
        <input type="text" name="email" id="email" />

        <label for="tele">Téléphone :</label>
        <input type="tel" name="tele" id="tele" />
        <label for="adresse">Addresse :</label>
        <textarea name="adresse" id="adresse"></textarea>
        <label for="img">Photo :</label>
        <input type="file" id="img" name="img">
        <label for="nom_util">Login :</label>
        <input type="text" name="nom_util" id="nom_util" />

        <label for="mdp">Mot de Passe :</label>
        <input type="password" name="mdp" id="mdp" />
        <label for="mdpp">Confirmer le mot de passe :</label>
        <input type="password" name="mdpp" id="mdpp" />




        <input type="submit" value="Enregistrer" />
    </form>
</fieldset>

<script>
    function validateForm() {
        var prenom = document.getElementById("prenom").value;
        var nom = document.getElementById("nom").value;
        var email = document.getElementById("email").value;
        var tele = document.getElementById("tele").value;
        var mdp = document.getElementById("mdp").value;
        var mdpp = document.getElementById("mdpp").value;
        let lettersRegex = /^[A-Za-z]+$/;
        let teleRegex = /^[+]?[1-9][0-9]{9,14}$/;
        let regexPassword = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/;

        var emailRegex = /\S+@\S+\.\S+/;
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

        if (!emailRegex.test(email)) {
            alert("L'email n'est pas valide.");
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
        alert("Ajout avec succès"); // Display a validation message
        return true;
    }
</script>

</body>

</html>