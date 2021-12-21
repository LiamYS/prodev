
<?php include 'includes/styling.php'; ?>

<title>ProDev - Users</title>
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
        <h6 class="mb-0 text-uppercase">Users</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="usersTable" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <?php
                                require_once 'includes/dbconnection.php';
                                $columns = "DESCRIBE users;";
                                $result = mysqli_query($conn, $columns);

                                foreach ($result as $column) {
                                    echo "<th>";
                                    echo $column["Field"];
                                    echo "</th>";
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $userData = "SELECT * FROM users;";
                            $userResults = mysqli_query($conn, $userData);

                            foreach ($userResults as $row) {
                                echo "<tr>";
                                foreach ($row as $data) {
                                    echo "<td>";
                                    echo $data;
                                    echo "</td>";
                                }
                                echo "</tr>";
                            }
                            mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
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
    $(document).ready(function() {
        $('#usersTable').DataTable();
    } );
</script>

</body>

</html>