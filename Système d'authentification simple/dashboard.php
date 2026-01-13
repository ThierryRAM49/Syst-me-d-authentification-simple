<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit();
}   

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="style.css">
    <!-- CSS Bootstrap 5 via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="logout.php">Mon siteCome</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Afficher le menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#register.php">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="apropos.php">A propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Connexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="mb-3">Bienvenue</h1>
            <p>Page d’accueil de mon mini projet PHP avec Bootstrap.</p>


            <?php if (!empty($_SESSION['user_email'])): 
                $alert = $_SESSION['alert'];
                unset($_SESSION['alert']);
                ?>
                <div class="alert alert-success">
                    Connecté en tant que <strong><?= htmlspecialchars($_SESSION['user_email']) ?></strong>.
                </div>
            <?php else: ?>
                <div class="alert alert-info">
                    Tu n’es pas connecté. Utilise les liens « <a href="register.php" class="btn btn-outline-primary btn-sm">
        Créer un compte
    </a> » ou « Connexion » dans le menu.
                </div>
            <?php endif; ?>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Infos
                </div>
                <div class="card-body">
                    <p class="card-text">
                       A personnaliser cette page, ajouter du contenu, etc.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="mt-5 py-3 bg-light border-top">
    <div class="container text-center">
        <small class="text-muted">
            Pas encore de compte ?
            <a href="register.php">Créer un compte</a> &nbsp;
            | &nbsp; &copy; <?= date('Y'); ?> Mon siteCome.
        </small>
    </div>
</footer>
<!-- JS Bootstrap 5 via CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
