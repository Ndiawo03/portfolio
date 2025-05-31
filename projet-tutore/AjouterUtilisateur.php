<?php 
include "components/header.php";
require_once "database/function.php";

// Vérifie si l'utilisateur est connecté et est un secrétaire
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'secretaire') {
    header("Location: index.php");
    exit();
}

// Si le formulaire est soumis, ajoute l'utilisateur avec la nouvelle fonction ajouterUtilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Champs supplémentaires requis par la fonction (valeurs vides ou par défaut si non fournis)
    $specialite = '';
    $adresse = '';
    $telephone = '';

    $result = ajouterUtilisateur($nom, $prenom, $email, $specialite, $adresse, $telephone, $password, $role);

    if ($result === true) {
        header("Location: index.php");
        exit();
    } else {
        echo '<div class="alert alert-danger text-center">Erreur : ' . htmlspecialchars($result ?? 'Une erreur inconnue est survenue.') . '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
<!-- Formulaire d'ajout d'utilisateur adapté à la fonction ajouterUtilisateur() -->
<div class="container-fluid min-vh-100 d-flex flex-column justify-content-between p-0" style="position: relative; overflow: hidden;">
    <!-- Blurred background image -->
    <div style="position: absolute; inset: 0; background: url('images/log.jpg') no-repeat center center fixed; background-size: cover; filter: blur(8px); z-index: 0;"></div>
    <!-- Spacer for header -->
    <div style="height: 60px;"></div>
    <!-- Content with backdrop blur and transparent background -->
    <div class="row justify-content-center w-100" style="position: relative; z-index: 1;">
        <div class="card shadow-lg p-4 border-0 bg-transparent mx-auto" style="max-width: 700px; width: 100%; backdrop-filter: blur(8px); background: rgba(255,255,255,0.95); border-radius: 1rem;">
            <h1 class="text-center mb-4">Ajout d'un utilisateur</h1>
            <form action="" method="post">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="role" class="form-label">Rôle</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="patient">Patient</option>
                            <option value="medecin">Médecin</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="specialite" class="form-label">Spécialité <span class="text-muted" style="font-size:0.9em;">(pour médecin)</span></label>
                        <input type="text" class="form-control" id="specialite" name="specialite" placeholder="Laisser vide si patient">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Ex: 76 013 80 79">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse complète">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Ajouter</button>
            </form>
        </div>
    </div>
    <!-- Spacer for footer -->
    <div style="height: 60px;"></div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <?php include "components/footer.php";?>
</body>
</html>