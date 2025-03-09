<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion RDP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Connexion RDP</h2>
    <form method="POST" action="connect_rdp.php">
        <div class="form-group">
            <label for="rdp_name">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="rdp_name" name="rdp_name" required>
        </div>
        <div class="form-group">
            <label for="rdp_ip">Adresse IP</label>
            <input type="text" class="form-control" id="rdp_ip" name="rdp_ip" required>
        </div>
        <div class="form-group">
            <label for="rdp_password">Mot de passe</label>
            <input type="password" class="form-control" id="rdp_password" name="rdp_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</body>
</html>