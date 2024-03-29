<?php
/**
 * Checks with database if user exists
 *
 * Selects from database all rows where $email is found. Returns either all the data, or false.
 * In which case we know the user does not yet exist.
 *
 * @param $conn
 * @param $options
 * @return array|false|string[]|void
 */
// TODO: Check if changed functions impacts functionalities on website
function userExists($conn, $options) {
    $sql = "SELECT * FROM users WHERE email = ? OR id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $options["email"], $options["id"]);
    mysqli_stmt_execute($stmt);
    // Returns data from database
    $resultData = mysqli_stmt_get_result($stmt);
    // Check if there is already an email in database
    mysqli_stmt_close($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;    // Return userdata
    } else {
        return false;
    }
}

/**
 * Checks with database if organisation exists
 *
 * Selects from database all rows where $name is found. Returns either all the data, or false.
 * In which case we know the organisations does not yet exist.
 *
 * @param $conn
 * @param $options
 * @return array|false|string[]|void
 */
function orgExists($conn, $options) {
    $sql = "SELECT * FROM organisations WHERE name = ? OR id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $options["name"], $options["id"]);
    mysqli_stmt_execute($stmt);
    // Returns data from database
    $resultData = mysqli_stmt_get_result($stmt);
    // Check if there is already an name in database
    mysqli_stmt_close($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;    // Return userdata
    } else {
        return false;
    }
}

/**
 * Checks with database if project exists
 *
 * Selects from database all rows where $name is found. Returns either all the data, or false.
 * In which case we know the organisations does not yet exist.
 *
 * @param $conn
 * @param $name
 * @param $id
 * @return array|false|string[]|void
 */
function projExists($conn, $options) {
    $sql = "SELECT * FROM projects WHERE name = ? OR id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $options["name"], $options["id"]);
    mysqli_stmt_execute($stmt);
    // Returns data from database
    $resultData = mysqli_stmt_get_result($stmt);
    // Check if there is already a name in database
    mysqli_stmt_close($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;    // Return userdata
    } else {
        return false;
    }
}
