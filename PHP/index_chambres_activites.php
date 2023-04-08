<?php
session_start();


?>






<!DOCTYPE html>
<html>
    <head>
        <title>Chambres et activités</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


        <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet"> <!--this link is for the css of the hotelux-->
        <!--this script is for social medio icons-->
        <script src="https://kit.fontawesome.com/fe1484d902.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="/CSS/styles_chambres_activites.css">

    </head>
    <body>


        <header>
            <div class="">
                <h1 style="text-align: left; margin-left: 10px; margin-top:11px ;"> <a href="/index.html"> <b> HoteLUX</b><span class="orange">.</span></a></h1>
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
                <!--<hr style="color: black; border-bottom: 1px solid; width: 100%;  ">-->
            </div>
        </header> 



    <div class="body">
        <div class="container site">
           
            <h1 class="text-logo">Chambres et prix </h1>
            
            <?php
				require ("../db_connexion_oop.php");
			 
                echo '<nav>
                        <ul class="nav nav-pills" role="tablist">';

                $db = Database::connect();
                $statement = $db->query('SELECT * FROM type_chambre');
                $categories = $statement->fetchAll();
                foreach ($categories as $category) 
                {
                    if($category['ID_TYPE_CHAMBRE'] == '1')
                       { echo '<li class="nav-item" role="presentation"><a class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab'. $category['ID_TYPE_CHAMBRE'] . '" role="tab">' . $category['TYPE_CHAMBRE'] . '</a></li>';
                        /*$_SESSION['TYPE_CHAMBRE']= $category['TYPE_CHAMBRE'];*/
                    }
                    else
                    {
                        echo '<li class="nav-item" role="presentation"><a class="nav-link" data-bs-toggle="pill" data-bs-target="#tab'. $category['ID_TYPE_CHAMBRE'] . '" role="tab">' . $category['TYPE_CHAMBRE'] . '</a></li>';
                        /*$_SESSION['TYPE_CHAMBRE']= $category['TYPE_CHAMBRE'];*/
                    }
                    
                
                }
                

                echo    '</ul>
                      </nav>';

                echo '<div class="tab-content">';

                foreach ($categories as $category) {
                    if($category['ID_TYPE_CHAMBRE'] == '1') {
                        echo '<div class="tab-pane active" id="tab' . $category['ID_TYPE_CHAMBRE'] .'" role="tabpanel">';
                    } else {
                        echo '<div class="tab-pane" id="tab' . $category['ID_TYPE_CHAMBRE'] .'" role="tabpanel">';
                    }
                    
                    echo '<div class="row">';
                    
                    $statement = $db->prepare('SELECT * FROM chambre WHERE chambre.ID_TYPE_CHAMBRE = ?');
                    $statement->execute(array($category['ID_TYPE_CHAMBRE']));
                    while ($item = $statement->fetch()) {
                        echo '<div class="col-md-6 col-lg-4">
                                <div class="img-thumbnail">
                                    <img src="/Img/image_chambres/' . $item['IMAGE_CH'] . '" class="img-fluid" alt="...">
                                    <div class="price">' . number_format($item['PRIX'], 2, '.', ''). ' dh</div>
                                    <div class="caption">
                                        
                                        <p>' . $item['DESCRIPTION'] . '</p>
                                       
                                        <a href="/PHP/bouton_reserver.php?ID_CHAMBRE=' . $item['ID_CHAMBRE'] . '" class="btn btn-order" role="button"> Réserver</a>
                                    </div>
                                </div>
                            </div>';
                    }
                   
                   echo    '</div>
                        </div>';

                    





                }
                //Database::disconnect();
                echo  '</div>';

                
                
            ?>


