<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $numeroCarte = $_POST["numero_carte"];
    $dateExpiration = $_POST["date_expiration"];
    $cvc = $_POST["cvc"];

    if (empty($numeroCarte) || empty($dateExpiration) || empty($cvc)) {
        die("Tous les champs sont obligatoires.");
    }

    $datePattern = "/^(0[1-9]|1[0-2])\/\d{2}$/";
    if (!preg_match($datePattern, $dateExpiration)) {
        die("Format de date d'expiration invalide (utilisez MM/AA).");
    }


    header("Location: confirmation_paiement.php");
    exit;
}
?>
