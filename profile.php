
<?php include 'includes/styling.php'; ?>

<title>ProDev - Profile</title>
</head>

<body>

<?php
require_once 'includes/dbconnection.php';
require_once 'includes/functions.php';
$userOptions = array(
        'id' => $_GET['user']
);
$user = userExists($conn, $userOptions);

$orgOptions = array(
    'id' => $user['orgID']
);
$organisation = orgExists($conn, $orgOptions);
?>


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
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <h6 class="mb-0 text-uppercase">Account information</h6>
                                <hr/>
                                <form class="row g-3 user-form">
                                    <div class="col-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" id="editable1" name="firstname" class="form-control" value="<?php echo $user["firstname"]; ?>" readonly required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" id="editable2" name="lastname" class="form-control" value="<?php echo $user["lastname"]; ?>" readonly required>
                                    </div>
                                    <div class="col-8">
                                        <label class="form-label">Organisation</label>
                                        <input type="text" id="editable3" name="organisation" class="form-control" value="<?php echo $organisation["name"]; ?>" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">Role</label>
                                        <input type="text" id="editable4" name="role" class="form-control" value="<?php echo $user["role"]; ?>" readonly required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" id="editable5" name="email" class="form-control" value="<?php echo $user["email"]; ?>" readonly>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" value="placeholder" readonly>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <a class="btn btn-primary edit-user" data-id="<?php echo $userOptions['id']; ?>">Edit user</a>
                                        </div>
                                    </div>
                                </form>
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

<script>
$(".edit-user").click(function (){
    $("#editable1").attr("readonly", false);
    $("#editable2").attr("readonly", false);
    //$("#editable3").attr("readonly", false);
    //$("#editable4").attr("readonly", false);
    $("#editable5").attr("readonly", false);
    var userID = $(this).data("id");
    $(this).replaceWith("<button type='submit' class='btn btn-success'>Save changes</button>");
    $(".user-form").attr("action", "includes/edit_user.php?user="+userID);
    $(".user-form").attr("method", "post");
});
</script>

</body>

</html>