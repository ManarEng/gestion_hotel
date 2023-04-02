<?php

session_start();

if(isset($_SESSION['ID_UTILL'])){
    header('location:/PHP/index_chambres_activites.php');
}else{
    header('location:/PHP/form_connexion.php');

}
exit();

?>