<!--<div class="body">
        <div class="container site">
           
            <h1 class="text-logo">Activités et prix </h1>-->
            
            <?php
				//require 'db_connexion_oop.php';
			 
                /*echo '<nav>
                        <ul class="nav nav-pills" role="tablist">';

                //$db = Database::connect();
                $statement = $db->query('SELECT * FROM type_activite');
                $categories = $statement->fetchAll();
                foreach ($categories as $category) 
                {
                    if($category['ID_TYPE_ACTIVITE'] == '1')
                        echo '<li class="nav-item" role="presentation"><a class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab'. $category['ID_TYPE_ACTIVITE'] . '" role="tab">' . $category['TYPE_ACTIVITE'] . '</a></li>';
                    else
                    echo '<li class="nav-item" role="presentation"><a class="nav-link" data-bs-toggle="pill" data-bs-target="#tab'. $category['ID_TYPE_ACTIVITE'] . '" role="tab">' . $category['TYPE_ACTIVITE'] . '</a></li>';
                }

                echo    '</ul>
                      </nav>';

                echo '<div class="tab-content">';

                foreach ($categories as $category) {
                    if($category['ID_TYPE_ACTIVITE'] == '1') {
                        echo '<div class="tab-pane active" id="tab' . $category['ID_TYPE_ACTIVITE'] .'" role="tabpanel">';
                    } else {
                        echo '<div class="tab-pane" id="tab' . $category['ID_TYPE_ACTIVITE'] .'" role="tabpanel">';
                    }
                    
                    echo '<div class="row">';
                    
                    $statement = $db->prepare('SELECT * FROM activite WHERE activite.ID_TYPE_ACTIVITE = ?');
                    $statement->execute(array($category['ID_TYPE_ACTIVITE']));
                    while ($item = $statement->fetch()) {
                        echo '<div class="col-md-6 col-lg-4">
                                <div class="img-thumbnail">
                                    <img src="/Img/image_activites/' . $item['IMAGE_ACT'] . '" class="img-fluid" alt="...">
                                    <div class="price"> A partir de ' . number_format($item['PRIX'], 2, '.', ''). ' dh</div>
                                    <div class="caption">
                                        
                                    </div>
                                </div>
                            </div>';
                    }
                   
                   echo    '</div>
                        </div>';
                }
                Database::disconnect();
                echo  '</div>';*/
            ?>






   <div class="body">
        <div class="container site">
           
            <h1 class="text-logo">Activités et prix </h1>
            
            <nav>
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="pill" data-bs-target="#tabA" role="tab">Piscine</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" data-bs-target="#tabB" role="tab">Restaurant</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" data-bs-target="#tabC" role="tab">Spa</a>
                    </li>
                    
                </ul>
            </nav>

            <div class="tab-content">

                <div class="tab-pane active" id="tabA" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_activites/piscine1.jpg" class="img-fluid" alt="...">
                                <div class="price">A partir de 290 dh</div>
                                <div class="caption">
                                    
                                  
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_activites/piscine2.jpg" class="img-fluid" alt="...">
                               
                                <div class="caption">
                                
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_activites/piscine3.jpg" class="img-fluid" alt="...">
                                
                                <div class="caption">
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_chambres/single4.jpg" class="img-fluid" alt="...">
                                <div class="price">870 dh</div>
                                <div class="caption">
                                    
                                    <p>Le calme conféré par l'orientation sur le jardin associé à leur grand bureau</p>
                                    <a href="#" class="btn btn-order" role="button"> Réserver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_chambres/single5.jpg" class="img-fluid" alt="...">
                                <div class="price">990 dh</div>
                                <div class="caption">
                                   
                                    <p>Le calme conféré par l'orientation sur le jardin associé à leur grand bureau</p>
                                    <a href="#" class="btn btn-order" role="button">Réserver</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="tab-pane" id="tabB" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_activites/resto_lunch.jpg" class="img-fluid" alt="...">
                                <div class="price">A partir de 50 dh pour plat</div>
                                <div class="caption">       
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_activites/resto_couple.jpg" class="img-fluid" alt="...">
                                <div class="caption">
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_activites/resto_trois.jpg" class="img-fluid" alt="...">
                                <div class="caption">
                                    
                                    <p></p>
                                    
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>

                <div class="tab-pane" id="tabC" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_activites/spa1.jpg" class="img-fluid" alt="...">
                                <div class="caption">
                                    <div class="price">A partir de 500dh</div>
                                   
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_activites/spa2.jpg" class="img-fluid" alt="...">
                                <div class="caption">
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_activites/spa3.jpg" class="img-fluid" alt="...">
                                <div class="caption">
                                    
                                    
                                </div>
                            </div>
                        </div>
                        
                    
                    </div>
                </div>

  
            </div>
        </div>
    </div>

        
  
    <br> <br><br>






    
<!--    <footer>
         
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
        
        
     </footer>-->
    </body>
</html>