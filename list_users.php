<?php
session_start();
require 'db.php';

// accèssible uniquement aux utilisateurs connectés
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Récupération des utilisateurs
$stmt = $pdo->query('SELECT id, email, created_at FROM users');
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <style>
        table { border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>

    <h1>Liste des utilisateurs</h1>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
        <p class="success">Utilisateur supprimé avec succès.</p>
    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
        <?php if ($_GET['error'] === 'not_found'): ?>
            <p class="error">Erreur : utilisateur introuvable.</p>
        <?php elseif ($_GET['error'] === 'self_delete'): ?>
            <p class="error">Erreur : vous ne pouvez pas supprimer votre propre compte ici.</p>
        <?php elseif ($_GET['error'] === 'missing_id'): ?>
            <p class="error">Erreur : ID manquant.</p>
        <?php else: ?>
            <p class="error">Une erreur est survenue.</p>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (empty($users)): ?>
        <p>Aucun utilisateur inscrit.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Inscrit le</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['created_at']) ?></td>
                        <td>
                            <a href="profile.php?id=<?= urlencode($user['id']) ?>">Voir profil</a> |
                            <a href="delete.php?id=<?= urlencode($user['id']) ?>" 
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <br>
    <a href="dashboard.php">Retour au tableau de bord</a>

</body>
</html>