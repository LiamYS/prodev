<?php

if (isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'dbconnection.php';
    require_once 'functions.php';

    echo ('Email: ' . $email . ' Password: ' . $password);
    echo ('<br>' . json_encode(userExists($conn, $email)));

    loginUser($conn, $email, $password);
}
else {
    header("../index.php");
    exit();
}