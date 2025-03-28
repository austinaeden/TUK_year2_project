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
                <li><a class="active" href="blog.php">Blog</a></li>
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

    <section id="page-header" class="blog-header">
        <div >
            <h2>#readmore</h2>
            <p>Read all case studies about our products! </p>
        </div>
    </section>

    <section id="blog">
        <div class="blog-box">
            <div class="blog-img">
                <img src="image/blog1.jpeg" alt="">
            </div>
            <div class="blog-details">
                <h4>The Cotton-Jersey Zip-Up Hoodie</h4>
                <P>Kickstarter man braid godard coloring book. Reclette waistcoat selfies yr 
                    wolf chartreuse hexagon irony, godard...</P>
                <a href="#">CONTINUE READING</a>    
            </div>
            <h1>13/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="image/blog2.jpeg" alt="">
            </div>
            <div class="blog-details">
                <h4>The Cotton-Jersey Zip-Up Hoodie</h4>
                <P>Kickstarter man braid godard coloring book. Reclette waistcoat selfies yr 
                    wolf chartreuse hexagon irony, godard...</P>
                <a href="#">CONTINUE READING</a>    
            </div>
            <h1>13/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="image/blog5.jpeg" alt="">
            </div>
            <div class="blog-details">
                <h4>The Cotton-Jersey Zip-Up Hoodie</h4>
                <P>Kickstarter man braid godard coloring book. Reclette waistcoat selfies yr 
                    wolf chartreuse hexagon irony, godard...</P>
                <a href="#">CONTINUE READING</a>    
            </div>
            <h1>13/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="image/blog4.jpeg" alt="">
            </div>
            <div class="blog-details">
                <h4>The Cotton-Jersey Zip-Up Hoodie</h4>
                <P>Kickstarter man braid godard coloring book. Reclette waistcoat selfies yr 
                    wolf chartreuse hexagon irony, godard...</P>
                <a href="#">CONTINUE READING</a>    
            </div>
            <h1>13/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="image/blog3.jpeg" alt="">
            </div>
            <div class="blog-details">
                <h4>The Cotton-Jersey Zip-Up Hoodie</h4>
                <P>Kickstarter man braid godard coloring book. Reclette waistcoat selfies yr 
                    wolf chartreuse hexagon irony, godard...</P>
                <a href="#">CONTINUE READING</a>    
            </div>
            <h1>13/01</h1>
        </div>
    </section>
    
    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="bi bi-arrow-right"></i></a>
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