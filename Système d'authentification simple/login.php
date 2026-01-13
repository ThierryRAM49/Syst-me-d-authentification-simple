<?php
session_start();
require_once 'db.php';

$errors = [];

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Requête SELECT
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');

    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
    
        // L'utilisateur est authentifié, démarrer la session
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_id'] = $user['id'];
        header('Location: index.php');
        exit();
    } else {
        // Authentification échouée
        $errors[] = "Authentification échouée. Vérifiez vos identifiants.";
    }
}
?>

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
    <title>Login</title>

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
            <p>Page de login de mon mini projet PHP avec Bootstrap.</p>

            <?php if (!empty($_SESSION['user_email'])): 
                $alert = $_SESSION['alert'];
                unset($_SESSION['alert']);
                ?>
               
            <?php else: ?>
                <div class="alert alert-info">
                     <h1>C'est par ici !</h1>

    <!-- Formulaire de connexion -->
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $e): ?>
            <div><?= htmlspecialchars($e, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endforeach; ?>
        <hr>
        <small>
            Mot de passe oublié ?
            <a href="#" data-bs-toggle="modal" data-bs-target="#forgotModal">
                Demander une réinitialisation
            </a>
        </small>
    </div>
<?php endif; ?>
<main class="container">
    <div class="form-wrapper">
        <div class="card">
            <div class="card-body">
                <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required>  &nbsp;
        <button type="submit">Se connecter</button> &nbsp; <a class="link" href="mdp-oublié.php">Mot de passe oublié ?</a>
        
       
        
    </form>
            </div>
        </div>
    </div>
</main>
    
                </div>
            
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
<?php endif; ?>
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