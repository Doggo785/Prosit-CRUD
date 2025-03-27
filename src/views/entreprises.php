<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des entreprises</title>
</head>
<body>
    <h1>Gestion des entreprises</h1>

    <!-- Tableau pour afficher la liste des entreprises -->
    <?php if (!empty($entreprises)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entreprises as $entreprise): ?>
                    <tr>
                        <td><?= htmlspecialchars($entreprise['id']) ?></td>
                        <td><?= htmlspecialchars($entreprise['nom']) ?></td>
                        <td><?= htmlspecialchars($entreprise['adresse']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucune entreprise trouvée.</p>
    <?php endif; ?>

    <!-- Formulaire pour ajouter une nouvelle entreprise -->
    <h2>Ajouter une entreprise</h2>
    <form action="/entreprises?action=add" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
        <br>
        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" required>
        <br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>