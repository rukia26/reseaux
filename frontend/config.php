<?php
$host = 'localhost';  // Hôte
$db = 'gestion_app';  // Nom de la base de données
$user = 'root';  // Nom d'utilisateur
$pass = '';  // Mot de passe

try {
    // Créer une instance PDO pour la connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Définir le mode d'erreur de PDO sur exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur de connexion
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
