<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data User</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';

  ?>
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper shadow">
        <?php include'template/v_navbar.php' ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Users</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= $totalClient; ?></h3>
                                    <p>Client</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users" style="color:white;"></i>
                                </div>
                                <a href="<?php echo base_url('superAdmin/dataClient'); ?>" class="small-box-footer">More<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><?= $totalEmployee; ?></h3>
                                    <p>Employee</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user" style="color:white;"></i>
                                </div>
                                <a href="<?php echo base_url('superAdmin/dataEmployee'); ?>" class="small-box-footer">More<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $totalAdmin; ?></h3>
                                    <p>Admin</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-ninja" style="color:white;"></i>
                                </div>
                                <a href="<?php echo base_url('superAdmin/dataAdmin'); ?>" class="small-box-footer">More<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $totalAdministrasi; ?></h3>
                                    <p>Administrasi</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user" style="color:white;"></i>
                                </div>
                                <a href="<?php echo base_url('superAdmin/dataAdministrasi'); ?>" class="small-box-footer">More<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div> <?php include 'footer.php';?>
</body>

</html>