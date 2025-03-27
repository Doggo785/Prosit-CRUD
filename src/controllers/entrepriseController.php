<?php
require_once 'src/config/database.php';

// Fonction pour afficher la liste des entreprises
function afficherEntreprises($pdo) {
    $query = "SELECT * FROM entreprises";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $entreprises = $stmt->fetchAll(PDO::FETCH_ASSOC);

    require 'src/views/entreprises.php';
}

// Fonction pour ajouter une entreprise
function ajouterEntreprise($pdo, $nom, $adresse) {
    $query = "INSERT INTO entreprises (nom, adresse) VALUES (:nom, :adresse)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->execute();
}

// Fonction pour supprimer une entreprise
function supprimerEntreprise($pdo, $id) {
    $query = "DELETE FROM entreprises WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

// Gestion des actions
$action = $_GET['action'] ?? 'list';

switch ($action) {
    case 'list':
        afficherEntreprises($pdo);
        break;

    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $adresse = $_POST['adresse'] ?? '';
            ajouterEntreprise($pdo, $nom, $adresse);
            header('Location: /entreprises?action=list');
        } else {
            require 'src/views/entreprises.php'; // Ajouter un formulaire dans cette vue
        }
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            supprimerEntreprise($pdo, $id);
            header('Location: /entreprises?action=list');
        } else {
            http_response_code(400);
            echo "ID manquant pour la suppression.";
        }
        break;

    default:
        http_response_code(404);
        echo "Action non trouvée.";
        break;
}
?>