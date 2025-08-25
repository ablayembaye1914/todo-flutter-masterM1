<?php
include("cors.php");

include("./utils/db.php");

$data = json_decode(file_get_contents("php://input"), true);
$account_id = $data['account_id'] ?? null;

if (!$account_id) {
    echo json_encode([]);
    exit;
}

$sql = "SELECT * FROM todo_tables WHERE account_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$account_id]);

$todos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($todos);
?>
