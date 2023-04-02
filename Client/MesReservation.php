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
        .fa-solid{
            font-size: 15px;

        }
    </style>
     
</head>

<body>
    <header>
        <div class="">
            <h1 style="text-align: left; margin-left: 10px; margin-top:11px ;"> <a href="/Client/index.php">  HoteLUX<span class="orange">.</span></a></h1>
            <nav style="margin-top:35px;">
                <ul>
                    <li><a href="/Client/index.php/#main" >Accueil</a></li>
                    <li><a href="/Client/index.php/#steps">A propos</a></li>
                    <li><a href="/Client/index.php/#possibilities">Services</a></li>
                    <li><a href="/index_contact.php">Contact</a></li>
                    <li><a href="">Réservation</a></li>
                    <li>  <a  href="/Client/gestion_client.php"> <i class="fa-solid fa-user"></i></a></li>
                    

                </ul>
            </nav>
        </div>
    </header>

   


<div class="container">

   <div class="profile">
      <?php 
      $query = "SELECT U.NOM, U.PRENOM, TC.TYPE_CHAMBRE, TA.TYPE_ACTIVITE, R.NBRE_CHAMBRE, R.DATE_D_ENTREE, R.DATE_SORTIE,R.ID_RES
      FROM reservation R
      JOIN utilisateurs U ON R.ID_UTILL = U.ID_UTILL
      JOIN chambre C ON R.ID_CHAMBRE = C.ID_CHAMBRE
      JOIN type_chambre TC ON C.ID_TYPE_CHAMBRE = TC.ID_TYPE_CHAMBRE
      JOIN activite A ON R.ID_ACTIVITE = A.ID_ACTIVITE
      JOIN type_activite TA ON A.ID_TYPE_ACTIVITE = TA.ID_TYPE_ACTIVITE; ";
      $result = mysqli_query($conn, $query);
      
      // Vérification de la requête
      /*if (!$result) {
          echo "Error: " . mysqli_error($mysqli);
          exit;
      }*/
      
      // Récupération des résultats
      if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
      }
      
      if($row['IMAGE_UTIL'] == ''){
        echo '<img src="/Img/default-avatar.png">';
    }else{
        echo '<img src="/PHP/uploads/'.$row['IMAGE_UTIL'].'">';
    }
      
                
               
            ?>
             <h3><?php echo $reservations['LOGIN']; ?></h3>
            <table >
                <tr><th>Type de chambre </th><th>Nombre de chambre</th><th>Activité</th><th>date d'arrivée</th><th>date de depart</th></tr>
                <?php foreach ($reservations as $reservation): ?>
          <tr>
            <td><?php echo $reservation['TYPEC']; ?></td>
            <td><?php echo $reservation['NBRE_CHAMBRE']; ?></td>
            <td><?php echo $reservation['TYPE']; ?></td>
            <td><?php echo $reservation['DATE_D_ENTREE']; ?></td>
            <td><?php echo $reservation['DATE_SORTIE ']; ?></td>
          </tr>
               <?php endforeach; ?>
            </table>
        
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
            <p class="copyright">Copyright © Tous droits réservés.</div>
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
 