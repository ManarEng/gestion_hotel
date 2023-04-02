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
</style>

<body>


    <table style="width: 100%;">
        <tr>
            <td id="td1" style="padding: 10px; font-size: 48px;"><a href="index_admin.php" style="text-decoration: none; color:inherit"><b> HoteLUX</b></a><span style="color: #ffa500;">.</span></td>
        </tr>
    </table>


    <ul class="outer-menu" style="position: fixed;">

        <li><a href="profil.php">Profil</a></li>
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
    <div class="container">


        <div style="margin-left: 25%; padding: 1px 16px; height: 1000px;">
            <p style="margin-left: 10%; margin-top: 5%; font-size: 28px;"></p>
            <?php
            //session_start();
            // Establish a connection to the database
            include("../PHP/db_connexion.php");
            // Retrieve the user ID from the session
            //$user_id = $_SESSION['user_id'];

            // Run a SELECT query to retrieve the user information
            $sql =  "SELECT ID_UTILL, NOM, PRENOM, LOGIN, MDP, CIN, ADRESSE, E_MAIL, TELE, IMAGE_UTIL FROM utilisateurs WHERE ID_PROFIL = 1 "; //AND ID_UTILL = $user_id
            $result = mysqli_query($conn, $sql); ?>


            <table id="t1">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <th class="tr1" colspan="2">
                            <h1 id="profill"><?php if ($row['IMAGE_UTIL'] == '') {
                                                    echo '<img src="/Img/profil.jpg">';
                                                } else {
                                                    echo '<img src="../inscription/uploads/' . $row['IMAGE_UTIL'] . '">';
                                                }
                                                ?></h1>
                        </th>

                    </tr>
                    <tr>
                        <td class="td1">
                            <label>Nom :</label>

                        </td>

                        <td class="td1">
                            <?php echo $row['NOM']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td1">
                            <label>Prénom :</label>

                        </td>

                        <td class="td1">
                            <?php echo $row['PRENOM']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td1">
                            <label>CIN :</label>
                        </td>
                        <td class="td1">
                            <?php echo $row['CIN']; ?>
                        </td>
                    </tr>


                    <tr>
                        <td class="td1">
                            <label>Email :</label>

                        </td>

                        <td class="td1">
                            <?php echo $row['E_MAIL']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td1">
                            <label>Téléphone :</label>
                        </td>
                        <td class="td1">
                            <?php echo $row['TELE']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td1">
                            <label>Adresse :</label>
                        </td>
                        <td class="td1">
                            <?php echo $row['ADRESSE']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td1">
                            <label>Login :</label>
                        </td>
                        <td class="td1">
                            <?php echo $row['LOGIN']; ?>
                        </td>
                    </tr>




                    <tr>
                        <td colspan="2">
                            <a href="modify_user.php?id_util=<?php echo $row['ID_UTILL']; ?>">
                                <img src="../Img/edit-button.png" alt="Modify User" title="Modifier" style="width: 25px ;height:25px ; position:right">

                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>

        </div>
        <style>
            /* Style the table */
            #t1 {
                border-collapse: collapse;
                width: 100%;
                max-width: 500px;
                margin: 20px auto;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            }

            /* Style the table headings */
            .tr1 {

                color: wheat;
                padding: 10px;
                text-align: left;
                text-transform: uppercase;
            }

            /* Style the table cells */
            .td1 {
                text-align: left;
                border: 1px solid #ddd;
                padding: 11px;
                padding-left: 30px;
                border: none;
            }

            /* Style the user name */
            #profill {
                margin-top: 0;
                font-size: 28px;
                text-align: center;
                text-transform: uppercase;
                margin-bottom: 20px;


            }

            img {
                width: 150px;
                height: 150px;
            }

            /* Style the labels */
            label {
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
            }
        </style>

    </div>


    </div>
</body>

</html>