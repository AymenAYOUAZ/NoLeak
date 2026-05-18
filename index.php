<?php
session_start();


$page = $_GET['page'] ?? 'home';

switch($page){

    case 'login':
        require 'controllers/loginController.php';
        break;
    case 'forgot':
        require 'controllers/ForgotController.php';
         break;

    case 'register':
        require 'controllers/AuthController.php';
        break;

    case 'quiz':
        require 'controllers/quizController.php';
        break;

    case 'resultat':
        require 'controllers/resultatController.php';
        break;

    case 'admin':
        require 'controllers/adminController.php';
        break;

    default:
        require 'views/home.php';
        break;
}