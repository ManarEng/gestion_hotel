<?php
session_set_cookie_params(0);

session_start();

if (!isset($_SESSION['ID_UTILL'])) {
  header("Location: /PHP/form_connexion.php");
  exit();
}
else{
    header("Location: /PHP/index_chambres_activites.php");
    exit();   
}
?>