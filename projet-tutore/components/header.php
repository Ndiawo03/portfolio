<?php
session_start();
// header.php
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="images/logo.jpg" alt="Logo" width="100" height="50" class="d-inline-block align-text-top me-2">
            <span class="fs-5">Hopital Fann</span>
        </a>
        <!-- Toggler for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarHeader">
<!--Si l'utilisateur est connecté avec le role de secretaire, afficher les liens "profil" et "deconnexion"-->
            <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'secretaire'): ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="liste_utilisateurs.php">Liste des utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="liste_rendezvous.php">Liste de rendez-vous</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AjouterUtilisateur.php">Ajouter un utilisateur</a>
                    </li>
                </ul>
            <?php endif; ?>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link p-0 ms-0 me-3" href="profil.php" title="Profil" style="display: flex; align-items: center;">
                            <span style="display: inline-flex; align-items: center; justify-content: center; width: 36px; height: 36px; border: 2px solid #ccc; border-radius: 50%; background: #fff;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#333" viewBox="0 0 24 24">
                                    <circle cx="12" cy="8" r="4"/>
                                    <path d="M4 20c0-4 8-4 8-4s8 0 8 4v2H4v-2z"/>
                                </svg>
                            </span>
                        </a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-danger" href="deconnexion.php">Déconnexion</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.google.com/maps/place/Centre+Hospitalier+Universitaire+De+Fann/@14.6947065,-17.466753,17z/data=!3m1!4b1!4m6!3m5!1s0xec1728fec1ac107:0x61b5af59bd54e383!8m2!3d14.6947013!4d-17.4641781!16s%2Fg%2F1223qxbb?entry=ttu&g_ep=EgoyMDI1MDUyOC4wIKXMDSoASAFQAw%3D%3D" target="_blank">Nous trouver</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Connexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
