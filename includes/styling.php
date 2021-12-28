<?php
    session_start();

    if(!isset($_SESSION["firstname"]) && !isset($_SESSION["lastname"]) && !isset($_SESSION["email"])) {
        header("location: ../index.php?error=no_login");
        exit();
    }
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Liam Vlaskamp, Pascal Vlaskamp">

    <!-- Icon -->
    <link rel="icon" href="../img/icon-placeholder.svg">

    <!-- Plugins -->
    <link href="../plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
    <link href="../plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="../plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/bootstrap-extended.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="../css/pace.min.css" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="../css/dark-theme.css" rel="stylesheet" />
    <link href="../css/light-theme.css" rel="stylesheet" />
    <link href="../css/semi-dark.css" rel="stylesheet" />
    <link href="../css/header-colors.css" rel="stylesheet" />
