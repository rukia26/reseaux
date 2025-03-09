<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO employes (nom, prenom, poste, email, date_embauche) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['nom'], $_POST['prenom'], $_POST['poste'], $_POST['email'], $_POST['date_embauche']]);
    header("Location: employes.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Employé</title>
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
        .form-control {
            margin-bottom: 15px;
        }
        .btn {
            width: 100%;
            padding: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ajouter un Employé</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" placeholder="Nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" class="form-control" placeholder="Prénom" required>
            </div>
            <div class="form-group">
                <label for="poste">Poste</label>
                <input type="text" name="poste" class="form-control" placeholder="Poste" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="date_embauche">Date d'Embauche</label>
                <input type="date" name="date_embauche" class="form-control" required>
            </div>
            <button class="btn btn-success">Enregistrer</button>
        </form>
    </div>
</body>
</html>
