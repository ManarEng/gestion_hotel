<?php
session_start();
$id = $_SESSION['ID_UTILL'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
</head>
<?php
include("../PHP/header_ag.php")
?>
<div>
    <?php
    include("../db_connexion.php");
    $query = "SELECT NOM,PRENOM FROM utilisateurs where ID_PROFIL=2 and ID_UTILL=$id;";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);


    ?>

    <div class="heading">
        <h2>Bienvenue <?php echo $row['NOM'] . ' ' . $row['PRENOM']; ?></h2>
    </div>
    <div class="divider"></div>
    <div style="margin-left: 25%; padding: 1px 16px; height: 1000px;">
        <p style="margin-left: 10%; margin-top: 5%; font-size: 28px;"></p>


        <?php

        include("../db_connexion.php");

        $sql = "SELECT U.NOM,U.IMAGE_UTIL,U.LOGIN ,U.PRENOM, TC.TYPE_CHAMBRE, TA.TYPE_ACTIVITE, R.NBRE_CHAMBRE, R.DATE_D_ENTREE, R.DATE_SORTIE,R.ID_RES
            FROM reservation R
            JOIN utilisateurs U ON R.ID_UTILL = U.ID_UTILL
            JOIN chambre C ON R.ID_CHAMBRE = C.ID_CHAMBRE
            JOIN type_chambre TC ON C.ID_TYPE_CHAMBRE = TC.ID_TYPE_CHAMBRE
            JOIN type_activite TA ON R.ID_TYPE_ACTIVITE = TA.ID_TYPE_ACTIVITE";    //IL faut que j'ajoute where pour sortir ces informations de la session
        $resultat = mysqli_query($conn, $sql);



        if ($conn) {

            $resultat = mysqli_query($conn, $sql);
        }

        // Vérifier si des données ont été trouvées
        if (mysqli_num_rows($resultat) == 0) {
            echo "Aucune réservation trouvée.";
        } else {
            echo " <h2 class=title> Reservations de vos clients : </h2>";
            // Afficher les données dans un tableau HTML
            echo "<table class=styled-table>";
            echo "<thead>";

            echo "<tr><td>Nom et Prénom</td><td> type de chambre</td><td>Nombre de chambre</td><td> type d'activitée</td><td> date d'arrivée </td><td>date de départ</td><Td></Td><Td></Td></tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($resultat)) {
                echo "<tr>";
                echo "<td>" . $row["NOM"] . " " . $row["PRENOM"] . "</td>";
                echo "<td>" . $row["TYPE_CHAMBRE"] . "</td>";
                echo "<td>" . $row["NBRE_CHAMBRE"] . "</td>";
                echo "<td>" . $row["TYPE_ACTIVITE"] . "</td>";
                echo "<td>" . $row["DATE_D_ENTREE"] . "</td>";
                echo "<td>" . $row["DATE_SORTIE"] . "</td>";
                echo "<td><a href='/Agent/modify_res.php?ID_RES=" . $row["ID_RES"] . "'><img src=\"\Img\icons8-modify-50.png\" alt=\"modifier\" style=\"width: 25px; height: 25px;\" title=\"modifier\"></a></td>";
                echo "<td><a href='/Agent/delete_res.php?ID_RES=" . $row["ID_RES"] . "'><img src=\"\Img\icons8-delete-trash-50.png\" alt=\"Supprimer\" style=\"width: 25px; height: 25px;\" title=\"supprimer\";\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')\" ></a></td>";
                echo "</tr>";
            }
            echo "</thead>";
            echo "</table>";
        }

        // Fermer la connexion
        mysqli_close($conn);
        ?>

    </div>

    <style>
        .container {
            margin: auto;
            max-width: 750px;

        }

        .add-icon {

            margin-bottom: 1px;
        }

        .title {
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: bold;
            color: black;

        }

        .styled-table {
            border-collapse: collapse;
            margin: 0 auto 25px auto;
            font-size: 1.2em;
            font-family: sans-serif;
            width: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: grey;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody td {
            font-size: 14px;
        }

        .styled-table tbody tr:last-of-type td {
            border-bottom: none;
        }

        .styled-table tbody tr:hover {
            background-color: #b3d9ff;
        }

        .styled-table td:last-child {
            text-align: center;
        }

        .styled-table td:last-child img {
            margin-left: 10px;
        }

        img {
            width: 150px;
            height: 150px;
        }
    </style>

</div>
</body>

</html>