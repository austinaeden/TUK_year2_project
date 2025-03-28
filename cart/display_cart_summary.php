<?php
// Already implemented in your provided `display_cart_summary.php`
require_once __DIR__ . '/../includes/config_session.inc.php';
require_once __DIR__ .'/../includes/dbh.inc.php'; // Include database connection

function getCartSummary($pdo) {
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];

        $sql = "SELECT * FROM user_cart WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $userId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $subtotal = 0;
        foreach ($result as $row) {
            $subtotal += $row['item_price'] * $row['item_quantity'];
        }
        

        echo json_encode([
            'status' => 'success',
            'subtotal' => $subtotal,
            'total' => $subtotal
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    }
}

getCartSummary($pdo);
?>
