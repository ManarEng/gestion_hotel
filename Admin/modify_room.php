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
        input[type="email"],
        input[type="tel"],
        input[type="password"],
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
    <?php if (isset($row)) : ?>
        <fieldset>
            <legend>Modifier chambre</legend>

            <form method="post" action="update_chambre.php" onsubmit="return validateForm()">
                <input type="hidden" name="id" value="<?php echo $row['ID_CHAMBRE']; ?>" />

                <label for="field1">Type :</label>
                <select name="field1" id="field1">
                    <option value="<?php echo $row['TYPE']; ?>"><?php echo $row['TYPE']; ?></option>
                    <option>Individuelle</option>
                    <option>Double</option>
                    <option>Suite</option>

                </select>



                <label for="field2">Description :</label>
                <textarea name="field2" id="field2" rows="6"><?php echo $row['DESCRIPTION']; ?></textarea>

                <label for="field3">Prix (Dhs) :</label>
                <input type="text" name="field3" id="field3" value="<?php echo $row['PRIX']; ?>" />

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
            alert("Modification avec succes!"); // Display a validation message
            return true;
        }
    </script>
</body>

</html>