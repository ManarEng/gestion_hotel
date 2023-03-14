<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    include("../db_conn.php");

    // Retrieve form data
    $type = $_POST['field1'];
    $description = $_POST['field2'];
    $prix = $_POST['field4'];
    $etat = $_POST['field3'];
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
        $upload_dir = 'rooms/';
        $filename = uniqid("IMG-", true) . '.' . $file_extension;
        $upload_path = $upload_dir . $filename;
        move_uploaded_file($file['tmp_name'], $upload_path);

        // Store the URL in the database
        $url =  $filename;
    } else {
        echo "Veuillez choisir une image à télécharger.";
    }



    // Insert new row into the database
    $query = "INSERT INTO chambre  VALUES ('','$type', '$description','$etat' ,'$prix','$url')";
    mysqli_query($conn, $query);

    // Close database connection
    mysqli_close($conn);
    header("Location: chambre.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Ajouter une chambre</title>
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
    <fieldset>
        <legend>Ajouter une chambre</legend>

        <form method="post" action="" enctype="multipart/form-data">
            <label for="field1">Type:</label>
            <input type="text" name="field1" id="field1" />

            <label for="field2">Description:</label>
            <input type="text" name="field2" id="field2" />
            <label for="field3">Disponibilité:</label>
            <input type="text" name="field3" id="field3" />

            <label for="field4">Prix (Dhs):</label>
            <input type="text" name="field4" id="field4" />

            <label for="img">Photo:</label>
            <input type="file" id="img" name="img">

            <input type="submit" value="Enregister" />
        </form>
    </fieldset>
</body>

</html>