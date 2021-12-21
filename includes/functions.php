<?php

/**
 * Checks with database if user exists
 *
 * Selects from database all rows where $email is found. Returns either all the data, or false.
 * In which case we know the user does not yet exist.
 *
 * @param $conn
 * @param $email
 * @return array|false|string[]|void
 */
function userExists($conn, $email) {
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
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
