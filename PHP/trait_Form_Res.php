<?php
$nbrech = $_POST["nbre_chambre"];
$idactivite = $_POST["id_activite"];
$entree = $_POST["date_entree"];
$sortie = $_POST["date_sortie"];

// Créer une nouvelle connexion à la base de données MySQL
$conn = new mysqli("localhost", "root", "", "gestion_hotel");

// Vérifiez si la connexion a réussi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Écrivez une requête SQL pour sélectionner les données que vous souhaitez remplir dans le formulaire
$sql = "SELECT utilisateurs.nom_util, utilisateurs.tele, chambre.type, chambre.prix, activite.type_ac, activite.id_activite
FROM reservation 
JOIN utilisateurs ON reservation.id_util = utilisateurs.id_util 
JOIN chambre ON reservation.id_chambre = chambre.id_chambre 
JOIN activite ON reservation.id_activite = activite.id_activite";
$result = $conn->query($sql);

// Vérifiez si la requête a retourné des résultats
if ($result->num_rows > 0) {
    // Parcourez le tableau retourné et remplissez les champs correspondants du formulaire
    while($row = $result->fetch_assoc()) {
        $username = $row["nom_util"];
        $tele = $row["tele"];
        $tchambre = $row["type"];
        $pchambre = $row["prix"];
        $tactivite = $row["type_ac"];
        $iactivite = $row["id_activite"];
    }
} else {
    echo "0 results";
}

// Écrivez une requête SQL pour insérer les données du formulaire dans la table reservation
$query = "INSERT INTO reservation (nbre_chambre, id_activite, date_entree, date_sortie) VALUES ('$nbrech', '$idactivite', '$entree', '$sortie')";

// Exécutez la requête SQL en utilisant la connexion MySQL
if (mysqli_query($conn, $query)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Fermez la connexion à la base de données
$conn->close();
?>
