<?php
session_set_cookie_params(0);

include 'db_connexion.php';

//LES 5 CHAMBRES DE TYPE INDIVIDUELLE

    $chambre1 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='1'");
    if($chambre1) 
    while($ligne1 = mysqli_fetch_object($chambre1)) {
    $type1= $ligne1->type;
    $desc1= $ligne1->description;
    $prix1= $ligne1->prix;
    $image1= $ligne1->image;
    }

    $chambre2 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='2'");
    if($chambre2) 
    while($ligne2 = mysqli_fetch_object($chambre2)) {
    //$type1= $ligne1->type;
    $desc2= $ligne2->description;
    $prix2= $ligne2->prix;
    $image2= $ligne2->image;
    }


    $chambre3 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='3'");
    if($chambre3) 
    while($ligne3 = mysqli_fetch_object($chambre3)) {
    $desc3= $ligne3->description;
    $prix3= $ligne3->prix;
    $image3= $ligne3->image;
    }

    $chambre4 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='4'");
    if($chambre4) 
    while($ligne4 = mysqli_fetch_object($chambre4)) {
    $desc4= $ligne4->description;
    $prix4= $ligne4->prix;
    $image4= $ligne4->image;
    }

    $chambre5 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='5'");
    if($chambre5) 
    while($ligne5 = mysqli_fetch_object($chambre5)) {
    $desc5= $ligne5->description;
    $prix5= $ligne5->prix;
    $image5= $ligne5->image;
    }

//LES 6 CHAMBRES DE TYPE DOUBLE

    $chambre6 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='6'");
    if($chambre6) 
    while($ligne6 = mysqli_fetch_object($chambre6)) {
    $type2= $ligne6->type;
    $desc6= $ligne6->description;
    $prix6= $ligne6->prix;
    $image6= $ligne6->image;
    }

    $chambre7 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='7'");
    if($chambre7) 
    while($ligne7 = mysqli_fetch_object($chambre7)) {
    //$type1= $ligne1->type;
    $desc7= $ligne7->description;
    $prix7= $ligne7->prix;
    $image7= $ligne7->image;
    }


    $chambre8 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='8'");
    if($chambre8) 
    while($ligne8 = mysqli_fetch_object($chambre8)) {
    $desc8= $ligne8->description;
    $prix8= $ligne8->prix;
    $image8= $ligne8->image;
    }

    $chambre9 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='9'");
    if($chambre9) 
    while($ligne9 = mysqli_fetch_object($chambre9)) {
    $desc9= $ligne9->description;
    $prix9= $ligne9->prix;
    $image9= $ligne9->image;
    }

    $chambre10 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='10'");
    if($chambre10) 
    while($ligne10 = mysqli_fetch_object($chambre10)) {
    $desc10= $ligne10->description;
    $prix10= $ligne10->prix;
    $image10= $ligne10->image;
    }

    $chambre11 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='11'");
    if($chambre11) 
    while($ligne11 = mysqli_fetch_object($chambre11)) {
    $desc11= $ligne11->description;
    $prix11= $ligne11->prix;
    $image11= $ligne11->image;
    }

//LES 5 CHAMBRES DE TYPE TRIPLE

$chambre12 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='12'");
if($chambre12) 
while($ligne12 = mysqli_fetch_object($chambre12)) {
$type3= $ligne12->type;
$desc12= $ligne12->description;
$prix12= $ligne12->prix;
$image12= $ligne12->image;
}

$chambre13 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='13'");
    if($chambre13) 
    while($ligne13 = mysqli_fetch_object($chambre13)) {
    $desc13= $ligne13->description;
    $prix13= $ligne13->prix;
    $image13= $ligne13->image;
    }

    $chambre14 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='14'");
    if($chambre14) 
    while($ligne14 = mysqli_fetch_object($chambre14)) {
    $desc14= $ligne14->description;
    $prix14= $ligne14->prix;
    $image14= $ligne14->image;
    }

    $chambre15 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='15'");
    if($chambre15) 
    while($ligne15 = mysqli_fetch_object($chambre15)) {
    $desc15= $ligne15->description;
    $prix15= $ligne15->prix;
    $image15= $ligne15->image;
    }

    $chambre16 = mysqli_query($conn ,"SELECT * FROM chambre where id_chambre='16'");
    if($chambre16) 
    while($ligne16 = mysqli_fetch_object($chambre16)) {
    $desc16= $ligne16->description;
    $prix16= $ligne16->prix;
    $image16= $ligne16->image;
    }
    








?>