<?php
require_once 'includes/login_view.inc.php';
require_once 'includes/config_session.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="wrapper">
        <form action="includes/login.inc.php" method="post"> <!-- Form submits to index.php -->
            <h1>Welcome Back</h1>
            <div class="input-box">
                <input name="username" type="text" placeholder="username" >
                <i class="bi bi-person-fill"></i>
            </div>
            <div class="input-box">
                <input name="pwd" type="password" placeholder="Password" >
                <i class="bi bi-lock-fill"></i>
            </div>
            <div class="remember-forget">
                <a href="#">Forgot password</a>
            </div>
            <button name="submit" type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="signin.php">Sign in</a></p><br>
                <?php
                check_login_errors();
                ?>
                <p><a href="shop.php">Continue checking our products</a></p>
            </div>
        </form>
    </div>
</body>
</html>
