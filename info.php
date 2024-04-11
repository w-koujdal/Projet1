<?php
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "L33u[6IM5~e";
$base_de_donnees = "u967421408_KOUJDAL";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

$id_utilisateur = 1;

$requete = "SELECT * FROM membres WHERE id = $id_utilisateur";
$resultat = $connexion->query($requete);

if ($resultat->num_rows == 1) {
    $utilisateur = $resultat->fetch_assoc();
} else {
    echo "Utilisateur non trouvé.";
}

$connexion->close();
?>
