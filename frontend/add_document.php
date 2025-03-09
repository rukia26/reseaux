<?php
ini_set('display_errors', 1);  // Afficher les erreurs PHP
error_reporting(E_ALL);  // Signaler toutes les erreurs

// Connexion à la base de données
require 'config.php';

// Dossier où les fichiers seront stockés
$uploadDir = 'uploads/';

// Vérifier si le dossier 'uploads' existe, sinon le créer
if (!is_dir($uploadDir)) {
    if (!mkdir($uploadDir, 0777, true)) {
        die('Échec de la création du dossier uploads.');
    }
}

// Vérifier si le formulaire est soumis avec les bonnes données
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si les champs sont remplis et que le fichier est bien téléchargé
    if (isset($_POST['nom']) && isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0) {
        $nom = $_POST['nom'];
        $fichier = $_FILES['fichier'];

        // Vérifier la taille du fichier
        $maxSize = 5 * 1024 * 1024;  // Limiter la taille à 5MB
        if ($fichier['size'] > $maxSize) {
            $response = array(
                'success' => false,
                'message' => 'Le fichier est trop volumineux. Taille maximale autorisée : 5MB.'
            );
            echo json_encode($response);
            exit();
        }

        // Liste des extensions autorisées
        $allowedExtensions = ['pdf', 'docx', 'txt', 'jpg', 'png'];
        $fileExtension = pathinfo($fichier['name'], PATHINFO_EXTENSION);
        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
            $response = array(
                'success' => false,
                'message' => 'L\'extension du fichier n\'est pas autorisée.'
            );
            echo json_encode($response);
            exit();
        }

        // Renommer le fichier pour éviter des conflits
        $safeFileName = uniqid() . '.' . $fileExtension;
        $uploadFilePath = $uploadDir . $safeFileName;

        // Déplacer le fichier téléchargé dans le dossier cible
        if (move_uploaded_file($fichier['tmp_name'], $uploadFilePath)) {
            // Préparer la requête pour insérer le document dans la base de données
            try {
                $sql = "INSERT INTO documents (nom, fichier) VALUES (?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nom, $safeFileName]);

                // Si l'insertion est réussie, renvoyer un message de succès
                $response = array(
                    'success' => true,
                    'message' => 'Document ajouté avec succès.'
                );
            } catch (Exception $e) {
                $response = array(
                    'success' => false,
                    'message' => 'Erreur lors de l\'ajout du document : ' . $e->getMessage()
                );
            }
        } else {
            $response = array(
                'success' => false,
                'message' => 'Une erreur est survenue lors du téléchargement du fichier.'
            );
        }
    } else {
        $response = array(
            'success' => false,
            'message' => 'Tous les champs sont obligatoires et le fichier doit être valide.'
        );
    }

    // Renvoie la réponse JSON
    echo json_encode($response);
}
?>
