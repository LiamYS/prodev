
<?php include 'includes/styling.php'; ?>

<title>ProDev - Projects</title>
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
        <h6 class="mb-0 text-uppercase">Projects</h6>
        <hr />
        <?php
        if ($_SESSION["role"] == "superadmin" || $_SESSION["role"] == "admin") {
            echo '<a href="create_project.php" class="btn btn-outline-primary px-3">Create Project</a>';
            echo '<hr />';
        }
        ?>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="usersTable" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                        <tr>
                            <?php
                            require_once 'includes/dbconnection.php';
                            $columns = "DESCRIBE projects;";
                            $result = mysqli_query($conn, $columns);

                            foreach ($result as $column) {
                                echo "<th>";
                                echo $column["Field"];
                                echo "</th>";
                            }
                            ?>
                            <th>
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($_SESSION["role"] == "superadmin") {
                            $userData = "SELECT * FROM projects;";
                        } else if ($_SESSION["role"] == "admin" || $_SESSION["role"] == "user") {
                            $userData = "SELECT * FROM projects WHERE orgID = ". $_SESSION["orgID"] .";";
                        }
                        $userResults = mysqli_query($conn, $userData);

                        foreach ($userResults as $row) {
                            echo "<tr>";
                            foreach ($row as $data) {
                                echo "<td>";
                                echo $data;
                                echo "</td>";
                            }
                            echo "<td>";
                            echo "<div class='btn-group'>";
                            echo '<a href="project.php?project='. $row["id"] .'" class="btn btn-outline-primary btn-sm"><i class="bi bi-box-arrow-up-left"></i></a>';
                            if ($_SESSION["role"] == "superadmin" || $_SESSION["role"] == "admin") {
                                echo "<a data-bs-toggle='modal' data-id='". $row["id"] ."' data-bs-target='#confirmModal' class='btn btn-outline-danger btn-sm delete-project'><i class='bi bi-trash-fill'></i></a>";
                            }
                            echo "</div>";
                            echo"</td>";
                            echo "</tr>";
                        }
                        mysqli_close($conn);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Are you sure you want to delete this project, all data will be lost and can not be recovered.</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="" id="delete-project" class="btn btn-danger">Delete Project</a>
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
    $(document).ready(function() {
        $('#usersTable').DataTable();
    } );
</script>

<script>
    $(document).on("click", ".delete-project", function () {
        var myBookId = $(this).data('id');
        $(".modal-footer #delete-user").attr("href", "includes/delete_proj.php?project="+myBookId);
    });
</script>

</body>

</html>