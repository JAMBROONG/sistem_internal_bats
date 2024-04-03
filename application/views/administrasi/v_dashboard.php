<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrasi</title>
    <?php include 'header.php';?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar elevation-1" style="background-color: #2F2F2F;">
            <a href="<?php echo base_url('Client/profile'); ?>" class="brand-link d-flex align-items-center" style="background-color: #1A1A1A;">
                <img src="<?php echo base_url(); ?>assets/upload/images/<?=$user['image']?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <small class=" text-white font-weight-light text-wrap" style="line-break:auto;"><?= $user['company']; ?></small>
            </a>
            <hr class="m-0 border-white">
            <a href="<?php echo base_url('Client/profile'); ?>" class="brand-link d-flex align-items-center" style="background-color: #2F2F2F; color:white;">
                <img src="<?php echo base_url(); ?>assets/upload/images/client/<?=$user['image_user']?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <small class=" text-white font-weight-light text-wrap" style="line-break:auto;"><?= $user['name']; ?></small>
            </a>
            <hr class="m-0 border-white">
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Administrasi/'); ?>" class="nav-link" style="background-color: #C1272D; color:white;">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> My Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Administrasi/profile'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-user"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Administrasi/contract'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-id-badge"></i>
                                <p>Service Contract</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Administrasi/invoice'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>Invoices</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Administrasi/file'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-file-upload"></i>
                                <p>Other Files</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Logout'); ?>" class="nav-link text-white">
                                <i class="nav-icon fa fa-sign-out-alt"></i>
                                <p> Logout </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper bg-white">
            <section class="content mt-3">
                <div class="container-fluid">
                    <div class="card" style="background: url(<?php echo base_url(); ?>assets/image/background/bgDashboard.jpg); background-position:center center; background-size:cover; box-shadow:inset 0 0 0 2000px rgba(0, 0, 0, 0.3);">
                        <div class="card-body">
                            <div class="row p-5 rounded">
                                <div class="col-md-7"></div>
                                <div class="col-md-5">
                                    <h1 class=" display-4 text-bold text-white">BATS <br> INTEGRATION <br> SYSTEM</h1>
                                    <h4 class="text-white text-justify">&nbsp;&nbsp;&nbsp;&nbsp;This application was developed to make it easier for us to see the workflow and be able to see the progress of the project. In addition, it is hoped that us can easily get information related to taxes that is updated by the BATS Consulting company.</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div> 
    </div>
    <?php include 'footer.php';?>
</body>

</html>