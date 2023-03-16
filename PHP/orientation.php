<?php
session_start();

if (!isset($_SESSION['ID_UTILL'])) {
  header("Location: /php/form_connexion.php");
  exit();
}
else{
    header("Location: reservation");
    exit();   
}
?>