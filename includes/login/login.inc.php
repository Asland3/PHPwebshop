<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        require_once "../dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_controller.inc.php";

        // ERROR HANDLERS

        $errors = [];

        if (isInputEmpty($email, $password)) {
            $errors["emptyInput"] = "Fill in all fields!";
        }

        $result = getUser($pdo, $email);

        if (isEmailWrong($result)) {
            $errors["login_incorrect"] = "Incrorect login info!";
        }

        if (!isEmailWrong($result) && isPasswordWrong($password, $result["password"])) {
            $errors["login_incorrect"] = "Incrorect login info!";
        }


        require_once "../config_session.inc.php";

        if ($errors) {
            $_SESSION["errors_login"] = $errors;

            header("location: ../../login.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_email"] = htmlspecialchars($result["email"]);
        $_SESSION["user_name"] = $result["name"];
        $_SESSION["user_role"] = $result["role"];

        $_session["last_regeneration"] = time();

        header("location: ../../index.php?login=success");
        $pdo = null;
        $statement = null;

        die();
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("location: ../index.php");
    die();
}
