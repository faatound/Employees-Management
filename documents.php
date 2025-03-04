<?php
include('database.php');

$docs = $pdo->query("SELECT * FROM documents")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Documents</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Gestion des Documents 📂</h2>

    <div class="card p-4 mt-3">
        <h4>Ajouter un document</h4>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="file" class="form-label">Choisir un fichier :</label>
                <input type="file" name="file" class="form-control" required>
            </div>
            <button type="submit" name="upload" class="btn btn-success">Uploader</button>
        </form>
    </div>

    <div class="mt-5">
        <h4>Liste des documents</h4>
        <?php if (!empty($docs)) : ?>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($docs as $doc) : ?>
                        <tr>
                            <td><?= htmlspecialchars($doc['nom']); ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($doc['date_upload'])); ?></td>
                            <td>
                                <a href="<?= htmlspecialchars($doc['chemin']); ?>" class="btn btn-primary btn-sm" download>
                                    Télécharger
                                </a>
                                <a href="delete_document.php?id=<?= $doc['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce document ?');">
                                    Supprimer
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="alert alert-info">Aucun document disponible.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
