<?php

// ...

// Vérifier si le formulaire de modification a été soumis
if (isset($_POST['modifier'])) {
  // Récupérer les données soumises
  $id_res = $_POST['ID_RES'];
  $nbre_chambre = $_POST['NBRE_CHAMBRE'];
  $date_d_entree = $_POST['DATE_D_ENTREE'];
  $date_sortie = $_POST['DATE_SORTIE'];
  $id_type_activite = $_POST['ID_TYPE_ACTIVITE'];
  // Mettre à jour la réservation dans la base de données
  $query = "UPDATE reservation SET NBRE_CHAMBRE = '$nbre_chambre', DATE_D_ENTREE = '$date_d_entree', DATE_SORTIE = '$date_sortie', ID_TYPE_ACTIVITE = '$id_type_activite' WHERE ID_RES = '$id_res';";
  mysqli_query($conn, $query);
  // Rediriger l'utilisateur vers la page de profil
  header("Location: /Client/profile.php");
  exit();
}


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
            <h1 style="text-align: left; margin-left: 10px; margin-top:11px ;">  <a href="/Client/index.php"> HoteLUX<span class="orange">.</span></a></h1>
            <nav style="margin-top:35px;">
                <ul>
                    <li><a href="/Client/index.php/#main" >Accueil</a></li>
                    <li><a href="/Client/index.php/#steps">A propos</a></li>
                    <li><a href="/Client/index.php/#possibilities">Services</a></li>
                    <li><a href="/PHP/index_contact.php">Contact</a></li>
                    <li><a href="">Réservation</a></li>
                    <li><a href="/Client/gestion_client.php"> <i class="fa-solid fa-user"></i></a></li>
                    

                </ul>
            </nav>
        </div>
    </header>
   
<div class="update-profile">

   <form action="" method="post" enctype="multipart/form-data">
      <?php
      // Vérifier si l'utilisateur a cliqué sur le bouton "modifier"
if (isset($_POST['modifier'])) {
    // Récupérer l'identifiant de la réservation à modifier
    $id_res = $_POST['id_res'];
    // Récupérer les données de la réservation à modifier
    $query = "SELECT R.NBRE_CHAMBRE, R.DATE_D_ENTREE, R.DATE_SORTIE, R.ID_TYPE_ACTIVITE, TC.TYPE_CHAMBRE, TA.TYPE_ACTIVITE FROM reservation R JOIN chambre C ON R.ID_CHAMBRE = C.ID_CHAMBRE JOIN type_chambre TC ON C.ID_TYPE_CHAMBRE = TC.ID_TYPE_CHAMBRE JOIN type_activite TA ON R.ID_TYPE_ACTIVITE = TA.ID_TYPE_ACTIVITE WHERE R.ID_RES = '$id_res';";
    $result = mysqli_query($conn, $query);
     $fetch = mysqli_fetch_assoc($result);}
         if($fetch['IMAGE_UTIL'] == ''){
            echo '<img src="/Img/default-avatar.png">';
         }
         else{
            echo '<img src="/PHP/uploads/'.$fetch['IMAGE_UTIL'].'">';
         }

         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>Type de chambre</span>
            <input type="text" name="update_prenom" value="<?php echo $fetch['TYPE_CHAMBRE']; ?>" class="box">

            <span>Email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['E_ MAIL']; ?>" class="box">


            <span>Nom d'utilisateur :</span>
            <input type="text" name="update_username" value="<?php echo $fetch['LOGIN']; ?>" class="box">

            <span>CIN :</span>
            <input type="text" name="update_cin" value="<?php echo $fetch['CIN']; ?>" class="box">

            <span>Adresse:</span>
            <input type="text" name="update_adresse" value="<?php echo $fetch['ADRESSE']; ?>" class="box">
           
            <span>Modifier votre photo:</span>
            <input type="file" id="pic" name="pic" class="box">
         </div>
         <div class="inputBox">
            <span>Nom:</span>
            <input type="text" name="update_nom" value="<?php echo $fetch['NOM']; ?>" class="box">

            <span>Téléphone:</span>
            <input type="text" name="update_tele" value="<?php echo $fetch['TELE']; ?>" class="box">


            <input type="hidden" name="old_pass" value="<?php echo $fetch['MDP']; ?>">
            <span>Ancien mot de passe :</span>
            <input type="password" name="update_pass" class="box">
            <span>Nouveau mot de passe :</span>
            <input type="password" name="new_pass" class="box">
            <span>Confirmer votre mot de passe :</span>
            <input type="password" name="confirm_pass" class="box">
         </div>
      </div>
      <input type="submit" value="Modifier Profil" name="update_profile" class="btn">
      <a href="gestion_client.php" class="delete-btn">Retourner</a>
   </form>

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