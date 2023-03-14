<?php
// Check if row ID is provided in the query string
if (isset($_GET['id_activite'])) {
    $row_id = $_GET['id_activite'];

    // Connect to the database
    include("../db_conn.php");

    // Retrieve row information from the database
    $query = "SELECT * FROM activite WHERE id_activite = $row_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Close database connection
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Modifier activité</title>
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
    <?php if (isset($row)) : ?>
        <fieldset>
            <legend>Modifier activité</legend>

            <form method="post" action="update_activite.php">
                <input type="hidden" name="id" value="<?php echo $row['id_activite']; ?>" />

                <label for="field1">Type:</label>
                <input type="text" name="field1" id="field1" value="<?php echo $row['type']; ?>" />

                <label for="field2">Prix (Dhs):</label>
                <input type="text" name="field2" id="field2" value="<?php echo $row['prix']; ?>" />

                <label for="field3">Disponibilité:</label>
                <input type="text" name="field3" id="field3" value="<?php echo $row['etat']; ?>" />

                <input type="submit" value="Enregister" />
            </form>
        </fieldset>
    <?php else : ?>
        <p>Activité inexistante.</p>
    <?php endif; ?>
</body>

</html>