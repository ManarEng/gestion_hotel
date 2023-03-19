<?php
session_start();

$conn = new mysqli("localhost", "root", "", "hotelux");

if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupérer les données du formulaire
    $entree = $_POST['arrivee'];
    $sortie = $_POST['depart'];
    $nbrec = $_POST['nbre'];
    $idutil = $_SESSION['ID_UTILL'];
   

    // Ajouter les données à la base de données
    $sql = "INSERT INTO reservation(ID_UTILL, DATE_D_ENTREE, DATE_SORTIE, NBRE_CHAMBRE) VALUES( 1, '$entree', '$sortie', '$nbrec');";

    $r = $conn->query($sql);

    if ($r === TRUE) {
        echo "Réservation ajoutée avec succès.";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}
// Récupération des informations de la réservation
$sql = "SELECT u.NOM, u.PRENOM, u.TELE, r.NBRE_CHAMBRE, c.TYPEC,c.PRIX, a.TYPE, r.DATE_D_ENTREE, r.DATE_SORTIE
FROM UTILISATEURS u
JOIN RESERVATION r ON u.ID_UTILL = r.ID_UTILL
JOIN CHAMBRE c ON r.ID_RES = c.ID_RES
JOIN CONTENIR ca ON r.ID_RES = ca.ID_RES
JOIN ACTIVITE a ON ca.ID_ACTIVITE = a.ID_ACTIVITE;"; // Remplacez 1 par l'ID de la réservation souhaitée
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Affichage des données dans un formulaire HTML
    $row = $result->fetch_assoc();

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
            <h1 style="text-align: left; margin-left: 10px; margin-top:11px ;"><b> HoteLUX</b><span class="orange">.</span></h1>
            <nav style="margin-top:35px;">
                <ul>
                    <li><a href="../index.html">Accueil</a></li>
                    <li><a href="../index.html">A propos</a></li>
                    <li><a href="../index.html">Services</a></li>
                    <li><a href="/contact_code/index.php">Contact</a></li>
                    <li><a href="">Réservation</a></li>
                    <li><a href="">connexion</a></li>

                </ul>
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
                <form id="contact-form" method="post" action="trait_Reservation.php">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="user">Nom d'Utilisateur <span class="blue"></span></label>
                            <input id="user" type="text" name="user" class="form-control" value="<?php echo $row['NOM']; ?>" >
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="tele">Téléphone<span class="blue"></span></label>
                            <input id="tele" type="text" name="tele" class="form-control" value="<?php echo $row["TELE"]; ?>">
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="type">Type de Chambre <span class="blue"></span></label>
                            <input id="type" type="text" name="type" class="form-control" value="<?php echo $row["TYPEC"]; ?>">
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="prix">Prix de Chambre <span class="blue"></span></label>
                            <input id="prix" type="text" name="prix_ch" class="form-control" value="<?php echo $row["PRIX"]; ?>">
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="nbre">Nombre de Chambre<span class="blue">*</span></label>
                            <input type="number" id="nbre" name="nbre" min="1" max="100" value="0">
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="type_ac">Type d'activité <span class="blue"></span></label>
                            <select id="type_ac" name="type_ac" required>
                                <option value="0">--choisisser une activité--</option>
                                
                            </select>
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