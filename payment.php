<?php
require_once 'includes/config_session.inc.php';
require_once 'cart/payment.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online shop</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/payment.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <section id="payment-section">
        <section id="top">
            <h3>Payment Form</h3>
            <a href="cart.php"><i class="bi bi-x-square"></i></a>
        </section>
        <section id="pyt-form">
        <?php
        output_payment($pdo);
        ?>
        </section>
        
    </section>
    

</body>
</html>