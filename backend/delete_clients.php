<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Supprimer le client de la base de données
    $stmt = $pdo->prepare("DELETE FROM clients WHERE id = ?");
    $stmt->execute([$id]);

    // Rediriger vers la page de gestion des clients après suppression
    header("Location: clients.php");
    exit;
}
