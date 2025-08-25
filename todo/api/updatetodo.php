<?php

include("cors.php");

include("./utils/db.php");

$data = json_decode(file_get_contents("php://input"), true);

$todo_id = $data['todo_id'] ?? null;
$date = $data['date'] ?? null;
$todo = $data['todo'] ?? null;
$done = $data['done'] ?? false;

if (!$todo_id || !$date || !$todo) {
    echo json_encode(["success" => false, "message" => "Paramètres manquants"]);
    exit;
}

$sql = "UPDATE todo_tables SET date=?, todo=?, done=? WHERE todo_id=?";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([$date, $todo, $done, $todo_id]);
    echo json_encode(["success" => true, "message" => "Tâche mise à jour"]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "Erreur de mise à jour", "error" => $e->getMessage()]);
}
?>
