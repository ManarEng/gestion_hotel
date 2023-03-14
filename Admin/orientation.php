<?php
session_start();

if (!isset($_SESSION['id_util'])) {
  header("Location: login");
  exit();
}
else{
    header("Location: reservation");
    exit();   
}
?>