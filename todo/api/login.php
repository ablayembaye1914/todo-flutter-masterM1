<?php
include("cors.php");

include("./utils/db.php");

$data = json_decode(file_get_contents("php://input"), true);

$email = $data['email'] ?? null;
$password = $data['password'] ?? null;

if (!$email || !$password) {
    echo json_encode(["success" => false, "message" => "Email et mot de passe requis"]);
    exit;
}

$sql = "SELECT * FROM accounts_table WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    echo json_encode([
        "success" => true,
        "account_id" => $user['account_id'],
        "message" => "Connexion réussie"
    ]);
} else {
    echo json_encode(["success" => false, "message" => "Email ou mot de passe incorrect"]);
}
?>
