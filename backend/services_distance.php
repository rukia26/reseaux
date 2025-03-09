<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services à Distance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
        }
        .service-card {
            border-radius: 10px;
            margin: 20px 0;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #28a745;
            font-size: 2rem;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>
<body class="container mt-5">

<h2>Services à Distance</h2>

<div class="service-card">
    <h3>SSH</h3>
    <form action="connect_ssh.php" method="POST">
        <div class="form-group">
            <label for="ssh_name">Nom</label>
            <input type="text" class="form-control" id="ssh_name" name="ssh_name" required>
        </div>
        <div class="form-group">
            <label for="ssh_ip">Adresse IP</label>
            <input type="text" class="form-control" id="ssh_ip" name="ssh_ip" required>
        </div>
        <div class="form-group">
            <label for="ssh_password">Mot de passe</label>
            <input type="password" class="form-control" id="ssh_password" name="ssh_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>

<div class="service-card">
    <h3>RDP</h3>
    <form action="connect_rdp.php" method="POST">
        <div class="form-group">
            <label for="rdp_name">Nom</label>
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
</div>

<div class="service-card">
    <h3>NoVNC/VNC</h3>
    <form action="connect_novnc.php" method="POST">
        <div class="form-group">
            <label for="novnc_name">Nom</label>
            <input type="text" class="form-control" id="novnc_name" name="novnc_name" required>
        </div>
        <div class="form-group">
            <label for="novnc_ip">Adresse IP</label>
            <input type="text" class="form-control" id="novnc_ip" name="novnc_ip" required>
        </div>
        <div class="form-group">
            <label for="novnc_password">Mot de passe</label>
            <input type="password" class="form-control" id="novnc_password" name="novnc_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>

</body>
</html>