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
        header("Location: ../index.php");
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

/**
 * Log user in
 *
 * Check data with database, check if username and password match.
 * Proceeds to log user in.
 *
 * @param $conn
 * @param $email
 * @param $password
 * @return void
 */
function loginUser($conn, $email, $password) {
    if (!userExists($conn, $email)) {
        header("Location: ../index.php?error=usererror");
    } else {
        if ($password !== userExists($conn, $email)["password"]) {
            header("Location: ../index.php?error=wrongpw");
        } else {
            echo ("Login succesfull!");
        }
    }
}
