<?php
session_start();

if (isset($_SESSION['panier'])) {
    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "mysql";
    $base_de_donnees = "reborn";

    $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

    if ($connexion->connect_error) {
        die("La connexion à la base de données a échoué : " . $connexion->connect_error);
    }

    foreach ($_SESSION['panier'] as $key => $product_info) {
        $produit_id = $product_info['id'];
        $quantite = $product_info['quantite'];

        $sql_update_ventes = "UPDATE produits SET nombre_ventes = nombre_ventes + $quantite WHERE id = $produit_id";
        $result_update_ventes = mysqli_query($connexion, $sql_update_ventes);

        if (!$result_update_ventes) {
            echo "Erreur lors de la mise à jour du nombre de ventes : " . mysqli_error($connexion);
            exit;
        }
    }

    $id_client = $_SESSION['utilisateur_connecte']['id']; 
    $montant_total = 0;

    foreach ($_SESSION['panier'] as $key => $product_info) {
        $produit_id = $product_info['id'];
        $quantite = $product_info['quantite'];
        $prix_produit = $product_info['prix'];

        $montant_total += $quantite * $prix_produit;
    }

    $date_paiement = date("Y-m-d H:i:s");

    $sql_insert_paiement = "INSERT INTO paiement (membres_id, montant_total, date_paiement)
                            VALUES ($id_client, $montant_total, '$date_paiement')";
    $result_insert_paiement = mysqli_query($connexion, $sql_insert_paiement);

    if (!$result_insert_paiement) {
        echo "Erreur lors de l'insertion du paiement : " . mysqli_error($connexion);
        exit;
    }

    unset($_SESSION['panier']);

    header('Location: mercipayer.html');
    exit;
} else {
    echo 'Aucun produit trouvé dans votre panier.';
}
?>
