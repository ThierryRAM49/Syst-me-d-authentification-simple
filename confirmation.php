<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Bootstrap 5 via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
 </head>


    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="style.css">
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
                     <h1>Email envoyé avec succès !</h1>
                <p>Nous avons envoyé un email avec les instructions pour réinitialiser votre mot de passe.</p>
                <p>Veuillez vérifier votre boîte de réception et suivre les instructions fournies.</p>
                <p>Si vous ne voyez pas l'email, vérifiez votre dossier de courrier indésirable ou spam.</p>
                <div class="mt-3">
                    <a href="login.php" class="btn btn-primary">Retour à la page de connexion</a>
                </div>
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