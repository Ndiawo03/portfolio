<?php
//se connecter à la base de données avec PDO
$host = 'localhost';
$dbname = 'projet_tutore';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}
//Creation de la base de données si elle n'existe pas
try {
        $requete = "CREATE DATABASE IF NOT EXISTS $dbname";
    $pdo->exec($requete);
    $requete = "USE $dbname";
    $pdo->exec($requete);

    // Creation de la table utilisateurs si elle n'existe pas
    $requete = "CREATE TABLE IF NOT EXISTS utilisateurs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(50) NOT NULL,
        prenom VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        specialite ENUM('generaliste', 'specialiste', 'autre'),
        adresse VARCHAR(255),
        telephone VARCHAR(20),
        password VARCHAR(255) NOT NULL,
        role ENUM('medecin', 'patient', 'secretaire') NOT NULL
    )";
    $pdo->exec($requete);
    
    // Creation de la table rendez_vous si elle n'existe pas
    $requete = "CREATE TABLE IF NOT EXISTS rendez_vous (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_medecin INT NOT NULL,
        id_patient INT NOT NULL,
        date DATETIME NOT NULL,
        heure_debut TIME NOT NULL,
        heure_fin TIME NOT NULL,
        statut ENUM('en_attente', 'confirme', 'annule') DEFAULT 'en_attente',
        FOREIGN KEY (id_medecin) REFERENCES utilisateurs(id),
        FOREIGN KEY (id_patient) REFERENCES utilisateurs(id)
    )";
    $pdo->exec($requete);
    // Inserer un secretaire s'il n'existe pas
    
} catch (PDOException $e) {
    echo 'Erreur de création de la base de données : ' . $e->getMessage();
}

?>