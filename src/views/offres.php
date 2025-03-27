<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des offres de stage</title>
</head>
<body>
    <h1>Gestion des offres de stage</h1>

    <!-- Tableau pour afficher la liste des offres -->
    <?php if (!empty($offres)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Entreprise</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($offres as $offre): ?>
                    <tr>
                        <td><?= htmlspecialchars($offre['id']) ?></td>
                        <td><?= htmlspecialchars($offre['titre']) ?></td>
                        <td><?= htmlspecialchars($offre['description']) ?></td>
                        <td><?= htmlspecialchars($offre['entreprise_nom']) ?></td>
                        <td>
                            <a href="/offres?action=delete&id=<?= htmlspecialchars($offre['id']) ?>" 
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?');">
                               Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucune offre de stage trouvée.</p>
    <?php endif; ?>

    <!-- Formulaire pour ajouter une nouvelle offre -->
    <h2>Ajouter une offre de stage</h2>
    <form action="/offres?action=add" method="POST">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required>
        <br>
        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>
        <br>
        <label for="entreprise_id">ID de l'entreprise :</label>
        <input type="number" id="entreprise_id" name="entreprise_id" required>
        <br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>