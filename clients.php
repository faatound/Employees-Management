<?php
session_start();
include('functions.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Gestion des Clients</h2>
    
    <a href="add_client.php" class="btn btn-success mb-3">Ajouter un Client</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $clients = client::getAllClients();
            foreach ($clients as $client) : ?>
                <tr>
                    <td><?= htmlspecialchars($client['id']); ?></td>
                    <td><?= htmlspecialchars($client['nom']); ?></td>
                    <td><?= htmlspecialchars($client['email']); ?></td>
                    <td><?= htmlspecialchars($client['telephone']); ?></td>
                    <td>
                        <a href="edit_client.php?id=<?= $client['id']; ?>" class="btn btn-primary">Modifier</a>
                        <a href="delete_client.php?id=<?= $client['id']; ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
