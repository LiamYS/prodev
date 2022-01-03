
<?php include 'includes/styling.php'; ?>

<title>ProDev - Create project</title>
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
        <div class="row">
            <div class="col col-xl-6 mx-auto">
                <div class="card radius-10">

                    <div class="card">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <h6 class="mb-0 text-uppercase">Create project</h6>
                                <hr/>
                                <form class="row g-3" action="includes/create_proj.php" method="post" enctype="multipart/form-data">
                                    <div class="col-12">
                                        <label class="form-label">Project name</label>
                                        <input type="text" name="projName" class="form-control" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Lot Map</label>
                                        <input type="file" name="projLot" class="form-control" required>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Create project</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
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