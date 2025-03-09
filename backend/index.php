<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
        }
        .list-group-item {
            border-radius: 10px;
            margin: 10px 0;
            font-size: 1.2rem;
            background-color: #ffffff;
            transition: background-color 0.3s ease;
        }
        .list-group-item:hover {
            background-color: #e2f0cb;
        }
        a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        a:hover {
            color: #0056b3;
        }
        h2 {
            text-align: center;
            color: #28a745;
            font-size: 2rem;
            margin-bottom: 30px;
        }
    </style>
</head>
<body class="container mt-5">

<h2>Tableau de Bord</h2>

<ul class="list-group">
    <li class="list-group-item"><a href="employes.php">Gestion des Employés</a></li>
    <li class="list-group-item"><a href="clients.php">Gestion des Clients</a></li>
    <li class="list-group-item"><a href="documents.php">Gestion des Documents</a></li>
</ul>

</body>
</html>
