<?php
session_start();
if(isset($_SESSION['ID_CHAMBRE'])) {
    $chambre_id = $_SESSION['ID_CHAMBRE'];
    // faire quelque chose avec l'id de la chambre, par exemple, récupérer les informations de la chambre depuis la base de données et les afficher
} else {
    // l'id de la chambre n'a pas été défini dans la session, rediriger l'utilisateur vers la page d'accueil
    die("erreur session!");
    
}
//$id_chambre=$_SESSION['ID_CHAMBRE'];



include("../db_connexion.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupérer les données du formulaire
    $entree = $_POST['arrivee'];
    $sortie = $_POST['depart'];
    $nbrec = $_POST['nbre'];
   $activite=$_POST['activite'];
   $type_ac=NULL;
    if($activite=='Piscine'){
        $type_ac=1;
    }
    elseif($activite=='Restaurant'){
        $type_ac=2;
    }
    elseif($activite=='Spa'){
        $type_ac=3;
    }
    // Ajouter les données à la base de données
    $sql = "INSERT INTO reservation VALUES('','$_SESSION[ID_UTILL]','$chambre_id','$type_ac', '$entree', '$sortie', '$nbrec')";
    $r = $conn->query($sql);

    $msg = '';
    if ($r === TRUE) {
        $msg = 'Votre résérvation a été ajoutée avec succès.';
    } else {
        $msg = 'Votre réservation a échoué. ' . $sql . '<br>' . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Réservation</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>


    <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet"> <!--this link is for the css of the hotelux-->
    <!--this script is for social medio icons-->
    <script src="https://kit.fontawesome.com/fe1484d902.js" crossorigin="anonymous"></script>
    <link href="/CSS/style_inscription.css" rel="stylesheet" type="text/css">
 
</head>

<body>



    <header>
    <div class="">
            <h1 style="text-align: left; margin-left: 10px; margin-top:11px ;"> <a href="/Client/index.php"> HoteLUX<span class="orange">.</span></a></h1>
            <nav style="margin-top:35px; ">
                <ul>
                   
                    
                    <li><a href="#main" >Accueil</a></li>
                    <li><a href="#steps">A propos</a></li>
                     
                    <li><a href="#possibilities">Services</a></li>
                    <li><a href="/PHP/index_contact.php">Contact</a></li>
                    <li><a href="/php/lien_reservation_header.php">Réservation</a></li>
                    <!--<li><a href="/projet_hotel2 - Copie/index.html" >connexion</a></li>-->
                    <!--<li>  <a  href="javascript:myFunction();"> <i class="fa-solid fa-user"></i></a></li>
                    <div class="arrow-up" id="triangle"></div>-->
                    <li>  <a  href="/Client/gestion_client.php"> <i class="fa-solid fa-user"></i></a></li>
                </ul>
                
                <!--<div class="login-form" id="form">
                    <form action="">
                        <div class="bonjour" style="text-decoration: underline;">
                        <?php
                            /*session_start();
                            $login = $_SESSION['login']; /* allez voir trait_insc.php et faites les changement necessaire */ 
                           // echo 'Bonjour <b>' . $login . '</b> ! <br>';
                        ?></div> 
                        <br>
                        <a href="">Mon profile</a> <br>  <br>
                        <a href="">Mes reservations</a> <br> <br> 
                        <a href="/pageClient/PHP/deconnexion.php">Déconnexion</a> 
                    </form>
                </div>-->
            </nav>
        </div>
       
    </header>



    <div class="container">
        <div class="divider"></div>
        <div class="heading">
            <h2>Réserver à l'hotel</h2>
        </div>

        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <form id="contact-form" method="post" >
                    <div class="row">
                    <?php if (!empty($msg)) { ?>
                   <div class="alert alert-<?php echo ($r === TRUE) ? 'success' : 'danger'; ?>"><?php echo $msg; ?></div>
                    <?php } ?>
                        <div class="col-md-6">
                            <label for="user">Nom d'Utilisateur <span class="blue"></span></label>
                            <input id="user" type="text" name="user" class="form-control" value="<?php echo $_SESSION['LOGIN']; ?>" >
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="tele">Téléphone<span class="blue"></span></label>
                            <input id="tele" type="text" name="tele" class="form-control" value="<?php echo  "+212612345678" ;?>">
                            <p class="comments"></p>
                        </div>
                       <div class="col-md-6">
                            <label for="arrivee">Date d'Arrivée <span class="blue">*</span></label>
                            <input type="date" id="arrivee" type="text" name="arrivee" class="form-control" required>
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="depart">Date de Depart<span class="blue">*</span></label>
                            <input type="date" id="depart" type="password" name="depart" class="form-control" required>
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="nbre">Nombre de Chambre<span class="blue">*</span></label>
                            <input type="number" id="nbre" name="nbre" min="1" max="100" value="0">
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="activite">Type d'activité <span class="blue"></span></label>
                                  <select id='activite' name='activite' required>
                                  <option >--choisir une activité--</option>;
                                     <option>Piscine</option>;
                                     <option>Restaurant</option>;
                                     <option>Spa</option>";
                                    </select>
                            <p class="comments"></p> 
                        </div>
                        
                        
                      
                        <div class="col-md-12">
                            <p class="blue"><strong>* Ces informations sont requises.</strong>
        
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="button1" value="Envoyer">
                        </div>
                       

                    </div>
                    



                </form>
            </div>
        </div>
    </div>

    <br> <br><br>
    <footer>

        <div class="col-right">
            <h3>Contact Info</h3>
            <p>06 10 30 40 56</p>
            <p>05 10 30 40 56</p>
            <p>hotelux@gmail.com</p>
        </div>

        <div>
            <h1><b> HoteLUX</b><span class="orange">.</span></h1>
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