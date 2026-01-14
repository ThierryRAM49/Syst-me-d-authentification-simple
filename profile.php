<?php
session_start();
require 'db.php';

$user = null;
$error_msg = "";

// Récupération : Vérifier si $_GET['id'] existe et n'est pas vide.
if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    // Sécurité : S'assurer que l'ID est bien un nombre
    $id = (int)$_GET['id'];

    // Requête SQL : SELECT email, created_at FROM users WHERE id = ?
    $stmt = $pdo->prepare('SELECT email, created_at FROM users WHERE id = ?');
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $error_msg = "Utilisateur introuvable.";
    }

} else {
    $error_msg = "ID manquant.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    
    <?php if ($user): ?>
        <h1>Profil de <?= htmlspecialchars($user['email']) ?></h1>
        <p>Date d'inscription : <?= htmlspecialchars($user['created_at']) ?></p>
    <?php else: ?>
        <h1>Erreur</h1>
        <p><?= htmlspecialchars($error_msg) ?></p>
    <?php endif; ?>

    <a href="list_users.php">Retour à la liste</a>
   
</body>
</html>