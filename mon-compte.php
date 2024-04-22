<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin-top: 3rem;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        .user-info {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .user-info p {
            margin: 10px 0;
        }

        .back-button, .logout-button {
            text-align: center;
            margin-top: 20px;
        }

        .back-button a, .logout-button button {
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            cursor: pointer;
        }

        .logout-button button {
            background-color: #ff0000;
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
    </style>
</head>
<body>
     <header class="header">
        <div class="logo">ReBorn</div>
        <nav class="menu">
            <ul>
              <li><a href="Acceuil.php">Accueil</a></button></li>
        <li><a href="Connexion_Inscription.html">Connexion/Inscription</a></button></li>
        <li><a href="Achats.php">Achats</a></button></li>
        <li><a href="A_propos.html">À propos</a></button></li>
     
       
            </ul>
        </nav>
    </header>
   <div class="container">
    <h1>Mon Compte</h1>
    <div class="user-info">
        <?php
        session_start();
        if (isset($_SESSION['utilisateur_connecte'])) {
            $utilisateur = $_SESSION['utilisateur_connecte'];
            ?>

            <p><strong>Nom :</strong> <?php echo $utilisateur['nom']; ?></p>
            <p><strong>Prénom :</strong> <?php echo $utilisateur['prenom']; ?></p>
            <p><strong>Email :</strong> <?php echo $utilisateur['email']; ?></p>
            <p><strong>Téléphone :</strong> <?php echo $utilisateur['telephone']; ?></p>

            <?php
        } else {
            echo "Utilisateur non trouvé.";
        }
        ?>
    </div>

    <div class="back-button">
        <a href="Acceuil.php">Retour vers l'Accueil</a>
    </div>

    <div class="back-button">
        <a href="mon-panier.php">Mon Panier</a>
    </div>

    <div class="logout-button">
        <form action="Déconnexion.php" method="post">
            <button type="submit">Déconnexion</button>
        </form>
    </div>
</div>
</body>
</html>
