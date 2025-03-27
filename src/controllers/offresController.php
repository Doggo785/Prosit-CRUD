<?php
require_once 'src/config/database.php';

// Fonction pour afficher la liste des offres de stage
function afficherOffres($pdo) {
    $query = "SELECT * FROM offres";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $offres = $stmt->fetchAll(PDO::FETCH_ASSOC);

    require 'src/views/offres.php';
}

// Fonction pour ajouter une offre de stage
function ajouterOffre($pdo, $titre, $description, $entreprise_id) {
    $query = "INSERT INTO offres (titre, description, entreprise_id) VALUES (:titre, :description, :entreprise_id)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':entreprise_id', $entreprise_id);
    $stmt->execute();
}

// Gestion des actions
$action = $_GET['action'] ?? 'list';

switch ($action) {
    case 'list':
        afficherOffres($pdo);
        break;

    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'] ?? '';
            $description = $_POST['description'] ?? '';
            $entreprise_id = $_POST['entreprise_id'] ?? null;
            ajouterOffre($pdo, $titre, $description, $entreprise_id);
            header('Location: /offres?action=list');
        } else {
            require 'src/views/offres.php'; // Ajouter un formulaire dans cette vue
        }
        break;

    default:
        http_response_code(404);
        echo "Action non trouvée.";
        break;
}
?>