<?php
// La fonction inscrireutilisateur() permet d'inscrire un nouvel utilisateur dans la base de données

require_once "db.php";

// La fonction ajouterUtilisateur() permet d'ajouter un nouvel utilisateur avec tous les attributs de la table utilisateurs
function ajouterUtilisateur($nom, $prenom, $email, $specialite, $adresse, $telephone, $password, $role) {
    global $pdo;
    $requete = "INSERT INTO utilisateurs (nom, prenom, email, specialite, adresse, telephone, password, role) VALUES (:nom, :prenom, :email, :specialite, :adresse, :telephone, :password, :role)";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':specialite', $specialite);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role', $role);
    $stmt->execute();
}
function connexionUtilisateur($email, $password) {
    global $pdo;
    $requete = "SELECT * FROM utilisateurs WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
// La fonction prendreRDV() permet de prendre un rendez-vous
function prendreRDV($idMedecin, $idPatient, $date, $heureDebut, $heureFin) {
    global $pdo;
    $requete = "INSERT INTO rendez_vous (medecin_id, patient_id, date, heure_debut, heure_fin) VALUES (:idMedecin, :idPatient, :date, :heureDebut, :heureFin)";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':idMedecin', $idMedecin);
    $stmt->bindParam(':idPatient', $idPatient);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':heureDebut', $heureDebut);
    $stmt->bindParam(':heureFin', $heureFin);
    $stmt->execute();
}

// La fonction modifierRdv() permet de modifier un rendez-vous
function modifierRdv($id, $idMedecin, $idPatient, $date, $heureDebut, $heureFin) {
    global $pdo;
    $requete = "UPDATE rendez_vous SET medecin_id = :idMedecin, patient_id = :idPatient, date = :date, heure_debut = :heureDebut, heure_fin = :heureFin WHERE id = :id";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':idMedecin', $idMedecin);
    $stmt->bindParam(':idPatient', $idPatient);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':heureDebut', $heureDebut);
    $stmt->bindParam(':heureFin', $heureFin);
    $stmt->execute();
}
// La fonction etatRdv() permet de changer l'état d'un rendez-vous
function etatRdv($id, $etat) {
    global $pdo;
    $requete = "UPDATE rendez_vous SET statut = :etat WHERE id = :id";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':etat', $etat);
    $stmt->execute();
}
// La fonction listerRdvMedecin() permet de lister les rendez-vous d'un médecin
function listerRdvMedecin($idMedecin) {
    global $pdo;
    $requete = "SELECT * FROM rendez_vous WHERE medecin_id = :idMedecin";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':idMedecin', $idMedecin);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// La fonction listerRdvPatient() permet de lister les rendez-vous d'un patient
function listerRdvPatient($idPatient) {
    global $pdo;
    $requete = "SELECT * FROM rendez_vous WHERE patient_id = :idPatient";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':idPatient', $idPatient);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// La fonction modifierUtilisateur() permet de modifier les informations d'un utilisateur
function modifierUtilisateur($id, $nom, $prenom, $email, $password, $role) {
    global $pdo;
    $requete = "UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email, password = :password, role = :role WHERE id = :id";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role', $role);
    $stmt->execute();
}
// La fonction supprimerUtilisateur() permet de supprimer un utilisateur
function supprimerUtilisateur($id) {
    global $pdo;
    $requete = "DELETE FROM utilisateurs WHERE id = :id";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
// La fonction listerutilisateur() permet de lister les utilisateurs
function listerutilisateur() {
    global $pdo;
    $requete = "SELECT * FROM utilisateurs";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// La fonction annulerRdv() permet d'annuler un rendez-vous
function annulerRdv($idRdv) {
    global $pdo;
    $requete = "DELETE FROM rendez_vous WHERE id = :idRdv";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':idRdv', $idRdv);
    $stmt->execute();
}
//La fonction chercherUtilisateurPrenomNom() permet de chercher un utilisateur par son prénom et son nom
function chercherUtilisateurPrenomNom($prenom, $nom) {
    global $pdo;
    $requete = "SELECT * FROM utilisateurs WHERE prenom = :prenom AND nom = :nom";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nom', $nom);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>