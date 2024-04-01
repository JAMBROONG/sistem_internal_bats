<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="mr-2 fa fa-angle-down"></i>
                <span class="text-dark"><?= $user['name'] ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <a href="<?= base_url('Admin/profile') ?>" class="dropdown-item">
                    <i class="fas fa-user-circle mr-2 "></i> My profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('Admin/updatePasswordA') ?>" class="dropdown-item">
                    <i class="fas fa-key mr-2"></i> Change password
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('Logout') ?>" class="dropdown-item text-danger">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>