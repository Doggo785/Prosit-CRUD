<?php
// Définition des routes
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($requestUri) {
    case '/entreprises':
        require_once 'src/controllers/entrepriseController.php';
        break;

    case '/offres':
        require_once 'src/controllers/offresController.php';
        break;

    case '/auth/login':
        require_once 'src/controllers/authController.php';
        break;

    case '/auth/logout':
        require_once 'src/controllers/authController.php';
        break;

    default:
        http_response_code(404);
        echo "Page non trouvée.";
        break;
}
?>