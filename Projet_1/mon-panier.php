<?php
session_start();

function getImg($idproduit){
    // Connexion à la base de données
$serveur = "localhost";
$utilisateur = "u967421408_KOUJDAL";
$mot_de_passe = "L33u[6IM5~e";
$base_de_donnees = "u967421408_KOUJDAL";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}
$req = "select image_url from produits where id= ?";
$statement = $connexion->prepare($req);
$statement->bind_param("s", $idproduit);
$statement->execute();
$resultat = $statement->get_result();
 $produit = $resultat->fetch_assoc();
return $produit['image_url'];
}
if (!isset($_SESSION['utilisateur_connecte'])) {
    header("Location: Connexion.html");
    exit;
}

if (isset($_SESSION['panier'])) {
    echo '
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mon Panier</title>
        <style>
           body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: #333;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            width: 39%;
        }

        .menu {
            width: 39%;
        }

        .menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu ul li {
            display: inline;
            margin-right: 20px;
        }

        .menu ul li:last-child {
            margin-right: 0;
        }

        .menu ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin-top: 70px;
        }

        h1 {
            text-align: center;
        }

        .cart-items {
            margin-top: 20px;
        }

        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product img {
            max-width: 100px;
            max-height: 100px;
            margin-right: 10px;
        }

        .product-content {
            flex: 1;
        }

        .product h2 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .product p {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .payment-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    
        </style>
    </head>
    <body>
        <header class="header">
            <div class="logo">ReBorn</div>
            <nav class="menu">
                <ul>
                    <li><a href="Acceuil.html">Accueil</a></li>
                    <li><a href="Connexion_Inscription.html">Connexion/Inscription</a></li>
                    <li><a href="Achats.php">Achats</a></li>
                    <li><a href="A_propos.html">À propos</a></li>
                    <li><a href="mon-compte.php">Mon compte</a></li>
                </ul>
            </nav>
        </header>
        <div class="container">
            <h1>Mon Panier</h1>
            <div class="cart-items">';


foreach ($_SESSION['panier'] as $key => $product_info) {
    echo '<div class="product">';
    
    $image_path =  getImg($product_info['id']);

    echo '<img src="' . $image_path . '" alt="' . $product_info['nom'] . '">';
    echo '<div class="product-content">';
    echo '<h2>' . $product_info['nom'] . '</h2>';
    echo '<p>Prix : ' . $product_info['prix'] . ' EUR</p>';
    echo '<p>Quantité : ' . $product_info['quantite'] . '</p>';
                        echo '<a class="remove-button" href="supprimer_du_panier.php?produit_id=' . $product_info['id'] . '">Supprimer du panier</a>';

    echo '</div>';
    echo '</div>';
}

    echo '<a class="payment-button" href="Payement.html">Paiement</a>';
    echo '</div>';

} else {
    echo 'Aucun produit trouvé dans votre panier.';
}

?>
</body>
</html>
