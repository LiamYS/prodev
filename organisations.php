
<?php include 'includes/styling.php'; ?>

<title>ProDev - Organisations</title>
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
        <h6 class="mb-0 text-uppercase">Organisations</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="orgTable" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                        <tr>
                            <?php
                            require_once 'includes/dbconnection.php';
                            $columns = "DESCRIBE organisations;";
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
                            require_once 'includes/functions.php';
                            $orgData = "SELECT * FROM organisations;";
                            $orgResults = mysqli_query($conn, $orgData);

                            foreach ($orgResults as $row) {
                                echo '<tr>';
                                foreach ($row as $data) {
                                    echo '<td>';
                                    echo $data;
                                    echo '</td>';
                                }
                                echo '</tr>';
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
        $('#orgTable').DataTable();
    } );
</script>

</body>

</html>