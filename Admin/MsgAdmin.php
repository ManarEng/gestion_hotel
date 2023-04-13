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
include("../PHP/header.php")
?>
<div>
    <?php
    include("../db_connexion.php");
    $query = "SELECT NOM,PRENOM FROM utilisateurs where  ID_UTILL=$id;";
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
        $sql = "select * from messagerie";
        $resultat = mysqli_query($conn, $sql);

        // Vérifier si des données ont été trouvées
        if (mysqli_num_rows($resultat) == 0) {
            echo "Aucun message trouvée.";
        } else {
            echo " <h2 class=title> Messagerie : </h2>";
            // Afficher les données dans un tableau HTML
            echo "<table class=styled-table>";
            echo "<thead>";

            echo "<tr><td> Nom et Prenom </td><td>E-Mail</td><td> Message</td><Td></Td></tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($resultat)) {
                echo "<tr>";
                echo "<td>" . $row["NOM"] . " " . $row["PRENOM"] . "</td>";
                echo "<td>" . $row["EMAIL"] . "</td>";

                $message = $row["MESSAGE"];
                if (strlen($message) > 20) {
                    $message = substr($message, 0, 20) . '...';
                    echo "<td id=message onclick=\"this.innerHTML = '" . $row["MESSAGE"] . "';\">" . $message . "</td>";
                } else {
                    echo "<td>" . $message . "</td>";
                }
                echo "<td><a href='delete_msg.php?ID_MESSAGE=" . $row["ID_MESSAGE"] . "'><img src=\"\Img\icons8-delete-trash-50.png\" alt=\"Supprimer\" style=\"width: 25px; height: 25px;\" title=\"supprimer\";\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')\" ></a></td>";

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