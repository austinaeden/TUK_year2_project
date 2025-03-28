<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $username = $_POST["username"];

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($email, $pwd, $username)){
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)){
            $errors["ivalid_email"] = "Invalid email used!";
        }
        if (get_username($pdo, $username)) {
            $errors["username_taken"] = "Username already taken!";
        }
        if (is_email_registered( $pdo,  $email)) {
            $errors["email_used"] = "Email already registerd!";
        }

        require_once 'config_session.inc.php';
        if($errors){
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;

            header("location: ../signin.php");
            die();
        }

        create_user( $pdo,  $username,  $pwd,  $email);

        $result = get_user($pdo, $username);

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);

        $_SESSION["last_regeneration"] = time();

        header("location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die ("Query failed : " . $e->getmessage());
    }
}else{
    header("location: ../signin.php");
    die();
}