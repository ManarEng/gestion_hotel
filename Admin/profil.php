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
<div class="container">


    <div style="margin-left: 25%; padding: 1px 16px; height: 1000px;">
        <p style="margin-left: 10%; margin-top: 5%; font-size: 28px;"></p>
        <?php

        // Establish a connection to the database
        include("../db_connexion.php");
        // Retrieve the user ID from the session


        // Run a SELECT query to retrieve the user information
        $sql =  "SELECT ID_UTILL, NOM, PRENOM, LOGIN, MDP, CIN, ADRESSE, E_MAIL, TELE, IMAGE_UTIL FROM utilisateurs WHERE ID_PROFIL = 1 AND ID_UTILL = $id";
        $result = mysqli_query($conn, $sql); ?>


        <table id="t1">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <th class="tr1" colspan="2">
                        <h1 id="profill"><?php if ($row['IMAGE_UTIL'] == '') {
                                                echo '<img src="/Img/default-avatar.png">';
                                            } else {
                                                echo '<img src="../PHP/uploads/' . $row['IMAGE_UTIL'] . '">';
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