<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    include("../db_connexion.php");

    // Retrieve form data
    $type = $_POST['field1'];
    $prix = $_POST['field2'];

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
        $upload_dir = '../Img/image_activites/';
        $filename = uniqid("IMG-", true) . '.' . $file_extension;
        $upload_path = $upload_dir . $filename;
        move_uploaded_file($file['tmp_name'], $upload_path);

        // Store the URL in the database
        $url =  $filename;
    } else {
        echo "Veuillez choisir une image à télécharger.";
    }
    if ($type == 'Piscine') {
        $id_a = 1;
    } elseif ($type == 'Restaurant') {
        $id_a = 2;
    } elseif ($type == 'Spa') {
        $id_a = 3;
    }



    // Insert new row into the database
    $query = "INSERT INTO activite  VALUES ('', '$prix','oui' ,'$url','$id_a')";
    mysqli_query($conn, $query);

    // Close database connection
    mysqli_close($conn);
    header("Location: activite.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Ajouter une activité</title>
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
        input[type="email"],
        input[type="tel"],
        input[type="password"],
        input[type="file"],
        textarea,
        select {
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
include("../PHP/header.php")
?>
<fieldset>
    <legend>Ajouter une activité</legend>

    <form method="post" action="" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label for="field1">Type :</label>
        <select name="field1" id="field1">

            <option>Piscine</option>
            <option>Restaurant</option>
            <option>Spa</option>

        </select>

        <label for="field2">Prix(Dhs) :</label>
        <input type="text" name="field2" id="field2" />




        <label for="img">Photo :</label>
        <input type="file" id="img" name="img">

        <input type="submit" value="Enregister" />
    </form>
</fieldset>
<script>
    function validateForm() {
        const formInputs = document.querySelectorAll('input[type="text"], textarea');

        for (let input of formInputs) {
            if (input.value.trim() === '') {
                alert("Veuillez remplir tous les champs");
                return false;
            }
        }
        var prix = document.getElementById("field2").value;
        if (isNaN(prix)) {
            alert("Le prix doit être un nombre ! ");
            return false;


        }
        alert("Activité ajoutée avec succès!"); // Display a validation message
        return true;
    }
</script>
</body>

</html>