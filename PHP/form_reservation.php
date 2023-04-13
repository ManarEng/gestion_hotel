<?php
session_set_cookie_params(0);

session_start();
$error = "";
$isSuccess = false;
$activite = $entree = $nbrec = "";


if (isset($_SESSION['PRIX'])) {
    $PRIX =$_SESSION['PRIX'];
} else {
    die("erreur session PRIX!");
}


if (isset($_SESSION['ID_CHAMBRE'])) {
    $chambre_id = $_SESSION['ID_CHAMBRE'];
} else {
    die("erreur session!");
}

include("../db_connexion.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $entree = $_POST['arrivee'];
    $sortie = $_POST['depart'];
    $nbrec = $_POST['nbre'];
    $activite = $_POST['activite'];
    $type_ac = null;

    if ($activite == 'Piscine') {
        $type_ac = 1;
    } elseif ($activite == 'Restaurant') {
        $type_ac = 2;
    } elseif ($activite == 'Spa') {
        $type_ac = 3;
    } elseif ($activite == 'Aucune activité') {
        $type_ac = 0;
    }

    $arrivee = strtotime($_POST['arrivee']);
    $depart = strtotime($_POST['depart']);

    if ($depart <= $arrivee) {
        $error = "La date de départ est antérieure à la date d'arrivée.";
     } elseif (empty($nbrec) || !is_numeric($nbrec) || $nbrec <= 0) {
        
            $error = "Le nombre de personnes doit être supérieur à zéro.";
    } else {
        $sql = "INSERT INTO reservation VALUES('', '$_SESSION[ID_UTILL]', '$chambre_id', '$type_ac', '$entree', '$sortie', '$nbrec')";
        $r = $conn->query($sql);
        if ($r === true) {
            $isSuccess = true;
            $msg = 'Votre réservation a été ajoutée avec succès.';
        } else {
            $isSuccess = false;
            $msg = 'Votre réservation a échoué. ' . $sql . '<br>' . $conn->error;
        }
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


                    <li><a href="#main">Accueil</a></li>
                    <li><a href="#steps">A propos</a></li>

                    <li><a href="#possibilities">Services</a></li>
                    <li><a href="/PHP/index_contact.php">Contact</a></li>
                    <li><a href="/php/lien_reservation_header.php">Réservation</a></li>
                    <!--<li><a href="/projet_hotel2 - Copie/index.html" >connexion</a></li>-->
                    <!--<li>  <a  href="javascript:myFunction();"> <i class="fa-solid fa-user"></i></a></li>
                    <div class="arrow-up" id="triangle"></div>-->
                    <li> <a href="/Client/gestion_client.php"> <i class="fa-solid fa-user"></i></a></li>
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
                <form id="contact-form" method="post">
                    <div class="row">
                        <?php if (!empty($msg)) { ?>
                            <div class="alert alert-<?php echo ($r === TRUE) ? 'success' : 'danger'; ?>"><?php echo $msg; ?></div>
                        <?php } ?>
                        <div class="col-md-6">
                            <label for="user">Nom d'Utilisateur <span class="blue"></span></label>
                            <input id="user" type="text" name="user" class="form-control" value="<?php echo $_SESSION['LOGIN']; ?>" readonly>
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="tele">Téléphone<span class="blue"></span></label>
                            <input id="tele" type="text" name="tele" class="form-control" value="<?php echo $_SESSION['TELE'] ; ?>" readonly>


                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="arrivee">Date d'Arrivée <span class="blue">*</span></label>
                            <input type="date" id="arrivee" name="arrivee" class="form-control" required min="<?php echo date('Y-m-d'); ?>" value="<?php echo $entree; ?>">
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="depart">Date de Depart<span class="blue">*</span></label>
                            <input type="date" id="depart" type="depart" name="depart" class="form-control" required min="<?php echo date('Y-m-d'); ?>">
                            <p class="comments"><?php echo $error; ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="nbre">Nombre de Chambre<span class="blue">*</span></label>
                            <input type="number" id="nbre" name="nbre" min="1"  max="100" value="<?php echo $nbrec; ?>"required>
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="activite">Type d'activité <span class="blue"></span></label>
                            <select id='activite' name='activite'>

                                <option <?php if ($activite == "Piscine") echo 'selected="selected"'; ?>>Aucune activité</option>
                                <option <?php if ($activite == "Piscine") echo 'selected="selected"'; ?>>Piscine</option>
                                <option <?php if ($activite == "Restaurant") echo 'selected="selected"'; ?>>Restaurant</option>
                                <option <?php if ($activite == "Spa") echo 'selected="selected"'; ?>>Spa</option>

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