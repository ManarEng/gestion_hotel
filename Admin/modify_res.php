<?php




// Récupérer l'ID de la réservation à modifier
$id_rese  = $_GET['ID_RES'];

// Se connecter à la base de données
$conn = new mysqli("localhost", "root", "", "gestion_hotel");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données de la réservation à modifier
$sql = "SELECT * FROM reservation WHERE id_rese  = $id_rese ";
$result = mysqli_query($conn, $sql);
$reservation = mysqli_fetch_assoc($result);

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $date_entree = $_POST['date_entree'];
    $date_sortie = $_POST['date_sortie'];

    // Mettre à jour la réservation dans la base de données
    $sql = "UPDATE reservation SET date_entree = '$date_entree', date_sortie = '$date_sortie' WHERE id_rese  = $id_rese ";
    if (mysqli_query($conn, $sql)) {
        // Rediriger vers la page de liste des réservations
        header("Location: reservations.php");
        exit();
    } else {
        // Afficher un message d'erreur en cas d'échec de la mise à jour
        echo "Erreur: " . mysqli_error($conn);
    }
}

// Afficher le formulaire de modification de réservation
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier une réservation</title>
</head>
<body>
    <h1>Modifier une réservation</h1>
    <form method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id_rese ']; ?>" />
        <label for="date_entree">Date d'entrée:</label>
        <input type="date" name="date_entree" value="<?php echo $reservation['date_entree']; ?>"><br><br>
        <label for="date_sortie">Date de sortie:</label>
        <input type="date" name="date_sortie" value="<?php echo $reservation['date_sortie']; ?>"><br><br>
        <input type="submit" value="Enregistrer les modifications">
    </form>
</body>
</html>
