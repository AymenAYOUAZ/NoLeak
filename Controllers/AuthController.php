<?php

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/UserModel.php';

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mdp_clair = $_POST['password'] ?? '';

    if (empty($username) || empty($email) || empty($mdp_clair)) {

        $erreur = "Tous les champs sont obligatoires.";

    }

    elseif(strlen($mdp_clair) < 6){

        $erreur = "Mot de passe trop court.";

    }

    else {

        $utilisateurExistant = recupererUtilisateurParEmail($pdo, $email);

        if ($utilisateurExistant) {

            $erreur = "Cet email existe déjà.";

        } else {

            $mdp_securise = password_hash($mdp_clair, PASSWORD_DEFAULT);

            $resultat = ajouterUtilisateur(
                $pdo,
                $email,
                $mdp_securise,
                $username
            );

            if ($resultat) {

              $_SESSION['user'] = [

                 'pseudo' => $username,
                'email' => $email

              ];

              header('Location: index.php?page=dashboard');

              exit();
         }else {

                 $erreur = "Erreur inscription.";
             }
        }
    }
}

require_once __DIR__ . '/../views/inscription.php';