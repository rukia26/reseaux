<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['document'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $file = $_FILES['document'];

    // Vérifier si le fichier est bien téléchargé
    if ($file['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        
        // Vérifie si le dossier 'uploads' existe sinon le créer
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Sécuriser le nom du fichier
        $file_name = basename($file['name']);
        $file_path = $upload_dir . $file_name;

        // Déplacer le fichier vers le dossier "uploads"
        if (move_uploaded_file($file['tmp_name'], $file_path)) {
            // Insérer les informations dans la base de données
            $sql = "INSERT INTO documents (nom, fichier) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $file_name]);
            header("Location: documents.php");
            exit;
        } else {
            $error_message = "Erreur lors du déplacement du fichier.";
        }
    } else {
        // Message d'erreur plus détaillé
        switch ($file['error']) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $error_message = "Le fichier dépasse la taille autorisée.";
                break;
            case UPLOAD_ERR_PARTIAL:
                $error_message = "Le fichier a été téléchargé partiellement.";
                break;
            case UPLOAD_ERR_NO_FILE:
                $error_message = "Aucun fichier n'a été téléchargé.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $error_message = "Le répertoire temporaire est manquant.";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $error_message = "Échec de l'écriture du fichier sur le disque.";
                break;
            default:
                $error_message = "Erreur inconnue lors du téléchargement du fichier.";
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Document</title>
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
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ajouter un Document</h2>
        <?php if (isset($error_message)): ?>
        <div class="alert alert-danger"><?= $error_message ?></div>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nom">Nom du Document</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="document">Choisir un Fichier</label>
                <input type="file" name="document" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Ajouter le Document</button>
        </form>
    </div>
</body>
</html>
