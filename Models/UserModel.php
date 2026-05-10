<?php

require_once __DIR__ . '/../config/db.php';


function ajouterUtilisateur($pdo, $email, $mdp_hache, $username) {

$sql = "INSERT INTO utilisateurs (email, mot_de_passe, pseudo )
             VALUES (:email, :mdp, :username)"; 
    $stmt = $pdo->prepare($sql);  


    return $stmt->execute([  
       'email' => $email,
        'mdp'   => $mdp_hache,
        'username' => $username       
    ]);
}


function recupererUtilisateurParEmail($pdo, $email) {
    $sql = "SELECT * FROM utilisateurs WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    return $stmt->fetch(); 
}


function recupererMotDePasseUtilisateur($pdo, $idu) {
    $sql = "SELECT mot_de_passe FROM utilisateurs WHERE idu = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([(int)$idu]);
    return $stmt->fetchColumn();
}
