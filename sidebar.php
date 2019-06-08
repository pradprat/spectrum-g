<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
    </a>

    <?php
    if ( isset( $_SESSION['user_jenis'] ) ) {
        $user_jenis = $_SESSION['user_jenis'];
        if ($user_jenis == "admin") {// login as admin
            include("assets/group-button-admin.php");
        }else { // login as user
            include("assets/group-button-user.php");
        }
    }else{
        // header('Location:/'); exit;
    }
    ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
