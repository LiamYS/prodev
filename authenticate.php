<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "usbw";
$database = "prodev";

// Try to connect to the database
$con = mysqli_connect($servername, $username, $password, $database);
if ($con->connect_errno){
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['email'], $_POST['password'])){
    exit('Please fill both the username and password fields!');
}