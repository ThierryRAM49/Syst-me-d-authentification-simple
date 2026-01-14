<?php
session_start();
require 'db.php';

// Vérification de la session
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Récupération : Vérifier si $_GET['id'] existe et n'est pas vide.
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Protection : Vérifier que l'utilisateur ne tente pas de se supprimer lui-même
    if ($id === $_SESSION['user_id']) {
        // On pourrait rediriger avec une erreur spécifique, 
        // pour l'instant on redirige vers la liste sans rien faire ou avec une erreur.
        header('Location: list_users.php?error=self_delete'); 
        exit;
    }

    // Requête SQL : DELETE FROM users WHERE id = ?
    $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
    $stmt->execute([$id]);

    // Bonus : Vérifier si une ligne a été supprimée
    if ($stmt->rowCount() > 0) {
        // Succès
        header('Location: list_users.php?msg=deleted');
        exit;
    } else {
        // ID non trouvé
        header('Location: list_users.php?error=not_found');
        exit;
    }

} else {
    // ID manquant
    header('Location: list_users.php?error=missing_id');
    exit;
}