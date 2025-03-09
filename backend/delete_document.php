<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer le nom du fichier à supprimer
    $stmt = $pdo->prepare("SELECT fichier FROM documents WHERE id = ?");
    $stmt->execute([$id]);
    $doc = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($doc) {
        $file_path = 'uploads/' . $doc['fichier'];

        // Supprimer le fichier du répertoire
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Supprimer l'entrée dans la base de données
        $stmt = $pdo->prepare("DELETE FROM documents WHERE id = ?");
        $stmt->execute([$id]);
    }
}

header("Location: documents.php");
exit;
