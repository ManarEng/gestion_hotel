<?php
session_set_cookie_params(0);

session_start();

if(isset($_SESSION['ID_UTILL'])){
    header('location:/Client/index_chambres_activites.php');
}else{
    header('location:/PHP/form_connexion.php');

}
exit();

?>