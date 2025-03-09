<?php
require 'config.php';
$stmt = $pdo->query("SELECT * FROM employes");
$employes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Employés</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 900px;
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
        table th, table td {
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
        <h2>Gestion des Employés</h2>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Poste</th>
                    <th>Email</th>
                    <th>Date Embauche</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employes as $emp): ?>
                <tr>
                    <td><?= $emp['id'] ?></td>
                    <td><?= $emp['nom'] ?></td>
                    <td><?= $emp['prenom'] ?></td>
                    <td><?= $emp['poste'] ?></td>
                    <td><?= $emp['email'] ?></td>
                    <td><?= $emp['date_embauche'] ?></td>
                    <td class="actions">
                        <a href="modifier_employe.php?id=<?= $emp['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="delete_employe.php?id=<?= $emp['id'] ?>" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="add_employe.php" class="btn btn-primary">Ajouter un Employé</a>
        </div>
    </div>
</body>
</html>
