<?php
ini_set('display_errors', 1);  // Afficher les erreurs PHP
error_reporting(E_ALL);  // Signaler toutes les erreurs

// Connexion à la base de données
require 'config.php';

// Vérifier si le formulaire est soumis avec les bonnes données
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si les champs sont remplis
    if (isset($_POST['nom']) && isset($_POST['email'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];


        try {
            // Préparer la requête pour insérer le client dans la base de données
            $sql = "INSERT INTO clients (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $prenom, $email, $telephone]);

            // Si l'insertion est réussie, renvoyer un message de succès
            $response = array(
                'success' => true,
                'message' => 'Client ajouté avec succès.'
            );
        } catch (Exception $e) {
            // Si une erreur se produit, renvoyer un message d'erreur
            $response = array(
                'success' => false,
                'message' => 'Erreur lors de l\'ajout du client : ' . $e->getMessage()
            );
        }
    } else {
        // Si les champs sont manquants
        $response = array(
            'success' => false,
            'message' => 'Tous les champs sont obligatoires.'
        );
    }

    // Renvoie la réponse JSON
    echo json_encode($response);
}
?>
