<?php 
include "components/header.php";
require_once "database/function.php";
// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['user'])) {
    // Si l'utilisateur est déjà connecté, redirige vers la page d'accueil
    header("Location: index.php");
    exit();
}
// Si le formulaire est soumis, traite la connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifie les informations de connexion
    $user = connexionUtilisateur($email, $password);
    if ($user) {
        // Stocke les informations de l'utilisateur dans la session
        $_SESSION['user'] = $user;
        header("Location: index.php");
        exit();
    } else {
        $error = "Email ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center p-0" style="position: relative; overflow: hidden;">
        <!-- Blurred background image -->
        <div style="position: absolute; inset: 0; background: url('images/log.jpg') no-repeat center center fixed; background-size: cover; filter: blur(8px); z-index: 0;"></div>
        <!-- Content with backdrop blur and transparent background -->
        <div class="row justify-content-center w-50" style="position: relative; z-index: 1; background: rgba(255,255,255,0.2); border-radius: 10px;">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Connexion</h2>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                </form>
                <p class="mt-3 text-center">Pas encore inscrit ? <a href="/inscription.php">Inscrivez-vous ici</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <?php include "components/footer.php";?>
</body>
</html>