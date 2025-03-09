<?php
require 'config.php';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM employes WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}
header("Location: employes.php");
