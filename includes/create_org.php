<?php

/**
 * Creates organisation
 *
 * Checks if organisation already exists.
 * Proceeds to insert organisation into database
 *
 * @var $orgName
 * @var $orgExists
 * @var $conn
 * @var $sql
 * @var $stmt
 */

if (isset($_POST['orgName'])) {
    $orgName = $_POST['orgName'];

    require_once 'dbconnection.php';
    require_once 'functions.php';

    $orgExists = orgExists($conn, $orgName);

    if ($orgExists !== false) {
        header('location: ../create_organisation.php?error=orgExists');
        exit();
    }

    $sql = "INSERT INTO organisations (name) VALUES (?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../create_organisation.php');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $orgName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../organisations.php');
    exit();

} else {
    header('location: ../create_organisation.php?error=emptyFields');
    exit();
}
