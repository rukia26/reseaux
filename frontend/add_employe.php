<?php
ini_set('display_errors', 1);  // Afficher les erreurs PHP
error_reporting(E_ALL);  // Signaler toutes les erreurs

// Connexion à la base de données
require 'config.php';

// Vérifier si le formulaire est soumis avec les bonnes données
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si les champs sont remplis
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['poste']) && isset($_POST['email']) && isset($_POST['date_embauche'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $poste = $_POST['poste'];
        $email = $_POST['email'];
        $date_embauche = $_POST['date_embauche'];

        try {
            // Préparer la requête pour insérer l'employé dans la base de données
            $sql = "INSERT INTO employes (nom, prenom, poste, email, date_embauche) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $prenom, $poste, $email, $date_embauche]);

            // Si l'insertion est réussie, renvoyer un message de succès
            $response = array(
                'success' => true,
                'message' => 'Employé ajouté avec succès.'
            );
        } catch (Exception $e) {
            // Si une erreur se produit, renvoyer un message d'erreur
            $response = array(
                'success' => false,
                'message' => 'Erreur lors de l\'ajout de l\'employé : ' . $e->getMessage()
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
