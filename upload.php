<?php
include('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $nom = basename($file['name']);
    $chemin = "uploads/" . $nom;

    if (move_uploaded_file($file['tmp_name'], $chemin)) {
        $stmt = $pdo->prepare("INSERT INTO documents (nom, chemin) VALUES (?, ?)");
        $stmt->execute([$nom, $chemin]);
        echo "Fichier uploadé avec succès !";
    } else {
        echo "Erreur lors de l'upload.";
    }
}
?>
