<?php
require_once 'src/config/database.php';

// Fonction pour afficher la liste des offres de stage
function afficherOffres($pdo) {
    $query = "
        SELECT offres.id, offres.titre, offres.description, entreprises.nom AS entreprise_nom
        FROM offres
        INNER JOIN entreprises ON offres.entreprise_id = entreprises.id
    ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $offres = $stmt->fetchAll(PDO::FETCH_ASSOC);

    require 'src/views/offres.php';
}

// Fonction pour vérifier si une entreprise existe
function entrepriseExiste($pdo, $entreprise_id) {
    $query = "SELECT COUNT(*) FROM entreprises WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $entreprise_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

// Fonction pour ajouter une offre de stage
function ajouterOffre($pdo, $titre, $description, $entreprise_id) {
    if (!entrepriseExiste($pdo, $entreprise_id)) {
        throw new Exception("L'entreprise avec l'ID $entreprise_id n'existe pas.");
    }

    $query = "INSERT INTO offres (titre, description, entreprise_id) VALUES (:titre, :description, :entreprise_id)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':entreprise_id', $entreprise_id);
    $stmt->execute();
}

// Fonction pour supprimer une offre de stage
function supprimerOffre($pdo, $id) {
    $query = "DELETE FROM offres WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

// Gestion des actions
$action = $_GET['action'] ?? 'list';

try {
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

        case 'delete':
            $id = $_GET['id'] ?? null;
            if ($id) {
                supprimerOffre($pdo, $id);
                header('Location: /offres?action=list');
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
} catch (Exception $e) {
    http_response_code(400);
    echo "Erreur : " . htmlspecialchars($e->getMessage());
}
?>