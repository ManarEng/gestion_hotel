

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

    <?php
    include 'trait_chambres_activites.php';
?>

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
            
            <nav>
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab1" role="tab"><?php echo $type1;  ?></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" data-bs-target="#tab2" role="tab"><?php echo $type2;  ?></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" data-bs-target="#tab3" role="tab"><?php echo $type3;  ?></a>
                    </li>
                    
                </ul>
            </nav>

            <div class="tab-content">

                <div class="tab-pane active" id="tab1" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="<?php echo $image1;  ?>" class="img-fluid" alt="...">
                                <div class="price"><?php echo $prix1;  ?></div>
                                <div class="caption">
                                    
                                    <p><?php echo $desc1;  ?></p>
                                    <a href="#" class="btn btn-order" role="button"> Réserver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="<?php echo $image2;  ?>" class="img-fluid" alt="...">
                                <div class="price"><?php echo $prix2;  ?></div>
                                <div class="caption">
                                    
                                    <p><?php echo $desc2;  ?></p>
                                    <a href="#" class="btn btn-order" role="button"> Réserver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="<?php echo $image3;  ?>" class="img-fluid" alt="...">
                                <div class="price"><?php echo $prix3;  ?></div>
                                <div class="caption">
                                    
                                    <p><?php echo $desc3;  ?></p>
                                    <a href="#" class="btn btn-order" role="button"> Réserver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_chambres/single4.jpg" class="img-fluid" alt="...">
                                <div class="price">870 dh</div>
                                <div class="caption">
                                    
                                    <p>Le calme conféré par l'orientation sur le jardin associé à leur grand bureau.</p>
                                    <a href="#" class="btn btn-order" role="button"> Réserver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_chambres/single5.jpg" class="img-fluid" alt="...">
                                <div class="price">990 dh</div>
                                <div class="caption">
                                   
                                    <p>La chambre comporte une télévision, un bureau et un petit canapé</p>
                                    <a href="#" class="btn btn-order" role="button">Réserver</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="tab-pane" id="tab2" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_chambres/double1.jpg" class="img-fluid" alt="...">
                                <div class="price">1100 dh</div>
                                <div class="caption">
                                   
                                    <p>Chambre pour les couples, confortable et donnant sur le bleu du ciel.</p>
                                    <a href="#" class="btn btn-order" role="button"> Réserver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_chambres/double2.jpg" class="img-fluid" alt="...">
                                <div class="price">1500 dh</div>
                                <div class="caption">
                                    
                                    <p>Chambre double avec canapé et une petite table.</p>
                                    <a href="#" class="btn btn-order" role="button"> Réserver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_chambres/double3.jpg" class="img-fluid" alt="...">
                                <div class="price">3760 dh</div>
                                <div class="caption">
                                    
                                    <p>Grand espace avec une chambre double, un bureau et une toilette.</p>
                                    <a href="#" class="btn btn-order" role="button"> Réserver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_chambres/double4.jpg" class="img-fluid" alt="...">
                                <div class="price">2190 dh</div>
                                <div class="caption">
                                    
                                    <p>Chambre avec des couleurs claires et un miroire.</p>
                                    <a href="#" class="btn btn-order" role="button">Réserver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_chambres/double5.jpg" class="img-fluid" alt="...">
                                <div class="price">1603 dh</div>
                                <div class="caption">
                                    
                                    <p>Chambre double avec un balcon donnant sur la grande piscine de HoteLUX.</p>
                                    <a href="#" class="btn btn-order" role="button"> Réserver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_chambres/double6.jpg" class="img-fluid" alt="...">
                                <div class="price">1700 dh</div>
                                <div class="caption">
                                    
                                    <p>Le calme conféré par l'orientation sur le jardin associé à leur grand bureau</p>
                                    <a href="#" class="btn btn-order" role="button">Réserver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tab3" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_chambres/triple1.jpg" class="img-fluid" alt="...">
                                <div class="price">5500 dh</div>
                                <div class="caption">
                                   
                                    <p>chambre à trois personnes, un bureau et une télévison</p>
                                    <a href="#" class="btn btn-order" role="button">Réserver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_chambres/triple2.jpg" class="img-fluid" alt="...">
                                <div class="price">3100 dh</div>
                                <div class="caption">
                                    
                                    <p>Chambre avec des couleurs claires renforcant le sentiment de douceur et confort.</p>
                                    <a href="#" class="btn btn-order" role="button"> Réserver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_chambres/triple3.jpg" class="img-fluid" alt="...">
                                <div class="price">4990 dh</div>
                                <div class="caption">
                                    
                                    <p>Chambre lumineuse à style moderne et jolie.</p>
                                    <a href="#" class="btn btn-order" role="button"> Réserver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_chambres/triple4.jpg" class="img-fluid" alt="...">
                                <div class="price">5088 dh</div>
                                <div class="caption">
                                    
                                    <p>Television, bureau et trois chambres avec un style de luxe.</p>
                                    <a href="#" class="btn btn-order" role="button">Réserver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="img-thumbnail">
                                <img src="/Img/image_chambres/triple5.jpg" class="img-fluid" alt="...">
                                <div class="price">2955 dh</div>
                                <div class="caption">
                                    
                                    <p>Chambre à moyenne taille correspond aux familles avec les parents et un enfant.</p>
                                    <a href="#" class="btn btn-order" role="button"> Réserver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

  
            </div>
        </div>
    </div>
    <br> <br><br>








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
                        <!--<div class="col-md-6 col-lg-4">
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
                        </div>-->
                        
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
                                <img src="/Img/image_activites/spa.jpg" class="img-fluid" alt="...">
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