<?php
    $firstname=$name=$email=$phone=$message="";
    $firstnameError=$nameError=$emailError=$phoneError=$messageError="";
    $isSuccess = false;
    $emailTo="allouchmanar111@gmail.com";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $firstname=$_POST["firstname"];
        $name=$_POST["name"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $message=$_POST["message"];
        $isSuccess=true;
        $emailText="";

        if(empty($message))
            {   
                $messageError="Veuillez taper un message"; 
                $isSuccess = false;
            }
            else
            {
                $emailText .= "Message: $message\n";
            }

        if(empty($firstname))
        {
            $firstnameError="Veuillez renseigner votre prénom";   
            $isSuccess = false;
        }
        else
        {
            $emailText .= "Firstname: $firstname\n";
        }


        if(empty($name))
        {
            $nameError="Veuillez renseigner votre nom";
            $isSuccess = false;

        }
        else
        {
            $emailText .= "Name: $name\n";
        }
        

        if(!isEmail($email))
        {
            $emailError="Veuillez indiquer une adresse email valide"; $isSuccess = false;
        }
        else
        {
            $emailText .= "Email: $email\n";
        }


        if(empty($phone))
        {

        }
        else if(!empty($phone) && !isPhone($phone))
        {
            $phoneError="Veuillez indiquer un numéro de téléphone valide"; $isSuccess = false;
        }
        else
        {
            $emailText .= "Phone: $phone\n";
        }

        
    
    if($isSuccess) 
    {
        $headers="From: $firstname $name <$email>\r\nReply-To: $email";
        //mail($emailTo,"Un message de votre site",$emailText, $headers);
        //$firstname=$name=$email=$phone=$message="";
    }
    }
    function isEmail ($var)
            {
                return filter_var($var,FILTER_VALIDATE_EMAIL);
            }

    function isPhone($var)
    {
        //return preg_match("/^[0-9 ]*$/",$var);
        return preg_match("/^[+]?[1-9][0-9]{9,14}$/",$var);
        //commence par + , suivi d un chiffre de 1 a 9 , suivi de nbr de 0 a 9 , toute l expression doit contenir 10 a 15 chiffres
        //The regular expr will check if the mobile number digits are within 10-15 digits including '+' at the start and followed by a non-zero first digit.
    }
            


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Contactez-nous !</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'> 

  



        <link rel="stylesheet" href="/CSS/style_contact.css">

        <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet"> <!--this link is for the css of the hotelux-->
        <!--this script is for social medio icons-->
    <script src="https://kit.fontawesome.com/fe1484d902.js" crossorigin="anonymous"></script>


   
    </head>
    
    
    <body>


    <header>
        <div class="">
            <h1 style="text-align: left; margin-left: 10px; margin-top:11px ;"> <b><a href="/index.html"> HoteLUX<span class="orange">.</span></a></b></h1>
            <nav style="margin-top:35px;">
                <ul>
                    <li><a href="/index.html/#main" >Accueil</a></li>
                    <li><a href="/index.html/#steps">A propos</a></li>
                    <li><a href="/index.html/#possibilities">Services</a></li>
                    <li><a href="/PHP/index_contact.php">Contact</a></li>
                    <li><a href="">Réservation</a></li>
                    <li><a href="/PHP/form_connexion.php">connexion</a></li>

                </ul>
            </nav>
        </div>
    </header>

    

     
    <div class="container">
            <div class="divider"></div>
            <div class="heading">
                <h2>Contactez-nous</h2>
            </div>
            <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form"> <!--htmlspecialchars est ajoute pour but de securite contre la faille xss -->
            <p class="thank-you" style="display:<?php if($isSuccess) echo 'block'; else echo 'none'; ?>"> Votre message a bien été envoyé!</p>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="firstname" class="form-label">Prénom <span class="blue">*</span></label>
                        <input id="firstname" type="text" name="firstname" class="form-control"  value="<?php echo $firstname; ?>"> 
                        <p class="comments"><?php echo $firstnameError;?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="name" class="form-label">Nom <span class="blue">*</span></label>
                        <input id="name" type="text" name="name" class="form-control"  value="<?php echo $name; ?>">
                        <p class="comments"><?php echo $nameError;?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="email" class="form-label">Email <span class="blue">*</span></label>
                        <input id="email" type="email" name="email" class="form-control"  value="<?php echo $email; ?>">
                        <p class="comments"><?php echo $emailError;?></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="tel" class="form-label">Téléphone</label>
                        <input id="phone" type="text" name="phone" class="form-control" placeholder="exp:+212612345678" value="<?php echo $phone; ?>">
                        <p class="comments"><?php echo $phoneError;?></p>
                    </div>
                    <div>
                        <label for="message" class="form-label" >Message <span class="blue">*</span></label>
                        <textarea id="message" name="message" class="form-control"  rows="6" value="<?php echo $message; ?>"></textarea>
                        <p class="comments"><?php echo $messageError;?></p>
                    </div>
                    <div>
                        <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                    </div>
                    <div>
                        <input type="submit" class="button1" value="Envoyer">
                    </div>    
                </div>
                
            </form>
        </div>


        <?php 

if($_SERVER["REQUEST_METHOD"]=="POST")
{ 
        $firstname=$_POST["firstname"];
        $name=$_POST["name"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $message=$_POST["message"];

    }





    include 'db_connexion.php'; 


    if($isSuccess)
    {
        $requete = "INSERT INTO messagerie VALUES('','$email','$name','$firstname','$phone','$message')";
        $resultat = mysqli_query($conn,$requete);
        mysqli_close($conn);
    }

?>

       

        <br> <br><br>
        <footer>
         
         <div class="col-right">
            <h3>Contact Info</h3>
            
            <p><i class="fa-solid fa-phone"></i>  06 10 30 40 56</p>
            <p><img src="/Img/office-phone.png" style="height: 14px;width: 14px;">   05 10 30 40 56</p>
            <p style="margin-left: 30px;"><i class="fa-solid fa-envelope"></i>            hotelux@gmail.com</p>
         </div>
 
         <div>
            <h1><a href="/index.html"> HoteLUX<span class="orange">.</span></a></h1>
            <p class="copyright">Copyright © Tous droits réservés.</div>
            </p> 
        </div>
 
         <div class="col-left">
            <h3>Adresse</h3>
            <p>123,XYZ Road, BSK 3 <br>Maroc, Oujda, IN</p>
            <div class="social-icons">
                <i class="fa-brands fa-facebook" onclick="facebook()"></i>
                <i class="fa-brands fa-twitter" onclick="twitter()"></i>
                <i class="fa-brands fa-instagram" onclick="instagram()"></i>
 
 
            </div>
 
         </div>
        
        
     </footer>
 


    
        
    </body>

</html>

