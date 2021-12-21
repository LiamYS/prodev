<?php
/**
 * Log user in
 *
 * Check data with database, check if username and password match.
 * Proceeds to log user in.
 *
 * @var $conn
 * @var $email
 * @var $password
 * @var $passwordHashed
 * @var $checkPassword
 */
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'dbconnection.php';
    require_once 'functions.php';

    $userExists = userExists($conn, $email);

    if ($userExists === false) {
        header("location: ../index.php?error=no_user");
        exit();
    }

    $passwordHashed = $userExists["password"];
    $checkPassword = password_verify($password, $passwordHashed);

    if ($checkPassword === false) {
        header("location: ../index.php?error=wrong_password");
    } else {
        session_start();

        $_SESSION["firstname"] = $userExists["firstname"];
        $_SESSION["lastname"] = $userExists["lastname"];
        $_SESSION["email"] = $userExists["email"];

        header("location: ../dashboard.php");
    }
    exit();

}
else {
    header("location: ../index.php");
    exit();
}