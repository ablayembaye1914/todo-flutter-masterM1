<?php
// Autoriser toutes les origines
header("Access-Control-Allow-Origin: *");

// Autoriser les méthodes GET, POST et OPTIONS
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Autoriser les headers spécifiques
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Pour les requêtes OPTIONS (pré-vol), on arrête le script ici
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}
?>
