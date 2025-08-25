<?php
include("cors.php");

include("./utils/db.php");

$data = json_decode(file_get_contents("php://input"), true);
$todo_id = $data['todo_id'] ?? null;

if (!$todo_id) {
    echo json_encode(["success" => false, "message" => "todo_id manquant"]);
    exit;
}

$sql = "DELETE FROM todo_tables WHERE todo_id=?";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([$todo_id]);
    echo json_encode(["success" => true, "message" => "Tâche supprimée"]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "Erreur lors de la suppression", "error" => $e->getMessage()]);
}
?>
