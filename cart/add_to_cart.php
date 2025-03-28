<?php
require_once __DIR__ . '/../includes/config_session.inc.php';
require_once __DIR__ .'/../includes/dbh.inc.php'; // Include database connection

// Ensure the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the cart item data from the request body
    $data = json_decode(file_get_contents('php://input'), true);

    // Ensure the user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["status" => "error", "message" => "User not logged in"]);
        exit;
    }

    $userId = $_SESSION['user_id'];
    $itemName = $data['name'];
    $itemImage = $data['image'];
    $itemPrice = $data['price'];
    $itemQuantity = $data['quantity'];

    try {
        // Check if the item already exists in the cart
        $sql = "SELECT id, item_quantity FROM user_cart WHERE user_id = ? AND item_name = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $userId, PDO::PARAM_INT);
        $stmt->bindParam(2, $itemName, PDO::PARAM_STR);
        $stmt->execute();
        $existingItem = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingItem) {
            // Item exists, update the quantity
            $newQuantity = $existingItem['item_quantity'] + $itemQuantity;
            $updateSql = "UPDATE user_cart SET item_quantity = ? WHERE id = ?";
            $updateStmt = $pdo->prepare($updateSql);
            $updateStmt->bindParam(1, $newQuantity, PDO::PARAM_INT);
            $updateStmt->bindParam(2, $existingItem['id'], PDO::PARAM_INT);
            if ($updateStmt->execute()) {
                echo json_encode(["status" => "success", "message" => "Item quantity updated"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to update item quantity"]);
            }
        } else {
            // Item doesn't exist, add it to the cart
            $insertSql = "INSERT INTO user_cart (user_id, item_name, item_image, item_price, item_quantity) VALUES (?, ?, ?, ?, ?)";
            $insertStmt = $pdo->prepare($insertSql);
            $insertStmt->bindParam(1, $userId, PDO::PARAM_INT);
            $insertStmt->bindParam(2, $itemName, PDO::PARAM_STR);
            $insertStmt->bindParam(3, $itemImage, PDO::PARAM_STR);
            $insertStmt->bindParam(4, $itemPrice, PDO::PARAM_STR);
            $insertStmt->bindParam(5, $itemQuantity, PDO::PARAM_INT);
            if ($insertStmt->execute()) {
                echo json_encode(["status" => "success", "message" => "Item added to cart"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to add item to cart"]);
            }
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
    }
}
?>
