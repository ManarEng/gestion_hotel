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
        $sql = "SELECT  ID_CHAMBRE,  DESCRIPTION, ETAT, PRIX,IMAGE_CH, ID_TYPE_CHAMBRE FROM chambre ;";

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

                            <td><?php if ($row['ID_TYPE_CHAMBRE'] == 1) {
                                    echo "Individuelle";
                                } elseif ($row['ID_TYPE_CHAMBRE'] == 2) {
                                    echo "Double";
                                } elseif ($row['ID_TYPE_CHAMBRE'] == 3) {
                                    echo "Triple";
                                }
                                ?></td>
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
                                    echo '<img src="../Img/image_chambres/default_room.png">';
                                } else {
                                    echo '<img src="/Img/image_chambres/' . $row['IMAGE_CH'] . '">';
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