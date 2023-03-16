<?php
session_start();

if (!isset($_SESSION['ID_UTILL'])) {
  header("Location: /PHP/form_connexion.php");
  exit();
}
else{
    header("Location: /PHP/Form_Reservation.php");
    exit();   
}
?>