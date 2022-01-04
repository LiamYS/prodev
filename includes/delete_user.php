<?php

require_once 'dbconnection.php';
require_once 'functions.php';

/**
 * @var $conn
 * @var $options
 */
$options = array(
    'id' => $_GET["user"]
);
$user = userExists($conn, $options);

if ($user === false) {
    header('location: ../users.php?error=no_user');
    exit();
} else {
    $sql = "DELETE FROM users WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../users.php?error=prepare_fail');
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $options["id"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header('location: ../users.php');
    exit();
}
