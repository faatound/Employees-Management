<?php
include('database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $pdo->prepare("SELECT chemin FROM documents WHERE id = ?");
    $stmt->execute([$id]);
    $doc = $stmt->fetch();

    if ($doc) {
        unlink($doc['chemin']); 
        $stmt = $pdo->prepare("DELETE FROM documents WHERE id = ?");
        $stmt->execute([$id]);
        echo "Document supprimé avec succès.";
    } else {
        echo "Fichier introuvable.";
    }
}
?>
