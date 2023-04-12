<?php
if (isset($_GET['ID_RES'])) {
    include("../db_connexion.php");
    $id_res = $_GET['ID_RES'];
    $sql = "SELECT U.NOM,U.IMAGE_UTIL,U.LOGIN ,U.PRENOM, TC.TYPE_CHAMBRE, TA.TYPE_ACTIVITE, R.NBRE_CHAMBRE, R.DATE_D_ENTREE, R.DATE_SORTIE,R.ID_RES ,TC.ID_TYPE_CHAMBRE ,TA.ID_TYPE_ACTIVITE,C.PRIX
    FROM reservation R
    JOIN utilisateurs U ON R.ID_UTILL = U.ID_UTILL
    JOIN chambre C ON R.ID_CHAMBRE = C.ID_CHAMBRE
    JOIN type_chambre TC ON C.ID_TYPE_CHAMBRE = TC.ID_TYPE_CHAMBRE
    JOIN type_activite TA ON R.ID_TYPE_ACTIVITE = TA.ID_TYPE_ACTIVITE where ID_RES= '$id_res'";
    $resultat = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($resultat);
    // Close database connection
    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Modifier le profil</title>
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
            width: 110%;
            /* reduce form width */

        }

        fieldset {
            border: 2px solid #333;
            border-radius: 10px;


            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333;
            max-width: 615px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        legend {
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 10px;
        }

        label {
            flex-basis: 35%;
            font-weight: bold;

        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="password"],
        input[type="file"],
        select {
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            width: 40%;
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
            <td id="td1" style="padding: 10px; font-size: 48px;"><a href="index.php" style="text-decoration: none; color:inherit"><b> HoteLUX</b></a><span style="color: #ffa500;">.</span></td>
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
        <li><a href="ResAdmin.php">Résérvations</a></li>
        <li><a href="MsgAdmin.php">Messagerie</a></li>
        <li><a href="deconnexion.php">Déconnexion</a></li>
    </ul>
    <?php if (isset($row)) : ?>
        <fieldset>
            <legend>Modifier votre réservation </legend>

            <form method="post" action="/Agent/update_res.php" onsubmit=" return validateForm()" enctype="multipart/form-data">
                <input type="hidden" name="ID_RES" value="<?php echo $row['ID_RES']; ?>" />

                <label for="prenom">Nom et Prénom :</label>
                <input type="text" name="prenom" id="prenom" value="<?php echo $row['NOM'] . " " . $row['PRENOM']; ?>" readonly />

                <label for="type_chambre">Type de chambre:</label>
                <input type="text" name="type_chambre" id="type_chambre" value="<?php if ($row['ID_TYPE_CHAMBRE'] == 1) {
                                                                                    echo "individuelle";
                                                                                } elseif ($row['ID_TYPE_CHAMBRE'] == 2) {
                                                                                    echo "double";
                                                                                } elseif ($row['ID_TYPE_CHAMBRE'] == 3) {
                                                                                    echo "triple";
                                                                                } ?>" readonly>
                <label for="nbre">Nombre de chambre:</label>
                <input type="number" name="nbre" min="1" max="100" value="<?php echo $row['NBRE_CHAMBRE']; ?>" class="box">

                <label for="activite">Type d'activité :</label>
                <select id='activite' name='activite' class="box">
                    <option value="<?php if ($row['ID_TYPE_ACTIVITE'] == 1) {
                                        echo "Piscine";
                                    } elseif ($row['ID_TYPE_ACTIVITE'] == 2) {
                                        echo "Restaurant";
                                    } elseif ($row['ID_TYPE_ACTIVITE'] == 3) {
                                        echo "Spa";
                                    } elseif ($row['ID_TYPE_ACTIVITE'] == 0) {
                                        echo "Aucune activité";
                                    } ?>"><?php if ($row['ID_TYPE_ACTIVITE'] == 1) {
                                                echo "Piscine";
                                            } elseif ($row['ID_TYPE_ACTIVITE'] == 2) {
                                                echo "Restaurant";
                                            } elseif ($row['ID_TYPE_ACTIVITE'] == 3) {
                                                echo "Spa";
                                            } elseif ($row['ID_TYPE_ACTIVITE'] == 0) {
                                                echo "Aucune activité";
                                            } ?>
                    </option>
                    <option>Aucune activité</option>
                    <option>Piscine</option>
                    <option>Restaurant</option>
                    <option>Spa</option>
                </select>
                <label for="arrivee">Date d'arrivée :</label>
                <input type="date" id="arrivee" name="arrivee" class="box" required min="<?php echo date('Y-m-d'); ?>" value="<?php echo $row['DATE_D_ENTREE']; ?>">
                <label for="depart">Date de départ :</label>
                <input type="date" id="depart" type="depart" name="depart" class="box" required min="<?php echo date('Y-m-d'); ?>" value="<?php echo $row['DATE_SORTIE']; ?>">

                <input type="submit" value="Enregistrer" />
            </form>
        </fieldset>
    <?php else : ?>
        <p>Utilisateur n'existe pas.</p>
    <?php endif; ?>

</body>

</html>
<script>
    function validateForm() {
        var arrivee = new Date(document.getElementById("arrivee").value);
        var depart = new Date(document.getElementById("depart").value);

        if (depart < arrivee) {
            alert("La date de départ ne peut pas être antérieure à la date d'arrivée.");
            return false;
        }

        return true;
    }
</script>