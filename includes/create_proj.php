<?php
session_start();
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
    $options = array(
        'name' => $projName
    );
    // TODO: Implement allowed maximum file size
    $file = $_FILES['projLot'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    require_once 'dbconnection.php';
    require_once 'functions.php';

    $projExists = projExists($conn, $options);

    if ($projExists !== false) {
        header('location: ../create_project.php?error=orgExists');
        exit();
    }

    // Check file extension
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowedExt = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allowedExt)) {
        if ($fileError === 0) {
            // TODO: Change file name to lot_map_{ID}
            $projectName = str_replace(" ", "_", $_POST['projName']);
            $fileNameNew = "lot_map_".$projectName.".".$fileActualExt;
            $fileDestination = '../uploads/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
        } else {
            header('location: ../create_project.php?error=upload_error');
            exit();
        }
    } else {
        header('location: ../create_project.php?error=wrong_ext');
        exit();
    }

    $sql = "INSERT INTO projects (name, reference, orgID) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../create_project.php?error=prepare_fail');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'sss', $projName, $fileNameNew, $_SESSION["orgID"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../projects.php');
    exit();

} else {
    header('location: ../create_projects.php?error=emptyFields');
    exit();
}
