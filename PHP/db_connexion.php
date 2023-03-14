<?php

$conn = mysqli_connect("localhost","root","");

if( !$conn) { echo "Desolé, connexion à localhost impossible"; exit; }
if( !mysqli_select_db($conn,'gestion_hotel')) { echo "Désolé, accès à la base gestion_hotel impossible"; exit; }

?>