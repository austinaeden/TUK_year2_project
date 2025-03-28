<?php
require_once __DIR__ . '/../includes/config_session.inc.php';
require_once __DIR__ .'/../includes/dbh.inc.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$itemId = $data['item_id'] ?? null;

if ($itemId && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $sql = "DELETE FROM user_cart WHERE id = ? AND user_id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$itemId, $userId])) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to remove item from cart.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid item ID or user not logged in.']);
}
