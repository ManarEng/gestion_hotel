<?php

/*session_start();

if(isset($_GET['ID_CHAMBRE'])) {
    $_SESSION['ID_CHAMBRE'] = $_GET['ID_CHAMBRE'];
}



if(isset($_SESSION['ID_UTILL'])){
    header('location:/PHP/form_reservation.php');
}else{
    header('location:/PHP/form_connexion.php');
}
exit();*/

?>

<?php
session_set_cookie_params(0);

session_start();

if(isset($_GET['ID_CHAMBRE'])) {
    $_SESSION['ID_CHAMBRE'] = $_GET['ID_CHAMBRE'];
}

// rediriger l'utilisateur vers la page de réservation
if(isset($_SESSION['ID_UTILL'])){
    header('location:/PHP/form_reservation.php');
}else{
    header('location:/PHP/form_connexion.php');
}
exit;
?>