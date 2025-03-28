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
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
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

    <section id="hero">
        <div class="paragragh">
            <h1>Trade-in-offer</h1>
            <?php
            output_username();
            ?>
        </div>
    </section>

    <section id="fearture" class="section-p1">
        <div class="fe-box">
            <img src="image/free-shipping.jpg" class="fe-img" alt="">
            <h6>Free Delivery</h6>
        </div>
        <div class="fe-box">
            <img src="image/online-order.jpg" class="fe-img" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="image/save-money.jpg" class="fe-img" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="image/promotion.jpg" class="fe-img" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="image/happy-sell.jpg" class="fe-img" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="image/support.jpg" class="fe-img" alt="">
            <h6>Support</h6>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>Feartured Products</h2>
        <p>Summer Collection New Morden Desing</p>
        <div id="flex">
            <div class="index">
                
            </div>
        </div>
    </section>

    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% Off</span> All t-shirts & Accessories</h2>
        <a href="shop.php"><button class="normal">Explore More</button></a>
        
    </section>

    <section id="product1" class="section-p1">
        <h2>New Arrivals</h2>
        <p>Summer Collection New Morden Desing</p>
        <div id="flex">
        <div class="index"></div>
        </div>
    </section>
    
    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best classic dress is on sale at cara</span>
            <a href="shop.php"><button class="white">Learn More</button></a>
        </div>
        <div class="banner-box banner-box2">
            <h4>spring/summer</h4>
            <h2>upcoming season</h2>
            <span>The best classic dress is on sale at cara</span>
            <a href="shop.php"><button class="white">Collection</button></a>
        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>NEW FOOTWEAR COLLECTION</h2>
            <h3>Spring / Summer 2024</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection -50% OFF</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>T-SHIRT</h2>
            <h3>New Trendy Prints</h3>
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