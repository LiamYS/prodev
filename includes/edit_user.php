<?php

if (!isset($_POST["firstname"]) && !isset($_POST["lastname"]) && !isset($_POST["email"])) {
    header('location: ../users.php?error=empty_fields');
    exit();
}

require_once 'dbconnection.php';
require_once 'functions.php';

// Possible new user information
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$options = array(
    'id' => $_GET['user']
);
$user = userExists($conn, $options);

// User must exist in order to edit its data.
if ($user === false) {
    header('location: ../users.php?error=no_user');
    exit();
}

// TODO: Check if user puts in an already existing email address

$sql = "UPDATE users SET firstname = ?, lastname = ?, email = ? WHERE id = ?;";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../users.php?error=prepare_fail");
    exit();
}

mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $options["id"]);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location: ../profile.php?user=".$options["id"]);
exit();


