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
    <div class="container">
        <?php
        include("../db_connexion.php");
        $query = "SELECT NOM,PRENOM FROM utilisateurs where ID_PROFIL=1;";
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
            echo '<img src="../Img/agent.jpeg" width="250" height="200" alt="Number of Rooms">';
            echo '<div style="color: black; font-size: 20px;">'  . '<b>' . $count4 . '</b>' . ' ' . ' Agents'  . '</div>';
            echo '</a>';
            echo '</td>';

            // Second column with the clients image and link
            echo '<td style="padding: 10px;">';
            echo '<a href="utilisateurs.php" style="text-decoration:none;">';
            echo '<img src="../Img/client.jpeg" width="250" height="200" alt="Number of Activities">';
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