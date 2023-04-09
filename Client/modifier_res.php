<?php
$error=$activite=$chambre='';
$arrivee=$depart="";
// Check if user ID is provided in the query string
if (isset($_GET['ID_RES'])) {
    $id_res = $_GET['ID_RES'];
    // Connect to the database
    
    include("../db_connexion.php");
   
    // Retrieve user information from the database
    $query = "SELECT U.NOM,U.IMAGE_UTIL,U.LOGIN ,U.PRENOM, TC.TYPE_CHAMBRE, TA.TYPE_ACTIVITE, R.NBRE_CHAMBRE, R.DATE_D_ENTREE, R.DATE_SORTIE,R.ID_RES ,TC.ID_TYPE_CHAMBRE ,TA.ID_TYPE_ACTIVITE
    FROM reservation R
    JOIN utilisateurs U ON R.ID_UTILL = U.ID_UTILL
    JOIN chambre C ON R.ID_CHAMBRE = C.ID_CHAMBRE
    JOIN type_chambre TC ON C.ID_TYPE_CHAMBRE = TC.ID_TYPE_CHAMBRE
    JOIN type_activite TA ON R.ID_TYPE_ACTIVITE = TA.ID_TYPE_ACTIVITE where ID_RES= '$id_res'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
      // Close database connection
      mysqli_close($conn);
    
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
    
    

    <form action="nv_res.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ID_RES" value="<?php echo $row['ID_RES']; ?>" />
    
    
      <H1 style="font-size: 40px; color:black"> Modifier votre reservation <span style="color:#ff7a00"> :</span> </h1>
      <div class="flex">
      
         <div class="inputBox">
         
            <span>Type de chambre </span>
            <select name="type_chambre" id="type_chambre" class="box">
                    <option value="<?php if ($row['ID_TYPE_CHAMBRE'] == 1) {
                                        echo "Individuelle";
                                    } elseif ($row['ID_TYPE_CHAMBRE'] == 2) {
                                        echo "double";
                                    } elseif ($row['ID_TYPE_CHAMBRE'] == 3) {
                                        echo "Triple";
                                    } ?>"><?php if ($row['ID_TYPE_CHAMBRE'] == 1) {
                                        echo "Individuelle";
                                    } elseif ($row['ID_TYPE_CHAMBRE'] == 2) {
                                        echo "double";
                                    } elseif ($row['ID_TYPE_CHAMBRE'] == 3) {
                                        echo "Triple";
                                    } ?></option>
                    <option >individuelle</option>
                                    <option >double</option>
                                    <option >triple</option>

                </select>
            <span>Date d'arrivée</span>
            <input type="date" id="arrivee" name="arrivee" class="box" required min="<?php echo date('Y-m-d'); ?>" value="<?php echo $row['DATE_D_ENTREE']; ?>">
            <span>Activite</span>
            <select id='activite' name='activite' class="box" >
            <option value="<?php if ($row['ID_TYPE_ACTIVITE'] == 1) {
                                        echo "Piscine";
                                    } elseif ($row['ID_TYPE_ACTIVITE'] == 2) {
                                        echo "Restaurant";
                                    } elseif ($row['ID_TYPE_ACTIVITE'] == 3) {
                                        echo "Spa";
                                    }elseif( $row['ID_TYPE_ACTIVITE'] == 0){
                                        echo "Aucune activité";
                                    } ?>"><?php if ($row['ID_TYPE_ACTIVITE'] == 1) {
                                        echo "Piscine";
                                    } elseif ($row['ID_TYPE_ACTIVITE'] == 2) {
                                        echo "Restaurant";
                                    } elseif ($row['ID_TYPE_ACTIVITE'] == 3) {
                                        echo "Spa";
                                    }   elseif( $row['ID_TYPE_ACTIVITE']== 0){
                                        echo "Aucune activité";
                                
                                    } ?>
                                    </option>
                                    <option >Aucune activité</option>  
                                    <option >Piscine</option>
                                    <option>Restaurant</option>
                                    <option >Spa</option>
            </select>
         
         </div>
         <div class="inputBox">
         <span>Nombre de chambre :</span>
            <input type="number" name="nbre" min="1" max="100" value="<?php echo $row['NBRE_CHAMBRE']; ?>" class="box">
             
            <span>Date de départ</span>
            <input type="date" id="depart" type="depart" name="depart" class="box" required min="<?php echo date('Y-m-d'); ?>"value="<?php echo $row['DATE_SORTIE']; ?>" >
   
            
            <span><br></span>
            <input type="submit" value="Modifier Profil" name="update_profile" class="btn">
         </div>
         

      </div>     
      <a href="../Client/MesReservation.php" class="back-btn"><i style="font-size:larger" class="fas fa-arrow-left"></i> </a>
      </form>
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

