<?php
session_start();
$id2 = $_SESSION['ID_UTILL'];
if (!isset($id2)) {
    header("Location: ../index.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Agent</title>
</head>
<?php
include("../PHP/header_ag.php")
?>
<div class="container">
    <?php

    include("../db_connexion.php");

    $query = "SELECT NOM,PRENOM FROM utilisateurs where ID_PROFIL=2 and ID_UTILL=$id2;";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);


    ?>

    <div class="heading">
        <h2>Bienvenue <?php echo $row['NOM'] . ' ' . $row['PRENOM']; ?></h2>
    </div>
    <div class="divider"></div>
    <div style="margin-left: 25%; padding: 1px 16px; height: 1000px;">

        </body>

</html>