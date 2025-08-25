<?php
$host = "localhost";
$user = "root"; // ou ton utilisateur MySQL
$pass = "";     // mot de passe MySQL si tu en as
$db   = "todo_db";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erreur connexion DB: " . $e->getMessage());
}
?>
