<?php

if (isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'dbconnection.php';
    require_once 'functions.php';

    loginUser($conn, $email, $password);
}
else {
    header("../index.php");
    exit();
}