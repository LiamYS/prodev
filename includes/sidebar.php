<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="img/icon-placeholder.svg" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">ProDev</h4>
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="dashboard.php">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="projects.php">
                <div class="parent-icon">
                    <i class="bi bi-circle-square"></i>
                </div>
                <div class="menu-title">Projects</div>
            </a>
        </li>

        <li>
            <a href="#">
                <div class="parent-icon">
                    <i class="bi bi-gear-fill"></i>
                </div>
                <div class="menu-title">Settings</div>
            </a>
        </li>

        <?php
        if ($_SESSION["role"] == "superadmin" || $_SESSION["role"] == "admin") {
            echo '<li class="menu-label">Admin</li>';
        }
        ?>

        <?php
        if ($_SESSION["role"] == "superadmin") {
            echo '<li>';
            echo '<a href="../organisations.php">';
            echo '<div class="parent-icon">';
            echo '<i class="bi bi-diagram-3-fill"></i>';
            echo '</div>';
            echo '<div class="menu-title">Organisation</div>';
            echo '</a>';
            echo '</li>';
        }
        ?>

        <!--<li>
            <a href="../create_organisation.php">
                <div class="parent-icon">
                    <i class="bi bi-diagram-2-fill"></i>
                </div>
                <div class="menu-title">Create organisation</div>
            </a>
        </li>-->

        <?php
        if ($_SESSION["role"] == "superadmin" || $_SESSION["role"] == "admin") {
            echo '<li>';
            echo '<a href="../users.php">';
            echo '<div class="parent-icon">';
            echo '<i class="bi bi-people-fill"></i>';
            echo '</div>';
            echo '<div class="menu-title">Users</div>';
            echo '</a>';
            echo '</li>';
        }
        ?>
        <!--<li>
            <a href="../users.php">
                <div class="parent-icon">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="menu-title">Users</div>
            </a>
        </li>-->

        <!--<li>
            <a href="../create_user.php">
                <div class="parent-icon"><i class="bi bi-person-plus-fill"></i>
                </div>
                <div class="menu-title">Create account</div>
            </a>
        </li>-->
    </ul>
    <!--end navigation-->
</aside>