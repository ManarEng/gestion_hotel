<?php

session_set_cookie_params(0);

session_start();
include("../db_connexion.php");
$user_id = $_SESSION['ID_UTILL'];
$isSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   

    $update_nom = mysqli_real_escape_string($conn, $_POST['update_nom']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_prenom = mysqli_real_escape_string($conn, $_POST['update_prenom']);
   $update_tele = mysqli_real_escape_string($conn, $_POST['update_tele']);
  // $update_username = mysqli_real_escape_string($conn, $_POST['update_username']);
   $update_cin = mysqli_real_escape_string($conn, $_POST['update_cin']);
   $update_adresse = mysqli_real_escape_string($conn, $_POST['update_adresse']);


    $isSuccess = true;

    if (!ctype_alpha($update_prenom)) {
      $message[] = "Le prénom doit être une chaîne de caractères alphabétiques.";
        $isSuccess = false;
    }

    if (!ctype_alpha($update_nom)) {
      $message[]= "Le nom doit être une chaîne de caractères alphabétiques.";
        $isSuccess = false;
    }

    if (!filter_var($update_email, FILTER_VALIDATE_EMAIL)) {
      $message[] = "L'email doit être une adresse email valide.";
        $isSuccess = false;
    }

    if (!preg_match("/^[+]?[1-9][0-9]{9,14}$/", $update_tele)) {
      $message[] = "Le numéro de téléphone doit être au format international.";
        $isSuccess = false; //pas necess qu'il commence par +
    }


    $old_pass = $_POST['old_pass'];


    $update_pass = mysqli_real_escape_string($conn, $_POST['update_pass']);
    $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);
 
    if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
       if ($update_pass != $old_pass) {
          $message[] = 'Ancien mot de passe ne correspond pas!';
          $isSuccess=false;
       } if ($new_pass != $confirm_pass) {
          $message[] = 'Mot de passe de confirmation ne correspond pas!';
          $isSuccess=false;

       } else {
          mysqli_query($conn, "UPDATE `utilisateurs` SET MDP = '$confirm_pass' WHERE ID_UTILL = '$user_id'") or die('query failed');
          $isSuccess=true;
       }
    } 
    
    
   

    
    // Check if file is an image
    if (isset($_FILES['pic']) && $_FILES['pic']['error'] == UPLOAD_ERR_OK) {
        $file = $_FILES['pic'];
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
         $isSuccess=false;
         $message[] = "Télécharger une image valide.";
            $url = "";
        } else {
            // Store the image in the upload directory
            $upload_dir = '../PHP/uploads/';
            $filename = uniqid("IMG-", true) . '.' . $file_extension;
            $upload_path = $upload_dir . $filename;
            move_uploaded_file($file['tmp_name'], $upload_path);

            // Store the URL in the database
            $url =  $filename;

            $image_update_query = mysqli_query($conn, "UPDATE `utilisateurs` SET IMAGE_UTIL = '$url' WHERE ID_UTILL = '$user_id'") or die('query failed');

            if ($image_update_query) {
               move_uploaded_file($file['tmp_name'], $upload_path);
            }
            $isSuccess=true;
        }
    } else {
        $url = "";
    }
}
if ($isSuccess) {

    mysqli_query($conn, "UPDATE `utilisateurs` SET NOM = '$update_nom', E_MAIL = '$update_email', PRENOM ='$update_prenom', TELE='$update_tele', CIN='$update_cin', ADRESSE='$update_adresse' WHERE ID_UTILL = '$user_id'") or die('query failed');

   
      echo "<script> alert ('Mise à jour avec succés!'); </script>";
    
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
                    <li><a href="/Client/index_contact.php">Contact</a></li>
                    <li><a href="/PHP/lien_reservation_header.php">Réservation</a></li>
                    <li><a href="/Client/gestion_client.php"> <i class="fa-solid fa-user"></i></a></li>
                    

                </ul>
            </nav>
        </div>
    </header>
   

    <div class="update-profile">

<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
   <?php
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

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '<div class="message">' . $message . '</div>';
      }
   }
   ?>
   <div class="flex">
      <div class="inputBox">
         <span>Prénom :</span>
         <input type="text" name="update_prenom" value="<?php echo $fetch['PRENOM']; ?>" class="box" required>

         <span>Email :</span>
         <input type="email" name="update_email" value="<?php echo $fetch['E_MAIL']; ?>" class="box" required>


         <!--<span>Nom d'utilisateur :</span>
         <input type="text" name="update_username" value="<?php /*echo $fetch['LOGIN'];*/ ?>" class="box" readonly>-->

         <span>CIN :</span>
         <input type="text" name="update_cin" value="<?php echo $fetch['CIN']; ?>" class="box" required>

         <span>Adresse:</span>
         <input type="text" name="update_adresse" value="<?php echo $fetch['ADRESSE']; ?>" class="box" required>

         <span>Modifier votre photo:</span>
         <input type="file" id="pic" name="pic" class="box">
      </div>
      <div class="inputBox">
         <span>Nom:</span>
         <input type="text" name="update_nom" value="<?php echo $fetch['NOM']; ?>" class="box" required>

         <span>Téléphone:</span>
         <input type="text" name="update_tele" value="<?php echo $fetch['TELE']; ?>" class="box" required>


         <input type="hidden" name="old_pass" value="<?php echo $fetch['MDP']; ?>" >
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








