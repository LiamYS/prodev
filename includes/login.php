<?php

if (isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'dbconnection.php';
    require_once 'functions.php';

    /**
     * Log user in
     *
     * Check data with database, check if username and password match.
     * Proceeds to log user in.
     *
     * @var $conn
     * @var $email
     * @var $password
     */
    loginUser($conn, $email, $password);
}
else {
    header("location: ../index.php");
    exit();
}