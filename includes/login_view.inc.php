<?php

declare(strict_types=1);


function output_username(){
    if(isset($_SESSION["user_id"])){
        echo '
        <h2>Thanks for joining us <span class="username">'. $_SESSION["user_username"] .'</span> </h2>
        <h3>Get our super value deals</h3>
        <h3>On all products</h3>
        <p>Save more with coupons & up to 70% off! </p>
        <a href="shop.php"><button>Shop Now</button></a>
        ';
    }else {
        echo '
        <h3>Care to join us
        to get our </h3>
        <h3>Super value deals on all products</h3>
        <p>Save more with coupons & up to 70% off! </p>
        <a href="login.php"><button>Login Now</button></a>
        ';
    }
}



function output_username_ontop(){
    if(isset($_SESSION["user_id"])){
        echo '<h3 style="padding: 10px;" >Welcome  <span class="username">'. $_SESSION["user_username"] .'</span></h3>';
    }
}


function output_logout(){
    if(isset($_SESSION["user_id"])){
        echo '
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropbtn">
                <i class="bi bi-person-circle"></i>
            </a>
            <ul class="dropdown-content">
                <li>
                    <form action="includes/logout.inc.php" method="post" style="display: inline;">
                        <button class="logout_btn" type="submit" name="action" value="logout">
                            LogOut
                        </button>
                    </form>
                </li>            
            </ul>
        </li>
        ';
    }else{
        echo '
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropbtn">
                <i class="bi bi-person-circle"></i>
            </a>
            <ul class="dropdown-content">
                <li><a href="login.php">Login</a></li>
                <br>
                <li><a href="signin.php">SignUp</a></li>
            </ul>
        </li>
        ';
    }

}

function check_login_errors(){
    if(isset($_SESSION["errors_login"])){
        $errors = $_SESSION["errors_login"];

        foreach($errors as $error){
            echo '<p class="list-group-item list-group-item-danger">' . $error . '</p>';
        }
        echo "<br>";

        unset($_SESSION["errors_login"]);
    }
}



