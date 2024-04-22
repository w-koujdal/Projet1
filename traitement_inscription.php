<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "mysql";
$base_de_donnees = "reborn";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}


$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); // Hasher le mot de passe
$telephone = $_POST['telephone']; 



$requete = "SELECT id FROM membres WHERE email='$email'";

$resultat = $connexion->query($requete);

if ($resultat->num_rows > 0) {
    echo "Un compte avec cet email existe déjà. Veuillez utiliser une autre adresse email.";
} else {

    $sql = "INSERT INTO membres (nom, prenom, email, mot_de_passe, telephone) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe', '$telephone')";

    if ($connexion->query($sql) === TRUE) {

        header('Location: bienvenue.html');
    } else {
        echo "Erreur : " . $sql . "<br>" . $connexion->error;
    }
}

$connexion->close();
?>
