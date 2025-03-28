<?php
require_once __DIR__ . '/../includes/config_session.inc.php';
require_once __DIR__ .'/../includes/dbh.inc.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure the request contains valid JSON data
    $data = json_decode(file_get_contents('php://input'), true);

    // Ensure the user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["status" => "error", "message" => "User not logged in"]);
        exit;
    }

    $userId = $_SESSION['user_id'];
    $itemId = $data['id'];
    $newQuantity = $data['quantity'];

    if ($newQuantity < 1) {
        echo json_encode(["status" => "error", "message" => "Quantity must be at least 1"]);
        exit;
    }

    try {
        // Update the quantity in the database
        $sql = "UPDATE user_cart SET item_quantity = ? WHERE id = ? AND user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $newQuantity, PDO::PARAM_INT);
        $stmt->bindParam(2, $itemId, PDO::PARAM_INT);
        $stmt->bindParam(3, $userId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Quantity updated"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update quantity"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
    }
}
?>
