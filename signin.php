<?php
require_once 'includes/signup_view.inc.php';
require_once 'includes/config_session.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="wrapper">
        <form action="includes/signup.inc.php" method="post"> <!-- Form submits to index.php -->
            <h1>Create an account</h1>
            <?php
            signup_inputs()
            ?>
            <button name="submit" type="submit" class="btn">Sign In</button>
            <div class="register-link">
                <p>Have an account? <a href="login.php">Log in</a></p><br>
                <?php
                check_signup_errors();
                ?>
                <p><a href="shop.php">Continue checking our products</a></p>
            </div>
        </form>
    </div>
</body>
</html>
