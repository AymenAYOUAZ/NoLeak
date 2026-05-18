<?php

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $mdp_saisi = $_POST['password'] ?? '';

    if (empty($email) || empty($mdp_saisi)) {

        $erreur = "Email et mot de passe obligatoires.";

    } else {

        $user = recupererUtilisateurParEmail($pdo, $email);

        if ($user && password_verify($mdp_saisi, $user['mot_de_passe'])) {

            $_SESSION['user'] = $user;
            $_SESSION['user_id'] = $user['id'];

            header('Location: /NoLeak/index.php?page=home');
            exit();

        } else {

            $erreur = "Email ou mot de passe incorrect.";
        }
    }
}

require_once __DIR__ . '/../views/login.php';