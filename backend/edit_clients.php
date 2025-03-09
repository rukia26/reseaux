<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les informations du client
    $stmt = $pdo->prepare("SELECT * FROM clients WHERE id = ?");
    $stmt->execute([$id]);
    $client = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$client) {
        // Si le client n'existe pas, rediriger vers la liste des clients
        header("Location: clients.php");
        exit;
    }

    // Traiter le formulaire de mise à jour
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $email = $_POST['email'];

        // Mettre à jour les informations du client dans la base de données
        $sql = "UPDATE clients SET nom = ?, email = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $email, $id]);

        // Rediriger vers la page de gestion des clients après modification
        header("Location: clients.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le Client</title>
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
        <h2>Modifier le Client</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nom">Nom du Client</label>
                <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($client['nom']) ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email du Client</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($client['email']) ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Mettre à jour le Client</button>
        </form>
    </div>
</body>
</html>
