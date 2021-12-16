<?php

// Checks whether email is already in database
function userExists($conn, $email) {
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("../index.php");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    // Returns data from database
    $resultData = mysqli_stmt_get_result($stmt);
    // Check if there is already an email in database
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;    // Return userdata
    }
    else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function loginUser($conn, $email, $password) {

}
