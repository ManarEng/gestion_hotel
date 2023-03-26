<!DOCTYPE html>
<html>

<head>
    <title>Reservations</title>
</head>
<style>
    body {
        margin: 0;
        background: #ddd;
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
        font-size: 24PX;
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

    

    header {
        position: fixed;
        height: 90px;
        width: 100%;
        background-color: lightskyblue;}
        /*filter: blur(20px);
        backdrop-filter: blur(20px);
        /background: transparent;/

        height: 50px;
        width: 100%;
        clip: rect(top, offset of right clip from left side, offset of bottom from top, left);

        filter: blur(20px);
        filter: url(blur.svg#blur);

    

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
        /margin: 0 auto;/
        margin-left: auto;
        margin-right: auto;
        margin-top: 100px;

    }

    .heading {
        text-align: center;
        margin-bottom: 60px;
        margin-left: 115px;
        /margin-top: 200px;/
    }

    h2 {
        text-transform: uppercase;
        font-weight: bold;
        color: black;
    }
</style>

<body>
    <!--<header>

        <h1 id="e1">Espace Administrateur</h1>
        <h1 id="">HoteLUX<span class="orange" style="color: #ff7a00;">.</span></h1>


    </header>-->

    <table style="width: 100%;">
        <tr>
            <td id="td1" style="padding: 10px; font-size: 48px;"><b> HoteLUX</b><span style="color: #ffa500;">.</span></td>
        </tr>
    </table>


    <ul class="outer-menu">

        <li><a href="index_admin.php">Profil</a></li>
        <li><a href=""> Utilisateurs</a>
            <!--<ul class="inner-menu">
                <li><a href=""> Clients</a></li>
                <li><a href=""> Agents De Réception</a></li>
            </ul>-->
        </li>
        <li><a href=""> Chambres</a>
            <!-- <ul class="inner-menu">
                <li><a href=""> Chambres</a></li>
                <li><a href="">Ajouter Une Chambre</a></li>
                <li><a href="">Supprimer Une Chambre</a></li>
            </ul>-->
        </li>
        <li><a href="">Activités</a>
            <!--<ul class="inner-menu">
                <li><a href="">Activités</a></li>
                <li><a href="">Ajouter Une Activité</a></li>
                <li><a href="">Supprimer Une Activité</a></li>
            </ul>-->
        </li>
        <li><a href="ResAdmin.php"> Résérvations</a></li>
        <li><a href="MsgAdmin.php"> Messagerie</a></li>
        <li><a href="../index.html">Déconnexion</a></li>
    </ul>
    <div class="container">
        
        <div style="margin-left: 25%; padding: 1px 16px; height: 1000px;">
            <p style="margin-left: 10%; margin-top: 5%; font-size: 28px;"></p>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "hotelux");

            if ($conn) 
            {

                $resultat = mysqli_query($conn, "SELECT u.NOM, u.PRENOM,  r.NBRE_CHAMBRE, a.TYPE, r.DATE_D_ENTREE, r.DATE_SORTIE 
                FROM UTILISATEURS u
                JOIN RESERVATION r ON u.ID_UTILL = r.ID_UTILL
                JOIN CHAMBRE c ON r.ID_RES = c.ID_RES
                JOIN CONTENIR ca ON r.ID_RES = ca.ID_RES
                JOIN ACTIVITE a ON ca.ID_ACTIVITE = a.ID_ACTIVITE; ");
            }

    // Vérifier si des données ont été trouvées
    if (mysqli_num_rows($resultat) == 0) {
    echo "Aucune donnée trouvée.";
    } else {
    // Afficher les données dans un tableau HTML
    echo "<table class=styled-table>";
    echo "<thead>";
    echo "<tr><th colspan=9><H2 >Reservations de vos clients</H2></th></tr>";
    echo "<tr><th>Nom d'Utilisateur</th><th> type de chambre</th><th>Nombre de chambre</th><th> type d'activitée</th><th> date d'entrée</th><th>date de sortie</th><TH></TH><TH></TH></tr>";
    echo "</thead>";
    echo"<tbody>";
    while ($row = mysqli_fetch_assoc($resultat)) {
        echo "<tr>";
        echo "<td>" . $row["NOM"] ." ".$row["PRENOM"]. "</td>";
        echo "<td>" . $row["TYPEC"] . "</td>";
        echo "<td>" . $row["NBRE_CHAMBRE"] . "</td>";
        echo "<td>" . $row["TYPE"] . "</td>";
        echo "<td>" . $row["DATE_D_ENTREE"] . "</td>";
        echo "<td>" . $row["DATE_SORTIE"] . "</td>";
        echo "<td><a href='modify_res.php'><button value='modifier' onclick='supprimerLigne(" . $row["ID_RES "] . ")'><img src=\"\Img\icons8-modify-50.png\" alt=\"modifier\" style=\"width: 25px; height: 25px;\"></button></a></td>";

        echo "<td><a href='delete_res.php'><button value='supprimer' onclick='supprimerLigne(" . $row["ID_RES "] . ")'><img src=\"\Img\icons8-delete-trash-50.png\" alt=\"Supprimer\" style=\"width: 25px; height: 25px;\"></button></a></td>";
        echo "</tr>";
    }    
    echo"</thead>";
    echo "</table>";
    }

// Fermer la connexion
mysqli_close($conn);
?>
    
        </div>

        <style>
            h2 {
                 text-align: center;
                 
                 color:white;
                 font-size: 30px;
                  
                }

            .styled-table {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                font-family: sans-serif;
                min-width: 800px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }

            .styled-table thead tr {
                background-color: #444;
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
        </style>

    </div>
</body>

</html>
