<?php
require 'config.php';
$stmt = $pdo->query("SELECT * FROM clients");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Clients</title>
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
        <h2>Gestion des Clients</h2>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= $client['id'] ?></td>
                    <td><?= $client['nom'] ?></td>
                    <td><?= $client['prenom'] ?></td>
                    <td><?= $client['email'] ?></td>
                    <td><?= $client['telephone'] ?></td>
                    <td class="actions">
                        <a href="edit_clients.php?id=<?= $client['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="delete_clients.php?id=<?= $client['id'] ?>" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="add_clients.php" class="btn btn-primary">Ajouter un Client</a>
        </div>
    </div>
</body>
</html>
