<?php
// Point d'entrée principal

// Inclusion des fichiers nécessaires
require_once 'src/config/database.php';
require_once 'src/routes.php';

// Gestion des erreurs
set_exception_handler(function ($e) {
    http_response_code(500);
    echo "Une erreur est survenue : " . htmlspecialchars($e->getMessage());
});

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    http_response_code(500);
    echo "Erreur [$errno] : $errstr dans le fichier $errfile à la ligne $errline.";
});
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Prosit-CRUD</title>
</head>
<body>
    <h1>Bienvenue sur Prosit-CRUD !</h1>
    <p>Utilisez le menu ci-dessous pour naviguer entre les différentes sections de l'application :</p>

    <!-- Menu de navigation -->
    <nav>
        <ul>
            <li><a href="/entreprises?action=list">Gestion des entreprises</a></li>
            <li><a href="/offres?action=list">Gestion des offres de stage</a></li>
        </ul>
    </nav>
</body>
</html>