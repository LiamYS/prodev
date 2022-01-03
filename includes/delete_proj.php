<?php

require_once 'dbconnection.php';
require_once 'functions.php';

/**
 * @var $conn
 * @var $options
 */
$options = array(
    'id' => $_GET["project"]
);
$project = projExists($conn, $options);

if ($project === false) {
    header('location: ../projects.php?error=no_project');
    exit();
} else {
    $sql = "DELETE FROM projects WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../projects.php?error=prepare_fail');
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $options["id"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Deletes lot file from server
    $link = "../uploads/".$project["reference"];
    unlink($link);

    header('location: ../projects.php');
    exit();
}
