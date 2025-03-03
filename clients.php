<?php
session_start();
include('functions.php'); 
include('database.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    $resultat = Client::addClient( $nom, $email, $telephone);

    if ($resultat) {
        $message = "Client ajouté avec succès!";
    } else {
        $message = "Une erreur est survenue lors de l'ajout du client.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Clients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Gestion des Clients</h2>
    
    <h3>Ajouter un nouveau client</h3>
    <form action="clients.php" method="POST">
       
        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" id="nom" name="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" class="form-control" required>
        </div>
        <button type="submit" name="ajouter" class="btn btn-success">Ajouter Client</button>
    </form>

    <?php if (isset($message)) : ?>
        <div class="alert alert-info mt-3">
            <?= htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <h3 class="mt-5">Liste des clients</h3>
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
            $clients = Client::getAllClients();
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
