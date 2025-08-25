<?php
include("cors.php");

include("./utils/db.php");

// Récupération du JSON
$data = json_decode(file_get_contents("php://input"), true);

$email = $data['email'] ?? null;
$password = $data['password'] ?? null;

if (!$email || !$password) {
    echo json_encode(["success" => false, "message" => "Email et mot de passe requis"]);
    exit;
}

// Hash du mot de passe
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO accounts_table (email, password) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([$email, $hashedPassword]);
    echo json_encode(["success" => true, "message" => "Compte créé avec succès"]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "Erreur lors de l'inscription", "error" => $e->getMessage()]);
}
?>
