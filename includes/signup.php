<?php
/**
 * Creates user
 *
 * Checks if all fields are filled, proceeds to check if email is already in the database.
 * If email is in database it will give an error, since no 2 users can have the same email.
 * Proceeds to insert userdata into database / create user.
 *
 * @var $conn
 * @var $firstname
 * @var $lastname
 * @var $email
 * @var $password
 * @var $userExists
 * @var $sql
 * @var $stmt
 * @var $hashedPassword
 */
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) ) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'dbconnection.php';
    require_once 'functions.php';

    $userExists = userExists($conn, $email);

    if ($userExists !== false) {
        header("location: ../create_user.php?error=email_taken");
        exit();
    }

    $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create_user.php");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../users.php");
    exit();

} else {
    header("location: ../create_user.php?error=fields");
    exit();
}