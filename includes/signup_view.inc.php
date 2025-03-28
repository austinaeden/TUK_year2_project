<?php

declare(strict_types=1);

function signup_inputs(){

    if (isset($_SESSION['signup_data']["email"]) && !isset($_SESSION["errors_signup"]["email_used"]) && !isset($_SESSION["errors_signup"]["ivalid_email"])) {
        echo '<div class="input-box">
                <input name="email" type="text" placeholder="email"  value="' . $_SESSION['signup_data']["email"] . '" >
                <i class="bi bi-envelope-at-fill"></i>
            </div>';
    }else{
        echo '<div class="input-box">
                <input name="email" type="text" placeholder="email" >
                <i class="bi bi-envelope-at-fill"></i>
            </div>';
    }

    if (isset($_SESSION['signup_data']["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        echo '<div class="input-box">
                <input name="username" type="text" placeholder="Username" value="' . $_SESSION['signup_data']["username"] . '" >
                <i class="bi-person-fill"></i>
            </div>';
    }else{
        echo '<div class="input-box">
                <input name="username" type="text" placeholder="Username" >
                <i class="bi bi-person-fill"></i>
            </div>';
    }

    echo '<div class="input-box">
            <input name="pwd" type="password" placeholder="password" >
            <i class="bi bi-lock-fill"></i>
        </div>';

}

function check_signup_errors(){
    if(isset($_SESSION["errors_signup"])){
        $errors = $_SESSION["errors_signup"];

        foreach($errors as $error){
            echo '<p class="list-group-item list-group-item-danger">' . $error . '</p>';
        }

        unset($_SESSION["errors_signup"]);
    }
}