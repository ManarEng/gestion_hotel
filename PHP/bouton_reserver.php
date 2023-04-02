<?php

session_start();

if(isset($_SESSION['ID_UTILL'])){
    header('location:/PHP/form_reservation.php');
}else{
    header('location:/PHP/form_connexion.php');
}
exit();

?>