<?php
$host = 'localhost';  // Remplace par ton host si nécessaire
$dbname = 'db_fxguard_test';
$user = 'root';  // Remplace par ton utilisateur MySQL
$pass = '';  // Remplace par ton mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}