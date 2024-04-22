<?php
session_start();

if (isset($_GET['produit_id'])) {
    $produit_id = $_GET['produit_id'];

    $key = array_search($produit_id, array_column($_SESSION['panier'], 'id'));

    if ($key !== false) {
        unset($_SESSION['panier'][$key]);
    }
}

header("Location: mon-panier.php");
exit;

function supprimerProduitDuPanier($produit_id)
{
    if (isset($_SESSION['panier'])) {
        $key = array_search($produit_id, array_column($_SESSION['panier'], 'id'));

        if ($key !== false) {
            unset($_SESSION['panier'][$key]);
        }
    }
}

?>
