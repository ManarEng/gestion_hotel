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
    <title>Modifier reservation</title>
    <style>
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
<?php
include("../PHP/header_ag.php")
?>
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