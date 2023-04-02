<?php 
    session_start();
?>


<?php
// Récupérer les données POST

/*$firstname = $_POST['firstname'];


$nom = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$login = $_POST['login'];

$_SESSION["login"]=$login;

$mdp = $_POST['mdp'];
$cin = $_POST['cin'];
$ad = $_POST['ad'];

$img_name = $_FILES['img']['name'];
$img_size = $_FILES['img']['size'];
$tmp_name = $_FILES['img']['tmp_name'];
$error = $_FILES['img']['error'];


// Connexion à la base de données
//include "../db_conn.php";
$conn = mysqli_connect("localhost","root","");

if( !$conn) { echo "Desolé, connexion à localhost impossible"; exit; }

if( !mysqli_select_db($conn,'gestion_hotel')) { echo "Désolé, accès à la base gestion_hotel impossible"; exit; }

// Vérifier si l'email  et le nom d'utilisateur existe déjà
$query = "SELECT * FROM utilisateurs WHERE email = '$email' AND login ='$login' ";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "l'email ou le nom d'utilisateur est déjà utilisé.";
} else {
    // Insérer les informations de compte dans la base de données
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $allowed_exs = array("jpg", "jpeg", "png");

    if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $img_upload_path = 'uploads/' . $new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
        $query = "INSERT INTO utilisateurs VALUES ('','$firstname','$nom','$email','$phone','$login','$mdp','$cin','$ad','$new_img_name')";
        mysqli_query($conn, $query);
        header("Location: /pageClient/index.php");
    } //page de connexion
    else {
        $em = "You can't upload files of this type";
        header("Location: inscription.php?error=$em");
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);*/

?>


<?php
// Include the database connection file
include ("../db_connexion.php");

// Validate user input
$firstname = $_POST['firstname'];
$nom = $_POST['name'];
$email = mysqli_real_escape_string($conn, $_POST['email']);
$login = mysqli_real_escape_string($conn, $_POST['login']);

$phone = $_POST['phone'];

$mdp = $_POST['mdp'];
$mdpp = $_POST['mdpp'];
$cin = $_POST['cin'];
$ad = $_POST['ad'];

if (!isset($firstname, $nom, $email, $phone, $login, $mdp, $mdpp, $cin, $ad)) {
    die("Tous les champs requis ne sont pas remplis");
}
if (!ctype_alpha($firstname)) {
    die("Le prénom doit être une chaîne de caractères alphabétiques.");
}

if (!ctype_alpha($nom)) {
    die("Le nom doit être une chaîne de caractères alphabétiques.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("L'email doit être une adresse email valide.");
}

if (!preg_match("/^0[5-7][0-9]{8}$/", $phone)) {
    die("Le numéro de téléphone doit être un nombre de 10 chiffres commence par 0 suivi de 5/6/7.");
}
if (strlen($mdp) < 8) {
    die("Mot de passe trop court");
}
if (!preg_match('/[A-Z]/', $mdp)) {
    die("Mot de passe doit contenir au moins une lettre majuscule");
}
if (!preg_match('/[a-z]/', $mdp)) {
    die("Mot de passe doit contenir au moins une lettre miniscule");
}
if (!preg_match('/[0-9]/', $mdp)) {
    die("Mot de passe doit contenir au moins un chiffre");
}
if (!($mdp == $mdpp)) {
    die("Les mots de passe ne sont pas les memes!");
}

// Check if the email and login already exist in the database

$query = "SELECT * FROM utilisateurs WHERE EMAIL = '$email' OR LOGIN ='$login'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "L'email ou le nom d'utilisateur est déjà utilisé.";
}

// Check if file is an image
$file = $_FILES['img'];
$allowed_extensions = ['jpg', 'jpeg', 'png'];
$file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
if (!in_array($file_extension, $allowed_extensions)) {
    $errors['image'] = "Télécharger une image valide.";
}

// Store the image in the upload directory
$upload_dir = '/PHP/uploads_inscription';
$filename = uniqid("IMG-",true) . '.' . $file_extension;
$upload_path = $upload_dir . $filename;
move_uploaded_file($file['tmp_name'], $upload_path);

// Store the URL in the database
$url =$filename;


$sql = "INSERT INTO utilisateurs VALUES ('','3','$firstname','$nom' , '$login','$mdp','$cin','$ad','$email','$phone','$url')";
mysqli_query($conn, $sql);
echo '<script>document.getElementById("confirmation-message").style.display = "block";</script>';
header("refresh:3;Location: /index.html");
exit();


// Fermer la connexion à la base de données uhiuhiihoi
mysqli_close($conn);