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

// Message d'accueil
echo "<h1>Bienvenue sur Prosit-CRUD !</h1>";
?>