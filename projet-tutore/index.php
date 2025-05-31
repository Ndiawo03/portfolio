<?php
include "components/header.php";
require_once "database/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <!--Faire un accueil avec des slides qui contiennent des annonces et qui defilent de gauche à droite-->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-11"><!-- Agrandir le cadre -->
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" style="max-width: 1050px; margin: auto;">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <img src="images/hospis.jpg" class="img-fluid rounded" alt="Slide 1" style="max-height: 350px; object-fit: cover;">
                                </div>
                                <div class="col-md-6">
                                    <h5>Votre santé mérite toute notre attention</h5>
                                    <p>Notre établissement s'engage à offrir des soins de qualité, adaptés à chaque patient, dans un environnement sécurisé et bienveillant. Notre équipe médicale expérimentée met tout en œuvre pour assurer votre bien-être et répondre à vos besoins de santé avec professionnalisme et humanité.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <img src="images/pediatrie.png" class="img-fluid rounded" alt="Slide 2" style="max-height: 350px; object-fit: cover;">
                                </div>
                                <div class="col-md-6">
                                    <h5>pediatrie</h5>
                                    <p>La pédiatrie est la branche de la médecine qui se concentre sur la santé des enfants, des nourrissons et des adolescents. Elle englobe la prévention, le diagnostic et le traitement des maladies infantiles, ainsi que le suivi du développement physique et psychologique des jeunes patients.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <img src="images/sang.jpg" class="img-fluid rounded" alt="Slide 3" style="max-height: 350px; object-fit: cover;">
                                </div>
                                <div class="col-md-6">
                                    <h5>Don de sang</h5>
                                    <p>Le don de sang est un acte généreux et essentiel qui permet de sauver des vies. Chaque don peut aider plusieurs patients dans le besoin, qu'il s'agisse d'urgences médicales, d'opérations chirurgicales ou de traitements de maladies chroniques. Donner son sang, c'est offrir une chance de guérison à ceux qui en ont le plus besoin.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Boutons repositionnés en bas et centrés, couleur noire -->
                    <div class="d-flex justify-content-center mt-3">
                        <div class="carousel-indicators position-static">
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="rounded-circle active" aria-current="true" aria-label="Slide 1" style="width: 14px; height: 14px; background-color: #0d6efd; border: none; margin: 0 6px;"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" class="rounded-circle" aria-label="Slide 2" style="width: 14px; height: 14px; background-color: #0d6efd; border: none; margin: 0 6px;"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" class="rounded-circle" aria-label="Slide 3" style="width: 14px; height: 14px; background-color: #0d6efd; border: none; margin: 0 6px;"></button>
                        </div>
                    </div>
                    <style>
                        .carousel-indicators [data-bs-target] {
                            opacity: 0.5;
                            transition: opacity 0.2s;
                        }
                        .carousel-indicators .active {
                            opacity: 1 !important;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <?php
    include "components/footer.php";?>
</body>
</html>