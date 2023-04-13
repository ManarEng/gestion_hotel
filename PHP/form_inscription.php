<?php
session_set_cookie_params(0);

session_start();
include("../db_connexion.php");
$firstname = $name = $email = $phone = $adresse = $cin = $login = $mdp = $mdpp = $url = "";
$firstnameError = $nameError = $emailError = $phoneError = $loginError = $mdpError = $mdppError = $imgError = "";
$isSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    $email =  $_POST['email'];
    $login = mysqli_real_escape_string($conn, $_POST['login']);

    $phone = $_POST['phone'];

    $mdp = $_POST['mdp'];
    $mdpp = $_POST['mdpp'];
    $cin = $_POST['cin'];
    $adresse = $_POST['adresse'];

    $isSuccess = true;

    if (!ctype_alpha($firstname)) {
        $firstnameError = "Le prénom doit être une chaîne de caractères alphabétiques.";
        $isSuccess = false;
    }

    if (!ctype_alpha($name)) {
        $nameError = "Le nom doit être une chaîne de caractères alphabétiques.";
        $isSuccess = false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "L'email doit être une adresse email valide.";
        $isSuccess = false;
    }

    if (!preg_match("/^[+]?[1-9][0-9]{9,14}$/", $phone)) {
        $phoneError = "Le numéro de téléphone doit être au format international.";
        $isSuccess = false; //pas necess qu'il commence par +
    }
    if (strlen($mdp) < 8) {
        $mdpError = "Mot de passe trop court";
        $isSuccess = false;
    }
    if (!preg_match('/[A-Z]/', $mdp)) {
        $mdpError = "Mot de passe doit contenir au moins une lettre majuscule";
        $isSuccess = false;
    }
    if (!preg_match('/[a-z]/', $mdp)) {
        $mdpError = "Mot de passe doit contenir au moins une lettre miniscule";
        $isSuccess = false;
    }
    if (!preg_match('/[0-9]/', $mdp)) {
        $mdpError = "Mot de passe doit contenir au moins un chiffre";
        $isSuccess = false;
    }
    if (!($mdp == $mdpp)) {
        $mdppError = "Les mots de passe ne sont pas les memes!";
        $isSuccess = false;
    }
    // Check if the  login already exist in the database

    $query = "SELECT * FROM utilisateurs WHERE  LOGIN ='$login'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $loginError = "Le nom d'utilisateur est déjà utilisé.";
        $isSuccess = false;
    }
    // Check if file is an image
    if (isset($_FILES['pic']) && $_FILES['pic']['error'] == UPLOAD_ERR_OK) {
        $file = $_FILES['pic'];
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            $imgError = "Télécharger une image valide.";
            $url = "";
        } else {
            // Store the image in the upload directory
            $upload_dir = 'uploads/';
            $filename = uniqid("IMG-", true) . '.' . $file_extension;
            $upload_path = $upload_dir . $filename;
            move_uploaded_file($file['tmp_name'], $upload_path);

            // Store the URL in the database
            $url =  $filename;
        }
    } else {
        $url = "";
    }
}
if ($isSuccess) {
    $hashed_password = password_hash($mdp, PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs VALUES ('','3', '$name', '$firstname', '$login', '$hashed_password', '$cin', '$adresse', '$email', '$phone','$url')";
    mysqli_query($conn, $sql);
    $query = "SELECT * FROM utilisateurs WHERE LOGIN ='$login'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['ID_UTILL'] = $row['ID_UTILL'];
        $_SESSION['ID_PROFIL'] = $row['ID_PROFIL'];
        $_SESSION['LOGIN'] = $row['LOGIN'];
        $_SESSION['TELE'] = $row['TELE'];


        header('location:/Client/index.php');
    }
}










?>



<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>





    <link rel="stylesheet" href="/CSS/style_contact.css">

    <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet"> <!--this link is for the css of the hotelux-->
    <!--this script is for social medio icons-->
    <script src="https://kit.fontawesome.com/fe1484d902.js" crossorigin="anonymous"></script>
    <style>
        .thank-you {
            color: green;

        }
    </style>


