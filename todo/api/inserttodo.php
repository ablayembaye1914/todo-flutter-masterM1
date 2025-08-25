<?php
include("cors.php");

include("./utils/db.php");

$data = json_decode(file_get_contents("php://input"), true);

$account_id = $data['account_id'] ?? null;
$date = $data['date'] ?? null;
$todo = $data['todo'] ?? null;
$done = $data['done'] ?? false;

if (!$account_id || !$date || !$todo) {
    echo json_encode(["success" => false, "message" => "Paramètres manquants"]);
    exit;
}

$sql = "INSERT INTO todo_tables (account_id, date, todo, done) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([$account_id, $date, $todo, $done]);
    echo json_encode(["success" => true, "message" => "Tâche ajoutée"]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "Erreur lors de l'ajout", "error" => $e->getMessage()]);
}
?>
