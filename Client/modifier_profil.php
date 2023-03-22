<?php

include 'db_connexion.php';
session_start();
$user_id = $_SESSION['id_util'];


if(isset($_POST['update_profile'])){

   $update_nom = mysqli_real_escape_string($conn, $_POST['update_nom']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_prenom = mysqli_real_escape_string($conn, $_POST['update_prenom']);
   $update_tele = mysqli_real_escape_string($conn, $_POST['update_tele']);
   $update_username = mysqli_real_escape_string($conn, $_POST['update_username']);
   $update_cin = mysqli_real_escape_string($conn, $_POST['update_cin']);
   $update_adresse = mysqli_real_escape_string($conn, $_POST['update_adresse']);

   mysqli_query($conn, "UPDATE `utilisateurs` SET nom = '$update_nom', email = '$update_email', prenom ='$update_prenom', telephone='$update_tele', nom_util='$update_username', cin='$update_cin', adresse='$update_adresse' WHERE id_util = '$user_id'") or die('query failed');

   





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
         mysqli_query($conn, "UPDATE `utilisateurs` SET mdp = '$confirm_pass' WHERE id_util = '$user_id'") or die('query failed');
         $message[] = 'Mise à jour avec succés!';
      }
   }
   else{
      $message[] = 'Mise à jour avec succés!';
   }

   /*$update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = '/PHP/uploads_inscription/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'Image est trop large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `utilisateurs` SET photo = '$update_image' WHERE id_util = '$user_id'") or die('query failed');
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
      $select = mysqli_query($conn, "SELECT * FROM `utilisateurs` WHERE id_util = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['photo'] == ''){
            echo '<img src="/Img/default-avatar.png">';
         }else{
            echo '<img src="/Client/uploaded_img/'.$fetch['photo'].'">';
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
            <input type="text" name="update_prenom" value="<?php echo $fetch['prenom']; ?>" class="box">

            <span>Email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">


            <span>Nom d'utilisateur :</span>
            <input type="text" name="update_username" value="<?php echo $fetch['nom_util']; ?>" class="box">

            <span>CIN :</span>
            <input type="text" name="update_cin" value="<?php echo $fetch['cin']; ?>" class="box">

            <span>Adresse:</span>
            <input type="text" name="update_adresse" value="<?php echo $fetch['adresse']; ?>" class="box">
           
            <span>Modifier votre photo:</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <span>Nom:</span>
            <input type="text" name="update_nom" value="<?php echo $fetch['nom']; ?>" class="box">

            <span>Téléphone:</span>
            <input type="text" name="update_tele" value="<?php echo $fetch['telephone']; ?>" class="box">


            <input type="hidden" name="old_pass" value="<?php echo $fetch['mdp']; ?>">
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