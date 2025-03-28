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
                <li><a href="shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a class="active" href="about.php">About</a></li>
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

    <section id="page-header" class="about-header">
        <div >
            <h2>#KnowUs</h2>
            <p>Lorem ipsum dolor sit amet, consectetur</p>
        </div>
    </section>

    <section id="about-head" class="section-p1">
        <img src="image/about1.avif" alt="">
        <div>
            <h2>Who We Are</h2>
            <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Eos, natus corrupt itaque quae quas molestiae qui vel et 
                delectus magnam iure voluptatum error id harum ipsam a cum 
                repellat minus.Lorem ipsum dolor sit, amet consectetur 
                adipisicing elit. Facilis corrupti tempore excepturi modi aliquam 
                maxime, veniam debitis repellat odit consequatur perferendis 
                dolorum et, itaque non optio maiores? Suscipit, ex ut!
            </P>
            <abbr title="">Create stunning images with as such or as little control as you 
            like thanks to a choice of basic and Creative modes</abbr>

            <br><br>

            <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%">Create stunning images with as such or as little control as you 
                like thanks to a choice of basic and Creative modes</marquee>
        </div>
    </section>

    <section id="about-app" class="section-p1">
        <h1>Download Our <a href="#">App</a></h1>
        <div class="video">
            <video autoplay muted loop src="image/v2.mp4"></video>
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