<?php
require 'config.php';

// Récupérer tous les documents
$stmt = $pdo->query("SELECT * FROM documents");
$documents = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Documents</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .table th, .table td {
            text-align: center;
        }
        .btn {
            margin: 5px;
        }
        .actions {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Gestion des Documents</h2>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Fichier</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($documents as $doc): ?>
                <tr>
                    <td><?= $doc['id'] ?></td>
                    <td><?= $doc['nom'] ?></td>
                    <td><a href="uploads/<?= $doc['fichier'] ?>" target="_blank">Voir</a></td>
                    <td class="actions">
                        <a href="delete_document.php?id=<?= $doc['id'] ?>" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="add_document.php" class="btn btn-primary">Ajouter un Document</a>
        </div>
    </div>
</body>
</html>
