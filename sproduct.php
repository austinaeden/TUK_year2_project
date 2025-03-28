<?php
require_once 'includes/login_view.inc.php';
require_once 'includes/config_session.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online shop</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <section id="header">
        <div id="logo_head">
            <a href="#"><img src="image/img_logo.jpg" class="logo" alt=""></a>
            <?php
            output_username_ontop();
            ?>
        </div>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="bi bi-basket-fill"></i></a></li>
                <?php
                output_logout();
                ?>
                <a href="#" id="close"><i class="bi bi-x-square"></i></a>
            </ul>
        </div>



        <div id="mobile">
            <i id="bar" class="bi bi-box-arrow-left"></i>
            <a href="cart.php"><i class="bi bi-basket-fill"></i></i></a>

        </div>
    </section>

    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="" width="100%" id="MainImg" alt="">
        </div>
    
        <div class="single-pro-details">
            <h6 id="breadcrumb"></h6>
            <h4 id="product-name">Product Name</h4>
            <h2 id="product-price">$0.00</h2>
            <select>
                <option>Select Size</option>
                <option>Small</option>
                <option>Large</option>
                <option>XL</option>
                <option>XXL</option>
            </select>
            <input id="product-quantity" type="number" value="1" min="1">
            <button id="add-to-cart" class="normal add-to-cart-btn" onclick="addToCart('Product Name', 'product-image-url', '99.99', event)" >Add To Cart</button>
            <h4>Product Details</h4>
        </div>
    </section>
    
    <section id="product1" class="section-p1">
        <h2>Feartured Products</h2>
        <p>Summer Collection New Morden Desing</p>
        <div id="flex">
        <div class="pro-container"></div>
        </div>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletter</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" id="email-input" placeholder="Your email address">
            <button class="normal" id="sign-up-button">Sign Up</button>
        </div>
    </section>

    <script>
        document.getElementById("sign-up-button").addEventListener("click", () => {
            const emailInput = document.getElementById("email-input");
            const emailValue = emailInput.value.trim();
            
            if (emailValue === "") {
                alert("Please enter a valid email address.");
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue)) {
                alert("Please enter a valid email format.");
            } else {
                alert(`Thank you for signing up with ${emailValue}!`);
                
                // Reset the input field
                emailInput.value = "";
            }
        });
    </script>


    <footer id="ending"></footer>

    <script src="index.js"></script>
</body>
</html>