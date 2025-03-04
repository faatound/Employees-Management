<?php
session_start();
include('functions.php'); 
include('database.php'); 

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID client manquant.");
}

$id = $_GET['id'];

$client = Client::getClientById($id);
if (!$client) {
    die("Client non trouvé.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    $resultat = Client::updateClient($id, $nom, $email, $telephone);

    if ($resultat) {
        $message = "Client mis à jour avec succès!";
    } else {
        $message = "Une erreur est survenue lors de la mise à jour.";
    }

    $client = Client::getClientById($id);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Modifier un Client</h2>

    <?php if (isset($message)) : ?>
        <div class="alert alert-info"><?= htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <form action="edit.php?id=<?= htmlspecialchars($id); ?>" method="POST">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" id="nom" name="nom" class="form-control" value="<?= htmlspecialchars($client['nom']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($client['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" class="form-control" value="<?= htmlspecialchars($client['telephone']); ?>" required>
        </div>
        <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
        <a href="clients.php" class="btn btn-secondary">Annuler</a>
    </form>
</div>

</body>
</html>
