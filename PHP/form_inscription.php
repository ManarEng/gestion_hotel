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


    <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet"> <!--this link is for the css of the hotelux-->
    <!--this script is for social medio icons-->
    <script src="https://kit.fontawesome.com/fe1484d902.js" crossorigin="anonymous"></script>
    <link href="/CSS/style_contact.css" rel="stylesheet" type="text/css">
    <style>
        .error {
            color: red;
            margin-top: 5px;
        }
    </style>
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
            <h2>S'inscrire à HoteLUX</h2>
        </div>

        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <form id="contact-form" method="post" action="trait_insc.php" role="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="firstname">Prénom <span class="blue">*</span></label>
                            <input id="firstname" type="text" name="firstname" class="form-control" required>

                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Nom <span class="blue">*</span></label>
                            <input id="name" type="text" name="name" class="form-control" required>

                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email <span class="blue">*</span></label>
                            <input id="email" type="text" name="email" class="form-control" required>

                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Téléphone<span class="blue">*</span></label>
                            <input id="phone" type="tel" name="phone" class="form-control" required>

                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="login">Login <span class="blue">*</span></label>
                            <input id="login" type="text" name="login" class="form-control" required>
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="mdp">Mot de passe<span class="blue">*</span></label>
                            <input id="mdp" type="password" name="mdp" class="form-control" required>


                            <p class="comments"></p>
                        </div>

                        <div class="col-md-6">
                            <label for="cin">CIN <span class="blue">*</span></label>
                            <input id="cin" type="text" name="cin" class="form-control" required>
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="mdpp">Vérifier votre Mot de passe<span class="blue">*</span></label>
                            <input id="mdpp" type="password" name="mdpp" class="form-control" required>

                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="ad">Adresse<span class="blue">*</span></label>
                            <input id="ad" type="text" name="ad" class="form-control" required>
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-12">
                            <label for="img">Photo</label>
                            <input id="img" type="file" name="img" class="form-control">
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-12">
                            <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="button1" value="Envoyer">
                            <p id="confirmation-message" style="display:none; color:green; font-weight:bold;">Inscription avec succes!</p>
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