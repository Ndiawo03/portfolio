<?php
require_once 'db.php';

//Ajouter un utilisateur
 
function ajouterUtilisateur($pdo,$nom, $prenom, $email, $mot_de_passe, $role) {
    $hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$nom, $prenom, $email, $hash, $role]);
}


// Lister tous les utilisateurs
 
function listerTousLesUtilisateurs($pdo) {
    $sql = "SELECT * FROM utilisateurs";
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


 // Rechercher un utilisateur par son nom
function rechercherUtilisateurParNom($pdo,$nom) {
    $sql = "SELECT * FROM utilisateurs WHERE nom LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%$nom%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
//modifier un utilisateur
function modifierUtilisateur($pdo,$id, $nom, $prenom, $email, $role) {
    $sql = "UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email, role = :role WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':role' => $role,
        ':id' => $id
    ]);
}



 // Supprimer un utilisateur

function supprimerUtilisateur($pdo,$id) {
    $sql = "DELETE FROM utilisateurs WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}


 // Filtrer les utilisateurs par rôle

function filtrerUtilisateursParRole($pdo,$role) {
    $sql = "SELECT * FROM utilisateurs WHERE role = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$role]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//lister rendez-vous pour médecin
function listerRendezVousSemainePourMedecin($id_medecin) {
    global $pdo;
    $sql = "SELECT * FROM rendez_vous
            WHERE id_medecin = :id_medecin
            AND date_rdv BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)
            ORDER BY date_rdv, heure_rdv";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id_medecin' => $id_medecin]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//lister rendez-vous pour patient
function listerRendezVousSemainePourPatient($pdo,$id_patient) {
    $sql = "SELECT * FROM rendez_vous
            WHERE id_patient = :id_patient
            AND date_rdv BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)
            ORDER BY date_rdv, heure_rdv";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id_patient' => $id_patient]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
