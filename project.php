
<?php
include 'includes/styling.php';
require_once 'includes/functions.php';
require_once 'includes/dbconnection.php';
/**
 * @var $conn
 * @var $options
 */
$options = array(
        "id" => $_GET["project"]
);
$project = projExists($conn, $options);
?>

<title>ProDev - <?php echo $project["name"]; ?></title>
</head>

<body>


<!--start wrapper-->
<div class="wrapper">
    <!--start top header-->
    <?php include 'includes/header.php'; ?>
    <!--end top header-->

    <!--start sidebar -->
    <?php include 'includes/sidebar.php'; ?>
    <!--end sidebar -->

    <!--start content-->
    <main class="page-content">
        <h6 class="mb-0 text-uppercase"><?php echo $project["name"]; ?></h6>
        <hr />
        <img src="uploads/<?php echo $project["reference"]; ?>"
    </main>
    <!--end page main-->

    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

</div>
<!--end wrapper-->


<?php include 'includes/footer.php'; ?>

</body>

</html>