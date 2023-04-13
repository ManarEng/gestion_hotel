<?php

session_start();

include '../db_connexion.php';


// Récupérer les données de la session
$user_id = $_SESSION['ID_UTILL'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="/CSS/styles.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"> <!--this one for connexion styles-->
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="/Client/style_profile.css">
    <!--this script is for social medio icons-->
    <script src="https://kit.fontawesome.com/fe1484d902.js" crossorigin="anonymous"></script>

    <title>HoteLUX</title>

    <script src="/JS/scripts.js"></script>
    <style>
        .fa-solid {
            font-size: 15px;

        }
    </style>

</head>

<body>
    <header>
        <div class="">
            <h1 style="text-align: left; margin-left: 10px; margin-top:11px ;"> <a href="/Client/index.php"> HoteLUX<span class="orange">.</span></a></h1>
            <nav style="margin-top:35px;">
                <ul>
                    <li><a href="/Client/index.php/#main">Accueil</a></li>
                    <li><a href="/Client/index.php/#steps">A propos</a></li>
                    <li><a href="/Client/index.php/#possibilities">Services</a></li>
                    <li><a href="/Client/index_contact.php">Contact</a></li>
                    <li><a href="../Client/index_chambres_activites.php">Réservation</a></li>
                    <li> <a href="/Client/gestion_client.php"> <i class="fa-solid fa-user"></i></a></li>


                </ul>
            </nav>
        </div>
    </header>




    <div class="container">

        <div class="profile">
            <?php
            $query =  "SELECT U.NOM,U.IMAGE_UTIL,U.LOGIN ,U.PRENOM, TC.TYPE_CHAMBRE, TA.TYPE_ACTIVITE, R.NBRE_CHAMBRE, R.DATE_D_ENTREE, R.DATE_SORTIE,R.ID_RES ,C.PRIX
      FROM reservation R
      JOIN utilisateurs U ON R.ID_UTILL = U.ID_UTILL
      JOIN chambre C ON R.ID_CHAMBRE = C.ID_CHAMBRE
      JOIN type_chambre TC ON C.ID_TYPE_CHAMBRE = TC.ID_TYPE_CHAMBRE
      JOIN type_activite TA ON R.ID_TYPE_ACTIVITE = TA.ID_TYPE_ACTIVITE
      WHERE R.ID_UTILL = '$user_id'; ";

            $result = mysqli_query($conn, $query);

            // Vérification de la requête
            /*if (!$result) {
          echo "Error: " . mysqli_error($mysqli);
          exit;
      }*/
            /* $row = 0; 
      // Récupération des résultats
      if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
      }
   */
            $select = mysqli_query($conn, "SELECT * FROM `utilisateurs` WHERE ID_UTILL = '$user_id'") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
                $fetch = mysqli_fetch_assoc($select);
            }
            if ($fetch['IMAGE_UTIL'] == '') {
                echo '<img src="/Img/default-avatar.png">';
            } else {
                echo '<img src="/PHP/uploads/' . $fetch['IMAGE_UTIL'] . '">';
            }


            ?>
            <h3><?php echo $fetch['LOGIN']; ?></h3>
            <table>
                <thead>
                    <tr>
                        <th>Type de chambre</th>
                        <th>Prix de chambre (DH)</th>
                        <th>Nombre de chambre</th>
                        <th>Activité</th>
                        <th>Date d'arrivée</th>
                        <th>Date de départ</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?php echo $row['TYPE_CHAMBRE']; ?></td>
                            <td><?php echo $row['PRIX']; ?></td>
                            <td><?php echo $row['NBRE_CHAMBRE']; ?></td>
                            <td><?php if ($row['TYPE_ACTIVITE'] == 100) {
                                    echo "sans actvite";
                                } else {
                                    echo $row['TYPE_ACTIVITE'];
                                } ?></td>
                            <td><?php echo $row['DATE_D_ENTREE']; ?></td>
                            <td><?php echo $row['DATE_SORTIE']; ?></td>
                            <td>
                                <a href="modifier_res.php?ID_RES=<?php echo $row['ID_RES']; ?>" title="Modifier"><img src="../Img/icons8-modify-50.png" alt="Modifier" style="width: 25px ;height:25px " /></a>

                            </td>
                            <td>
                                <a href="supprimer_res.php?ID_RES=<?php echo $row['ID_RES']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette reservation ?')" title="Supprimer"><img src="../Img/icons8-delete-trash-50.png" alt="Supprimer" style="width: 25px ;height:25px " /></a>
                            </td>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="../Client/gestion_client.php" class="back-btn"><i style="font-size:larger" class="fas fa-arrow-left"></i> </a>

        </div>

    </div>
    <footer>
        <div class="col-right">
            <h3>Contact Info</h3>
            <p>06 10 30 40 56</p>
            <p>05 10 30 40 56</p>
            <p>hotelux@gmail.com</p>
        </div>

        <div>
            <h1> <a href="/Client/index.php">HoteLUX<span class="orange">.</span></a></h1>
            <p class="copyright">Copyright © Tous droits réservés.
        </div>
        </p>
        </div>

        <div class="col-left">
            <h3>Contact Info</h3>
            <p>123,XYZ Road, BSK 3 <br>Banglore, Karnataka, IN</p>
            <div class="social-icons">
                <i class="fa-brands fa-facebook" onclick="facebook()"></i>
                <i class="fa-brands fa-twitter" onclick="twitter()"></i>
                <i class="fa-brands fa-instagram" onclick="instagram()"></i>


            </div>
        </div>
    </footer>
</body>

</html>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin: 30px 0;
    }

    th,
    td {
        text-align: center;
        padding: 10px;
    }

    th {
        background-color: #FFA500;
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    .profile table td:first-child {
        font-weight: bold;
        width: 10%;
    }
</style>