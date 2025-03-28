<?php
require_once __DIR__ . '/../includes/config_session.inc.php';
require_once __DIR__ . '/../includes/dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure the user is logged in
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];

        // Fetch cart items for the user
        $sql = "SELECT * FROM user_cart WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userId]);
        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Begin transaction
        $pdo->beginTransaction();

        try {
            // Insert each cart item into the purchases table
            $insertSql = "INSERT INTO purchases (user_id, item_name, item_image, item_price, item_quantity) VALUES (?, ?, ?, ?, ?)";
            $insertStmt = $pdo->prepare($insertSql);

            foreach ($cartItems as $item) {
                $insertStmt->execute([
                    $item['user_id'],
                    $item['item_name'],
                    $item['item_image'],
                    $item['item_price'],
                    $item['item_quantity']
                ]);
            }

            // Clear the user's cart
            $deleteSql = "DELETE FROM user_cart WHERE user_id = ?";
            $deleteStmt = $pdo->prepare($deleteSql);
            $deleteStmt->execute([$userId]);

            // Commit transaction
            $pdo->commit();

            // Redirect or display success message
            header("Location: ../index.php");
            exit();
        } catch (Exception $e) {
            // Rollback transaction on error
            $pdo->rollBack();
            // Handle the error appropriately
            echo "An error occurred: " . $e->getMessage();
        }
    } else {
        // Redirect to login page if not logged in
        header("Location: ../index.php");
        exit();
    }
}
?>
