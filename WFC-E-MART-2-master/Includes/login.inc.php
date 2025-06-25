<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];

    try {

        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        //ERROR HANDLER
        $errors = [];

        if(is_input_empty($username, $password)){
            $errors["empty_input"] = "Fill all the fields!";
        }

        $result = get_user($pdo, $username);

        if(is_username_wrong($result)){
            $errors["login_incorrect"] = "Incorrect username!";
        }

        if(!is_username_wrong($result) && is_password_wrong($password, $result["password"])){
            $errors["login_incorrect"] = "Incorrect password!";
        }

        require_once 'config_session.inc.php';

            if($errors){
                $_SESSION["errors_login"] = $errors;

            header("location: ../User pages/signup.php");
            die();
        }

        // If login is successful
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);

        $_SESSION["last_regeneration"] = time();
        header("location: ../User pages/home.php?login=success");
        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else{
    header("location: ../User pages/signup.php");
    die();
}