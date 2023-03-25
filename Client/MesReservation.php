<?php
/*
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['ID_UTILL'])) {
    // Rediriger l'utilisateur vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: /index.html');
    exit;
}*/

// Connexion à la base de données avec mysqli
$conn= mysqli_connect("localhost", "root", "", "hotelux");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

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
      $query = "SELECT u.NOM, u.PRENOM,  r.NBRE_CHAMBRE, c.TYPEC, a.TYPE, r.DATE_D_ENTREE, r.DATE_SORTIE 
      FROM UTILISATEURS u
      JOIN RESERVATION r ON u.ID_UTILL = r.ID_UTILL
      JOIN CHAMBRE c ON r.ID_RES = c.ID_RES
      JOIN CONTENIR ca ON r.ID_RES = ca.ID_RES
      JOIN ACTIVITE a ON ca.ID_ACTIVITE = a.ID_ACTIVITE; ";
      $result = mysqli_query($conn, $query);
      
      // Vérification de la requête
      if (!$result) {
          echo "Error: " . mysqli_error($mysqli);
          exit;
      }
      
      // Récupération des résultats
      $reservations = array();
      while ($row = mysqli_fetch_assoc($result)) {
          $reservations[] = $row;
      }
      ?>
       <?php
                $select = mysqli_query($conn, "SELECT * FROM `utilisateurs` WHERE ID_UTILL = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                }
                if($reservations['IMAGE_UTIL'] == ''){
                    echo '<img src="/Img/default-avatar.png">';
                }else{
                    echo '<img src="/PHP/uploads/'.$reservations['IMAGE_UTIL'].'">';
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
 