</head>


<body>


    <header>
        <div class="">
            <h1 style="text-align: left; margin-left: 10px; margin-top:11px ;"><b> HoteLUX</b><span class="orange">.</span></h1>
            <nav style="margin-top:35px;">
                <ul>
                    <li><a href="../index.html#main">Accueil</a></li>
                    <li><a href="../index.html#steps">A propos</a></li>
                    <li><a href="../index.html#possibilities">Services</a></li>
                    <li><a href="../PHP/index_contact.php">Contact</a></li>
                    <li><a href="../PHP/lien_reservation_header.php">Réservation</a></li>
                    <li><a href="../PHP/form_connexion.php">connexion</a></li>

                </ul>
            </nav>
        </div>
    </header>




    <div class="container">
        <div class="divider"></div>
        <div class="heading">
            <h2>S'inscrire à HoteLUX</h2>
        </div>
        <form id="contact-form" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form"> <!--htmlspecialchars est ajoute pour but de securite contre la faille xss -->
            <p class="thank-you" style="display:<?php if ($isSuccess) echo 'block';
                                                else echo 'none'; ?> "> Inscription avec succès!</p>
            <div class="row">
                <div class="col-lg-6">
                    <label for="firstname" class="form-label">Prénom <span class="blue">*</span></label>
                    <input id="firstname" type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>" required>
                    <p class="comments"><?php echo $firstnameError; ?></p>
                </div>
                <div class="col-lg-6">
                    <label for="name" class="form-label">Nom <span class="blue">*</span></label>
                    <input id="name" type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
                    <p class="comments"><?php echo $nameError; ?></p>
                </div>
                <div class="col-lg-6">
                    <label for="cin" class="form-label">CIN <span class="blue">*</span></label>
                    <input type="text" id="cin" name="cin" class="form-control" value="<?php echo $cin; ?>" required>

                </div>
                <div class="col-lg-6">
                    <label for="email" class="form-label">Email <span class="blue">*</span></label>
                    <input id="email" type="text" name="email" class="form-control" value="<?php echo $email; ?>" required>
                    <p class="comments"><?php echo $emailError; ?></p>
                </div>
                <div class="col-lg-6">
                    <label for="phone" class="form-label">Téléphone<span class="blue">*</span></label>
                    <input id="phone" type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" required placeholder="exp:+212696107564">
                    <p class="comments"><?php echo $phoneError; ?></p>
                </div>
                <div class="col-lg-6">
                    <label for="adresse" class="form-label">Adresse <span class="blue">*</span></label>
                    <textarea id="adresse" name="adresse" class="form-control" cols="3" rows="3" required><?php echo $adresse; ?></textarea>

                </div>


                <div class="col-lg-6">
                    <label for="login" class="form-label">Login <span class="blue">*</span></label>
                    <input type="text" id="login" name="login" class="form-control" value="<?php echo $login; ?>" required>
                    <p class="comments"><?php echo $loginError; ?></p>
                </div>
                <div class="col-lg-6">
                    <label for="mdp" class="form-label">Mot de passe <span class="blue">*</span></label>
                    <input type="password" id="mdp" name="mdp" class="form-control" required>
                    <p class="comments"><?php echo $mdpError; ?></p>
                </div>
                <div class="col-lg-6">
                    <label for="pic" class="form-label">Photo </label>
                    <input type="file" id="pic" name="pic" class="form-control">
                    <p class="comments"><?php echo $imgError; ?></p>
                </div>
                <div class="col-lg-6">
                    <label for="mdpp" class="form-label">Confirmer votre mot de passe <span class="blue">*</span></label>
                    <input type="password" id="mdpp" name="mdpp" class="form-control" required>
                    <p class="comments"><?php echo $mdppError; ?></p>
                </div>



                <div class="col-lg-6">
                    <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                </div>
                <div>
                    <input type="submit" class="button1" value="Envoyer">
                </div>
            </div>

        </form>
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