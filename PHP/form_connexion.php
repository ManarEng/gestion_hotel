

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="/CSS/styles.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"> <!--this one for connexion styles-->
    <link rel="stylesheet" href="/CSS/styles_connexion.css">

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
            <h1 style="text-align: left; margin-left: 10px; margin-top:11px ;">HoteLUX<span class="orange">.</span></h1>
            <nav style="margin-top:35px;">
                <ul>
                    <li><a href="#main" >Accueil</a></li>
                    <li><a href="#steps">A propos</a></li>
                    <li><a href="#possibilities">Services</a></li>
                    <li><a href="/index_contact.php">Contact</a></li>
                    <li><a href="">Réservation</a></li>
                    <li><a href="" >connexion</a></li>
                    

                </ul>
            </nav>
        </div>
    </header>
    
    <div class="login-form-container">

        <i class="fas fa-time" id="form-close"></i>

        <form action="trait_connexion.php" method="post">
            <h3>Connexion</h3>
            <?php
                if(isset($message)){
                    foreach($message as $message){
                       echo '<div class="message">'.$message.'</div>';
                    }
                 }
                ?>
            <input type="text" class="box" placeholder="Entrer votre nom d'utilisateur" name="username" required>
            <input type="password" class="box" placeholder="Entrer votre mot de passe " name="password" required> 
            
            <input type="submit" value="Se connecter" class="btn"> <br>
           
            <!--<input type="checkbox" id="remember">
            <label for="remember">remember me</label>
            <p>forget password? <a href="#">click here</a></p>-->
            <p></p>
            <p>Vous n'avez pas encore un compte? <a href="/PHP/form_inscription.php">Inscription</a>
            <a href="/index.html" style="margin-left:150px;" ><i class="fa-solid fa-rotate-left"></i></a>
            </p>

        </form>
    </div>

    <section id="main">
        <div>
            <video src="/Img/video_background.webm" autoplay muted loop></video>
        </div>
    </section>

    <section id="steps">
        <div class="wrapper">
            <ul>
                <li id="step-1"  >
                    <h4>Planifier</h4>
                    <p>Confiez-nous vos rêves de bénéficier d'un séjour de luxe : en famille ou entre amis, nous
                        trouverons la formule qui comblera vos attentes.</p>
                </li>
                <li id="step-2">
                    <h4>Découvrer</h4>
                    <p>HoteLUX vous promet un séjour spécial dans son complexe contemporain et lumineux de 50 chambres
                        et encore plus d'activités.</p>
                </li>
                <li id="step-3">
                    <h4>Réserver</h4>
                    <p>Réservez en toute sécurité, nous nous chargeons de veiller à votre pleine sérénité tout au long
                        de votre séjour.</p>
                </li>
                <div class="clear"></div>
            </ul>
        </div>
    </section>

    <section id="possibilities">
        <div class="wrapper">


            <article style="background-image: url(/Img/decouvrez_nos_hebergement1.jpg);" >
                <div class="overlay" >
                    <h4>Nos chambres</h4>
                    <p><small>Offrez le meilleur à ceux que vous aimez et partagez des moments fabuleux !</small></p>
                    <a href="/index_chambres.html" class="button-2">Plus d'infos</a>
                </div>
            </article>

            <article style="background-image: url(/Img/envie_de.jpg);">
                <div class="overlay">
                    <h4>Envie de s'amuser</h4>
                    <p><small>Parfois un peu de distraction serait le bienvenue et ferait le plus grand bien !</small>
                    </p>
                    <a href="#" class="button-2">Plus d'infos</a>
                </div>
            </article>

            <div class="clear"></div>

        </div>
    </section>
    <section>
        <div class="wrapper">
            <div class="service">

                <div class="main-service">
                    <div class="service-box">

                        <h4>Tours <br>& Excursions </h4><br>
                        <hr><br>
                        <p> <small> Des véhicules sont disponibles pour les tours et <br> les déplacements</small></p>
                    </div>
                    <div class="service-box">

                        <h4>Accès gratuit à Internet sans fil</h4> <br>
                        <hr><br>
                        <p> <small> L'accès gratuit à Internet est disponible dans la chambre ainsi la zone de
                            restauration</small>
                        </p>
                    </div>
                    <div class="service-box">

                        <h4>Baby-sitting sur demande</h4> <br>
                        <hr><br>
                        <p>  <small> Vous pouvez demander du baby-sitting chaque fois que vous en avez besoin </small>  </p>
                    </div>
                    <div class="service-box">

                        <h4>Service de blanchisserie</h4> <br>
                        <hr><br>
                        <p>  <small>   Service de blanchisserie gratuit disponible pour certain client </small></p>
                    </div>

                </div>
            </div>
    </section>

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

  



    
    <section>
        <div>
            <br> <br> <br>
        </div>
    </section>


    <footer>
         
    
        
         <div class="col-right">
            <h3>Contact Info</h3>
            <p>06 10 30 40 56</p>
            <p>05 10 30 40 56</p>
            <p>hotelux@gmail.com</p>
         </div>

         <div>
            <h1>HoteLUX<span class="orange">.</span></h1>
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


