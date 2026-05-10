<?php

$host = 'localhost';
$dbname = 'Vendo'; 
$user = 'root';
$pass = 'root'; 
$charset = 'utf8mb4';

try {                 
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {      
    die("Erreur de connexion : " . $e->getMessage());
}
?>