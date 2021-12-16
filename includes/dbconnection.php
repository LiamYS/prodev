<?php

$dbserver = "localhost";
$dbusername = "root";
$dbpassword = "usbw";
$database = "prodev";

$conn = mysqli_connect($dbserver, $dbusername, $dbpassword, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}