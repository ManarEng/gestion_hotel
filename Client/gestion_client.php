<?php

include 'db_connexion.php';
session_start();
$user_id = $_SESSION['id_util'];

if(!isset($user_id)){
   header('location:/index.html');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:/index.html');
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
            <a href="modifier_profil.php" class="btn">Mon profile</a>
            <a href="" class="btn">Mes réservations</a>
            <a href="gestion_client.php?logout=<?php echo $user_id; ?>" class="delete-btn">Déconnexion</a>
            <!--<p>new <a href="login.php">login</a> or <a href="register.php">register</a></p>-->
   </div>

</div>


  
   

<!--    <section id="contact">
        <div class="wrapper">
            <h3>Contactez-nous</h3>
            <p>Chez HoteLUX nous savons que héberger est une aventure humaine mais également un engagement financier
                important pour vous. C'est pourquoi nous mettons un point d'honneur à prendre en compte chacune de vos
                attentes pour vous aider dans la préparation de votre séjour sur mesure.</p>

            <form>
                <label for="name">Nom</label>
                <input type="text" id="name" placeholder="Votre nom">
                <label for="email">Email</label>
                <input type="text" id="email" placeholder="Votre email"><br><BR>
                <label for="objet">Objet</label>
                <!--<input type="TEXTAREA" id="obj" placeholder="Votre message" style="size: ;"> 

                <textarea name="" id="obj"  placeholder="Votre message" ></textarea>

                <input type="submit" value="OK" class="button-3">
            </form>
        </div>
    </section> -->

  



    



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


