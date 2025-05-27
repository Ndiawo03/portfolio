<?php
//se connecter à la base de données avec PDO
$host = 'localhost';
$dbname = 'cabinet_medical';
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
        specialite ENUM('generaliste', 'specialiste', 'autre') DEFAULT 'generaliste',
        adresse VARCHAR(255),
        telephone VARCHAR(20),
        password VARCHAR(255) NOT NULL,
        role ENUM('medecin', 'patient', 'secretaire') NOT NULL
    )"; 
//execution de la requête pour créer la table utilisateurs
    $pdo->exec($requete);
    
    // Creation de la table rendez_vous si elle n'existe pas
    $requete = "CREATE TABLE IF NOT EXISTS rendez_vous (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_medecin INT NOT NULL,
        id_patient INT NOT NULL,
        date_rdv DATE NOT NULL,
        heure_rdv TIME NOT NULL,
        statut ENUM('en_attente', 'confirme', 'annule') DEFAULT 'en_attente',
        FOREIGN KEY (id_medecin) REFERENCES utilisateurs(id),
        FOREIGN KEY (id_patient) REFERENCES utilisateurs(id)
    )";
    //execution de la requête pour créer la table rendez_vous
    $pdo->exec($requete);

    // Hachage des mots de passe
    $mdp_medecin = password_hash("med123", PASSWORD_DEFAULT);
    $mdp_patient = password_hash("pat123", PASSWORD_DEFAULT);
    $mdp_secretaire = password_hash("sec123", PASSWORD_DEFAULT);

    // Insérer des utilisateurs de test
    $stmt = $pdo->prepare("INSERT IGNORE INTO utilisateurs (nom, prenom, email, specialite, adresse, telephone, password, role)
                           VALUES (:nom, :prenom, :email, :specialite, :adresse, :telephone, :password, :role)");

    // Médecin
    $stmt->execute([
        'nom' => 'Ngom',
        'prenom' => 'Aly',
        'email' => 'aly.ngom@med.com',
        'specialite' => 'generaliste',
        'adresse' => 'Dakar',
        'telephone' => '770000001',
        'password' => $mdp_medecin,
        'role' => 'medecin'
    ]);

    // Patient
    $stmt->execute([
        'nom' => 'Diallo',
        'prenom' => 'Fatou',
        'email' => 'fatou.diallo@pat.com',
        'specialite' => 'autre',
        'adresse' => 'Rufisque',
        'telephone' => '770000002',
        'password' => $mdp_patient,
        'role' => 'patient'
    ]);

    // Secrétaire
    $stmt->execute([
        'nom' => 'Sarr',
        'prenom' => 'Marième',
        'email' => 'marieme.sarr@sec.com',
        'specialite' => 'autre',
        'adresse' => 'Guédiawaye',
        'telephone' => '770000003',
        'password' => $mdp_secretaire,
        'role' => 'secretaire'
    ]);
    //creation d'un rendez-vous de test
    $stmt = $pdo->prepare("INSERT INTO rendez_vous (id_medecin, id_patient, date_rdv, heure_rdv, statut)
                           VALUES (:id_medecin, :id_patient, :date_rdv, :heure_rdv, :statut)");

    $stmt->execute([
        'id_medecin' => 1,
        'id_patient' => 2,
        'date_rdv' => '2023-10-01',
        'heure_rdv' => '10:00:00',
        'statut' => 'en_attente'
    ]);

    echo "Base de données et tables créées avec succès.";

} catch (PDOException $e) {
    echo 'Erreur de création de la base de données : ' . $e->getMessage();
}

?>