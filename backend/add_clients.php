<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone= $_POST['telephone'];

    // Insertion dans la base de données
    $sql = "INSERT INTO clients (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $telephone]);

    // Rediriger vers la page de gestion des clients après ajout
    header("Location: clients.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Client</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 500px;
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
        .form-group label {
            font-weight: bold;
        }
        .btn {
            width: 100%;
            padding: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ajouter un Client</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nom">Nom du Client</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Prenom du Client</label>
                <input type="text" name="prenom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telephone">Telephone du Client</label>
                <input type="number" name="telephone" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Ajouter le Client</button>
        </form>
    </div>
</body>
</html>
