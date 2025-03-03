<?php
include('database.php');
class Client {
    public static function getAllClients() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM clients");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getClientById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM clients WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function addClient($nom, $email, $telephone) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO clients (nom, email, telephone) VALUES (?, ?, ?)");
        return $stmt->execute([$nom, $email, $telephone]);
    }

    public static function updateClient($id, $nom, $email, $telephone) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE clients SET nom = ?, email = ?, telephone = ? WHERE id = ?");
        return $stmt->execute([$nom, $email, $telephone, $id]);
    }

    public static function deleteClient($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM clients WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
