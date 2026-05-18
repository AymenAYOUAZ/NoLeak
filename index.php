<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
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

    case 'qcm':
      require __DIR__ . '/controllers/QcmController.php';
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