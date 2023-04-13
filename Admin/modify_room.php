<?php
// Check if row ID is provided in the query string
if (isset($_GET['id_chambre'])) {
    $row_id = $_GET['id_chambre'];

    // Connect to the database
    include("../db_connexion.php");

    // Retrieve row information from the database
    $query = "SELECT * FROM chambre WHERE ID_CHAMBRE = $row_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Close database connection
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Modifier chambre</title>
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
<?php if (isset($row)) : ?>
    <fieldset>
        <legend>Modifier chambre</legend>

        <form method="post" action="update_chambre.php" onsubmit="return validateForm()" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['ID_CHAMBRE']; ?>" />

            <label for="field1">Type :</label>
            <select name="field1" id="field1">
                <option value="<?php if ($row['ID_TYPE_CHAMBRE'] == 1) {
                                    echo "Individuelle";
                                } elseif ($row['ID_TYPE_CHAMBRE'] == 2) {
                                    echo "Double";
                                } elseif ($row['ID_TYPE_CHAMBRE'] == 3) {
                                    echo "Triple";
                                } ?>"><?php if ($row['ID_TYPE_CHAMBRE'] == 1) {
                                                echo "Individuelle";
                                            } elseif ($row['ID_TYPE_CHAMBRE'] == 2) {
                                                echo "Double";
                                            } elseif ($row['ID_TYPE_CHAMBRE'] == 3) {
                                                echo "Triple";
                                            } ?></option>
                <option>Individuelle</option>
                <option>Double</option>
                <option>Triple</option>

            </select>



            <label for="field2">Description :</label>
            <textarea name="field2" id="field2" rows="6"><?php echo $row['DESCRIPTION']; ?></textarea>

            <label for="field3">Prix (Dhs) :</label>
            <input type="text" name="field3" id="field3" value="<?php echo $row['PRIX']; ?>" />
            <label for="img">Modifier la photo :</label>
            <input type="file" id="img" name="img">


            <input type="submit" value="Enregister" />
        </form>
    </fieldset>
<?php else : ?>
    <p>Chambre inexistante.</p>
<?php endif; ?>
<script>
    function validateForm() {
        const formInputs = document.querySelectorAll('input[type="text"], textarea');

        for (let input of formInputs) {
            if (input.value.trim() === '') {
                alert("Veuillez remplir tous les champs");
                return false;
            }
        }
        var prix = document.getElementById("field3").value;
        if (isNaN(prix)) {
            alert("Le prix doit être un nombre ! ");
            return false;


        }
        alert("Modification avec succès!"); // Display a validation message
        return true;
    }
</script>
</body>

</html>