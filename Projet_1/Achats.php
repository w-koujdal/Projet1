<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            margin-top: 1rem;
        }

        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #f2f2f2;
            overflow: hidden;
        }

        .product img {
            float: left;
            margin-right: 10px;
        }

        .product-content {
            float: left;
            width: 70%;
        }

        .product-content h2 {
            font-size: 20px;
            margin: 0;
        }

        .product-content p {
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
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
            width: 33%;
        }

        .menu {
            width: 37%;
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

        h1 {
            text-align: center;
        }

        .view-cart-button {
            display: block;
            text-align: center;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            margin-right: 30%;
            margin-left: 30%;
        }

        .notification {
            display: none;
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            padding: 10px;
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
                <li><a href="A_propos.html">À propos</a></li>
                <li><a href="mon-compte.php">Mon compte</a></li>
            </ul>
        </nav>
    </header>
    <br><br>
    <h1>Liste des Produits</h1>
            <a class="view-cart-button" href="mon-panier.php">Voir le Panier</a>

    <div class="container">
        <?php
        session_start();

        $connexion = mysqli_connect('localhost', 'u967421408_KOUJDAL', 'L33u[6IM5~e', 'u967421408_KOUJDAL');

        if (!$connexion) {
            die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
        }

        if (isset($_POST['ajouter_au_panier'])) {
            if (isset($_SESSION['utilisateur_connecte'])) {
                $produit_id = $_POST['produit_id'];
                $produit_nom = $_POST['produit_nom'];
                $produit_prix = $_POST['produit_prix'];

                $produit = array(
                    'id' => $produit_id,
                    'nom' => $produit_nom,
                    'prix' => $produit_prix,
                    'quantite' => 1
                );

                if (!isset($_SESSION['panier'])) {
                    $_SESSION['panier'] = array();
                    array_push($_SESSION['panier'], $produit);
                    echo '<div class="notification">Produit ajouté au panier!</div>';
                } else {
                    array_push($_SESSION['panier'], $produit);
                    echo '<div class="notification">Produit ajouté au panier!</div>';
                }
            } else {
                header("Location: Connexion.html");
                exit;
            }
        }

        $sql = 'SELECT * FROM produits';

        $result = mysqli_query($connexion, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product">';
                echo '<img src="' . $row['image_url'] . '" alt="' . $row['nom'] . '">';
                echo '<div class="product-content">';
                echo '<h2>' . $row['nom'] . '</h2>';
                echo '<p>' . $row['description'] . '</p>';
                echo '<p>Prix : ' . $row['prix'] . ' EUR</p>';
                echo '<p>Quantité : ' . $row['quantite'] . '</p>';
                echo '<p>Catégorie : ' . $row['categorie'] . '</p>';
                echo '<form method="post" action="Achats.php">';
                echo '<input type="hidden" name="produit_id" value="' . $row['id'] . '">';
                echo '<input type="hidden" name="produit_nom" value="' . $row['nom'] . '">';
                echo '<input type="hidden" name="produit_prix" value="' . $row['prix'] . '">';
                echo '<input type="submit" name="ajouter_au_panier" value="Ajouter au panier">';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'Aucun produit trouvé.';
        }

        mysqli_close($connexion);
        ?>

    </div>

    <script>
        // Affiche la notification pendant 3 secondes après l'ajout au panier
        document.addEventListener('DOMContentLoaded', function () {
            var notification = document.querySelector('.notification');
            if (notification) {
                notification.style.display = 'block';
                setTimeout(function () {
                    notification.style.display = 'none';
                }, 3000);
            }
        });
    </script>
</body>
</html>
