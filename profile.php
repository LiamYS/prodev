
<?php include 'includes/styling.php'; ?>

<title>ProDev - Profile</title>
</head>

<body>


<!--start wrapper-->
<div class="wrapper">
    <!--start top header-->
    <? include 'includes/header.php'; ?>
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
                                <h6 class="mb-0 text-uppercase">Account information</h6>
                                <hr/>
                                <form class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="firstname" class="form-control" value="<?php echo $_SESSION["firstname"]; ?>" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="lastname" class="form-control" value="<?php echo $_SESSION["lastname"]; ?>" readonly>
                                    </div>
                                    <div class="col-8">
                                        <label class="form-label">Organisation</label>
                                        <input type="text" name="organisation" class="form-control" value="<?php echo $_SESSION["orgName"]; ?>" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">Role</label>
                                        <select class="form-select">
                                            <option name="" value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Email Adress</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo $_SESSION["email"]; ?>" readonly>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" readonly>
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