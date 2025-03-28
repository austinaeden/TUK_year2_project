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
                <li><a href="about.php">About</a></li>
                <li><a class="active" href="contact.php">Contact</a></li>
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

    <section id="page-header" class="contact-header">
        <div >
            <h2>#let's_talk</h2>
            <p>LEAVE A MESSAGE, We love to hear from you</p>
        </div>
    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency locations or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="bi bi-map"></i>
                    <p>Haile Selassie Avenue Entrance on Workshop Road</p>
                </li>
                <li>
                    <i class="bi bi-envelope-at"></i>
                    <p>johndoe@gmail.com</p>
                </li>
                <li>
                    <i class="bi bi-telephone-fill"></i>
                    <p>+254 7000 000 000</p>
                </li>
                <li>
                    <i class="bi bi-alarm"></i>
                    <p>Monday to Friday: 9.00am to 16.00pm</p>
                </li>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7977.6102829002875!2d36.8194499977952!3d-1.2912589000000019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10df5a23385d%3A0x15238033c2bcdc3b!2sThe%20Technical%20University%20Of%20Kenya!5e0!3m2!1sen!2ske!4v1730664564172!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>   
    </section>


    <section id="form-details">
        <form id="message-form">
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>
            <input type="text" id="name" placeholder="Your Name" required>
            <input type="email" id="email" placeholder="E-mail" required>
            <input type="text" id="subject" placeholder="Subject">
            <textarea id="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
            <button class="normal" type="submit">Submit</button>
        </form>

        <script>
            document.getElementById("message-form").addEventListener("submit", function (event) {
                // Prevent default form submission
                event.preventDefault();

                // Retrieve form values
                const name = document.getElementById("name").value.trim();
                const email = document.getElementById("email").value.trim();
                const subject = document.getElementById("subject").value.trim();
                const message = document.getElementById("message").value.trim();

                // Basic validation (ensure required fields are filled)
                if (!name || !email || !message) {
                    alert("Please fill in all required fields.");
                    return;
                }else if (email === "") {
                    alert("Please enter a valid email address.");
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    alert("Please enter a valid email format.");
                } 

                // Display success message
                alert(`Thank you, ${name}! Your message has been submitted successfully. We will get back to you through your email, ${email}.`);

                // Optional: Reset the form after submission
                document.getElementById("message-form").reset();
            });
        </script>


        <div class="people">
            <div>
                <img src="image/profile1.jpeg" alt="">
                <p><span>Albert Einstein. </span> Senior Marketing Manager <br>
                Phone: +254 7000 000 000 <br> E-mail: sample@gmail.com</p>
            </div>
            <div>
                <img src="image/profile2.jpeg" alt="">
                <p><span>Will Smith. </span> Senior Marketing Manager <br>
                Phone: +254 7000 000 000 <br> E-mail: sample@gmail.com</p>
            </div><div>
                <img src="image/profile3.jpeg" alt="">
                <p><span>Snoop Dogg. </span> Senior Marketing Manager <br>
                Phone: +254 7000 000 000 <br> E-mail: sample@gmail.com</p>
            </div>
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