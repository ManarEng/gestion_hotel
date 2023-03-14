<?php

include 'db_connexion.php';
session_start();
$user_id = $_SESSION['id_util'];

if(!isset($user_id)){
   header('location:/PHP/form_connexion.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:/PHP/form_connexion.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pofile</title>

   <a href="/PHP/form_connexion.php"></a>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style_profile.css">

</head>
<body>
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `utilisateurs` WHERE id_util = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['photo'] == ''){
            echo '<img src="/Img/default-avatar.png">';
         }else{
            echo '<img src="/Client/uploaded_img/'.$fetch['photo'].'">';
         }
      ?>
      <h3><?php echo $fetch['nom_util']; ?></h3> 
      <a href="update_profile.php" class="btn">Mon profile</a>
      <a href="" class="btn">Mes réservations</a>
      <a href="gestion_client.php?logout=<?php echo $user_id; ?>" class="delete-btn">Déconnexion</a>
      <!--<p>new <a href="login.php">login</a> or <a href="register.php">register</a></p>-->
   </div>

</div>

</body>
</html>