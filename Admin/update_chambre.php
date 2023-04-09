<?php
// Check if form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $row_id = $_POST['id'];
    // Connect to the database

    include("../db_connexion.php");

    // Get form data
    $id = $_POST['id'];
    $type = $_POST['field1'];
    $description = mysqli_real_escape_string($conn, $_POST['field2']);
    //$description = $_POST['field2'];

    $prix = $_POST['field3'];
    $file = $_FILES['img'];
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    // Store the image in the upload directory
    $upload_dir = '../Img/image_chambres/';
    $filename = uniqid("IMG-", true) . '.' . $file_extension;
    $upload_path = $upload_dir . $filename;
    // Check if file is an image
    if (!empty($file)) {

        if (!in_array($file_extension, $allowed_extensions)) {
            $message[] = "Télécharger une image valide.";
        } else {
            // Store the URL in the database
            $url =  $filename;
            $image_update_query = mysqli_query($conn, "UPDATE `chambre` SET IMAGE_CH = '$url' WHERE ID_CHAMBRE = '$id'") or die('query failed');

            if ($image_update_query) {
                move_uploaded_file($file['tmp_name'], $upload_path);
            }
        }
    }


    if ($type == 'Individuelle') {
        $id_ch = 1;
    } elseif ($type == 'Double') {
        $id_ch = 2;
    } elseif ($type == 'Triple') {
        $id_ch = 3;
    }
    // Update row in the database
    $query = "UPDATE chambre SET ID_TYPE_CHAMBRE='$id_ch', DESCRIPTION='$description', PRIX='$prix' WHERE ID_CHAMBRE=$id";
    $result = mysqli_query($conn, $query);

    // Close database connection
    mysqli_close($conn);

    // Redirect to the chambre list page
    header("Location: chambre.php");
    exit;
}
