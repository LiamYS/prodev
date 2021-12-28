<?php

/**
 * Creates project
 *
 * Checks if project already exists.
 * Proceeds to insert project into database
 *
 * @var $projName
 * @var $projExists
 * @var $conn
 * @var $sql
 * @var $stmt
 */

if (isset($_POST['projName'])) {
    $projName = $_POST['projName'];

    require_once 'dbconnection.php';
    require_once 'functions.php';

    $projExists = projExists($conn, $projName);

    if ($projExists !== false) {
        header('location: ../create_project.php?error=orgExists');
        exit();
    }

    $sql = "INSERT INTO projects (name, orgID) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../create_project.php?error=prepare_fail');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ss', $projName, $_SESSION["orgID"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../projects.php');
    exit();

} else {
    header('location: ../create_projects.php?error=emptyFields');
    exit();
}
