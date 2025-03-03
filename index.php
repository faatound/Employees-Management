<?php 
session_start();
include('database.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Employés - Smarttech.sn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 80vh; text-align: center;">
        
        <h1 class="fw-bold">Bienvenue dans la page de gestion des employés de Smarttech.sn</h1>

        <?php if(isset($_SESSION['message'])) : ?>
            <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <div class="mt-5">
            <a href="clients.php" class="btn btn-primary px-4 py-2 mx-2">Clients</a>
            <a href="documents.php" class="btn btn-success px-4 py-2 mx-2">Documents</a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
