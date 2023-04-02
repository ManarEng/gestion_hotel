<?php

include 'db_connexion.php';
session_start();
$user_id = $_SESSION['ID_UTILL'];


if(isset($_POST['update_profile'])){

   $update_nom = mysqli_real_escape_string($conn, $_POST['update_nom']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_prenom = mysqli_real_escape_string($conn, $_POST['update_prenom']);
   $update_tele = mysqli_real_escape_string($conn, $_POST['update_tele']);
   $update_username = mysqli_real_escape_string($conn, $_POST['update_username']);
   $update_cin = mysqli_real_escape_string($conn, $_POST['update_cin']);
   $update_adresse = mysqli_real_escape_string($conn, $_POST['update_adresse']);

   mysqli_query($conn, "UPDATE `utilisateurs` SET NOM = '$update_nom', EMAIL = '$update_email', PRENOM ='$update_prenom', TELE='$update_tele', LOGIN ='$update_username', CIN='$update_cin', ADRESSE='$update_adresse' WHERE ID_UTILL = '$user_id'") or die('query failed');

   





   $old_pass = $_POST['old_pass'];
   
   
   $update_pass = mysqli_real_escape_string($conn, $_POST['update_pass']);
   $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
   $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);

  if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass))
   {
      if($update_pass != $old_pass){
         $message[] = 'Ancien mot de passe ne correspond pas!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'Mot de passe de confirmation ne correspond pas!';
      }else{
         mysqli_query($conn, "UPDATE `utilisateurs` SET MDP = '$confirm_pass' WHERE ID_UTILL = '$user_id'") or die('query failed');
         $message[] = 'Mise à jour avec succés!';
      }
   }
   else{
      $message[] = 'Mise à jour avec succés!';
   }

   $file = $_FILES['pic'];
   $allowed_extensions = ['jpg', 'jpeg', 'png'];
   $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
   // Store the image in the upload directory
   $upload_dir = 'C:\Users\PC\Downloads\PFE\pfe\PHP\uploads\\';
   $filename = uniqid("IMG-", true) . '.' . $file_extension;
   $upload_path = $upload_dir . $filename;
   // Check if file is an image
   if (!empty($file)) {
     
      if (!in_array($file_extension, $allowed_extensions)) {
         $message[] = "Télécharger une image valide.";
      }else{
      // Store the URL in the database
      $url =  $filename;
      $image_update_query = mysqli_query($conn, "UPDATE `utilisateurs` SET IMAGE_UTIL = '$url' WHERE ID_UTILL = '$user_id'") or die('query failed');
      
      if($image_update_query){
         move_uploaded_file($file['tmp_name'], $upload_path);
      }
   }
  }  
      
      
 




/* $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = '/PHP/uploads/'.$update_image;

  if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'Image est trop large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `utilisateurs` SET photo = '$url' WHERE id_util = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'Mise à jour de la photo avec succés!';
      }
   }*/

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

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `utilisateurs` WHERE ID_UTILL = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
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
            <span>Prénom :</span>
            <input type="text" name="update_prenom" value="<?php echo $fetch['PRENOM']; ?>" class="box">

            <span>Email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['EMAIL']; ?>" class="box">


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