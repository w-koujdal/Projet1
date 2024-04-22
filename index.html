<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site Web</title>
    <link rel="stylesheet" href="Acceuil.css">
    <style >
           .top-selling-products {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
        }

        .product {
            text-align: center;
            max-width: 200px; 
            margin: 0 10px 20px;
        }

        .top-selling-image {
            max-width: 150px; 
            max-height: 150px; 
            margin-bottom: 10px; 
            margin-left: auto;
            margin-right: auto;
            display: block;
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
    <br><br>

    <div class="black-banner">
        <h1>Reborn</h1>
        <div class="slideshow-container">
            <div class="slide">
                <img src="images/pc.png" alt="Image 1">
            </div>

            <div class="slide">
                <img src="images\Ecran.jpg" alt="Image 2">
            </div>

            <div class="slide">
                <img src="images/clavier.png" alt="Image 3">
            </div>

            <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
            <a class="next" onclick="changeSlide(1)">&#10095;</a>
        </div>
        <br>
        <strong><p>Donnez une seconde vie à vos appareils</p></strong>
    </div>

    <br>
    <p>Voici les différents types d'appareils disponibles</p>
    <div class="image-container">
    </div>

    <div class="top-selling-section">
        <?php
        $serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe = "mysql";
        $base_de_donnees = "reborn";

        $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

        if ($connexion->connect_error) {
            die("La connexion à la base de données a échoué : " . $connexion->connect_error);
        }

        $sql_top_selling = "SELECT id, nom, description, prix, quantite, image_url, date_ajout, categorie, nombre_ventes
                            FROM produits
                            ORDER BY nombre_ventes DESC
                            LIMIT 3";

        $result_top_selling = mysqli_query($connexion, $sql_top_selling);

        if ($result_top_selling && mysqli_num_rows($result_top_selling) > 0) {
            echo '<h2>Les produits les plus vendus</h2>';
            echo '<div class="top-selling-products">';

            while ($row = mysqli_fetch_assoc($result_top_selling)) {
                echo '<div class="product">';
                echo '<img class="top-selling-image" src="' . $row['image_url'] . '" alt="' . $row['nom'] . '">';
                echo '<h3>' . $row['nom'] . '</h3>';
                echo '<p>Description : ' . $row['description'] . '</p>';
                echo '<p>Prix : ' . $row['prix'] . ' EUR</p>';
                echo '</div>';
            }

            echo '</div>';
        } else {
            echo 'Aucun produit le plus vendu trouvé.';
        }
        ?>
    </div>

    <div class="black-banner">
        <h2>Contactez-nous</h2>
        <p>Numéro de téléphone : 06 26 18 95 80</p>
        <p>Adresse : 11 rue de Picardie, Argenteuil </p>
        <p>Email : reborn@gmail.com</p>
    </div>
    <footer>
        <p>&copy; 2023 ReBorn. Tous droits réservés.</p>
    </footer>

    <script>
        var slideIndex = 0;
        showSlide(slideIndex);

        function changeSlide(n) {
            showSlide(slideIndex += n);
        }

        function showSlide(n) {
            var slides = document.getElementsByClassName("slide");

            if (n >= slides.length) {
                slideIndex = 0;
            } else if (n < 0) {
                slideIndex = slides.length - 1;
            }

            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slides[slideIndex].style.display = "block";
        }
    </script>
</body>
</html>