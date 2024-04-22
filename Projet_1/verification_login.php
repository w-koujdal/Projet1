<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

$serveur = "localhost";
$utilisateur = "u967421408_KOUJDAL";
$mot_de_passe = "L33u[6IM5~e";
$base_de_donnees = "u967421408_KOUJDAL";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

$requete = "SELECT * FROM membres WHERE email = ? LIMIT 1";
$statement = $connexion->prepare($requete);
$statement->bind_param("s", $email);
$statement->execute();
$resultat = $statement->get_result();

if ($resultat->num_rows == 1) {
    $utilisateur = $resultat->fetch_assoc();
    $mot_de_passe_hache = $utilisateur['mot_de_passe'];
    
    // Vérification du mot de passe haché
    if (password_verify($mot_de_passe, $mot_de_passe_hache)) {
        $_SESSION['utilisateur_connecte'] = $utilisateur;
        
        header('Location: mon-compte.php');
        exit();
    }
}

$messageErreur = "L'authentification a échoué. Veuillez vérifier vos identifiants.";
?>
