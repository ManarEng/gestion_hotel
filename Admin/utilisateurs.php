<?php
session_start();
$id = $_SESSION['ID_UTILL'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
</head>

<body>


<?php
include("../PHP/header.php")
?>
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
    <div style="margin-left: 23%; padding: 1px 16px; height: 1000px;">
        <p style="margin-left: 10%; margin-top: 3%; font-size: 28px;"></p>

        <div class="container">
            <?php
            include("../db_connexion.php");
            $sql = "SELECT ID_UTILL, ID_PROFIL, NOM, PRENOM, LOGIN, MDP, CIN, ADRESSE, E_MAIL, TELE, IMAGE_UTIL FROM utilisateurs where ID_PROFIL=2";
            $result = mysqli_query($conn, $sql);
            ?>
            <h2 class="title"> Agents : </h2>

            <a href="add_util_Agent.php" title="Nouveau Agent"><img src="../Img/icons8-add-new-50.png" alt="Ajouter un utilisateur" style="width: 25px; height: 25px;"></a>
            <table class="styled-table">


                <thead>



                    <tr>

                        <td>Nom</td>
                        <td>Prenom</td>
                        <td>Nom d'utilisateur</td>

                        <td>CIN</td>
                        <td>Adresse</td>
                        <td>Email</td>
                        <td>Téléphone</td>

                        <td>Photo</td>
                        <td></td>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>

                            <td><?php echo $row['NOM']; ?></td>
                            <td><?php echo $row['PRENOM']; ?></td>
                            <td><?php echo $row['LOGIN']; ?></td>

                            <td><?php echo $row['CIN']; ?></td>
                            <td><?php echo $row['ADRESSE']; ?></td>
                            <td><?php echo $row['E_MAIL']; ?></td>
                            <td><?php echo $row['TELE']; ?></td>
                            <td><?php if ($row['IMAGE_UTIL'] == '') {
                                    echo '<img src="../Img/default-avatar.png">';
                                } else {
                                    echo '<img src="../PHP/uploads/' . $row['IMAGE_UTIL'] . '">';
                                }
                                ?></td>


                            <script>
                                function confirmDelete() {
                                    var result = confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");
                                    if (result) {
                                        // If the user confirms, redirect to the PHP script to delete the row
                                        window.location.href = "delete.php?id_util=<?php echo $id_util; ?>";
                                    }
                                }
                            </script>
                            <td>
                                <div style="display: flex; ">
                                    <a href="modify_util.php?id_util=<?php echo $row['ID_UTILL']; ?>" title="Modifier"><img src="../Img/icons8-modify-50.png" alt="Modifier" style="width: 25px ;height:25px " /></a>
                                    <a href="delete_user.php?id_util=<?php echo $row['ID_UTILL']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')" title="Supprimer"><img src="../Img/icons8-delete-trash-50.png" alt="Supprimer" style="width: 25px ;height:25px " /></a>
                                </div>
                            </td>


                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        <br>
        <div class="container">
            <?php
            include("../db_connexion.php");
            $sql = "SELECT ID_UTILL, ID_PROFIL, NOM, PRENOM, LOGIN, MDP, CIN, ADRESSE, E_MAIL, TELE, IMAGE_UTIL FROM utilisateurs where ID_PROFIL=3";
            $result = mysqli_query($conn, $sql);
            ?>
            <h2 class="title"> Clients : </h2>
            <div id="ancre">
                <a href="add_util_client.php" title="Nouveau Client"><img src="../Img/icons8-add-new-50.png" alt="Ajouter un utilisateur" style="width: 25px; height: 25px;"></a>
                <table class="styled-table">


                    <thead>



                        <tr>

                            <td>Nom</td>
                            <td>Prenom</td>
                            <td>Nom d'utilisateur</td>

                            <td>CIN</td>
                            <td>Adresse</td>
                            <td>Email</td>
                            <td>Téléphone</td>

                            <td>Photo</td>
                            <td></td>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>

                                <td><?php echo $row['NOM']; ?></td>
                                <td><?php echo $row['PRENOM']; ?></td>
                                <td><?php echo $row['LOGIN']; ?></td>

                                <td><?php echo $row['CIN']; ?></td>
                                <td><?php echo $row['ADRESSE']; ?></td>
                                <td><?php echo $row['E_MAIL']; ?></td>
                                <td><?php echo $row['TELE']; ?></td>
                                <td><?php if ($row['IMAGE_UTIL'] == '') {
                                        echo '<img src="/Img/default-avatar.png">';
                                    } else {
                                        echo '<img src="../PHP/uploads/' . $row['IMAGE_UTIL'] . '">';
                                    }
                                    ?></td>


                                <script>
                                    function confirmDelete() {
                                        var result = confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");
                                        if (result) {
                                            // If the user confirms, redirect to the PHP script to delete the row
                                            window.location.href = "delete.php?id_util=<?php echo $id_util; ?>";
                                        }
                                    }
                                </script>
                                <td>
                                    <div style="display: flex; ">
                                        <a href="modify_util.php?id_util=<?php echo $row['ID_UTILL']; ?>" title="Modifier"><img src="../Img/icons8-modify-50.png" alt="Modifier" style="width: 25px ;height:25px " /></a>
                                        <a href="delete_user.php?id_util=<?php echo $row['ID_UTILL']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')" title="Supprimer"><img src="../Img/icons8-delete-trash-50.png" alt="Supprimer" style="width: 25px ;height:25px " /></a>
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
                margin-left: auto;
                max-width: 1000px;
                padding: 10px;
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
                font-size: 1.2em;
                font-family: sans-serif;
                width: 100%;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }

            .styled-table thead tr {
                background-color: grey;
                color: #ffffff;
                text-align: left;
                font-size: 0.9em;
            }

            .styled-table th,
            .styled-table td {
                padding: 8px 10px;
            }

            .styled-table tbody tr {
                border-bottom: 1px solid #dddddd;
                font-size: 0.9em;
            }

            .styled-table tbody tr:nth-of-type(even) {
                background-color: #f3f3f3;
            }

            .styled-table tbody tr:last-of-type {
                border-bottom: 2px solid #009879;
            }

            .styled-table tbody td {
                font-size: 0.9em;
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
                margin-left: 5px;
            }

            img {
                width: 50px;
                height: 50px;
            }
        </style>

    </div>
</body>

</html>