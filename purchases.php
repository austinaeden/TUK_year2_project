<?php
require_once 'includes/config_session.inc.php';
require_once 'cart/payment.inc.php';

// Ensure the user is logged in
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Fetch purchases for the user
    $sql = "SELECT * FROM purchases WHERE user_id = ? ORDER BY purchase_date DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId]);
    $purchases = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/purchase.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <section id="header">
        <div id="logo_head">
            <a href="#"><img src="image/img_logo.jpg" class="logo" alt=""></a>
            <h2>Purchases Made</h2>
        </div>
        <a href="cart.php"><i class="bi bi-x-square-fill"></i></a>
    </section>
    <section id="table">
        <table class="table caption-top">
            <caption>List of items</caption>
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Production</th>
                    <th scope="col">price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Purchase Date</th>

                </tr>
            </thead>
            
            <tbody>
                <?php if (!empty($purchases)): ?>
                    <?php foreach ($purchases as $index => $purchase): ?>
                        <tr>
                            <td><img src="<?php echo htmlspecialchars($purchase['item_image']); ?>" alt="<?php echo htmlspecialchars($purchase['item_name']); ?>" style="width: 50px;"></td>
                            <td><?php echo htmlspecialchars($purchase['item_name']); ?></td>
                            <td>$<?php echo number_format($purchase['item_price'], 2); ?></td>
                            <td><?php echo htmlspecialchars($purchase['item_quantity']); ?></td>
                            <td>$<?php echo number_format($purchase['item_price'] * $purchase['item_quantity'], 2); ?></td>
                            <td><?php echo htmlspecialchars($purchase['purchase_date']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">You have no purchase history.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
    

</body>
</html>