<?php
require_once('functions.php'); 
require_once('database.php'); 

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID client manquant.");
}

$id = $_GET['id'];

$resultat = Client::deleteClient($id);

if ($resultat) {
    header("Location: clients.php?message=Client supprimé avec succès");
    exit();
} else {
    die("Erreur lors de la suppression du client.");
}
?>
