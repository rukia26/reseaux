<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM employes WHERE id = ?");
    $stmt->execute([$id]);
    $employe = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $poste = $_POST['poste'];
    $email = $_POST['email'];
    $date_embauche = $_POST['date_embauche'];

    $sql = "UPDATE employes SET nom = ?, prenom = ?, poste = ?, email = ?, date_embauche = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $poste, $email, $date_embauche, $id]);

    header("Location: employes.php");
    exit;
}
?>
