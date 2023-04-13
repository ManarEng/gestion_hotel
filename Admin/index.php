<?php
session_start();
$id = $_SESSION['ID_UTILL'];
if (!isset($id)) {
    header("Location: ../index.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
</head>
<?php
include("../PHP/header.php")
?>
<div class="container">
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

        <?php
        // Connect to the database
        include("../db_connexion.php");

        // Count the number of rows in the "chambre" table
        $sql = "SELECT COUNT(*) as count FROM chambre";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $count = $row["count"];

        // Count the number of rows in the "activite" table
        $sql2 = "SELECT COUNT(*) as count FROM activite";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $count2 = $row2["count"];
        //Count the number of rows in the utilisateurs table (clients)
        $sql3 = "SELECT COUNT(*) as count FROM utilisateurs where ID_PROFIL=3;";
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $count3 = $row3["count"];

        //Count the number of rows in the utilisateurs table (agents)
        $sql4 = "SELECT COUNT(*) as count FROM utilisateurs where ID_PROFIL=2;";
        $result4 = mysqli_query($conn, $sql4);
        $row4 = mysqli_fetch_assoc($result4);
        $count4 = $row4["count"];

        // Display the results in a table with two columns
        echo '<table style="border-collapse: collapse;margin-left: 115px;">';



        echo '<tr>';

        // First column with the chambre image and link
        echo '<td style="padding: 10px;">';
        echo '<a href="chambre.php" style="text-decoration:none;">';
        echo '<img src="../Img/room.jpeg" width="250" height="200" alt="Number of Rooms">';
        echo '<div style="color: black; font-size: 20px;">'  . '<b>' . $count . '</b>' . ' ' . ' Chambres' . '</div>';
        echo '</a>';
        echo '</td>';

        // Second column with the activite image and link
        echo '<td style="padding: 10px;">';
        echo '<a href="activite.php" style="text-decoration:none;">';
        echo '<img src="../Img/activity.jpeg" width="250" height="200" alt="Number of Activities">';
        echo '<div style="color: black; font-size: 20px;">' . '<b>' . $count2 . '</b>' . ' ' . ' Activités' . ' </div>';
        echo '</a>';
        echo '</td>';

        echo '</tr>';
        echo '<tr>';
        //second row of the table
        // First column with the agents image and link
        echo '<td style="padding: 10px;">';
        echo '<a href="utilisateurs.php" style="text-decoration:none;">';
        echo '<img src="../Img/agent.jpeg" width="250" height="200" alt="Number of agents">';
        echo '<div style="color: black; font-size: 20px;">'  . '<b>' . $count4 . '</b>' . ' ' . ' Agents'  . '</div>';
        echo '</a>';
        echo '</td>';

        // Second column with the clients image and link
        echo '<td style="padding: 10px;">';
        echo '<a href="utilisateurs.php#ancre" style="text-decoration:none;">';
        echo '<img src="../Img/client.jpeg" width="250" height="200" alt="Number of clients">';
        echo '<div style="color: black; font-size: 20px;">' . '<b>' . $count3 . '</b>' . ' ' . ' Clients' .  '</div>';
        echo '</a>';
        echo '</td>';

        echo '</tr>';
        echo '</table>';
        // Close the database connection
        mysqli_close($conn);
        ?>

    </div>


</div>
</body>

</html>