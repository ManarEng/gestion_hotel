<?php
session_start();
$id = $_SESSION['ID_UTILL'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
</head>
<style>
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
        background-color: lightseagreen;
        color: white;
        border: 10px;
        margin-top: -10px;
        padding: 10px;
        text-align: left;
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

    /* Style the inner menu */
    .inner-menu {
        list-style: none;
        margin: 0;
        padding: 0;
        display: none;
        position: absolute;
    }

    .inner-menu li {
        margin-right: 0;
    }

    /* Show the inner menu when the outer menu item is hovered 
    .outer-menu li:hover .inner-menu {
        display: inline-block;
    }*/



    /* Style the outer menu */
    .outer-menu {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .outer-menu li {
        margin-bottom: 10px;
    }

    /* Style the inner menu */
    .inner-menu {
        list-style: none;
        margin: 0;
        padding: 0;
        display: none;
    }

    .inner-menu li {
        size: 50px;
        margin-bottom: 5px;
    }

    /* Show the inner menu when the outer menu item is hovered */
    .outer-menu li:hover .inner-menu {
        display: block;
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
        /*margin: 0 auto;*/
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
</style>

<body>


    <table style="width: 100%;">
        <tr>
            <td id="td1" style="padding: 10px; font-size: 48px;"><a href="index.php" style="text-decoration: none; color:inherit"><b> HoteLUX</b></a><span style="color: #ffa500;">.</span></td>
        </tr>
    </table>


    <ul class="outer-menu" style="position: fixed;">

        <li><a href="profil.php">Profil</a></li>
        <li><a href="utilisateurs.php"> Utilisateurs</a>

        </li>
        <li><a href="chambre.php"> Chambres</a>

        </li>
        <li><a href="activite.php">Activités</a>

        </li>
        <li><a href="ResAdmin.php"> Résérvations</a></li>
        <li><a href="MsgAdmin.php">Messagerie</a></li>
        <li><a href="deconnexion.php">Déconnexion</a></li>
    </ul>
    <div>
        <?php
        include("../db_connexion.php");
        $query = "SELECT NOM,PRENOM FROM utilisateurs where ID_PROFIL=1 and ID_UTILL=$id;";
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
                echo "Aucune donnée trouvée.";
            } else {
                echo " <h2 class=title> Reservations de vos clients : </h2>";
                // Afficher les données dans un tableau HTML
                echo "<table class=styled-table>";
                echo "<thead>";

                echo "<tr><th>Nom d'Utilisateur</th><th> type de chambre</th><th>Nombre de chambre</th><th> type d'activitée</th><th> date d'entrée</th><th>date de sortie</th><TH></TH><TH></TH></tr>";
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
                    echo "<td><a href='modify_res.php?ID_RES=" . $row["ID_RES"] . "'><img src=\"\Img\icons8-modify-50.png\" alt=\"modifier\" style=\"width: 25px; height: 25px;\"></button></a></td>";
                    echo "<td><a href='delete_res.php?ID_RES=" . $row["ID_RES"] . "'><img src=\"\Img\icons8-delete-trash-50.png\" alt=\"Supprimer\" style=\"width: 25px; height: 25px;\"></button></a></td>";
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