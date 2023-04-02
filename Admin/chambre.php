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
            <td id="td1" style="padding: 10px; font-size: 48px;"><a href="index_admin.php" style="text-decoration: none; color:inherit"><b> HoteLUX</b></a><span style="color: #ffa500;">.</span></td>
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
        <li><a href="res_admin.php"> Résérvations</a></li>
        <li><a href="messagerie.php">Messagerie</a></li>
        <li><a href="deconnexion.php">Déconnexion</a></li>
    </ul>
    <div>
        <?php
        include("../PHP/db_connexion.php");
        $query = "SELECT NOM,PRENOM FROM utilisateurs where ID_PROFIL=1;";
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
            include("../PHP/db_connexion.php");
            $sql = "SELECT  ID_CHAMBRE, TYPE, DESCRIPTION, ETAT, PRIX,IMAGE_CH FROM chambre ;";
            $result = mysqli_query($conn, $sql);
            ?>

            <div class="container">
                <h2 class="title"> Chambres : </h2>

                <a href="add_room.php" class="add-icon" title="Nouvelle chambre"><img src="../Img/icons8-add-new-50.png" alt="Ajouter une chambre" style="width: 25px; height: 25px;"></a>
                <table class="styled-table">
                    <thead>



                        <tr>

                            <td>Type</td>
                            <td>Description</td>
                            <td>Disponibilité</td>
                            <td>Prix (Dhs)</td>
                            <td>Photo</td>

                            <td></td>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            $message = htmlspecialchars($row['DESCRIPTION']); ?>
                            <tr>

                                <td><?php echo $row['TYPE']; ?></td>
                                <?php
                                $message = htmlspecialchars($row['DESCRIPTION']);
                                if (strlen($message) > 20) {
                                    $messageShort = substr($message, 0, 20) . '...';
                                    echo "<td onclick=\"this.innerHTML = '" . $message . "';\"><span title='" . $message . "'>" . $messageShort . "</span></td>";
                                } else {
                                    echo "<td onclick=\"\"><span title='" . $message . "'>" . $message . "</span></td>";
                                }
                                ?>


                                <td><?php echo $row['ETAT']; ?></td>
                                <td><?php echo $row['PRIX']; ?></td>
                                <td><?php if ($row['IMAGE_CH'] == '') {
                                        echo '<img src="../Img/default_room.png">';
                                    } else {
                                        echo '<img src="/Admin/rooms/' . $row['IMAGE_CH'] . '">';
                                    }
                                    ?></td>


                                <script>
                                    function confirmDelete() {
                                        var result = confirm("Êtes-vous sûr de vouloir supprimer cette chambre ?");
                                        if (result) {
                                            // If the user confirms, redirect to the PHP script to delete the row
                                            window.location.href = "delete.php?id_chambre=<?php echo $id_chambre; ?>";
                                        }
                                    }
                                </script>
                                <td>
                                    <div style="display: flex; ">
                                        <a href="modify_room.php?id_chambre=<?php echo $row['ID_CHAMBRE']; ?>" title="Modifier"><img src="../Img/icons8-modify-50.png" alt="Modifier" style="width: 25px ;height:25px " /></a>
                                        <a href="delete_room.php?id_chambre=<?php echo $row['ID_CHAMBRE']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre ?')" title="Supprimer"><img src="../Img/icons8-delete-trash-50.png" alt="Supprimer" style="width: 25px ;height:25px " /></a>
                                    </div>
                                </td>


                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
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